<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';

    
    //CREATE CLASS NEWS
    Class Action{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            
            if(isset($_POST['action_type'])) {
                if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {

                    
                    $action_type =  htmlentities($_POST['action_type']);
                    $title =  htmlentities($_POST['title']);
                    $details =  htmlentities($_POST['details']);;

                    $filename = $_FILES['fileupload']['name'];
                    $tempname = $_FILES['fileupload']['tmp_name'];
                    $folder = "../uploads/" . $filename;

                    if (move_uploaded_file($tempname, $folder)) {
                        $insert_stmt=$this->db->connect()->prepare("INSERT INTO phsi_action (action_type, filename, title, details) VALUES (:action_type, :filename, :title, :details)");
                        $insert_stmt->bindParam(':action_type', $action_type);
                        $insert_stmt->bindParam(':filename', $filename);
                        $insert_stmt->bindParam(':title', $title);
                        $insert_stmt->bindParam(':details', $details);

                        if($insert_stmt->execute()) {
                            echo 'Successfully saved.';
                        } else {
                            echo 'Failed saving.';
                        }
                    }

                    else {
                        echo 'Failed moving file.';
                    }
                }
                else {
                    echo 'No file has been uploaded.';
                }
            }
        }

		//FETCH ALL RECORD FROM THE DATABASE "PHSI" & HANDLE AJAX REQUEST
        public function fetchAllRecords() {

            $data = null;

			$select_stmt = $this->db->connect()->prepare('SELECT id, action_type, title, details, created_at, updated_at, filename FROM phsi_action;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

        public function fetchRecordById($id) {
            $select_stmt = $this->db->connect()->prepare('SELECT id, action_type, title, details, created_at, updated_at, filename filename FROM phsi_action WHERE id = :id');
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $data = $select_stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM phsi_action WHERE id = :sid ');
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

            $edit_stmt = $this->db->connect()->prepare('SELECT * FROM phsi_action WHERE id = :sid');
			$edit_stmt->bindParam(':sid', $update_id);
			
			$edit_stmt->execute();
			
			$data = $edit_stmt->fetch(); 
			
			return $data;
        }

        //UPDATE RECORD AND HANDLE AJAX REQUEST
        public function update($edit_id) {

            if(isset($_POST['edit_type']) && isset($_POST['edit_title']) && isset($_POST['edit_details']) && isset($_POST['edit_id'])) {
                if(!empty($_POST['edit_type']) && !empty($_POST['edit_title']) && !empty($_POST['edit_details']) && !empty($_POST['edit_id'])) {
                    $edit_type =  htmlentities($_POST['edit_type']);
					$edit_title =  htmlentities($_POST['edit_title']);
                    $edit_details =  htmlentities($_POST['edit_details']);

					$id = $_POST['edit_id'];

                    if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['fileupload']['name'];
						$tempname = $_FILES['fileupload']['tmp_name'];
						$folder = "../uploads/" . $filename;	

                        if(move_uploaded_file($tempname, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE phsi_action SET action_type=:action_type, title=:title, details=:details, filename=:filename WHERE id=:id');
							$update_stmt->bindParam(':action_type', $action_type);
							$update_stmt->bindParam(':filename', $filename);
							$update_stmt->bindParam(':title', $title);
                            $update_stmt->bindParam(':details', $details);
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
                        $update_stmt=$this->db->connect()->prepare('UPDATE phsi_action SET action_type=:action_type, title=:title, details=:details WHERE id=:id');
						$update_stmt->bindParam(':action_type', $action_type);
						$update_stmt->bindParam(':title', $title);
                        $update_stmt->bindParam(':details', $details);
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