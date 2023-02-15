<?php 
require_once 'database.php';

Class users{
    public $firstname;
    public $middlename;
    public $lastname;
    public $email;
    public $address;
    public $sex;
    public $role;
    public $type;
    public $username;
    public $password;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function signup() {
        $sql = "INSERT INTO 'user_acc_data' (firstname, middlename, lastname, email, address, gender, role, type, username, password)
         VALUES(:firstname, :middlename, :lastname, :user_name, :address, :gender, :role, :type, :username, :password)";

        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':user_name', $this->user_name);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            $this-> id = $this -> getlatestid();
             
            $sql =  "INSERT INTO 'user_acc_data' ('id', 'user_name', 'user_pass', 'role', 'type')
            VALUES (:id, :email, :password, :role, :type)";
            $query=$this->db->connect()->prepare($sql);
            $query->bindParam(':id', $this->id);
            $query->bindParam(':email', $this-> email);
            $query->bindParam(':password', $this->password);
            $query->bindParam(':role', $this->role);
            $query->bindParam(':type', $this->type);

            if($query-> execute()){
               return"added successfully 2";
            }
            return"added successfully 1";


        } 
        return "error adding ";
    }
}