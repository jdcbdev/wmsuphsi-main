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
    public $contactNo;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    
    function login(){
        $sql = "SELECT * FROM user_acc_data WHERE username = :email and user_pass = :password" ;
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
           $data = $query->fetch();
        }
     	return $data;
    }
   
  
    function signup() {
        $sql = "INSERT INTO `user_acc_data` (`id`, `username`, `user_pass`, `firstname`, `middlename`, `lastname`, `suffix`, `email`, `address`, `role`, 
        `type`, `sex`, `contactno`) VALUES (NULL, :username, :user_pass, :firstname, :middlename, :lastname, :suffix, :email, :address, :role, :type, 
        :sex, :contactNo)";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':username', $this->username);
        $query->bindParam(':user_pass', $this->password);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':suffix', $this->suffix);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':contactNo', $this->contactNo);
       
        if($query->execute()){
            return "added successfully 1";
        } 
        return "error adding ";
    }

    // function getUserData() {
    //     $sql = "SELECT * FROM `user_acc_data` WHERE username = :username AND user_pass = :user_pass";
    //     $query=$this->db->connect()->prepare($sql);

    //     $query->bindParam(':username', $this->username);
    //     $query->bindParam(':user_pass', $this->password);

    // }



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