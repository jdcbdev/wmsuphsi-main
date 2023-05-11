<?php
    //CONNECT TO DATABASE
    require_once 'classes/database.php';

    //CREATE CLASS NEWS
    Class News{
        
        //attributes
        protected $db;

        function __construct() {
            $this->db = new Database();
        }

        //FETCH THE MOST RECENT RECORDS FROM THE DATABASE AND RETURN THEM IN DESCENDING ORDER BY DATE
        public function fetchRecentRecords($limit) {

            $data = null;

            $select_stmt = $this->db->connect()->prepare('SELECT id, news_title, image_description, news_content, created_at, updated_at, filename FROM news ORDER BY created_at DESC LIMIT :limit;');
            $select_stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $select_stmt->execute();

            $data = $select_stmt->fetchAll();

            return $data;
        }
    }
?>
    