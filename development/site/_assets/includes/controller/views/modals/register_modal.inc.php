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
			<!-- Register Plan Info -->
				<!-- <h4>Choose your plan</h4>
				<input type="radio" name="plan_options" id="register_monthly_plan" value="monthly" checked="checked">
					<label for="register_monthly_plan">Unlimited Monthly ($1.99)</label><br>
				<input type="radio" name="plan_options" id="register_yearly_plan" value="yearly">
					<label for="register_yearly_plan">Unlimited Yearly ($19.99)</label><br>
				<input type="radio" name="plan_options" id="register_basic_plan" value="basic">
					<label for="register_basic_plan">10 Uses Per Month (Free)</label><br>
				<p>You will be redirected to Paypal to complete your transaction</p>
				<input type="submit" name="register_submit" value="REGISTER"> -->
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="V9GVS7ACWNXN2">
				<table>
				<tr><td><input type="hidden" name="on0" value=""></td></tr><tr><td><select name="os0">
					<option value="Monthly">Monthly : $1.99USD - monthly</option>
					<option value="Yearly">Yearly : $19.99USD - yearly</option>
					<option value="Basic">Basic : $0.00USD - yearly</option>
				</select> </td></tr>
				</table>
				<input type="hidden" name="currency_code" value="USD">
				<input type="image" src="<?php echo "{$rootDir}/_assets/img/buttons/register_btn.png"; ?>" border="0" name="submit" alt="REGISTER">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
		</section><!-- END #register_modal -->
	</div> <!-- END .modal_wrapper-->
