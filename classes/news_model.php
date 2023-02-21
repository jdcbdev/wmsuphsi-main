<?php
    //CONNTECT TO DATABASE
    require_once 'database.php';
    require_once '../tools/functions.php';
    
    //CREATE CLASS NEWS
    Class News{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }
		//INSERT A NEW RECORD INTO THE DATABASE "PHSI" & HADLE AJAX REQUEST
        public function insert() {
            
            if(isset($_POST['news_title'])) {
                if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {

                    
                    $news_title =  htmlentities($_POST['news_title']);
                    $image_description =  htmlentities($_POST['image_description']);
                    $news_content =  htmlentities($_POST['news_content']);;

                    $filename = $_FILES['fileupload']['name'];
                    $tempname = $_FILES['fileupload']['tmp_name'];
                    $folder = "../uploads/" . $filename;

                    if (move_uploaded_file($tempname, $folder)) {
                        $insert_stmt=$this->db->connect()->prepare("INSERT INTO news (news_title, image_description, news_content, filename) VALUES (:news_title, :image_description, :news_content, :filename)");
                        $insert_stmt->bindParam(':news_title', $news_title);
                        $insert_stmt->bindParam(':image_description', $image_description);
                        $insert_stmt->bindParam(':filename', $filename);
                        $insert_stmt->bindParam(':news_content', $news_content);

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

			$select_stmt = $this->db->connect()->prepare('SELECT id, news_title, image_description, news_content, filename FROM news;');
			$select_stmt->execute();

			$data = $select_stmt->fetchAll();

			return $data;
        }

		//DELETE RECORD FROM DATABASE "PHSI" AND HANDLE AJAX REQUEST
        public function deleteRecords($delete_id) {
            $delete_stmt = $this->db->connect()->prepare('DELETE FROM news WHERE id = :sid ');
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

            $edit_stmt = $this->db->connect()->prepare('SELECT * FROM news WHERE id = :sid');
			$edit_stmt->bindParam(':sid', $update_id);
			
			$edit_stmt->execute();
			
			$data = $edit_stmt->fetch(); 
			
			return $data;
        }

        //UPDATE RECORD AND HANDLE AJAX REQUEST
        public function update($edit_id) {

            if(isset($_POST['edit_title']) && isset($_POST['edit_description']) && isset($_POST['edit_content']) && isset($_POST['edit_id'])) {
                if(!empty($_POST['edit_title']) && !empty($_POST['edit_description']) && !empty($_POST['edit_content']) && !empty($_POST['edit_id'])) {
                    $news_title =  htmlentities($_POST['edit_title']);
					$image_description =  htmlentities($_POST['edit_description']);
                    $news_content =  htmlentities($_POST['edit_content']);

					$id = $_POST['edit_id'];

                    if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['fileupload']['name'];
						$tempname = $_FILES['fileupload']['tmp_name'];
						$folder = "../uploads/" . $filename;	

                        if(move_uploaded_file($tempname, $folder)) {
                            $update_stmt=$this->db->connect()->prepare('UPDATE news SET news_title=:news_title, image_description=:image_description, news_content=:news_content, filename=:filename WHERE id=:id');
							$update_stmt->bindParam(':news_title', $news_title);
							$update_stmt->bindParam(':filename', $filename);
							$update_stmt->bindParam(':image_description', $image_description);
                            $update_stmt->bindParam(':news_content', $news_content);
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
                        $update_stmt=$this->db->connect()->prepare('UPDATE news SET news_title=:news_title, image_description=:image_description, news_content=:news_content WHERE id=:id');
						$update_stmt->bindParam(':news_title', $news_title);
						$update_stmt->bindParam(':image_description', $image_description);
                        $update_stmt->bindParam(':news_content', $news_content);
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