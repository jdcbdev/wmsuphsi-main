<?php 
require_once 'database.php';

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
    public $attendance = "Waiting";
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

    function getRsvp() {
        if (!$this->event_id) {
            return []; // return an empty array if the event_id is not set
        }
    
        $sql = "SELECT * FROM `rsvp` INNER JOIN event ON rsvp.event_id = event.id WHERE rsvp.event_id = :event_id AND rsvp.status = 'rsvp';";
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
    
}

?>

