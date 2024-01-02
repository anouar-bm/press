<?php

class Category {
    public $id;
    public $nom_cat;

    // Get all categories
    public function getAll($conn) {
        $sql = "SELECT * FROM Categories";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            $data = $stmt->fetchAll();
            return $data;
        } else {
            return 0;
        }
    }

    // Get category by ID
    public function getById($conn, $id) {
        $sql = "SELECT * FROM Categories WHERE CategoryID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() >= 1) {
            $data = $stmt->fetch();
            return $data;
        } else {
            return 0;
        }
    }

    // Create a new category
    public function create($conn, $nom_cat) {
        $sql = "INSERT INTO Categories (CategoryName) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$nom_cat]);

        if ($res) {
            return $conn->lastInsertId(); // Return the ID of the newly created category
        } else {
            return 0;
        }
    }

    // Update category by ID
    public function updateById($conn, $id, $nom_cat) {
        $sql = "UPDATE Categories SET CategoryName=? WHERE CategoryID=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$nom_cat, $id]);

        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    // Delete category by ID
    public function deleteById($conn, $id) {
        $sql = "DELETE FROM Categories WHERE CategoryID=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$id]);

        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function countAllCategorie($tableName, $conn) {
        // Count all the clients in the database
        $sql = "SELECT COUNT(*) as categorieCount FROM $tableName";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['categorieCount'];
        } else {
            // Handle the error or return a default value
            return false;
        }
    }
    
}

?>
