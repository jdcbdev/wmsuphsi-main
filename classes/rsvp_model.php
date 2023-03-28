<?php 
require_once 'database.php';

Class Rsvp{

    public $id;
    public $event_id;
    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $email;
    public $contact_number;
    public $attendance = "Waiting";
    public $attendance_timestamp;


    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function addUserToEvent() {
        $sql = "INSERT INTO rsvp (event_id,firstname, middlename, lastname, suffix, email, contact_number)
         VALUES (:event_id, :firstname, :middlename, :lastname, :suffix,  :email, :contact_number);";
        $query=$this->db->connect()->prepare($sql);

        $query->bindParam(':event_id', $this->event_id);
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

    function fetchAttendee() {
        $sql = "SELECT * FROM `rsvp` INNER JOIN event ON rsvp.event_id = event.id INNER JOIN user_acc_data as user ON user.id = rsvp.id WHERE rsvp.event_id = :event_id; ";
        $query = $this->db->connect()->prepare($sql);
        
        $query->bindParam(':event_id', $this->event_id);

    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>