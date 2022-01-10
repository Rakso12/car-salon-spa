<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "myDB";
$dbTableName = "uzytkownicy";

try {
    $connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $error = "";

    if(empty(trim($_POST['fName']))){
        $error .= "Please enter a first name. ";
    }
    else{
        if(preg_match('/^[a-zzżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z]+$/', trim($_POST["fName"]))){
            $fNamePost = trim($_POST['fName']);
        }
        else{
            $error .= "Please enter correct first name. ";
        }
    }

    if(empty(trim($_POST['lName']))){
        $error .=  "Please enter a last name. ";
    }
    else{
        if(preg_match('/^[a-zzżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z]+$/', trim($_POST["lName"]))){
            $lNamePost = trim($_POST['lName']);
        }
        else{
            $error .= "Please enter correct last name. ";
        }
    }

    if(empty(trim($_POST['uName']))) {
        $error .=  "Please enter a user name. ";
    }
    else{
        $uNamePost = trim($_POST['uName']);
    }

    if(empty(trim($_POST['email']))) {
        $error .= "Please enter a email. ";
    }
    else{
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error .= "Invalid email format. ";
        }
        else{
            $emailPost = $_POST['email'];
        }
    }

    if(empty(trim($_POST['pass'])) || empty(trim($_POST['rpass']))){
        $error .= "Please enter a password. ";
    }
    else{
        if($_POST['pass'] == $_POST['rpass']){
            $passPost = $_POST['pass'];
        }
        else {
            $error .= "Please enter corect password. ";
        }
    }


    if($error == "")
    {
        $sql = "INSERT INTO {$dbTableName}(imie, nazwisko, email, user, password) VALUES('{$fNamePost}', '{$lNamePost}', '{$emailPost}', '{$uNamePost}','{$passPost}')";
        $connection->exec($sql);
        $last_id = $connection->lastInsertId();
        setcookie("info", "");
        
        header("Location: http://localhost/carsalon/#!/sign-in");
    }
    else {
        setcookie("info", $error);
        header("Location: http://localhost/carsalon/#!/sign-up");
    }

} catch (PDOException $e) {
    $message = "Could not create user";
    setcookie("info", $message);
    header("Location: http://localhost/carsalon/#!/sign-up");
}
$connection = null;

?>