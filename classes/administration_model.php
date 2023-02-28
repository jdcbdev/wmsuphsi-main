<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    require_once '../tools/functions.php';
    
    //CREATE CLASS admin
    Class Administration{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            
            if(isset($_POST['admin_name'])) {
                if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {

                    
                    $admin_name =  htmlentities($_POST['admin_name']);
                    $admin_organization =  htmlentities($_POST['admin_organization']);
                    $admin_position =  htmlentities($_POST['admin_position']);

                    $filename = $_FILES['fileupload']['name'];
                    $tempname = $_FILES['fileupload']['tmp_name'];
                    $folder = "../uploads/" . $filename;

                    if (move_uploaded_file($tempname, $folder)) {
                        $insert_stmt=$this->db->connect()->prepare("INSERT INTO administration (admin_name, admin_organization, admin_position, filename) VALUES (:admin_name, :admin_organization, :admin_position, :filename)");
                        $insert_stmt->bindParam(':admin_name', $admin_name);
                        $insert_stmt->bindParam(':admin_organization', $admin_organization);
                        $insert_stmt->bindParam(':admin_position', $admin_position);
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

			$select_stmt = $this->db->connect()->prepare('SELECT id, admin_name, admin_organization, admin_position, filename FROM administration;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM administration WHERE id = :sid ');
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

            $edit_stmt = $this->db->connect()->prepare('SELECT * FROM administration WHERE id = :sid');
			$edit_stmt->bindParam(':sid', $update_id);
			
			$edit_stmt->execute();
			
			$data = $edit_stmt->fetch(); 
			
			return $data;
        }

        //UPDATE RECORD AND HANDLE AJAX REQUEST
        public function update($edit_id) {

            if(isset($_POST['edit_name']) && isset($_POST['edit_organization'])  && isset($_POST['edit_position']) && isset($_POST['edit_id'])) {
                if(!empty($_POST['edit_name']) && !empty($_POST['edit_organization']) && !empty($_POST['edit_position']) && !empty($_POST['edit_id'])) {
                    $admin_name =  htmlentities($_POST['edit_name']);
					$admin_organization =  htmlentities($_POST['edit_organization']);
                    $admin_position =  htmlentities($_POST['edit_position']);
					$id = $_POST['edit_id'];

                    if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['fileupload']['name'];
						$tempname = $_FILES['fileupload']['tmp_name'];
						$folder = "../uploads/" . $filename;	

                        if(move_uploaded_file($tempname, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE administration SET admin_name=:admin_name, admin_organization=:admin_organization, admin_position=:admin_position filename=:filename WHERE id=:id');
							$update_stmt->bindParam(':admin_name', $admin_name);
							$update_stmt->bindParam(':filename', $filename);
							$update_stmt->bindParam(':admin_organization', $admin_organization);
                            $update_stmt->bindParam(':admin_position', $admin_position);
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
                        $update_stmt=$this->db->connect()->prepare('UPDATE administration SET admin_name=:admin_name, admin_description=:admin_description WHERE id=:id');
						$update_stmt->bindParam(':admin_name', $admin_name);
						$update_stmt->bindParam(':admin_organization', $admin_organization);
                        $update_stmt->bindParam(':admin_position', $admin_position);
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