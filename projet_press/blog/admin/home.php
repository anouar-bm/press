<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 
      $key = "hhdsfs1263z";
	  include_once "inc/side-nav.php"; 
      include_once("data/User.php");
    //   include_once("../../../connection.php");
    //   $connection = new Connection(); // Adjust this based on your actual connection function
    //   $connection->selectDatabase('prj_press');
      include_once("../../users.php");
      $totalUserCount = User::countAllUsers("users", $connection);
      include_once("../../Category.php");
      $totalCategoryCount = Category::countAllCategories($connection,"categories"); 
      include_once("../../post.php");
      $postCount = getPostCount($connection,"post");
      include_once("../../../likes.php");
      $totalLikeCount = PostLike::likeCountForEntireTable($connection, "post_like");
      include_once("../../../commentaire.php");
      $totalCommentCount = Comment::commentCountForEntireTable($connection, "comment");
    //   $users = getAll($conn);

	?>
          <div class="cards row gap-3 justify-content-center mt-5">
                <div class=" card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                    <i class="fa fa-file h3" aria-hidden="true"></i>
                        <span>post</span>
                    </div>
                    <div class="card__nbr-students">
                    <span class="h5 fw-bold nbr"><?php echo $postCount ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--rose col-md-3 position-relative">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                    <i class="fa fa-heart h3" aria-hidden="true"></i>
                        <span>likes</span>
                    </div>
                    <div class="card__nbr-course">
                        <span class="h5 fw-bold nbr"><?php echo $totalLikeCount; ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--green col-md-3 position-relative">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                    <i class="fa fa-comment h3" aria-hidden="true"></i>
                        <span>comments</span>
                    </div>
                    <div class="card__payments">
                        <span class="h5 fw-bold nbr"><?php echo $totalCommentCount ?></span>
                    </div>
                </div>
                <div class=" card__items card__items--purple col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                    <i class="fa fa-window-restore h3" aria-hidden="true"></i>
                    <span>categorie</span>
                    </div>
                    <div class="card__nbr-students">
                    <span class="h5 fw-bold nbr"><?php echo $totalUserCount ?></span>
                    </div>
                </div>

                <div class="card__items card__items--gradient col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                    <i class="fa fa-users h3" aria-hidden="true"></i>
                        <span>Users</span>
                    </div>
                    <span class="h5 fw-bold nbr"><?php echo $numberOfUsers ?></span>
                </div>
            </div>

        </div>

	 <script>
	 	var navList = document.getElementById('navList').children;
	 	navList.item(0).classList.add("active");
	 </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../../index.php");
    include_once("");

	exit;
} ?>