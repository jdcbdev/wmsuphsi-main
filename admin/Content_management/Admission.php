<?php 
     require_once("dbconfig.php");

    if(isset($post['insert'])){
         $name=$_POST['Name'];
         $horifics=$_POST['Honorifics'];
         $position=$_POST['Position'];

         $sql= "INSERT INTO tbladmission(Name,Honorifics, Position)VALUES(:name,:honorifics,:position)";
         $query = $dbh->prepare($sql);

         $query->bindParam(':name',$name,PDO::PARAM_STR);
         $query->bindParam(':honorifics',$honorifics,PDO::PARAM_STR);
         $query->bindParam(':position',$position,PDO::PARAM_STR);

         $query->execute();
         $lastInserted = $dbh->LastInserted();

         if($lastInserted){
                echo"<script>Alert('Record inserted successfully') </script>>";
                echo"<script>window.location.href='insert.php'</script>>";
         }else{
            echo"<script>Alert('Something went wrong with the insertion of the records') </script>>";
                echo"<script>window.location.href='insert.php'</script>>";

            }
    }
    
?>
<html>
     <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel= "stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
        <body>
            <div class="column">
                <div class="col-md-12">
                    <h3>ADMISSIONS</h3>
                </div>  
            </div>       
            <forms name="insertrecord" method="POST">
                <div class="column">
                    <div class="col-md-4">
                        <b> Name</b>
                        <input type="text" name="Name" class="form-control" required>
                    </div>  
                    <div class="col-md-4">
                        <b> Honorifics</b>
                        <input type="text" name="Honorifics" class="form-control" required>
                    </div>  
                    <div class="col-md-4">
                        <b>Position</b>
                        <input type="text" name="Position" class="form-control" required>
                    </div>  
                    <div class="column">
                        <div class="col-md-8">
                            <input type="button" name="insert" class="btn btn-success" value="submit" >
                            <a href="index.php" class="btn btn-danger">Back</a>
                        </div> 
                    </div> 
                 </div>  
        </body>
</html>


<?php
    require_once '../../includes/admin-footer.php';
?>