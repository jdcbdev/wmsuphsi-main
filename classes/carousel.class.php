<?php

require_once 'database.php';

Class Carousel{
    //attributes
    public $id;
    public $carousel_image;
    public $carousel_title;
    public $carousel_description;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO carousel (carousel_image, carousel_title, carousel_description) VALUES 
        (:carousel_image, :carousel_title, :carousel_description);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':carousel_image', $this->carousel_image);
        $query->bindParam(':carousel_title', $this->carousel_title);
        $query->bindParam(':carousel_description', $this->carousel_description);
        if($query->execute()){
            return true;
        }
        else{   
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE carousel SET carousel_image=:carousel_image, carousel_title=:carousel_title, carousel_description=:carousel_description WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':carousel_image', $this->carousel_image);
        $query->bindParam(':carousel_title', $this->carousel_title);
        $query->bindParam(':carousel_description', $this->carousel_description);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM carousel WHERE id = :id ORDER BY carousel_title ASC;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM carousel WHERE id = :id;";
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
        $sql = "SELECT * FROM carousel ORDER BY carousel_title ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>