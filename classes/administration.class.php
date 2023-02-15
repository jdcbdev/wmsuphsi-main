<?php 
require_once 'dbconfig.php';

Class administration{
    public $name;
    public $honorific;
    public $position;


    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function insertData(){
        $sql = "INSERT INTO administration (Name,Honorifics, Positions)VALUES(:name,:honorifics,:position)";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':name',$this-> name);
        $query->bindParam(':honorifics',$this-> honorific);
        $query->bindParam(':position',$this-> position);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
}

?>