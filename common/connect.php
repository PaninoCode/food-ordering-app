<?php
class Database
{

    private $credentials_localhost = [
        "server" => "localhost",
        "port" => "3306",
        "user" => "root",
        "passwd" => "",
        "db" => "fooddb"
    ];

    //common credentials
    public $conn;

    private function getCredentials()
    {
        $credentials = $this->credentials_localhost;
        return $credentials;
    }

    public function connect() //effettua la connessione al server
    {
        $credentials = $this->getCredentials();
        try {
            $this->conn = new mysqli($credentials["server"], $credentials["user"], $credentials["passwd"], $credentials["db"], $credentials["port"]);
        }
        //la classe mysqli non estende l'interfaccia Throwable e non può essere usata come un'eccezione. 
        catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
