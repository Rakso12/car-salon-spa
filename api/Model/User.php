<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class User extends Database
{
    public function getUsers($limit){
        return $this->select("SELECT * FROM uzytkownicy LIMIT ?", ["i", $limit]);
    }

    public function updateUser($userID, $imie, $nazwisko, $email, $user, $password){
        return $this->update("UPDATE uzytkownicy SET imie='{$imie}', nazwisko='{$nazwisko}', email='{$email}', user='{$user}', password='{$password}' WHERE id={$userID}");
    }

    /* pobierz, dodaj, usun, edytuj */
}