<?php
class Rfq {
    private $conn;
    private $table_name = "rfqs";

    public $id;
    public $customer_id;
    public $title;
    public $description;
    public $category;
    public $budget;
    public $city;
    public $timeline;
    public $attachments;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET
                    customer_id=:customer_id, title=:title, description=:description, category=:category, budget=:budget, city=:city, timeline=:timeline, attachments=:attachments";

        $stmt = $this->conn->prepare($query);

        $this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category=htmlspecialchars(strip_tags($this->category));
        $this->budget=htmlspecialchars(strip_tags($this->budget));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->timeline=htmlspecialchars(strip_tags($this->timeline));
        $this->attachments=htmlspecialchars(strip_tags($this->attachments));

        $stmt->bindParam(":customer_id", $this->customer_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":budget", $this->budget);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":timeline", $this->timeline);
        $stmt->bindParam(":attachments", $this->attachments);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    function read($customer_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE customer_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $customer_id);
        $stmt->execute();

        return $stmt;
    }

    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->customer_id = $row['customer_id'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->category = $row['category'];
        $this->budget = $row['budget'];
        $this->city = $row['city'];
        $this->timeline = $row['timeline'];
        $this->attachments = $row['attachments'];
        $this->status = $row['status'];
    }
}
?>