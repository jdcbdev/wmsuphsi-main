
<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    require_once '../tools/functions.php';
    require_once '../vendor/autoload.php';
    require_once '../controllers/eventInvitations.php';
    require_once '../controllers/eventUpdates.php';
    
    
    
    //CREATE CLASS event
    Class Event{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {

                
        $config = HTMLPurifier_Config::createDefault();
        
        $config->set('Cache.DefinitionImpl', null);
        $config->set('HTML.AllowedElements', 'strong,em');
        $config->set('HTML.AllowedAttributes', []);
        
        $purifier = new HTMLPurifier($config);   


            if(isset($_POST['event_title'])) {
                if(isset($_FILES['event_banner']) && $_FILES['event_banner']['error'] === UPLOAD_ERR_OK) {
                    // Disable the submit button to prevent multiple submissions
                   //'$("#addbtn").prop("disabled", true);';

                     // Sanitizing the in
                    $event_title = htmlentities($_POST['event_title']);
                    $event_about = htmlentities($purifier->purify($_POST['event_about']));
                    $event_mode = htmlentities($_POST['event_mode']);
                    $event_location = htmlentities($_POST['event_location']);
                    $event_platform = htmlentities($_POST['event_platform']);
                    $event_slots = htmlentities($_POST['event_slots']);
                    $event_scope = isset($_POST['event_scope']) ? $_POST['event_scope'] : '';
                    if (is_array($event_scope)) {
                        $event_scope = implode(',', array_map('htmlentities', $event_scope));
                    } else {
                        $event_scope = htmlentities($event_scope);
                    }          
                           
                    $event_start_date = htmlentities($_POST['event_start_date']);
                    $event_end_date = htmlentities($_POST['event_end_date']);
                    $event_start_time = htmlentities($_POST['event_start_time']);
                    $event_end_time = htmlentities($_POST['event_end_time']);
                    $event_reg_duedate = htmlentities($_POST['event_reg_duedate']);
                    $event_banner = $_FILES['event_banner']['name'];
                    $tempname_banner = $_FILES['event_banner']['tmp_name'];
                    $folder = "../uploads/" . $event_banner;
                    $max_file_size = 5242880; // Maximum file size in bytes (5MB)
        
                    // Check the file size before uploading the image
                    if ($_FILES['event_banner']['size'] > $max_file_size) {
                        echo 'File size exceeds maximum allowed size of 5MB.';
                    } else {
                     if (move_uploaded_file($tempname_banner, $folder)) {
                        // Check if the file already exists
                        if (file_exists($folder . $event_banner)) {
                            $filename_parts = pathinfo($event_banner);
                            $event_banner = $filename_parts['filename'] . '_' . uniqid() . '.' . $filename_parts['extension'];
                        }
                        // Check for conflicts
                        $conflicting_events = $this->fetchRecordsByStartDateAndLocation($event_start_date, $event_location);
                        // If there are conflicts, show warning message and stop the insertion
                        if(!empty($conflicting_events)){
                            echo "Warning: There is a conflict with another event at this location and start date.";
                            return;
                        }
                            $insert_stmt=$this->db->connect()->prepare("INSERT INTO event (event_title, event_banner, event_about, event_mode, event_location, event_scope, event_platform, event_slots, event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate) VALUES (:event_title, :event_banner, :event_about, :event_mode, :event_location, :event_scope, :event_platform, :event_slots, :event_start_date, :event_end_date, :event_start_time, :event_end_time, :event_reg_duedate)");
                            $insert_stmt->bindParam(':event_title', $event_title);
                            $insert_stmt->bindParam(':event_banner', $event_banner);
                            $insert_stmt->bindParam(':event_about', $event_about);
                            $insert_stmt->bindParam(':event_mode', $event_mode);
                            $insert_stmt->bindParam(':event_scope', $event_scope, PDO::PARAM_STR);
                            $insert_stmt->bindParam(':event_location', $event_location);
                            $insert_stmt->bindParam(':event_platform', $event_platform);
                            $insert_stmt->bindParam(':event_slots', $event_slots);
                            $insert_stmt->bindParam(':event_start_date', $event_start_date);
                            $insert_stmt->bindParam(':event_end_date', $event_end_date);
                            $insert_stmt->bindParam(':event_start_time', $event_start_time);
                            $insert_stmt->bindParam(':event_end_time', $event_end_time);
                            $insert_stmt->bindParam(':event_reg_duedate', $event_reg_duedate);
        
                            if($insert_stmt->execute()) {
                                echo 'Successfully saved.';
                                // Select all emails from user_acc_data table
                            $select_stmt = $this->db->connect()->prepare("SELECT email FROM user_acc_data");
                            $select_stmt->execute();
                            $emails = $select_stmt->fetchAll(PDO::FETCH_COLUMN);

                            // Call sendEventInvitation function with emails parameter
                            sendEventInvitation($emails, $event_title, $event_banner, $event_about, $event_reg_duedate, $event_start_date);

                            } else {
                                echo 'Failed saving.';
                              }
                        } else {
                            echo 'Failed moving file.';
                        }
                    }
                } else {
                    echo 'No file has been uploaded.';
                }
            }
        }

		//FETCH ALL RECORD FROM THE DATABASE "PHSI" & HANDLE AJAX REQUEST
        public function fetchAllRecords() {

            $data = null;

			$select_stmt = $this->db->connect()->prepare('SELECT id, event_title, event_banner, event_about, event_mode, event_location, event_platform, event_scope, event_slots, event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate FROM event;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

        public function fetchRecordById($id) {
            $select_stmt = $this->db->connect()->prepare('SELECT id, event_title, event_banner, event_about, event_mode, event_location, event_platform, event_scope, event_slots, event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate FROM event WHERE id = :id');
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $data = $select_stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }


        public function fetchRecordsByStartDateAndLocation($event_start_date, $event_location) {
            $select_stmt = $this->db->connect()->prepare('SELECT id, event_title, event_banner, event_about, event_mode, event_location, event_platform, event_scope, event_slots, event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate FROM event WHERE event_start_date = :event_start_date AND event_location = :event_location');
            $select_stmt->bindParam(':event_start_date', $event_start_date);
            $select_stmt->bindParam(':event_location', $event_location);
            $select_stmt->execute();
            $data = $select_stmt->fetchAll();
            return $data;
        }
        

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM event WHERE id = :sid ');
			$delete_stmt->bindParam(':sid',$delete_id);

            if ($delete_stmt->execute()) {
				echo 'Record deleted successfully.';
			} else {
                echo 'Failed to delete the record.';
			}
        }

        //FETCH RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function edit($update_id) {

            $data = null;

            $event_stmt = $this->db->connect()->prepare('SELECT * FROM event WHERE id = :sid');
			$event_stmt->bindParam(':sid', $update_id);
			
			$event_stmt->execute();
			
			$data = $event_stmt->fetch(); 
			
			return $data;
        }

        function countAttendees($event_id) {
            $sql = "SELECT COUNT(*) FROM `rsvp` WHERE `event_id` = :event_id;";
            $query = $this->db->connect()->prepare($sql);
            
            $query->bindParam(':event_id', $event_id);
        
            if($query->execute()){
                $count = $query->fetchColumn();
            }
            return $count;
        }

        //UPDATE RECORD AND HANDLE AJAX REQUEST
        public function update($edit_id) {

            $config = HTMLPurifier_Config::createDefault();
        
            $config->set('Cache.DefinitionImpl', null);
            $config->set('HTML.AllowedElements', 'strong,em');
            $config->set('HTML.AllowedAttributes', []);
            
            $purifier = new HTMLPurifier($config);   

            if(isset($_POST['edit_title']) || isset($_POST['edit_about'])  || isset($_POST['edit_mode'])  || isset($_POST['edit_location'])  || isset($_POST['edit_platform'])  || isset($_POST['edit_scope'])  || isset($_POST['edit_slots']) || isset($_POST['edit_start_date']) || isset($_POST['edit_end_date'])  || isset($_POST['edit_start_time'])  || isset($_POST['edit_end_time'])  || isset($_POST['edit_reg_duedate']) || isset($_POST['edit_id'])) {
                if(!empty($_POST['edit_title']) || !empty($_POST['edit_about'])  || !empty($_POST['edit_mode']) || !empty($_POST['edit_location']) || !empty($_POST['edit_platform'])  || !empty($_POST['edit_scope']) || !empty($_POST['edit_slots'])  || !empty($_POST['edit_start_date']) || !empty($_POST['edit_end_date']) || !empty($_POST['edit_start_time']) || !empty($_POST['edit_end_time']) || !empty($_POST['edit_reg_duedate']) || !empty($_POST['edit_id'])) {

                    $event_title =  htmlentities($_POST['edit_title']);
                    $event_about = htmlentities($purifier->purify($_POST['edit_about']));
                    $event_mode =  htmlentities($_POST['edit_mode']);
                    $event_location =  htmlentities($_POST['edit_location']);
                    $event_platform =  htmlentities($_POST['edit_platform']);
                    
                    $event_scope = isset($_POST['edit_scope']) ? $_POST['edit_scope'] : '';
                    if (is_array($event_scope)) {
                        $event_scope = implode(',', array_map('htmlentities', $event_scope));
                    } else {
                        $event_scope = htmlentities($event_scope);
                    }  
                    $event_slots =  htmlentities($_POST['edit_slots']);
                    $event_start_date =  htmlentities($_POST['edit_start_date']);
                    $event_end_date =  htmlentities($_POST['edit_end_date']);
                    $event_start_time =  htmlentities($_POST['edit_start_time']);
                    $event_end_time =  htmlentities($_POST['edit_end_time']);
                    $event_reg_duedate =  htmlentities($_POST['edit_reg_duedate']);
					
                    $id = $_POST['edit_id'];
                    

                    if(isset($_FILES['event_banner']) && $_FILES['event_banner']['error'] === UPLOAD_ERR_OK) {
                        $event_banner = $_FILES['event_banner']['name'];
						$tempname_banner = $_FILES['event_banner']['tmp_name'];
						$folder = "../uploads/" . $event_banner;	

                        if(move_uploaded_file($tempname_banner, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE event SET event_title=:event_title, event_about=:event_about, event_banner=:event_banner, event_scope=:event_scope, event_mode=:event_mode, event_location=:event_location, event_platform=:event_platform, event_slots=:event_slots, event_start_date=:event_start_date, event_end_date=:event_end_date, event_start_time=:event_start_time, event_end_time=:event_end_time, event_reg_duedate=:event_reg_duedate WHERE id=:id');
							$update_stmt->bindParam(':event_title', $event_title);
							$update_stmt->bindParam(':event_banner', $event_banner);
							$update_stmt->bindParam(':event_about', $event_about);
                            $update_stmt->bindParam(':event_mode', $event_mode);
                            $update_stmt->bindParam(':event_location', $event_location);
                            $update_stmt->bindParam(':event_platform', $event_platform);
                            $update_stmt->bindParam(':event_scope', $event_scope);
                            $update_stmt->bindParam(':event_slots', $event_slots);
                            $update_stmt->bindParam(':event_start_date', $event_start_date);
                            $update_stmt->bindParam(':event_end_date', $event_end_date);
                            $update_stmt->bindParam(':event_start_time', $event_start_time);
                            $update_stmt->bindParam(':event_end_time', $event_end_time);
                            $update_stmt->bindParam(':event_reg_duedate', $event_reg_duedate);
							$update_stmt->bindParam(':id', $id);

                            //EXECUTE
                            if($update_stmt->execute()) {
                                echo 'Record updated successfully';
                            } else {
                                echo 'Failed to update the record.';
                            }
                        } 
                        else {
                            echo 'Failed moving file.';
                        }
                    }
                    else {
                        $update_stmt=$this->db->connect()->prepare('UPDATE event SET event_title=:event_title, event_about=:event_about, event_scope=:event_scope, event_mode=:event_mode, event_location=:event_location, event_platform=:event_platform, event_slots=:event_slots, event_start_date=:event_start_date, event_end_date=:event_end_date, event_start_time=:event_start_time, event_end_time=:event_end_time, event_reg_duedate=:event_reg_duedate WHERE id=:id');
                        $update_stmt->bindParam(':event_title', $event_title);
                        $update_stmt->bindParam(':event_about', $event_about);
                        $update_stmt->bindParam(':event_mode', $event_mode);
                        $update_stmt->bindParam(':event_location', $event_location);
                        $update_stmt->bindParam(':event_platform', $event_platform);
                        $update_stmt->bindParam(':event_scope', $event_scope);
                        $update_stmt->bindParam(':event_slots', $event_slots);
                        $update_stmt->bindParam(':event_start_date', $event_start_date);
                        $update_stmt->bindParam(':event_end_date', $event_end_date);
                        $update_stmt->bindParam(':event_start_time', $event_start_time);
                        $update_stmt->bindParam(':event_end_time', $event_end_time);
                        $update_stmt->bindParam(':event_reg_duedate', $event_reg_duedate);
                        $update_stmt->bindParam(':id', $id);
                        

						//EXECUTE
						if($update_stmt->execute()) {
							echo 'Record updated successfully.';
                                 // Select all emails from user_acc_data table
                                $select_stmt = $this->db->connect()->prepare("SELECT email FROM user_acc_data");
                                $select_stmt->execute();
                                $emails = $select_stmt->fetchAll(PDO::FETCH_COLUMN);    
                                // Call sendEventUpdates function with emails parameter
                                sendEventUpdates($emails, $event_title, $event_about, $event_reg_duedate, $event_start_date);
                            
						}
						else {
							echo 'Failed to update the record.';
						}	
                    }
                } 
                else {
                    echo 'Empty form';
                }
            }

        }
    }
?>