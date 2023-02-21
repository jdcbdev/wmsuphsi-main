<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    
    //CREATE CLASS CAROUSEL
    Class Carousel{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            
            if(isset($_POST['carousel_title'])) {
                if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {

                    
                    $carousel_title =  htmlentities($_POST['carousel_title']);
                    $carousel_content =  htmlentities($_POST['carousel_content']);

                    $filename = $_FILES['fileupload']['name'];
                    $tempname = $_FILES['fileupload']['tmp_name'];
                    $folder = "../uploads/" . $filename;

                    if (move_uploaded_file($tempname, $folder)) {
                        $insert_stmt=$this->db->connect()->prepare("INSERT INTO carousel (carousel_title, carousel_content, filename) VALUES (:carousel_title, :carousel_content, :filename)");
                        $insert_stmt->bindParam(':carousel_title', $carousel_title);
                        $insert_stmt->bindParam(':carousel_content', $carousel_content);
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

			$select_stmt = $this->db->connect()->prepare('SELECT id, carousel_title, carousel_content, filename FROM carousel;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM carousel WHERE id = :sid ');
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

            $edit_stmt = $this->db->connect()->prepare('SELECT * FROM carousel WHERE id = :sid');
			$edit_stmt->bindParam(':sid', $update_id);
			
			$edit_stmt->execute();
			
			$data = $edit_stmt->fetch(); 
			
			return $data;
        }

        //UPDATE RECORD AND HANDLE AJAX REQUEST
        public function update($edit_id) {

            if(isset($_POST['edit_title']) && isset($_POST['edit_content']) && isset($_POST['edit_id'])) {
                if(!empty($_POST['edit_title']) && !empty($_POST['edit_content']) && !empty($_POST['edit_id'])) {
                    $carousel_title =  htmlentities($_POST['edit_title']);
					$carousel_content =  htmlentities($_POST['edit_content']);
					$id = $_POST['edit_id'];

                    if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['fileupload']['name'];
						$tempname = $_FILES['fileupload']['tmp_name'];
						$folder = "../uploads/" . $filename;	

                        if(move_uploaded_file($tempname, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE carousel SET carousel_title=:carousel_title, carousel_content=:carousel_content, filename=:filename WHERE id=:id');
							$update_stmt->bindParam(':carousel_title', $carousel_title);
							$update_stmt->bindParam(':filename', $filename);
							$update_stmt->bindParam(':carousel_content', $carousel_content);
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
                        $update_stmt=$this->db->connect()->prepare('UPDATE carousel SET carousel_title=:carousel_title, carousel_content=:carousel_content WHERE id=:id');
						$update_stmt->bindParam(':carousel_title', $carousel_title);
						$update_stmt->bindParam(':carousel_content', $carousel_content);
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