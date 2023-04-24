<?php
    $page_title = 'Upcoming Events | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<div class="events-container">

<div class="success-message">
    <h3 style="font-size: 6rem; color: black;">Registered Successfully!</h3>
    <p style="font-size: 15px;padding-top: 20px;">Just a friendly reminder to check your Gmail to confirm your slot for the upcoming event. </br> Don't forget to do so as soon as possible to secure your spot!</p>
		<br>
		<!--<a class="btn" href="../user/eventtimeline.php">View My Event Timeline</a>-->
	</div>
</div>

<style>
	.success-message {
		padding: 70px;
		text-align: center;
	}

	.success-message a:hover {
		background-color: #107869;
	}
</style>

<?php
    require_once '../includes/footer.php';
?>