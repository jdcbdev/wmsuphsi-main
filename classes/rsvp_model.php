<?php 
require_once 'database.php';
require_once '../controllers/sendEventTicket.php';
require_once '../vendor/autoload.php';

Class Rsvp{

    public $id;
    public $event_id;
    public $user_id;
    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $email;
    public $contact_number;
    public $token;
    public $attendance_timestamp;
    public $province;
    public $city;
    public $barangay;
    public $street_name;
    public $bldg_house_no;
    public $role = 'user';
    public $member_type;
    public $organization = 'None';
    public $status = 'rsvp';
    public $confirm = 'No';
    
    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }


    function fetchAttendee() {
        $sql = "SELECT * FROM `rsvp` INNER JOIN event ON rsvp.event_id = event.id WHERE rsvp.event_id = :event_id;";
        $query = $this->db->connect()->prepare($sql);   
        
        $query->bindParam(':event_id', $this->event_id);
    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    /*function fetchAttendee() {
        $sql = "SELECT rsvp.*, 
                       event.event_title, event.event_banner, event.event_about, event.event_mode, 
                       event.event_location, event.event_platform, event.event_slots, event.event_organizer, 
                       event.event_start_date, event.event_end_date, event.event_start_time, event.event_end_time, event.event_scope, event.event_reg_duedate 
                FROM rsvp 
                INNER JOIN event ON rsvp.event_id = event.id 
                WHERE rsvp.event_id = :event_id;";
        $query = $this->db->connect()->prepare($sql);   
            
        $query->bindParam(':event_id', $this->event_id);
        
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }*/

    function getRsvp() {
        if (!$this->event_id) {
            return []; // return an empty array if the event_id is not set
        }
    
        $sql = "SELECT * FROM `rsvp` INNER JOIN event ON rsvp.event_id = event.id WHERE rsvp.event_id = :event_id AND rsvp.join_status = 'rsvp';";
        $query = $this->db->connect()->prepare($sql);
    
        $query->bindParam(':event_id', $this->event_id);
    
        if($query->execute()){
            $data = $query->fetchAll();
        } else {
            // add some debug code to see if there are any errors
            $error = $query->errorInfo();
            var_dump($error);
        }
        return $data;
    }

    function getConfirm() {
        if (!$this->event_id) {
            return []; // return an empty array if the event_id is not set
        }
    
        $sql = "SELECT * FROM `rsvp` INNER JOIN event ON rsvp.event_id = event.id WHERE rsvp.event_id = :event_id AND rsvp.join_status = 'confirm';";
        $query = $this->db->connect()->prepare($sql);
    
        $query->bindParam(':event_id', $this->event_id);
    
        if($query->execute()){
            $data = $query->fetchAll();
        } else {
            // add some debug code to see if there are any errors
            $error = $query->errorInfo();
            var_dump($error);
        }
        return $data;
    }

    function getAttended() {
        if (!$this->event_id) {
            return []; // return an empty array if the event_id is not set
        }
    
        $sql = "SELECT * FROM `rsvp` INNER JOIN event ON rsvp.event_id = event.id WHERE rsvp.event_id = :event_id AND rsvp.join_status = 'attended';";
        $query = $this->db->connect()->prepare($sql);
    
        $query->bindParam(':event_id', $this->event_id);
    
        if($query->execute()){
            $data = $query->fetchAll();
        } else {
            // add some debug code to see if there are any errors
            $error = $query->errorInfo();
            var_dump($error);
        }
        return $data;
    }    

    function confirm_slot(){
        $token = $_GET['token'];
        $sql = "SELECT * FROM rsvp WHERE token=:token LIMIT 1";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':token', $token);
        if($query->execute()){
            $data = $query->fetchAll();
            return $data;
        }
        return false;
    }

    function insert_token($token) {
        $sql = "INSERT INTO rsvp (token) VALUES (:token)";
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
        $query = "UPDATE rsvp SET join_status='confirm' WHERE token=:token";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':token', $token);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Failed to update token!";
            return false;
        }
    }

    function confirm_attendance($email, $event_id) {
        $query = "UPDATE rsvp SET join_status='attended' WHERE email=:email AND event_id=:event_id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':event_id', $event_id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Failed to update join status!";
            return false;
        }
    }

    function check_attendance($email, $event_id) {
        $query = "SELECT * FROM rsvp WHERE email=:email AND event_id=:event_id AND join_status='confirm'";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':event_id', $event_id);
        
        if ($stmt->execute()) {
            $data = $stmt->fetchAll();
            return $data;
        } else {
            echo "Failed to fetch attendance status!";
            return false;
        }
    }
    
    public function sendConfirmationEmail($token, $event_title, $event_banner, $event_location, $event_start_date, $event_start_time) {
        // Modified query to get the email, first name, middle name, last name, and suffix associated with the token
        $select_stmt = $this->db->connect()->prepare("SELECT email, firstname, middlename, lastname, suffix FROM rsvp WHERE token = :token");
        $select_stmt->bindParam(':token', $token);
        $select_stmt->execute();
        $user = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $userEmail = $user['email'];
            $firstname = $user['firstname'];
            $middlename = $user['middlename'];
            $lastname = $user['lastname'];
            $suffix = $user['suffix'];

            if (isset($_SESSION['logged-in'])) {
                sendEventTicket($userEmail, $token, $firstname, $middlename, $lastname, $suffix, $event_title, $event_banner, $event_location, $event_start_date, $event_start_time);
                header('location: ../user/reg.php');
            } else {
                sendEventTicket($userEmail, $token, $firstname, $middlename, $lastname, $suffix, $event_title, $event_banner, $event_location, $event_start_date, $event_start_time);
                header('location: ../event/non.php');
            }

            exit(0);
        } else {
            echo "User not found!";
        }
    }

    
    

    
}

?>

