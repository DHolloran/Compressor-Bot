<!-- Edit Profile Modal -->
	<div class="modal_wrapper">
		<section id="edit_modal">
			<a href="#" class="modal_close">CLOSE (X)</a>
			<hgroup>
				<h2>Edit Profile</h2>
				<h3>Update your profile below.</h3>
			</hgroup>
			<form action="#" method="post" accept-charset="utf-8">
				<input type="text" name="edit_username" value="username" placeholder="username"><br>
				<input type="email" name="edit_email" value="email" placeholder="email"><br>
				<input type="text" name="edit_old_password" value="old password" placeholder="old password"><br>
				<input type="text" name="edit_password1" value="password" placeholder="password"><br>
				<input type="text" name="edit_password2" value="re-enter password" placeholder="re-enter password"><br>
			<!-- Edit Profile Plan Info -->
				<h4>Edit your plan</h4>
				<input type="radio" name="plan_options" id="edit_monthly_plan" value="monthly" checked="checked">
					<label for="edit_monthly_plan">Unlimited Monthly ($1.99)</label><br>
				<input type="radio" name="plan_options" id="edit_yearly_plan" value="yearly">
					<label for="edit_yearly_plan">Unlimited Yearly ($19.99)</label><br>
				<input type="radio" name="plan_options" id="edit_basic_plan" value="basic">
					<label for="edit_basic_plan">10 Uses Per Month (Free)</label><br>
			<!-- Edit Start Page -->
				<h4>Start Page</h4>
				<input type="radio" name="start_page" id="sp_compress" value="compress" checked="checked">
					<label for="sp_compress">Compress</label>
				<input type="radio" name="start_page" id="sp_decompress" value="compress">
					<label for="sp_decompress">Decompress</label>
			<!-- Submit Form -->
				<p>You will be redirected to Paypal to complete your transaction</p>
				<input type="submit" name="edit_submit" value="EDIT">
			</form>
		</section><!-- END #edit_profile_modal -->
	</div> <!-- END .modal_wrapper -->
	<!-- Contact Us Modal -->
		<div class="modal_wrapper">
			<section id="contact_modal">
				<a href="#" class="modal_close">CLOSE (X)</a>
				<h2>Contact Us</h2>
				<form action="#" method="post" accept-charset="utf-8">
					<select name="contact_form_subject">
						<optgroup label="Subject">
							<option value="general_info">General Info</option>
							<option value="bug_submit">Submit a bug</option>
						</optgroup>
					</select><br>
					<input type="text" name="contact_form_name" value="name" placeholder="name"><br>
					<textarea name="contact_form_message">message</textarea>
					<input type="submit" name="contact_submit" value="SEND">
				</form>
			</section><!-- END #contact_us_modal -->
		</div> <!-- END .modal_wrapper -->
