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
    public $username = "";
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
    public $verify_three;
    public $verify_four;
    public $verify_five;
    public $verify_six;
    public $verify_seven;
    public $verify_eight;
    public $errors = [];
    public $token;
    public $result;
    public $verified;
    public $join_status = 'rsvp';
    public $verify_Stud = 0;
    public $verify_Alm = 0;
    public $verify_Emp = 0;
    public $verify_Non = 0;

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
    function signup($token){


        $sql = "INSERT INTO user_acc_data (profile_picture, background_image, verify_one, verify_two, verify_three, verify_four, verify_five, verify_six, verify_seven, verify_eight, firstname, middlename, lastname, suffix, sex, email, contact_number, province, city, barangay, street_name, bldg_house_no, username, password, role, is_agree, status, organization, member_type, token) 
        VALUES (:profile_picture, :background_image, :verify_one, :verify_two, :verify_three, :verify_four, :verify_five, :verify_six, :verify_seven, :verify_eight, :firstname, :middlename, :lastname, :suffix, :sex, :email, :contact_number, :province, :city, :barangay, :street_name, :bldg_house_no, :username, :password, :role, :is_agree, :status, :organization, :member_type, :token);";

        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':profile_picture', $this->profile_picture);
        $query->bindParam(':background_image', $this->background_image);
        $query->bindParam(':firstname', $this->firstname);
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
        $query->bindParam(':verify_three', $this->verify_three);
        $query->bindParam(':verify_four', $this->verify_four);
        $query->bindParam(':verify_five', $this->verify_five);
        $query->bindParam(':verify_six', $this->verify_six);
        $query->bindParam(':verify_seven', $this->verify_seven);
        $query->bindParam(':verify_eight', $this->verify_eight);
        $query->bindValue(':token', $token);

       
        if($query->execute()){
            return "added successfully 1";
        } 
        return "error adding ";
    }


    function to_check_duplicates(){
        $sql = "SELECT * FROM user_acc_data WHERE email=:email OR username=:username OR password=:password LIMIT 1";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            if($data){
                return true; // duplicates exist
            } else {
                return false; // no duplicates found
            }
        } else {
            return false; // database query failed
        }
    }
    

    function verify_email(){
        $token = $_GET['token'];
        $sql = "SELECT * FROM user_acc_data WHERE token=:token LIMIT 1";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':token', $token);
        if($query->execute()){
            $data = $query->fetchAll();
            return $data;
        }
        return false;
    }
    
    function insert_token($token) {
        $sql = "INSERT INTO user_acc_data (token) VALUES (:token)";
        $query = $this->db->connect()->prepare($sql);
        $query->bindValue(':token', $token);
        if ($query->execute()) {
          return "added successfully";
        } else {
          return "error adding ";
        }
      }

    function update_token() {
        $token = $_GET['token'];
        $query = "UPDATE user_acc_data SET verified=1 WHERE token=:token";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':token', $token);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Failed to update token!";
            return false;
        }
    }


    
    function fetchUser(){
        $sql = "SELECT * FROM user_acc_data;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function fetchUserEmails($token){
        $sql = "SELECT email FROM user_acc_data;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll(PDO::FETCH_COLUMN);
        }
        return $data;
    }

    function getEmailsForEvent($eventId, $token) {
        $sql = "SELECT email FROM rsvp
                INNER JOIN event ON event.id = rsvp.event_id
                WHERE event.id = ?";
        $query = $this->db->connect()->prepare($sql);
        if ($query->execute([$eventId])) {
            $data = $query->fetchAll(PDO::FETCH_COLUMN);
            return $data;
        } else {
            return false;
        }
    }
    
    public function fetchRecordById($id) {
        $select_stmt = $this->db->connect()->prepare('SELECT id, profile_picture, background_image, verify_one, verify_two, verify_three, verify_four, verify_five, verify_six, verify_seven, verify_eight, firstname, middlename, lastname, suffix, sex, email, contact_number, province, city, barangay, street_name, bldg_house_no, username, password, role, is_agree, status, organization, member_type FROM user_acc_data WHERE id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $data = $select_stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function typeStudent(){
        $sql = "SELECT * FROM user_acc_data WHERE member_type = 'Student';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function typeAlumni(){
        $sql = "SELECT * FROM user_acc_data WHERE member_type = 'Alumni';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function typeEmployee(){
        $sql = "SELECT * FROM user_acc_data WHERE member_type = 'Employee';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function typeNone(){
        $sql = "SELECT * FROM user_acc_data WHERE member_type = 'None';";
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

    function verify_Stud() {
        //$stats = $_GET['id'];
        $query = "UPDATE user_acc_data SET verify_Stud=1 WHERE id=:id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Failed to update!";
            return false;
        }
    }

    function addUserToEvent($token) {
        $sql = "INSERT INTO rsvp (id, event_id, firstname, middlename, lastname, suffix, email, contact_number, province, city, barangay, street_name, bldg_house_no, member_type, join_status, token)
         VALUES (NULL, :event_id, :firstname, :middlename, :lastname, :suffix, :email, :contact_number, :province, :city, :barangay, :street_name, :bldg_house_no, :member_type, :join_status, :token);";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':event_id', $this->event_id);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':suffix', $this->suffix);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':province', $this->province);
        $query->bindParam(':city', $this->city);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':street_name', $this->street_name);
        $query->bindParam(':bldg_house_no', $this->bldg_house_no);
        $query->bindParam(':member_type', $this->member_type);
        $query->bindParam(':join_status', $this->join_status);
        $query->bindValue(':token', $this->token);

        if($query->execute()){
            return true;
        } 
        return false;
    }    

    function showUsername(){
        $sql = "SELECT * FROM user_acc_data ORDER BY username ASC;";
        $query=$this->db->query($sql);
        $result=$query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    function showEmail(){
        $sql = "SELECT * FROM user_acc_data ORDER BY email ASC;";
        $query=$this->db->query($sql);  
        $result=$query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function showPassword(){
        $sql = "SELECT * FROM user_acc_data ORDER BY password ASC;";
        $query=$this->db->query($sql);
        $result=$query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    function editUser(){
        $sql = "UPDATE user_acc_data SET profile_picture=:profile_picture, background_image=:background_image, verify_one=:verify_one, verify_two=:verify_two, verify_three=:verify_three, verify_four=:verify_four, verify_five=:verify_five, verify_six=:verify_six, verify_seven=:verify_seven, verify_eight=:verify_eight, firstname=:firstname, lastname=:lastname, email=:email, middlename=:middlename, suffix=:suffix, sex=:sex, contact_number=:contact_number, province=:province, city=:city, barangay=:barangay, street_name=:street_name, bldg_house_no=:bldg_house_no, username=:username, password=:password, role=:role, status=:status, member_type=:member_type WHERE id = :id;";
        
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':profile_picture', $this->profile_picture);
        $query->bindParam(':background_image', $this->background_image);
        $query->bindParam(':verify_one', $this->verify_one);
        $query->bindParam(':verify_two', $this->verify_two);
        $query->bindParam(':verify_three', $this->verify_three);
        $query->bindParam(':verify_four', $this->verify_four);
        $query->bindParam(':verify_five', $this->verify_five);
        $query->bindParam(':verify_six', $this->verify_six);
        $query->bindParam(':verify_seven', $this->verify_seven);
        $query->bindParam(':verify_eight', $this->verify_eight);
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

    function editRoleAndStatus(){
        $sql = "UPDATE user_acc_data SET role=:role, status=:status WHERE id = :id;";
        
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':status', $this->status);
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

