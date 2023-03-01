<?php

class Database{
    private $host = 'localhost';

    

    private $username = 'u654609850_';
    private $password = 'E1C2H3O4';
    private $database = 'u654609850_phsi';

    // private $username = 'root';
    // private $password = '';
    // private $database = 'phsi';
    
    protected $connection;

    function connect(){
        try 
			{
				$this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", 
											$this->username, $this->password);
			} 
			catch (PDOException $e) 
			{
				echo "Connection error " . $e->getMessage();
			}
        return $this->connection;
    }

}

?>