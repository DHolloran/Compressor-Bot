<!-- Edit Profile Modal -->
<?php
	// Select radio button that users currently has
	function selectRadio($input,$value){
		if($input === $value){
				echo 'checked="checked"';
			}else{
				echo "wtf";
			}
	}
?>
	<div class="modal_wrapper">
		<section id="edit_modal">
		<!-- Edit Profile Info -->
			<section id="edit_profile">
				<hgroup>
					<h2>Edit Profile</h2>
					<h3>Update your profile below.</h3>
				</hgroup>
				<form action="<?php echo "{$rootDir}/_assets/includes/controller/EditProfile.php"?>" method="post" accept-charset="utf-8">
					<input type="text" name="edit_username" readonly="readonly" value="<?php echo $_SESSION['user_info'][0]['user_name'];?>"><br>
					<input type="email" name="edit_email"placeholder="email" value="<?php echo $_SESSION['user_info'][0]['user_email'];?>"><br>
					<input type="password" name="edit_old_password" placeholder="old password"><br>
					<input type="password" name="edit_password1" placeholder="password" class="pass1"><br>
					<input type="password" name="edit_password2" placeholder="re-enter password" class="pass2"><br>
					<span class="error_field"></span>
					<!-- Edit Start Page -->
					<h4>Start Page</h4>
					<input type="radio" name="start_page" id="sp_compress" value="compress" <?php selectRadio($_SESSION['user_info'][0]['start_page'],'compress');?>>
						<label for="sp_compress">Compress</label><br>
					<input type="radio" name="start_page" id="sp_decompress" value="decompress"<?php selectRadio($_SESSION['user_info'][0]['start_page'],'decompress');?>>
						<label for="sp_decompress">Decompress</label>
				</section>
		<!-- Edit Profile Plan Info -->
			<section id="edit_plan">
				<a href="#" class="modal_close">CLOSE (X)</a>
				<hgroup>
					<h2>Edit your plan</h2>
					<h3>Update your plan below</h3>
				</hgroup>

				<input type="radio" name="plan_options" id="edit_monthly_plan" value="monthly" <?php selectRadio($_SESSION['user_info'][0]['user_plan'],'monthly');?>>
					<label for="edit_monthly_plan">Unlimited Monthly ($1.99)</label><br>
				<input type="radio" name="plan_options" id="edit_yearly_plan" value="yearly" <?php selectRadio($_SESSION['user_info'][0]['user_plan'],'yearly');?>>
					<label for="edit_yearly_plan">Unlimited Yearly ($19.99)</label><br>
				<input type="radio" name="plan_options" id="edit_basic_plan" value="basic"<?php selectRadio($_SESSION['user_info'][0]['user_plan'],'basic');?>>
					<label for="edit_basic_plan">10 Uses Per Month (Free)</label><br>
					<p>You will be redirected to Paypal to complete your transaction</p>
				<!-- Submit Form -->
					<input type="submit" name="edit_submit" value="EDIT">
			</section><!-- / -->
			</form>
		</section><!-- END #edit_modal -->
	</div> <!-- END .modal_wrapper -->
