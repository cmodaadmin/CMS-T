<?php
class Bid {
    private $conn;
    private $table_name = "bids";

    public $id;
    public $rfq_id;
    public $vendor_id;
    public $amount;
    public $timeline;
    public $notes;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET
                    rfq_id=:rfq_id, vendor_id=:vendor_id, amount=:amount, timeline=:timeline, notes=:notes";

        $stmt = $this->conn->prepare($query);

        $this->rfq_id=htmlspecialchars(strip_tags($this->rfq_id));
        $this->vendor_id=htmlspecialchars(strip_tags($this->vendor_id));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->timeline=htmlspecialchars(strip_tags($this->timeline));
        $this->notes=htmlspecialchars(strip_tags($this->notes));

        $stmt->bindParam(":rfq_id", $this->rfq_id);
        $stmt->bindParam(":vendor_id", $this->vendor_id);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":timeline", $this->timeline);
        $stmt->bindParam(":notes", $this->notes);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    function readByVendor($vendor_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE vendor_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $vendor_id);
        $stmt->execute();

        return $stmt;
    }

    function readByRfq($rfq_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE rfq_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $rfq_id);
        $stmt->execute();

        return $stmt;
    }
}
?>