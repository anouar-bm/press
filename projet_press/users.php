<?php
class User{

public $id;
public $fullname;
public $email;
public $password;
public $reg_date; 

public $user_type;

public static $errorMsg = "";

public static $successMsg="";


public function __construct($fullname,$email,$password){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->fullname = $fullname;
    $this->email = $email;
    $this->password = password_hash($password,PASSWORD_DEFAULT);
    $this->user_type = (int) 2;
}

public function insertClient($tableName,$conn){

//insert a client in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (fullname, email,password,user_type)
VALUES ('$this->fullname', '$this->email','$this->password','$this->user_type')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

public static function  selectAllClients($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id, firstname, lastname,email,user_type FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        return $data;
    }

}
public static function countAllUsers($tableName, $conn) {
    // Count all the clients in the database
    $sql = "SELECT COUNT(*) as userCount FROM $tableName";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['userCount'];
    } else {
        // Handle the error or return a default value
        return 0;
    }
}



static function updateClient($utilisateur,$tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET lastname='$utilisateur->lastname',firstname='$utilisateur->firstname',email='$utilisateur->email',user_type='$utilisateur->user_type' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
        header("Location:blog/admin/users.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }
}

static function deleteClient($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:read.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }


    public static function selectusertBytypeId($tableName,$conn,$idtype){
    
        $sql = "SELECT id, firstname, lastname,email,user_type FROM $tableName  WHERE user_type='$idtype'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) { 
            $data[]=$row;
        }
        return $data;
    }

    }

    // static function verifyUserAndPassword($tableName, $conn, $email, $password) {
    //     $sql = "SELECT id, firstname, lastname, email, password, user_type FROM $tableName WHERE email='$email'";
    //     $result = mysqli_query($conn, $sql);
    
    //     if ($result && mysqli_num_rows($result) > 0) {
    //         $row = mysqli_fetch_assoc($result);
    
    //         // Use password_verify to check if the entered password matches the hashed password in the database
    //         if (password_verify($password, $row['password'])) {
    //             // Password is correct
    //             unset($row['password']);  // Remove hashed password from the result array
    
    //             // Check user type and determine redirect page
    //             $userType = $row['user_type'];
    //             $_SESSION['id']=$row['id'];
    //             $redirectPage = ($userType === '0') ? 'admin.php' : 'home.php';
    
    //             // Return authentication success with user data and redirect page
    //             return ['authenticated' => true, 'user_type' => $userType, 'user_data' => $row, 'redirect_page' => $redirectPage];
    //         } else {
    //             // Password is incorrect
    //             return ['authenticated' => false, 'error' => 'Invalid password'];
    //         }
    //     } else {
    //         // User not found in the database
    //         return ['authenticated' => false, 'error' => 'User not found'];
    //     }
    // }

    public function getByID($tableName,$conn,$id){
        $sql = "SELECT id, fullname,email,reg_date FROM $tableName WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
     
        if($stmt->rowCount() >= 1){
              $data = $stmt->fetch();
              return $data;
        }else {
            return 0;
        }
     } 

    static function verifyUserAndPassword($tableName, $conn, $email, $password) {
        // Define the SQL query to select user information based on email
        $sql = "SELECT id, fullname, email, password, user_type FROM $tableName WHERE email=?";
        
        // Use prepared statement to prevent SQL injection
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt === false) {
            // If preparing the statement fails, return an error message
            return ['authenticated' => false, 'error' => 'Error preparing statement: ' . mysqli_error($conn)];
        }
    
        // Bind the email parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $email);
        
        // Execute the prepared statement
        mysqli_stmt_execute($stmt);
        
        // Get the result set from the prepared statement
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result === false) {
            // If executing the statement fails, return an error message
            return ['authenticated' => false, 'error' => 'Error executing statement: ' . mysqli_error($conn)];
        }
    
        if (mysqli_num_rows($result) > 0) {
            // If there is a row in the result set, fetch the user data
            $row = mysqli_fetch_assoc($result);
    
            // Use password_verify to check if the entered password matches the hashed password in the database
            if (password_verify($password, $row['password'])) {
                // Password is correct
    
                // Remove hashed password from the result array for security
                unset($row['password']);
    
                // Check user type and determine redirect page
                $userType = $row['user_type'];
                // $_SESSION['id'] = $row['id'];
                // $_SESSION['type'] = $row['user_type'];
                if ($userType === 1) {
                    $redirectPage = './blog/admin/home.php';
                } elseif ($userType === 2) {
                    $redirectPage = 'home.php';
                } else {
                    // Gestion d'un type d'utilisateur non prévu
                    $redirectPage = 'error_page.php'; // Vous pouvez définir une page d'erreur spécifique
                }
                // Return authentication success with user data and redirect page
                return ['authenticated' => true, 'user_type' => $userType, 'user_data' => $row, 'redirect_page' => $redirectPage];
            } else {
                // Password is incorrect
                return ['authenticated' => false, 'error' => 'Invalid password'];
            }
        } else {
            // User not found in the database
            return ['authenticated' => false, 'error' => 'User not found'];
        }
    }  
}
?>


