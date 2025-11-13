<?php
class Vendor {
    private $conn;
    private $table_name = "vendors";

    public $id;
    public $user_id;
    public $business_name;
    public $contact_person;
    public $primary_category;
    public $kyc_info;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET
                    user_id=:user_id, business_name=:business_name, contact_person=:contact_person, primary_category=:primary_category, kyc_info=:kyc_info";

        $stmt = $this->conn->prepare($query);

        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->business_name=htmlspecialchars(strip_tags($this->business_name));
        $this->contact_person=htmlspecialchars(strip_tags($this->contact_person));
        $this->primary_category=htmlspecialchars(strip_tags($this->primary_category));
        $this->kyc_info=htmlspecialchars(strip_tags($this->kyc_info));

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":business_name", $this->business_name);
        $stmt->bindParam(":contact_person", $this->contact_person);
        $stmt->bindParam(":primary_category", $this->primary_category);
        $stmt->bindParam(":kyc_info", $this->kyc_info);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function updateStatus() {
        $query = "UPDATE " . $this->table_name . " SET status = :status WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>