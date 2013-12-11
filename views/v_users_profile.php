<div class="mainBox" id="users_profile">

<h1>This is the profile of <?=$user->first_name?></h1>

<h3>E-mail Address: <?=$user->email?></h3>

<p>
	</br>

<!--
	<p>Add a photo!</p>
	
	<form id="image_upload" method="POST" action="/users/upload_image" enctype="multipart/form-data">
<label for="field">Required, audio files only: </label>
<input type="file" class="left" id="field" name="field">
<br/>
<input type="submit" value="Validate!">
</form>

	<br>

	<form method="POST" action="/users/upload_image">
		<input type="text" name="text">
		<input type="submit" value="test">
	</form>

	

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

<div>

	<table>
		<tr><th>Race Length</th><th>Race Time</th><th>Race Pace</th><th>Race Name</th><th>Race Year</th></tr>
		<tr><td>5 Kilometers</td><td>34:28</td><td>7:30</td><td>Jingle Bell</td><td>2011</td></tr>

	</table>