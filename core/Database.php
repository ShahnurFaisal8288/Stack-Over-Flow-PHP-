<?php
trait Database
{
    public $conn; // Define the conn property

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=stackoverflow", $username, $password);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //dataWrite
    public function dataWrite($sql,$params=[]){
        $statement = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $statement->bindValue(':'.$key,$value);
        }
        $statement->execute();
    }
    //dataRead
    public function dataRead($sql,$params=[]){
        $statement = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $statement->bindValue(':'.$key,$value);
        }
        $statement->execute();
        return $statement->fetchAll();
    }
}
?>
