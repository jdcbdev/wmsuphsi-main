<?php 
    require_once("classes/admission.classes.php");

    if(isset($_POST['submit'])) {
        // print_r($_POST['Name']);

            $users = new admission;
            $users->name = $_POST['Name'];
            $users->honorific = $_POST['Honorifics'];
            $users->position = $_POST['Position'];
            $res = $users->insertData();

            if($res){
                echo"<script>Alert('Record inserted successfully') </script>>";
               
         }else{
            echo"<script>Alert('Something went wrong with the insertion of the records') </script>>";
               
        
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
            <form action='admission.php'   name="insertrecord" method="POST">
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
                            <button type="submit" name="submit" class="btn btn-success"  value="submit" >submit</button>
                            <a href="index.php" class="btn btn-danger">Back</a>
                        </div> 
                    </div> 
                 </div>  
            </form>

        </body>
</html>


<?php
    require_once '../../includes/admin-footer.php';
?>