<?php
require __DIR__ . '/../db/db.php';

class ServicesOutput
{
    public bool $isSuccess;
    public $body;
    public $message;
}

class Services  extends SQLiteDB
{
    public function loginUser(string $phonenumber, string $password)
    {
        $output = new ServicesOutput();
        $query = "Select * From users Where phonenumber = '$phonenumber'";
        try {
            $ex = $this->create_connection()->query($query);
            $result = $ex->fetchAll();
            if (count($result) > 0) {
                $hashed_password = $result[0]['password'];
                if (password_verify($password, $hashed_password)) {
                    $output->isSuccess = true;
                    $output->body = $result;
                    $output->message = 'Login Successful';
                    return $output;
                }
                $output->isSuccess = false;
                $output->message = 'Invalid Credentials';
                return $output;
            }
            $output->isSuccess = false;
            $output->message = 'Invalid Credentials';
            return $output;
        } catch (PDOException $e) {
            $output->isSuccess = false;
            $output->body = $e;
            $output->message = 'An error occured while logging in';
            return $output;
        }
        $output->isSuccess = false;
        $output->message = 'An error occured while logging in';
        return $output;
    }

    public function registerUser(string $firstname, string $lastname, string $phonenumber, string $password)
    {
        $output = new ServicesOutput();
        // check if phone number exists
        $phonenumberquery = "Select * From users Where phonenumber = '$phonenumber'";
        $exec = $this->create_connection()->query($phonenumberquery);
        $result = $exec->fetchAll();
        if (count($result) > 0) {
            $output->isSuccess = false;
            $output->message = 'The phone number already exists. Please use another phone number.';
            return $output;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "Insert into users (firstname, lastname, phonenumber, password)
        Values('$firstname', '$lastname', '$phonenumber', '$hashed_password')";
        try {
            $ex = $this->create_connection()->exec($query);
            if ($ex) {
                $output->isSuccess = true;
                $output->message = 'Registration Successful';
                return $output;
            }
        } catch (PDOException $e) {
            $output->isSuccess = false;
            $output->body = $e;
            $output->message = 'An error occured while logging in';
            return $output;
        }
        $output->isSuccess = false;
        $output->message = 'An error occured while logging in';
        return $output;
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
