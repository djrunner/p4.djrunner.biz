<div class="mainBox" id="users_signUp">

<form class="cmxform" id="commentForm" method='POST' action='/users/p_signup'>
    <fieldset>
    <legend>Please provide your name, email address (won't be published) and a comment</legend>
    <p>
      <label for="first_name">First Name (required, at least 2 characters)</label></br>
      <input id="first_name" name="text" minlength="2" type="text" required/>
    </p>
    <p>
      <label for="last_name">Last Name (required, at least 2 characters)</label></br>
      <input id="last_name" type="text" minlength="2" name="last_name" required/>
    </p>
    <p>
      <label for="email">E-Mail (required)</label></br>
      <input id="email" type="email" name="email" required/>
    </p>
    <p>
      <label for="password">Password (required)</label></br>
      <input id="password" type="password" name="password" minlength="8" required/>
    </p>
    <p>
      <input class="submit" type="submit" value="Submit"/>
    </p>
  </fieldset>
</form>
<!--
<script>
$("#commentForm").validate();
</script>
-->

</div>