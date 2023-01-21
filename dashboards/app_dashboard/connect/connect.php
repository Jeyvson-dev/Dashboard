<?php
//Classe para conexão via PDO
class Connect{

    private $host = 'localhost';
    private $dbname = 'dashboard';
    private $username = 'root';
    private $password = '123456';
    public $connection;


    public function connect(){

        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",
            $this->username,
            $this->password
        );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
        } catch(PDOException $e) {

              echo 'ERROR: ' . $e->getMessage();

        }
    } 
}
?>