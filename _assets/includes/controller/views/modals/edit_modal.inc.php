<!-- Edit Profile Modal -->
<?php
	// Select radio button that users currently has
	function selectRadio($input,$value){
		if($input === $value){
			echo 'checked="checked"';
		}
	}
?>
	<div class="modal_wrapper">
		<section id="edit_modal">
		<!-- Edit Profile Info -->
		<form action="<?php echo "{$assets}/includes/controller/EditProfile.php"?>" method="post" accept-charset="utf-8">
			<section id="edit_profile">
				<hgroup>
					<h2>Edit Profile</h2>
					<h3>Update your profile below.</h3>
					<h3 class="output"></h3>
				</hgroup>
				<span ></span>
					<input type="text" name="edit_username" readonly="readonly" value="<?php echo $_SESSION['user_info']['user_name'];?>"><br>
					<input type="email" name="edit_email" placeholder="email" value="<?php echo $_SESSION['user_info']['user_email'];?>"><br>
					<input type="password" name="edit_old_password" placeholder="old password"><br>
					<input type="password" name="edit_password1" placeholder="password" class="pass1"><br>
					<input type="password" name="edit_password2" placeholder="re-enter password" class="pass2"><br>
					<span class="error_field"></span>
					<!-- Edit Start Page -->
					<h4>Start Page</h4>
					<input type="radio" name="start_page" id="sp_compress" value="compress" <?php selectRadio($_SESSION['user_info']['start_page'],'compress');?>>
						<label for="sp_compress">Compress</label><br>
					<input type="radio" name="start_page" id="sp_decompress" value="decompress"<?php selectRadio($_SESSION['user_info']['start_page'],'decompress');?>>
						<label for="sp_decompress">Decompress</label>
			</section>
		<!-- Edit Profile Plan Info -->
			<section id="edit_plan">
				<a href="#" class="modal_close">CLOSE (X)</a>
				<hgroup>
					<h2>Edit your plan</h2>
					<h3>Update your plan below</h3>
				</hgroup>

				<!-- <input type="radio" name="plan_options" id="edit_monthly_plan" value="monthly" <?php selectRadio($_SESSION['user_info']['user_plan'],'monthly');?>>
					<label for="edit_monthly_plan">Unlimited Monthly ($1.99)</label><br>
				<input type="radio" name="plan_options" id="edit_yearly_plan" value="yearly" <?php selectRadio($_SESSION['user_info']['user_plan'],'yearly');?>>
					<label for="edit_yearly_plan">Unlimited Yearly ($19.99)</label><br>
				<input type="radio" name="plan_options" id="edit_basic_plan" value="basic"<?php selectRadio($_SESSION['user_info']['user_plan'],'basic');?>>
					<label for="edit_basic_plan">10 Uses Per Month (Free)</label><br>
					<p>You will be redirected to Paypal to complete your transaction</p>
					<input type="submit" name="edit_submit" value="EDIT"> -->
				<input type="hidden" name="cmd" class="paypal1" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" class="paypal2" value="V9GVS7ACWNXN2">
				<table>
				<tr><td><input type="hidden" name="on0" value=""></td></tr>
				<tr><td><h4 class="uses_left"></h4></td></tr>
				<tr><td id="current_plan">Current plan: <?php echo $_SESSION['user_info']['user_plan']; ?></td></tr>
				<tr>
					<td><select name="os0" class="paypal3">
					<option value="Monthly">Monthly : $1.99USD - monthly</option>
					<option value="Yearly">Yearly : $19.99USD - yearly</option>
					<option value="Basic">Basic : $0.00USD - yearly</option>
				</select> </td></tr>
				</table>
				<input type="hidden" name="currency_code" class="paypal4" value="USD">
				<input type="submit" name="submit" value="EDIT">
				<img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</section><!-- END #edit_plan -->
			</form>
		</section><!-- END #edit_modal -->
	</div> <!-- END .modal_wrapper -->
