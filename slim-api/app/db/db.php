<?php
class SQLiteDB
{
    function __construct()
    {
    }

    public function create_connection()
    {
        $path = __DIR__ . '/sqlite.db';
        return new PDO("sqlite:" . $path);
    }

    public function create_users_table()
    {
        $query = "
        CREATE TABLE users
        (id INT IDENTITY(1,1) NULL PRIMARY KEY,
        firstname   VARCHAR(50)  NOT NULL,
        lastname   VARCHAR(50)  NOT NULL,
        phonenumber   VARCHAR(50)  NOT NULL,
        password   VARCHAR(255)  NOT NULL
        ); ";

        // Execute query
        try {
            $ex = $this->create_connection()->exec($query);
            if ($ex) {
                // Add user
                try {
                    $hashed_password = password_hash("nnnnnnnnnnnnnnnnnnnnnnnnnnn", PASSWORD_DEFAULT);
                    $query_add_user = "Insert into users (firstname, lastname, phonenumber, password)
                    Values('test', 'test', '070000000000000000000000', '$hashed_password')";
                    $this->create_connection()->exec($query_add_user);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
                return true;
            } else {
                return false; //'$this->create_connection()->errorInfo()';
            }
        } catch (PDOException $e) {
            return false; //$e->getMessage();
        }
    }
}
