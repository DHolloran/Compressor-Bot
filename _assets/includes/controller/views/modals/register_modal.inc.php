<!-- Register Modal -->
	<div class="modal_wrapper">
		<section id="register_modal">
			<a href="#" class="modal_close">CLOSE (X)</a>
			<hgroup>
				<h2>Register</h2>
				<h3>Please fill out all fields.</h3>
			</hgroup>
			<form action="<?php echo "{$assets}/includes/controller/Register.php"?>" method="post" accept-charset="utf-8">
			<!-- Register User Info -->
				<input type="text" name="register_username" placeholder="username"><br>
				<input type="email" name="register_email" placeholder="email"><br>
				<input type="password" name="register_password1" placeholder="password" class="pass1"><br>
				<input type="password" name="register_password2" placeholder="re-enter password" class="pass2"><br>
				<span class="error_field"></span>
				<input type="image" src="<?php echo "{$assets}/img/buttons/register_btn.png"; ?>" border="0" name="submit" alt="REGISTER">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
		</section><!-- END #register_modal -->
	</div> <!-- END .modal_wrapper-->
