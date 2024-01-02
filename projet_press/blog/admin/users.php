<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['type']) && $_SESSION['type'] === 1) {
	?>
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/480d24333e.js" crossorigin="anonymous"></script>
	<title>Dashboard - Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 
      $key = "hhdsfs1263z";
	  include "inc/side-nav.php"; 
      include_once("data/User.php");
      include_once("../db_conn.php");
      $users = getAll($conn);

	?>
               
	 <div class="main-table">
	 	<h3 class="mb-3">All Users 
	 		<a href="../signup.php" class="btn btn-success">Add New</a></h3>
	 	<?php if (isset($_GET['error'])) { ?>	
	 	<div class="alert alert-warning">
			<?=htmlspecialchars($_GET['error'])?>
		</div>
	    <?php } ?>

        <?php if (isset($_GET['success'])) { ?>	
	 	<div class="alert alert-success">
			<?=htmlspecialchars($_GET['success'])?>
		</div>
	    <?php } ?>

	 	<?php if ($users != 0) { ?>
	 	<table class="table t1 table-bordered">
    <thead>
        <tr>
            <th class="text-center" scope="col">id</th>
            <th class="text-center" scope="col">Full Name</th>
            <th class="text-center" scope="col">email</th>
			<th class="text-center" scope="col">type user</th>
            <th class="text-center" scope="col">date</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <th class="text-center" scope="row"><?= $user['id'] ?></th>
                <td class="text-center"><?= $user['fullname'] ?></td>
                <td class="text-center"><?= $user['email'] ?></td>
				<td class="text-center">
    <?php
    if ($user['user_type'] == 1) {
        echo "Admin User";
    } elseif ($user['user_type'] == 2) {
        echo "Normal User";
    } else {
        echo "Unknown User Type";
    }
    ?>
</td>
<td class="text-center"><?= date('j/m/y', strtotime($user['reg_date'])) ?></td>
                <td class="text-center d-flex align-items-center justify-content-center">
                    <div class="centered-icon" style="margin-right: 20px;">
                        <a href="modifier.php?Id=2" style="color: #04A6D8; font-weight: 500; -webkit-font-smoothing: antialiased; font-style: normal; font-variant: normal; text-rendering: auto; line-height: 1;">
							<i class="fa-solid fa-pen"></i>
						</a>
                    </div>
                    <div class="centered-icon">
                        <a href="user-delete.php?user_id=<?= $user['id'] ?>" style="color: #E74C3C; font-weight: 500; -webkit-font-smoothing: antialiased; font-style: normal; font-variant: normal; text-rendering: auto; line-height: 1;">
						<i class="fa-solid fa-trash"></i>
		</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

	<?php }else{ ?>
		<div class="alert alert-warning">
			Empty!
		</div>
	<?php } ?>
	 </div>
	</section>
	</div>

	 <script>
	 	var navList = document.getElementById('navList').children;
	 	navList.item(1).classList.add("active");
	 </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>