<div class="mainBox" id="v_users_login">

<h1>Welcome back to Race Tracker!</h1>

<p>If you're a returning member please sign in below.
    Other please sign up by clicking on the "Sign Up" button
    from the menu-bar on the top of the screen.
</p>

<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email'>

    <br><br>

    Password<br>
    <input type='password' name='password'>

    <br><br>

    <input type='submit' value='Log in'>

    <?php if(isset($error)): ?>
        <div class='error'>
        </br>
           <p> Login failed. Please double check your email and password. <p>
        </div>
        <br>
    <?php endif; ?>

</form>

</div>