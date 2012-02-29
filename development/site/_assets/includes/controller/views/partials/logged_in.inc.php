<!-- User Logged In/Logout -->
        <ul id="logged_in">
          <li>Welcome back <a href="#edit_modal" class="modal_link"><?php echo $_SESSION['user_info']['user_name'];?></a></li>
          <li><a href="<?php echo "{$rootDir}/_assets/includes/helpers/logout.php";?>">Logout</a></li>
        </ul><!-- END #logged_in -->
