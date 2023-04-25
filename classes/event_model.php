<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    require_once '../tools/functions.php';
    
    //CREATE CLASS event
    Class Event{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            if(isset($_POST['event_title'])) {
                if(isset($_FILES['event_banner']) && $_FILES['event_banner']['error'] === UPLOAD_ERR_OK) {
                    $event_title = htmlentities($_POST['event_title']);
                    $event_about = htmlentities($_POST['event_about']);
                    $event_mode = htmlentities($_POST['event_mode']);
                    $event_location = htmlentities($_POST['event_location']);
                    $event_platform = htmlentities($_POST['event_platform']);
                    $event_slots = htmlentities($_POST['event_slots']);
                    $event_organizer = isset($_POST['event_organizer']) ? $_POST['event_organizer'] : '';
                    if (is_array($event_organizer)) {
                        $event_organizer = implode(',', array_map('htmlentities', $event_organizer));
                    } else {
                        $event_organizer = htmlentities($event_organizer);
                    }   

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
                            $insert_stmt=$this->db->connect()->prepare("INSERT INTO event (event_title, event_banner, event_about, event_mode, event_location, event_scope, event_platform, event_slots, event_organizer, event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate) VALUES (:event_title, :event_banner, :event_about, :event_mode, :event_location, :event_scope, :event_platform, :event_slots, :event_organizer, :event_start_date, :event_end_date, :event_start_time, :event_end_time, :event_reg_duedate)");
                            $insert_stmt->bindParam(':event_title', $event_title);
                            $insert_stmt->bindParam(':event_banner', $event_banner);
                            $insert_stmt->bindParam(':event_about', $event_about);
                            $insert_stmt->bindParam(':event_mode', $event_mode);
                            $insert_stmt->bindParam(':event_scope', $event_scope, PDO::PARAM_STR);
                            $insert_stmt->bindParam(':event_location', $event_location);
                            $insert_stmt->bindParam(':event_platform', $event_platform);
                            $insert_stmt->bindParam(':event_slots', $event_slots);
                            $insert_stmt->bindParam(':event_organizer', $event_organizer);
                            $insert_stmt->bindParam(':event_start_date', $event_start_date);
                            $insert_stmt->bindParam(':event_end_date', $event_end_date);
                            $insert_stmt->bindParam(':event_start_time', $event_start_time);
                            $insert_stmt->bindParam(':event_end_time', $event_end_time);
                            $insert_stmt->bindParam(':event_reg_duedate', $event_reg_duedate);
        
                            if($insert_stmt->execute()) {
                                echo 'Successfully saved.';
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

			$select_stmt = $this->db->connect()->prepare('SELECT id, event_title, event_banner, event_about, event_mode, event_location, event_platform, event_scope, event_slots, event_organizer,  event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate FROM event;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

        public function fetchRecordById($id) {
            $select_stmt = $this->db->connect()->prepare('SELECT id, event_title, event_banner, event_about, event_mode, event_location, event_platform, event_scope, event_slots, event_organizer,  event_start_date, event_end_date, event_start_time, event_end_time, event_reg_duedate FROM event WHERE id = :id');
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $data = $select_stmt->fetch(PDO::FETCH_ASSOC);
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
        public function update($id) {

            if(isset($_POST['edit_title']) && isset($_POST['edit_about'])  && isset($_POST['edit_mode'])  && isset($_POST['edit_location'])  && isset($_POST['edit_platform'])  && isset($_POST['edit_scope'])  && isset($_POST['edit_slots']) && isset($_POST['edit_organizer']) && isset($_POST['edit_start_date']) && isset($_POST['edit_end_date'])  && isset($_POST['edit_start_time'])  && isset($_POST['edit_end_time'])  && isset($_POST['edit_reg_duedate'])  && isset($_POST['edit_agenda']) && isset($_POST['id'])) {
                if(!empty($_POST['event_title']) && !empty($_POST['edit_about'])  && !empty($_POST['edit_mode']) && !empty($_POST['edit_location']) && !empty($_POST['edit_platform'])  && !empty($_POST['edit_scope']) && !empty($_POST['edit_slots']) && !empty($_POST['edit_organizer'])  && !empty($_POST['edit_start_date']) && !empty($_POST['edit_end_date']) && !empty($_POST['edit_start_time']) && !empty($_POST['event_end_time']) && !empty($_POST['edit_reg_duedate']) && !empty($_POST['edit_agenda']) && !empty($_POST['id'])) {
                    $edit_title =  htmlentities($_POST['event_title']);
					$edit_about =  htmlentities($_POST['event_about']);
                    $edit_mode =  htmlentities($_POST['event_mode']);
                    $edit_location =  htmlentities($_POST['event_location']);
                    $edit_platform =  htmlentities($_POST['event_platform']);
                    $edit_scope =  htmlentities($_POST['event_scope']);
                    //$edit_organizer =  htmlentities($_POST['event_organizer']);
                    $edit_organizer = isset($_POST['edit_organizer']) ? $_POST['edit_organizer'] : '';
                    if (is_array($event_organizer)) {
                        $edit_organizer = implode(',', array_map('htmlentities', $edit_organizer));
                    } else {
                        $edit_organizer = htmlentities($edit_organizer);
                    }  
                    $edit_slots =  htmlentities($_POST['event_slots']);
                    $edit_start_date =  htmlentities($_POST['event_start_date']);
                    $edit_end_date =  htmlentities($_POST['event_end_date']);
                    $edit_start_time =  htmlentities($_POST['event_start_time']);
                    $edit_end_time =  htmlentities($_POST['event_end_time']);
                    $edit_reg_duedate =  htmlentities($_POST['event_reg_duedate']);
					$id = $_POST['id'];

                    if(isset($_FILES['event_banner']) && $_FILES['event_banner']['error'] === UPLOAD_ERR_OK) {
                        $event_banner = $_FILES['event_banner']['name'];
						$tempname = $_FILES['event_banner']['tmp_name'];
						$folder = "../uploads/" . $event_banner;	

                        if(move_uploaded_file($tempname_banner, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE event SET event_title=:event_title, event_about=:event_about, event_banner=:event_banner, event_scope=:event_scope, event_organizer=:event_organizer, event_mode=:event_mode, event_location=:event_location, event_platform=:event_platform, event_slots=:event_slots, event_start_date=:event_start_date, event_end_date=:event_end_date, event_start_time=:event_start_time, event_end_time=:event_end_time, event_reg_duedate=:event_reg_duedate WHERE id=:id');
							$update_stmt->bindParam(':event_title', $event_title);
							$update_stmt->bindParam(':event_banner', $event_banner);
							$update_stmt->bindParam(':event_about', $event_about);
                            $update_stmt->bindParam(':event_mode', $event_mode);
                            $update_stmt->bindParam(':event_location', $event_location);
                            $update_stmt->bindParam(':event_platform', $event_platform);
                            $update_stmt->bindParam(':event_scope', $event_scope);
                            $update_stmt->bindParam(':event_organizer', $event_organizer);
                            $update_stmt->bindParam(':event_slots', $event_slots);
                            $update_stmt->bindParam(':event_start_date', $event_start_date);
                            $update_stmt->bindParam(':event_end_date', $event_end_date);
                            $update_stmt->bindParam(':event_start_time', $event_start_time);
                            $update_stmt->bindParam(':event_end_time', $event_end_time);
                            $update_stmt->bindParam(':event_reg_duedate', $event_reg_duedate);
							$update_stmt->bindParam(':id', $id);

                            //EXECUTE
                            if($update_stmt->execute()) {
                                echo 'Record updated successfullt';
                            } else {
                                echo 'Failed to update the record.';
                            }
                        } 
                        else {
                            echo 'Failed moving file.';
                        }
                    }
                    else {
                        $update_stmt=$this->db->connect()->prepare('UPDATE event SET event_title=:event_title, event_about=:event_about, event_scope=:event_scope,  event_organizer=:event_organizer, event_banner=:event_banner, event_mode=:event_mode, event_location=:event_location, event_platform=:event_platform, event_slots=:event_slots, event_start_date=:event_start_date, event_end_date=:event_end_date, event_start_time=:event_start_time, event_end_time=:event_end_time, event_reg_duedate=:event_reg_duedate WHERE id=:id');
                        $update_stmt->bindParam(':event_title', $event_title);
                        $update_stmt->bindParam(':event_banner', $event_banner);
                        $update_stmt->bindParam(':event_about', $event_about);
                        $update_stmt->bindParam(':event_mode', $event_mode);
                        $update_stmt->bindParam(':event_location', $event_location);
                        $update_stmt->bindParam(':event_platform', $event_platform);
                        $update_stmt->bindParam(':event_scope', $event_scope);
                        $update_stmt->bindParam(':event_organizer', $event_organizer);
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