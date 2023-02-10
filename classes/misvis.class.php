<?php

require_once 'database.php';

Class MisVis{
    //attributes
    public $id;
    public $old_misvis_title;
    public $misvis_title;
    public $misvis_description;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO misvis (misvis_title, misvis_description) VALUES 
        (:misvis_title, :misvis_description);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':misvis_title', $this->misvis_title);
        $query->bindParam(':misvis_description', $this->misvis_description);
        if($query->execute()){
            return true;
        }
        else{   
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE misvis SET misvis_title=:misvis_title, misvis_description=:misvis_description WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':misvis_title', $this->misvis_title);
        $query->bindParam(':misvis_description', $this->misvis_description);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM misvis WHERE id = :id ORDER BY misvis_title ASC;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM misvis WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM misvis ORDER BY misvis_title ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>