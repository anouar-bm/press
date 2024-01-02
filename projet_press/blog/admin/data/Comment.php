<?php

class Comment {
    public $comment_id;
    public $comment_content;


   
    // Get All Comments
  static public function getAllComment($conn,$tablename){
   $sql = "SELECT * FROM $tablename";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if($stmt->rowCount() >= 1){
   	   $data = $stmt->fetchAll();
   	   return $data;
   }else {
   	 return 0;
   }
}


    // Get Comment By ID
    public function getCommentById($conn,$tablename, $id){
        //table name is comment
        $sql = "SELECT * FROM $tablename WHERE comment_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
     
        if($stmt->rowCount() >= 1){
              $data = $stmt->fetch();
              return $data;
        }else {
            return 0;
        }
     }

    // Count Comments By Post ID
    public function CountByPostID($conn,$tableName, $id){
        $sql = "SELECT * FROM $tableName WHERE post_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
     
        return $stmt->rowCount();
     }

 

    

    // Get Comments By Post ID
    public function getCommentsByPostID($conn,$id,$tablename) {
        $sql = "SELECT * FROM $tablename WHERE post_id=? ORDER BY comment_id desc";
        //table name is comment
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() >= 1) {
            $data = $stmt->fetchAll();
            return $data;
        } else {
            return 0;
        }
    }
    public static function commentCountForEntireTable($conn, $tableName) {
        $sql = "SELECT * FROM $tableName";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }
    // Delete Comment By ID
    public function deleteCommentById($conn,$id,$tablename) {
        $sql = "DELETE FROM $tablename WHERE comment_id=?";
       //table name is comment
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$id]);
        if($res){
            return 1;
     }else {
          return 0;
     }    }

    // Delete Comments By Post ID
    public function deleteCommentsByPostId($conn,$id,$tablename) {
        $sql = "DELETE FROM $tablename WHERE post_id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$id]);
        if($res){
            return 1;
      }else {
          return 0;
      }    }

   
}
