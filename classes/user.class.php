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

    
    function login(){
        $sql = "SELECT * FROM user_acc_data WHERE user_name = :email and user_pass = :password" ;
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
           $data = $query->fetch();
        }
     	return $data;
    }
   
  




  /*  function validate(){
        $sql = "SELECT * FROM users WHERE username =:username and password = :password ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    } */
}

?>