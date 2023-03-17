<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">

   <!-- JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://kit.fontawesome.com/30ff5f2a0c.js" crossorigin="anonymous"></script>
   <link href="../css/custom.css" rel="stylesheet">

    <!-- Title and Logo in tab -->
    <link rel="icon" type="image/png" href="../images/logos/phsi.png">
   <title>Sign up to apply | WMSU - Peace and Human Security Institute</title>

</head>
<body>
<main class="py-md-4">
<div class="container-fluid d-flex align-items-md-center justify-content-md-center">
    <div class="container-fluid sign-up p-sm-5" style="border: none;">
        <div class="row">
            <div class="col">
                <h2 class="fw-bold text-center green">Sign up to apply</h2>
            </div>
        </div>
        <div class="row card-container">
            <div class="col card mt-3 py-3 card-1">
                <!--<i class="fa-solid fa-people-line green"></i>-->
                <h3 class="text-start fw-bold mt-3">I am a WMSU student</h3>
                <p class="justify">Bonafide student of Western Mindanao State University.</p>
            </div>
            <div class="separator"></div>
            <div class="col card mt-3 py-3 card-2">
                <!--<i class="fa-solid fa-right-left green"></i>-->
                <h3 class="text-start fw-bold mt-3">I am a WMSU employee</h3>
                <p class="justify">Bonafide employee of Western Mindanao State University.</p>
            </div>
            <div class="separator"></div>
            <div class="col card mt-3 py-3 card-3s">
                <!--<i class="fa-solid fa-right-left green"></i>-->
                <h3 class="text-start fw-bold mt-3">I am a WMSU alumni</h3>
                <p class="justify">Graduates of Western Mindanao State Univesity.</p>
            </div>
            <div class="separator"></div>
            <div class="col card mt-3 py-3 card-4">
                <!--<i class="fa-solid fa-right-left green"></i>-->
                <h3 class="text-start fw-bold mt-3">I am not a WMSU chcuhu</h3>
                <p class="justify">Mga outsider lang to dito pero wants to have an account.</p>
            </div>   
        </div>
        <div class="row mt-3">
            <p class="text-center continue">
                <a id="choose" class="btn btn-lg btn-success background-color-green btn-continue btn-font">Continue</a>
            </p>
        </div>
        <div class="row mt-3">
            <p class="text-center">
                Already have an account? <a class="green" href="login.php">Log in</a>
            </p>
        </div>
    </div>
</div>
</main>

<script>
        $(document).ready(function(){
            let link = '';
            $('.card-1').on('click', function(){
                $('.card-1').addClass('card-hover');
                $('.card-2').removeClass('card-hover');
                $('.card-3').removeClass('card-hover');
                $('.card-4').removeClass('card-hover');
                link = 'signup-student.php';
            });
            $('.card-2').on('click', function(){
                $('.card-2').addClass('card-hover');
                $('.card-1').removeClass('card-hover');
                $('.card-3').removeClass('card-hover');
                $('.card-4').removeClass('card-hover');
                link = 'signup-employee.php';
            });
            $('.card-3').on('click', function(){
                $('.card-3').addClass('card-hover');
                $('.card-2').removeClass('card-hover');
                $('.card-3').removeClass('card-hover');
                $('.card-4').removeClass('card-hover');
                link = 'signup-alumni.php';
            });
            $('.card-4').on('click', function(){
                $('.card-4').addClass('card-hover');
                $('.card-1').removeClass('card-hover');
                $('.card-2').removeClass('card-hover');
                $('.card-3').removeClass('card-hover');
                link = 'signup-other.php';
            });
            $('a#choose').on('click', function(e){
                if(link == ''){
                    setTimeout(function ()
                        { $('div.card').toggleClass('active'); 
                    }, 1500);
                    $('div.card').toggleClass('active')
                }else{
                    window.location.href = link;
                }
            });
        });
    </script>

</body>
</html>