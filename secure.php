<?php
  session_start();
  
  $errors = array();
  $_SESSION['success'] = "";
  
  $dbHost = 'localhost';
  $dbUser = 'root';
  $dbPass = '';
  $dbName = "myDB";
  $dbTableName = "uzytkownicy";
  
  $fName = "";
  $lName = "";
  $uName = "";
  $email = "";
  
  //Utworzenie bazy danych o nazwie "myDB"
  $conn = new mysqli($dbHost, $dbUser, $dbPass);
  if($conn->connect_error) {
    echo("Po&#322;&#261;czenie nie udane: " . $conn->connect_error . '<br />');
  }
  
  $sql = 'CREATE DATABASE IF NOT EXISTS ' . $dbName;
  if($conn->query($sql) === TRUE) {
    //echo 'Baza danych utworzoba poprawnie<br />';
  }
  else {
    echo 'Nie mo&#380;na utworzy&#263; bazydanych: ' . $conn->error . '<br />';
  }
  
  $conn->close();
  
  //Utworzenie tabeli o nazwie "uzytkownicy"
  $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  if($conn->connect_error) {
    echo("Po&#322;&#261;czenie nie udane: " . $conn->connect_error . '<br />');
  }
  
  $sql = "CREATE TABLE IF NOT EXISTS " . $dbTableName . "(
    id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(30) NOT NULL,
    nazwisko VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    user VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL
  )";
  if($conn->query($sql) === TRUE) {
    //echo 'Tabela utworzona poprawnie<br />';
  }
  else {
    echo 'Nie mo&#380;na utworzy&#263; tabeli: ' . $conn->error . '<br />';
  }
  
  $conn->close();
?>