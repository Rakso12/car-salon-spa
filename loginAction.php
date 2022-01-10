<?php
session_start();

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "myDB";
$dbTableName = "uzytkownicy";

 
/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if uName is empty
    if(empty(trim($_POST["uName"]))){
        $username_err = "Please enter user name.";
    } else{
        $uName = trim($_POST["uName"]);
    }
    
    // Check if pass is empty
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your pass.";
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM uzytkownicy WHERE user = :uName";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":uName", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["uName"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if uName exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $uName = $row["user"];
                        $hashed_password = $row["password"];
                        if($password == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["uName"] = $uName;  
                            setcookie("user-username", $row['user']);
                            $tmp = $row['imie'] . '&nbsp' . $row['nazwisko'];
                            setcookie("user-name", $tmp);
                            setcookie("user-email", $row['email']);                          
                            setcookie("info-login", "");
                            // Redirect user to welcome page
                            header("Location: http://localhost/carsalon/#!/profile");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid uName or password.";
                                          
                            setcookie("info-login", $login_err);
                            header("Location: http://localhost/carsalon/#!/sign-in");
                            
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid user name or password.";
                    setcookie("info-login", $login_err);
                    header("Location: http://localhost/carsalon/#!/sign-in");
                }
            } else{
                setcookie("info-login", "Oops! Something went wrong. Please try again later.");
                header("Location: http://localhost/carsalon/#!/sign-in");
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}

?>