<?php
class db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ajax_province";
    public $connection;

    public function __construct()
    {
        echo "<br>" . __METHOD__;
        if(!$this->connection)
        {
            $this->connect();
        }
    }

    public function __destruct()
    {
        echo "<br>" . __METHOD__;
        if($this->connection)
        {
            $this->disconnect();
        }
    }

    public function connect()
    {
        $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function disconnect()
    {
        $this->connection = NULL;
    }
}