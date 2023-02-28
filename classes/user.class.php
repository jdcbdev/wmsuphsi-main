<?php 
require_once 'database.php';

Class Users{
    public $profile_picture;
    public $background_image;
    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $sex;
    public $email;
    public $contact_number;
    public $province;
    public $city;
    public $barangay;
    public $street_name;
    public $bldg_house_no;
    public $username;
    public $password;
    public $role = 'user';

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //FUNCTION TO CHECK IF THE USERNAME AND PASSOWRD IS IN THE USER ACC DATABASE
    function login(){
        $sql = "SELECT * FROM user_acc_data WHERE username = :username and password = :password";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
           $data = $query->fetch();
        }
     	return $data;
    }
   
    //INSERT A NEW USER  INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
    function signup(){
        $sql = "INSERT INTO user_acc_data (firstname, middlename, lastname, suffix, sex, email, contact_number, province, city, barangay, street_name, bldg_house_no, username, password, role) 
        VALUES (:firstname, :middlename, :lastname, :suffix, :sex, :email, :contact_number, :province, :city, :barangay, :street_name, :bldg_house_no, :username, :password, :role);";

        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':suffix', $this->suffix);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':province', $this->province);
        $query->bindParam(':city', $this->city);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':street_name', $this->street_name);
        $query->bindParam(':bldg_house_no', $this->bldg_house_no);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':role', $this->role);
       
        if($query->execute()){
            return "added successfully 1";
        } 
        return "error adding ";
    }

    function fetch($record_id){
        $sql = "SELECT * FROM user_acc_data WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM user_acc_data WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}

?>