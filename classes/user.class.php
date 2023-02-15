<?php 
require_once 'database.php';

Class users{
    public $firstname;
    public $middlename;
    public $lastname;
    public $email;
    public $address;
    public $gender;
    public $role;
    public $username;
    public $password;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

<<<<<<< Updated upstream
    function validate(){
        $sql = "SELECT * FROM users WHERE username =:username and password = :password ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
=======
    function register(){
        $sql = "INSERT INTO user_acc_data (firstname, middlename, lastname, email, address, gender, role, username, password) VALUES 
        (:firstname, :middlename, :lastname, :email, :address, :gender, :role, :username, :password);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':user_name', $this->user_name);
>>>>>>> Stashed changes
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
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
<<<<<<< Updated upstream
=======
   
  




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
>>>>>>> Stashed changes
}

?>