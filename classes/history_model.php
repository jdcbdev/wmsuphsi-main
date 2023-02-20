<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    require_once '../tools/functions.php';
    
    //CREATE CLASS HISTORY
    Class History{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            
            if(isset($_POST['history_title'])) {
                if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {

                    
                    $history_title =  htmlentities($_POST['history_title']);
                    $history_description =  htmlentities($_POST['history_description']);

                    $filename = $_FILES['fileupload']['name'];
                    $tempname = $_FILES['fileupload']['tmp_name'];
                    $folder = "../uploads/" . $filename;

                    if (move_uploaded_file($tempname, $folder)) {
                        $insert_stmt=$this->db->connect()->prepare("INSERT INTO history (history_title, history_description, filename) VALUES (:history_title, :history_description, :filename)");
                        $insert_stmt->bindParam(':history_title', $history_title);
                        $insert_stmt->bindParam(':history_description', $history_description);
                        $insert_stmt->bindParam(':filename', $filename);

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

			$select_stmt = $this->db->connect()->prepare('SELECT id, history_title, history_description, filename FROM history;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM history WHERE id = :sid ');
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

            $edit_stmt = $this->db->connect()->prepare('SELECT * FROM history WHERE id = :sid');
			$edit_stmt->bindParam(':sid', $update_id);
			
			$edit_stmt->execute();
			
			$data = $edit_stmt->fetch(); 
			
			return $data;
        }

        //UPDATE RECORD AND HANDLE AJAX REQUEST
        public function update($edit_id) {

            if(isset($_POST['edit_title']) && isset($_POST['edit_description']) && isset($_POST['edit_id'])) {
                if(!empty($_POST['edit_title']) && !empty($_POST['edit_description']) && !empty($_POST['edit_id'])) {
                    $history_title =  htmlentities($_POST['edit_title']);
					$history_description =  htmlentities($_POST['edit_description']);
					$id = $_POST['edit_id'];

                    if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['fileupload']['name'];
						$tempname = $_FILES['fileupload']['tmp_name'];
						$folder = "../uploads/" . $filename;	

                        if(move_uploaded_file($tempname, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE history SET history_title=:history_title, history_description=:history_description, filename=:filename WHERE id=:id');
							$update_stmt->bindParam(':history_title', $history_title);
							$update_stmt->bindParam(':filename', $filename);
							$update_stmt->bindParam(':history_description', $history_description);
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
                        $update_stmt=$this->db->connect()->prepare('UPDATE history SET history_title=:history_title, history_description=:history_description WHERE id=:id');
						$update_stmt->bindParam(':history_title', $history_title);
						$update_stmt->bindParam(':history_description', $history_description);
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