<?php 
   
   if (isset($key) && $key == "hhdsfs1263z") {
	
 ?>
 <script src="https://kit.fontawesome.com/480d24333e.js" crossorigin="anonymous"></script>
 
 <php
	  ?>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">My <b>Blog</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<div class="d-flex align-items-center main-profile-link" >
			<a href="profile.php" >
			<i class="fa fa-user" aria-hidden="true"></i>&nbsp;
		   <span>@<?php echo $_SESSION['user_name']; ?></span>
		   </a>
		</div>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				
			</div>
			<ul id="navList">
			<li >
					<a href="home.php">
					<i class="fa-solid fa-house"></i>
					<span>home</span>
					</a>
				</li>	
			<li >
					<a href="Users.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Users</span>
					</a>
				</li>
				<li>
					<a href="Post.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
						<span>Post</span>
					</a>
				</li>
				<li>
					<a href="Category.php">
						<i class="fa fa-window-restore" aria-hidden="true"></i>
						<span>Category</span>
					</a>
				</li>
				<li>
					<a href="Comment.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Comment</span>
					</a>
				</li>
				<li>
					<a href="profile.php">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Setting</span>
					</a>
				</li>
				<li>
					<a href="../../log_out.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">

<?php 
   } 
 ?>