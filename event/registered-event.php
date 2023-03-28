<?php
    $page_title = 'Upcoming Events | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>


<style>
		.success-message {
			background-color: #c2e8c2ab;
			border: 1px solid #66ff66;
			padding: 70px;
			text-align: center;
		}

		.success-message a {
			display: inline-block;
			margin-top: 10px;
			background-color: #26594f;
			color: #fff;
			padding: 15px 20px;
			border-radius: 5px;
			text-decoration: none;
            font-size: 15px;
		}

		.success-message a:hover {
			background-color: #4dff4d;
		}
	</style>

<div class="events-container">

<div class="success-message">
    <h3 style="font-size: 6rem; color: black;">Registered Successfully!</h3>
    <p style="font-size: 15px;padding-top: 20px;">Go to your Event Timeline to check your upcoming events!</p>
		<br>
		<a href="../user/eventtimeline.php">Go to my Event Timeline</a>
	</div>

</div>







<?php
    require_once '../includes/footer.php';
?>