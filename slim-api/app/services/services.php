<?php
require __DIR__ . '/../db/db.php';

class Services  extends SQLiteDB
{
    public function loginUser(string $username, string $password)
    {
        $query = "Select * From users Where username != '$username'";
        try {
            $ex = $this->create_connection()->query($query);
            $result = $ex->fetchAll();
            if (count($result)) {
                $hashed_password = $result[0]['password'];
                if(password_verify($password, $hashed_password)) {
                    return true;
                }
                return false;
            }
            return false;
        } catch (PDOException $e) {
            return $e;
        }
        return false;
    }

    public function registerUser(string $firstname, string $lastname, string $username, string $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "Insert into users (firstname, lastname, username, password)
        Values('$firstname', '$lastname', '$username', '$hashed_password')";
        try {
            $ex = $this->create_connection()->exec($query);
            if ($ex) {
                return true;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function getUsers()
    {
        $query = "Select * From users";
        try {
            $ex = $this->create_connection()->query($query);
            return $ex->fetchAll();
        } catch (PDOException $e) {
            return $e;
        }
    }
}
