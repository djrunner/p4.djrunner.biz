<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<script src="//code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div id='v_template_menu'>

		<a href='/'>Home</a>

		<!-- Menu for users who are logged in -->
		<?php if($user): ?>


			<a href='/users/logout'>Logout</a>
			<a href='/races/index'>Profile</a>
			<a href='/races/add'>Add a Race</a>

		<!-- Menu options for users who are not logged in -->
		<?php else: ?>

            <a href='/users/signup'>Sign up</a>
            <a href='/users/login'>Log in</a>
        <?php endif; ?>
    <br><br>
    </div>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>