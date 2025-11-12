<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $email;
    public $mobile;
    public $city;
    public $password;
    public $company;
    public $gstin;
    public $role_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET
                    name=:name, email=:email, mobile=:mobile, city=:city, password=:password, company=:company, gstin=:gstin, role_id=:role_id";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->mobile=htmlspecialchars(strip_tags($this->mobile));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->company=htmlspecialchars(strip_tags($this->company));
        $this->gstin=htmlspecialchars(strip_tags($this->gstin));
        $this->role_id=htmlspecialchars(strip_tags($this->role_id));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":city", $this->city);

        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $password_hash);

        $stmt->bindParam(":company", $this->company);
        $stmt->bindParam(":gstin", $this->gstin);
        $stmt->bindParam(":role_id", $this->role_id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    function emailExists() {
        $query = "SELECT id, name, password, role_id FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $this->email=htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->password = $row['password'];
            $this->role_id = $row['role_id'];
            return true;
        }

        return false;
    }
}
?>