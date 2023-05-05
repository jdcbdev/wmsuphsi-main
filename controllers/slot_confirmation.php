<?php

session_start();
require_once '../classes/database.php';
require_once '../vendor/autoload.php';
require_once '../classes/rsvp_model.php';
require_once '../controllers/sendEventTicket.php';
//require_once '../classes/user.class.php';

class SlotConfirmation {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function confirmSlot($token) {
        // implementation of confirmSlot method
        $sql = "INSERT INTO user_acc_data (token) VALUES (:token)";
        $query = $this->db->connect()->prepare($sql);
        $query->bindValue(':token', $token);
        if ($query->execute()) {
          return "added successfully";
        } else {
          return "error adding ";
        }
    }
    
    public function updateToken($token) {
        // implementation of updateToken method
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

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $rsvp = new SlotConfirmation();
    if($rsvp->confirmSlot($token)) {
        if($rsvp->updateToken($token)){
            $rsvp->sendConfirmationEmail($token, $event_title, $event_banner, $event_location, $event_start_date, $event_start_time);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}

?>
