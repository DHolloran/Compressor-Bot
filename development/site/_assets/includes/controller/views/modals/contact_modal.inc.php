<!-- Contact Us Modal -->
    <div class="modal_wrapper">
      <section id="contact_modal">
        <a href="?" class="modal_close">CLOSE (X)</a>
        <hgroup>
          <h2>Contact Us</h2>
          <h3>Someone will contact you within 24 hours.</h3>
        </hgroup>
        <span class="success"></span>
        <form action="<?php echo "{$rootDir}/_assets/includes/helpers/sendmail.php";?>" id="contact_form">
          <select name="contact_form_subject">
            <optgroup label="Subject">
              <option value="general_info">General Info</option>
              <option value="bug_submit">Submit a bug</option>
            </optgroup>
          </select><br>
          <input type="text" name="contact_form_name" placeholder="name"><br>
          <input type="email" name="contact_form_email" placeholder="email">
          <textarea name="contact_form_message" placeholder="message"></textarea>
          <!-- <input type="submit" name="contact_submit" value="Send"> -->
          <button type="submit">Send</button>
        </form>
      </section><!-- END #contact_us_modal -->
    </div> <!-- END .modal_wrapper -->