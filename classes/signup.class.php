<?php 
require_once 'database.php';

Class users{
    public $username;
    public $password;
    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $email;
    public $address;
    public $role;
    public $type;
    public $sex;
    public $contactno;
   

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function signup() {
        $sql = "INSERT INTO 'user_acc_data' (username, user_pass, firstname, middlename, lastname, suffix, email, address,  role, type, sex, contactno)
                               VALUES(:email, :password, :firstname, :middlename, :lastname, :suffix, :email, :address,  :role, :type, :sex, :contactno)";

        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':suffix', $this->suffix);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':contactno', $this->contactno);
       
        if($query->execute()){
            $this-> id = $this -> getlatestid();
             
            $sql =  "INSERT INTO 'user_acc_data' ('id', 'username', 'user_pass', 'role', 'type')
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