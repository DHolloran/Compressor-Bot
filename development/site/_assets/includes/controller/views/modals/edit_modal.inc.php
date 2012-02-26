<!-- Edit Profile Modal -->
	<div class="modal_wrapper">
		<section id="edit_modal">
		<!-- Edit Profile Info -->
			<section id="edit_profile">
				<hgroup>
					<h2>Edit Profile</h2>
					<h3>Update your profile below.</h3>
				</hgroup>
				<form action="#" method="post" accept-charset="utf-8">
					<input type="text" name="edit_username" placeholder="username"><br>
					<input type="email" name="edit_email"placeholder="email"><br>
					<input type="text" name="edit_old_password" placeholder="old password"><br>
					<input type="text" name="edit_password1" placeholder="password"><br>
					<input type="text" name="edit_password2" placeholder="re-enter password"><br>
					<!-- Edit Start Page -->
					<h4>Start Page</h4>
					<input type="radio" name="start_page" id="sp_compress" value="compress" checked="checked">
						<label for="sp_compress">Compress</label><br>
					<input type="radio" name="start_page" id="sp_decompress" value="compress">
						<label for="sp_decompress">Decompress</label>
				</section>
		<!-- Edit Profile Plan Info -->
			<section id="edit_plan">
				<a href="#" class="modal_close">CLOSE (X)</a>
				<hgroup>
					<h2>Edit your plan</h2>
					<h3>Update your plan below</h3>
				</hgroup>

				<input type="radio" name="plan_options" id="edit_monthly_plan" value="monthly" checked="checked">
					<label for="edit_monthly_plan">Unlimited Monthly ($1.99)</label><br>
				<input type="radio" name="plan_options" id="edit_yearly_plan" value="yearly">
					<label for="edit_yearly_plan">Unlimited Yearly ($19.99)</label><br>
				<input type="radio" name="plan_options" id="edit_basic_plan" value="basic">
					<label for="edit_basic_plan">10 Uses Per Month (Free)</label><br>
					<p>You will be redirected to Paypal to complete your transaction</p>
				<!-- Submit Form -->
					<input type="submit" name="edit_submit" value="EDIT">
			</section><!-- / -->
			</form>
		</section><!-- END #edit_modal -->
	</div> <!-- END .modal_wrapper -->
