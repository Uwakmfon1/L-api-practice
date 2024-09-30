<?php
class Database
{
    private $host = 'localhost';

    private $dbname = 'laravelapi';

    private $username = 'root';

    private $password = '';

    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->conn = new PDO("mysql:host=" . $this->host . ';dbname=' . $this->dbname. 'charset=utf8', $this->username, $this->password);
            $this->conn = new PDO("mysql:host= $this->host;dbname= $this->dbname;charset=utf8",  $this->username,  $this->password);
        } catch (PDOException $e) {
            echo 'connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
