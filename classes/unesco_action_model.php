<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    require_once '../tools/functions.php';
    
    //CREATE CLASS NEWS
    Class Action{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            
            if(isset($_POST['unesco_type'])) {
                if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {

                    
                    $unesco_type =  htmlentities($_POST['unesco_type']);
                    $unesco_title =  htmlentities($_POST['unesco_title']);
                    $unesco_details =  htmlentities($_POST['unesco_details']);;

                    $filename = $_FILES['fileupload']['name'];
                    $tempname = $_FILES['fileupload']['tmp_name'];
                    $folder = "../uploads/" . $filename;

                    if (move_uploaded_file($tempname, $folder)) {
                        $insert_stmt=$this->db->connect()->prepare("INSERT INTO unesco_action (unesco_type, filename, unesco_title, unesco_details) VALUES (:unesco_type, :filename, :unesco_title, :unesco_details)");
                        $insert_stmt->bindParam(':unesco_type', $unesco_type);
                        $insert_stmt->bindParam(':filename', $filename);
                        $insert_stmt->bindParam(':unesco_title', $unesco_title);
                        $insert_stmt->bindParam(':unesco_details', $unesco_details);

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

			$select_stmt = $this->db->connect()->prepare('SELECT id, unesco_type, unesco_title, unesco_details, created_at, updated_at, filename FROM unesco_action;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM unesco_action WHERE id = :sid ');
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

            $edit_stmt = $this->db->connect()->prepare('SELECT * FROM unesco_action WHERE id = :sid');
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
                            $update_stmt=$this->db->connect()->prepare('UPDATE unesco_action SET unesco_type=:unesco_type, unesco_title=:unesco_title, unesco_details=:unesco_details filename=:filename WHERE id=:id');
							$update_stmt->bindParam(':unesco_type', $unesco_type);
							$update_stmt->bindParam(':filename', $filename);
							$update_stmt->bindParam(':unesco_title', $unesco_title);
                            $update_stmt->bindParam(':unesco_details', $unesco_details);
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
                        $update_stmt=$this->db->connect()->prepare('UPDATE unesco_action SET unesco_type=:unesco_type, unesco_title=:unesco_title, unesco_details=:unesco_details WHERE id=:id');
						$update_stmt->bindParam(':unesco_type', $unesco_type);
						$update_stmt->bindParam(':unesco_title', $unesco_title);
                        $update_stmt->bindParam(':unesco_details', $unesco_details);
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