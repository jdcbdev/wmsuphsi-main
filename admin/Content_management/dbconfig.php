<?php 
    define ('DB_HOST','localhost');
    define ('DB_USER','root');
    define ('DB_PASS','');
    define ('DB_NAME','admission');

            try{
                    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
            }catch(PDOExeption $e){
                    exit ("ERROR". $E->get_error_message());
            }
?>