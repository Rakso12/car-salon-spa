<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "myDB";
$dbTableName = "uzytkownicy";

try {
    $connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(empty(trim($_POST['fName']))){
        $fErr = "Please enter a first name.";
    }
    else{
        if(preg_match('/^[a-zzżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z]+$/', trim($_POST["fName"]))){
            $fNamePost = trim($_POST['fName']);
        }
        else{
            $fErr = "Please enter correct first name.";
        }
    }

    if(empty(trim($_POST['lName']))){
        $lErr = "Please enter a last name.";
    }
    else{
        if(preg_match('/^[a-zzżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z]+$/', trim($_POST["lName"]))){
            $lNamePost = trim($_POST['lName']);
        }
        else{
            $lErr = "Please enter correct last name.";
        }
    }

    if(empty(trim($_POST['uName']))){
        $lErr = "Please enter a user name.";
    }
    else{
        if(preg_match('/^[a-zzżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z0-9_]+$/', trim($_POST["uName"]))){
            $uNamePost = trim($_POST['uName']);
        }
        else{
            $lErr = "Please enter correct user name.";
        }
    }

    if(empty(trim($_POST['email']))) {
        $eErr = "Please enter a email.";
    }
    else{
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        else{
            $emailPost = $_POST['email'];
        }
    }

    if(empty(trim($_POST['pass'])) || empty(trim($_POST['rpass']))){
        $pConfirmErr = "Please enter a password.";
    }
    else{
        if($_POST['pass'] == $_POST['rpass']){
            $passPost = $_POST['pass'];
        }
        else {
            $pConfirmErr = "Please enter corect password.";
        }
    }


    if(empty($fErr) && empty($lErr) && empty($eErr) && empty($pErr) && empty($pConfirmErr))
    {
        $sql = "INSERT INTO {$dbTableName}(imie, nazwisko, email, user, password) VALUES('{$fNamePost}', '{$lNamePost}', '{$emailPost}', '{$uNamePost}','{$passPost}')";
        $connection->exec($sql);
        $last_id = $connection->lastInsertId();
        setcookie("info", "");
        
        header("Location: http://localhost/carsalon/#!/sign-in");
    }
    else {
        $message = "Wrong data";
        setcookie("info", $message);
        header("Location: http://localhost/carsalon/#!/sign-up");
    }

} catch (PDOException $e) {
    $message = "Could not create user";
    setcookie("info", $message);
    header("Location: http://localhost/carsalon/#!/sign-up");
}
$connection = null;

?>