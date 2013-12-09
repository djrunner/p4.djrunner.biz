<div class="mainBox" id="users_profile">

<h1>This is the profile of <?=$user->first_name?></h1>

<h3>E-mail Address: <?=$user->email?></h3>

<p>
	</br>

	<p>Add a photo!</p>
	
	<form method="POST" action="/users/upload_image"  id="image_upload"/>
		<label for="field">Filename (images only):</label>
		<input type="file" class="left" id="field" name="field" ><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<br>

	

	<?php if(!isset($user->image_location)): ?>
		<img src="/images/nophoto.jpg" width="150" height="150" alt="no_photo">
	<?php else: ?>
		<img src="../<?=$user->image_location?>" width="150" height="150" alt="profile_pic">
	<?php endif; ?>

	<br>

	<!--
	<?php if(isset($error)): ?>
        <div class='error'>
        </br>
            File uploaded is not an image, or image is used by another user.
        </div>
        <br>
    <?php endif; ?>

	-->

	
</p>

</div>