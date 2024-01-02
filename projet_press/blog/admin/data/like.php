<?php
class PostLike {
    public $like_id;
    public $liked_by;
    public $post_id;
    public $liked_at;

    public function likeCountByPostID($conn,$tableName,$id){
        $sql = "SELECT * FROM $tableName WHERE post_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
     
        return $stmt->rowCount();
     }
     public function isLikedByUserID($conn,$tableName, $post_id, $user_id){
        $sql = "SELECT * FROM $tableName WHERE post_id=? AND liked_by=?";
        //table name is post_like
        $stmt = $conn->prepare($sql);
        $stmt->execute([$post_id, $user_id]);
     
        if ($stmt->rowCount() > 0) {
           return 1;
        }else return 0;
     }
         // Delete Likes By Post ID with dynamic table name
     public function deleteLikesByPostId($conn,$id,$tableName) {
        $sql = "DELETE FROM $tableName WHERE post_id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$id]);

        return ($res) ? 1 : 0;
    }
    public static function likeCountForEntireTable($conn, $tableName) {
        $sql = "SELECT * FROM $tableName";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
?>
