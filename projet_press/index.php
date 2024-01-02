<?php
session_start();
//include connection file
include_once('connection.php');
include_once('users.php');
 

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('prj_press');
$nameValue = "";
$reg_emailValue = "";
$passwordValue1 = "";
$passwordValue2 = "";
$errorMesage = "";
$successMesage = "";
//email
$logemailValue = "";
$logpasswordValue = "";

//pour register

if(isset($_POST["register"])){
    $nameValue = $_POST["regfulname"];
    $reg_emailValue = $_POST["regmail"];
    $passwordValue1 = $_POST["regpass1"];
    $passwordValue2 = $_POST["regpass2"];

    if(empty($nameValue) || empty($reg_emailValue) || empty($passwordValue1) || empty($passwordValue2)){

            $errorMesage = "all fileds must be filed out!";

    }else if(strlen($passwordValue1) < 8 ){
        $errorMesage = "password must contains at least 8 char";
    }else if(preg_match("/[A-Z]+/", $passwordValue1)==0){
        $errorMesage = "password must contains  at least one capital letter!";
    }
    elseif ($passwordValue1 !== $passwordValue2) {
        $errorMesage = "Passwords do not match."; 
    }else{
       
    
    //include the client file
    include_once('users.php');

    //create new instance of client class with the values of the inputs
    $utilisateur= new User($nameValue,$reg_emailValue,$passwordValue1);

//call the insertClient method
$utilisateur->insertClient('Users',$connection->conn);

//give the $successMesage the value of the static $successMsg of the class
$successMesage = User::$successMsg;

//give the $errorMesage the value of the static $errorMsg of the class
$errorMesage = User::$errorMsg;
if (empty($errorMesage)) {
    setcookie('user_email', $reg_emailValue, time() + 3600, '/'); // Cookie expires in 1 hour$nameValue = "";
    // setcookie('user_password', $passwordValue1, time() + 3600, '/'); // Cookie expires in 1 hour$nameValue = "";
    $_SESSION['user_email'] = $reg_emailValue;
    $_SESSION['user_name'] =$nameValue;
    $_SESSION['type'] = $result['user_type'];   
    header("Location: home.php");
    $nameValue="";
    $reg_emailValue = "";
    $passwordValue1 = ""; 
    $passwordValue2 = ""; 
} 
    }
}
// if (isset($_POST["login"])) {
//     $logemailValue = $_POST["log_email"];
//     $logpasswordValue = $_POST["log_pass"];

//     // Check if fields are empty
//     if (empty($logemailValue) || empty($logpasswordValue)) {
//         $errorMesage = "All fields must be filled out!";
//     } else {
//         // Call the verifyUserAndPassword function
//         $result = $User::verifyUserAndPassword('User', $connection->conn, $logemailValue, $logpasswordValue);

//         // Check the authentication result
//         if ($result['authenticated']) {
//             // Successful login
//             $_SESSION['id'] = $result['user_data']['id'];
//             $userType = $result['user_type'];
//             $redirectPage = ($userType === '0') ? 'admin.php' : 'home.php';
//             header("Location: $redirectPage");
//             exit();
//         } else {
//             // Authentication failed
//             $errorMesage = $result['error'];
//         }
//     }
// }
if (isset($_POST["login"])) {
    $logemailValue = $_POST["log_email"];
    $logpasswordValue = $_POST["log_pass"];

    // Check if fields are empty
    if (empty($logemailValue) || empty($logpasswordValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        // Call the verifyUserAndPassword function
        $result = User::verifyUserAndPassword('users', $connection->conn, $logemailValue, $logpasswordValue);

        // Check the authentication result
        if ($result['authenticated']) {
            // Successful login
            $_SESSION['id'] = $result['user_data']['id'];
            $_SESSION['type'] = $result['user_type'];
            $_SESSION['user_email'] = $logemailValue; // Store user email in session
            $_SESSION['user_name'] = $result['user_data']['fullname']; // Store user name in session
            // Check if "remember me" is checked
            if (isset($_POST['check'])) {
                setcookie('email', $logemailValue, time() + 3600);
                setcookie('password', $logpasswordValue, time() + 3600);
            }
            $redirectPage = $result['redirect_page'];
            header("Location: $redirectPage");
            exit();        } else {
            // Authentication failed
            $errorMesage = $result['error'];
        }
    }
}


      


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IF-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login page</title>
    <link rel="shortcut icon" href="logo transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>

<body>

       <?php

//     if(!empty($errorMesage)){
//   echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
//   <strong>$errorMesage</strong>
//   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
//   </button>
//   </div>";
//     }
       ?> 

    <header>
        <h2 class="logo"><a href="home.html"><img src="logo transparent.png"></a></h2>
    <nav class="navigation">
            <a href="admin.php">admin</a>
            <a href="home.php">home</a>
        </nav>     
    </header>
    
    <div class="wrapper">
        </span>
        <div class="form-box login"> 
  <h2>Login</h2>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input value=" <?php echo $logemailValue ?>"type="email" id="in1" name="log_email"  required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="in2" name="log_pass" <?php echo $logpasswordValue ?> required>
                    <label>Password</label>
                </div>
                <div class="show_password">
                    <label><input type="checkbox" onclick="afficher_password()"> show password</label>
                </div>
                <div class="show_password">
                    <label><input type="checkbox" name="check"> remember me</label>
                </div>
                <span id="s1" class="show_password" style="color: red;">
                     <?php echo isset($errorMesage) ? $errorMesage : ''; ?>
                     <?php echo isset($successMesage) ? $successMesage : ''; ?>
                </span>
                <button type="submit" class="btn" name="login">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form method ="post" >
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" value="<?php echo $nameValue ?>" id="reg1" name="regfulname"required>
                    <label>nom complet</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="emai" value="<?php echo $reg_emailValue ?>" id="reg2" name="regmail"required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="reg3" class="MotDePassereg" value="<?php echo $passwordValue1 ?>" name="regpass1" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="reg4" class="MotDePassereg" value="<?php echo $passwordValue2 ?>" name="regpass2"required>
                    <label>confirmer</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" onclick="afficher_password_regsiter()"> show password</label>
                </div><br>
                <span id="s2" class="show_password" style="color: red;"><?php echo $errorMesage ?></span>
           
                <button type="submit" class="btn" name="register" >Register</button>
                <div class="login-register">
                    <p>Already have an account?<a href="#" class="login-link"> Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>


