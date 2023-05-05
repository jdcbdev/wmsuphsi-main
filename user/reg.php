<?php
    $page_title = 'Registered Succesfully | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    $email = $_SESSION['email'];
?>

    <section class="container" style="">       
        <div>
            <p style="font-size: 2em;"><?php echo 'We are thrilled to have you join us at the event. Please check your email ['.$email.'] and download the QR Code we sent. See you soon!' ?></p>
        </div>         
        <div class="left-div" style="">
            <img  src="../images/content-images/qr.png" alt="" style="width: 50%; margin: auto; margin-bottom: 20px;">
        </div>
    </section>
<?php require_once '../includes/footer.php'; ?> 