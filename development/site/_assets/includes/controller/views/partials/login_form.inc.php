<!-- Login Form -->
          <form action="<?php echo "{$assets}/includes/helpers/login.php";?>" method="post" name="login_form" id="login_form">
            <input type="text" name="login_username" autocomplete="on" placeholder="user name">
            <input type="password" name="login_password" autocomplete="on" placeholder="password">
            <input type="submit" value="Login" id="login_btn"><br>
            <span class="error_field">User name or password does not exist.</span>
          </form>
