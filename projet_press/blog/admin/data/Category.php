<?php

class Category {
    public $id;
    public $category;

    // Get All
    static public function getAll($conn, $tablename) {
        $sql = "SELECT * FROM $tablename";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            $data = $stmt->fetchAll();
            return $data;
        } else {
            return 0;
        }
    }
    public static function categoryCountForEntireTable($conn, $tableName) {
        $sql = "SELECT * FROM $tableName";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }
    // getById
    public function getById($conn, $tablename, $id) {
        $sql = "SELECT * FROM $tablename WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() >= 1) {
            $data = $stmt->fetch();
            return $data;
        } else {
            return 0;
        }
    }

    // Delete By ID
    public function deleteById($conn, $tablename, $id) {
        $sql = "DELETE FROM $tablename WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$id]);

        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    // Count All Categories
    static public function countAllCategories($conn, $tablename) {
        $sql = "SELECT COUNT(*) as categoryCount FROM $tablename";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['categoryCount'];
        } else {
            return 0;
        }
    }
}
