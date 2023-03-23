<?php 
require_once 'database.php';

Class Users{
    public $id;
    public $profile_picture = 'user-icon.png';
    public $background_image = 'phsi-carousel.jpg';
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
    public $event_id;
    public $user_id;
    public $role = 'user';
    public $status = 'Pending';
    public $is_agree = 'No';
    public $member_type;
    public $organization = 'None';
    public $verify_one;
    public $verify_two;

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

        


        $sql = "INSERT INTO user_acc_data (profile_picture, background_image, verify_one, verify_two, firstname, middlename, lastname, suffix, sex, email, contact_number, province, city, barangay, street_name, bldg_house_no, username, password, role, is_agree, status, organization, member_type) 
        VALUES (:profile_picture, :background_image, :verify_one, :verify_two, :firstname, :middlename, :lastname, :suffix, :sex, :email, :contact_number, :province, :city, :barangay, :street_name, :bldg_house_no, :username, :password, :role, :is_agree, :status, :organization, :member_type);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':profile_picture', $this->profile_picture);
        $query->bindParam(':background_image', $this->background_image);
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
        $query->bindParam(':is_agree', $this->is_agree);
        $query->bindParam(':organization', $this->organization);
        $query->bindParam(':member_type', $this->member_type);
        $query->bindParam(':status', $this->status);

        $query->bindParam(':verify_one', $this->verify_one);
        $query->bindParam(':verify_two', $this->verify_two);
       
        if($query->execute()){
            return "added successfully 1";
        } 
        return "error adding ";
    }



    function fetchUser(){
        $sql = "SELECT * FROM user_acc_data;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function pending(){
        $sql = "SELECT * FROM user_acc_data WHERE status = 'Pending';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function verified(){
        $sql = "SELECT * FROM user_acc_data WHERE status = 'Verified';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
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

    function addUserToEvent() {
        $sql = "INSERT INTO rsvp (rsvp_id, event_id, id, firstname, middlename, lastname, suffix, email, contact_number)
         VALUES (null, :event_id, :id, :firstname, :middlename, :lastname, :suffix,  :email, :contact_number);";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':event_id', $this->event_id);
        $query->bindParam(':id', $this->user_id);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':suffix', $this->suffix);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);

        if($query->execute()){
            return true;
        } 
        return false;
    }
    
    function edit(){
        $sql = "UPDATE user_acc_data SET verify_one=:verify_one, verify_two=:verify_two, profile_picture=:profile_picture, background_image=:background_image, firstname=:firstname, lastname=:lastname, email=:email, middlename=:middlename, suffix=:suffix, sex=:sex, contact_number=:contact_number, province=:province, city=:city, barangay=:barangay, street_name=:street_name, bldg_house_no=:bldg_house_no, username=:username, password=:password, role=:role, status=:status, member_type=:member_type WHERE id = :id;";
        
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':verify_one', $this->verify_one);
        $query->bindParam(':verify_two', $this->verify_two);
        $query->bindParam(':profile_picture', $this->profile_picture);
        $query->bindParam(':background_image', $this->background_image);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':suffix', $this->suffix);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':province', $this->province);
        $query->bindParam(':city', $this->city);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':street_name', $this->street_name);
        $query->bindParam(':bldg_house_no', $this->bldg_house_no);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':member_type', $this->member_type);

        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else {
            return false;
        }
    }

}

?>

