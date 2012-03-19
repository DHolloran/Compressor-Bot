<!-- Compress BODY Section -->
<div id="content" class="wrapper" role="main">
  <div id="compress_wrapper" class="wrapper">
<!-- Code Input Section -->
    <section id="code_insert">
      <hgroup>
        <h2>Insert text to compress.</h2>
        <h3>Choose your language and options on the right then compress.</h3>
      </hgroup>
      <ul class="tool_selection">
        <li>Insert</li>
        <li><a href="#code_upload" data-tool="code_insert" class="tool_switch">Upload</a></li>
      </ul>
      <form action="<?php echo "$homePage/_assets/includes/helpers/compress.php"?>" method="post" name="compress_insert" id="compress_insert" enctype="multipart/form-data">
        <div id="text_input">
          <textarea name="input" placeholder="Paste your code here."></textarea>
          <input type="submit" class="tool_btn" value="Compress">
        </div><!-- END .text_input -->
      <!-- .languages_options -->
        <section class="languages_options">
        <!-- Uses Left -->
        <span class="uses_left"></span>
        <span class="signup_link"><a href="#edit_modal" class="modal_link" title="Upgrade now!">Upgrade now!</a></span>

          <h4>Languages</h4>

          <input type="radio" name="tool" id="compress_html" data-lang="html" class="language_choice html" value="compress_html" checked="checked">
            <label for="compress_html">HTML</label><br>
        <!-- Tool === Compress CSS -->
          <input type="radio" name="tool" id="compress_css" data-lang="css" class="language_choice css" value="compress_css">
            <label for="compress_css">CSS</label><br>
        <!-- Tool === Compress JS-->
          <input type="radio" name="tool" id="compress_js" data-lang="js" class="language_choice js" value="compress_js">
            <label for="compress_js">Javascript</label>
        <!-- Tool Options -->
          <h4>Options</h4>
        <!-- HTML Options -->
          <div class="html_options">
            <input type="checkbox" class="html_validate" name="html_validate" id="in_html_validate" value="true">
              <label for="in_html_validate">Validate</label><br>
          </div><!-- END #html_options -->

        <!-- CSS Options -->
          <div class="css_options">

          <!-- CSSLint -->
            <input type="checkbox" class="css_lint" name="css_lint" id="in_css_lint" value="true">
              <label for="in_css_lint">CSSLint</label><br>
          <!-- CSS Validate -->
            <input type="checkbox" class="css_validate" name="css_validate" id="in_css_validate" value="true">
              <label for="in_css_validate">Validate</label><br>

          <!-- CSS Prefixer -->
            <input type="checkbox" class="css_prefixer" name="css_prefixer" id="in_css_prefixer" value="true">
              <label for="in_css_prefixer">Vendor Prefixes</label><br>
          </div><!-- END #css_options -->
        <!-- JS Options -->
          <div class="js_options">
          <!-- JSLint -->
            <input type="checkbox" class="js_lint" name="js_lint" id="in_js_lint" value="true">
              <label for="in_js_lint">JSLint</label><br>
          </div><!-- END #js_options -->
        </section><!-- END #language_options -->
      </form>
    </section><!-- END #code_insert -->
<!-- Code Upload Section -->
  <section id="code_upload">
    <hgroup>
        <h2>Upload Files to compress.</h2>
        <h3>Sit back and let CompressorBot do all the work. </h3>
    </hgroup>
      <ul class="tool_selection">
        <li><a href="#code_insert" data-tool="code_upload" class="tool_switch">Insert</a></li>
        <li>Upload</li>
      </ul>
      <form method="post" action="<?php echo "$homePage/_assets/includes/helpers/files/upload_files.php"; ?>" enctype="multipart/form-data" name="upload">
      <div id="file_upload">
      <!-- Upload Table -->
        <div id="table_wrapper">
          <table>
              <tbody>
              </tbody>
            </table>
        </div><!-- #table_wrapper -->
        <input name="file" id="compress_upload" type="file" multiple="">
        <input type="submit" class="tool_btn" value="Compress">
      </div> <!-- END #file_upload -->
      <section class="languages_options">
      <!-- Uses Left -->
        <span class="uses_left"></span>
        <span class="signup_link"><a href="#edit_modal" class="modal_link" title="Upgrade now!">Upgrade now!</a></span>
      <!-- Languages -->
        <h4>Languages</h4>
          <input type="radio" name="tool" id="out_html" data-lang="html" class="language_choice html" value="compress_html" checked="checked">
            <label for="out_html">HTML</label><br>
          <input type="radio" name="tool" id="out_css" data-lang="css" class="language_choice css" value="compress_css">
            <label for="out_css">CSS</label><br>
          <input type="radio" name="tool" id="out_js" data-lang="js" class="language_choice js" value="compress_js">
            <label for="out_js">Javascript</label>
      <!-- Options -->
        <h4>Options</h4>
        <!-- HTML Options -->
          <div class="html_options">
          <!-- HTML Validate -->
            <input type="checkbox" class="html_validate" name="html_validate" id="up_html_validate">
              <label for="up_html_validate">Validate</label><br>
          </div><!-- END #html_options -->
        <!-- CSS Options -->
          <div class="css_options">
          <!-- CSS Keep Comments -->
            <input type="checkbox" name="css_keep_comments" id="up_css_keep_comments">
              <label for="up_css_keep_comments">Keep Comments</label><br>
          <!-- CSSLint -->
            <input type="checkbox" class="css_lint" name="css_lint" id="up_css_lint">
              <label for="up_css_lint">CSSLint</label><br>
          <!-- CSS Validate -->
            <input type="checkbox" class="css_validate" name="css_validate" id="up_css_validate">
              <label for="up_css_validate">Validate</label><br>
          <!-- CSS Prefixer -->
            <input type="checkbox" class="css_prefixer" name="css_prefixer" id="up_css_prefixer">
              <label for="up_css_prefixer">Vendor Prefixes</label><br>
          <!-- CSS Concatenate -->
            <input type="checkbox" class="css_concat" name="css_concat" id="up_css_concat">
              <label for="up_css_concat">Concatenate</label><br>
          </div><!-- END #css_options -->
          <!-- JS Options -->
            <div class="js_options">
            <!-- JS Keep Comments -->
              <input type="checkbox" name="js_keep_comments" id="up_js_keep_comments"> <label for="up_js_keep_comments">Keep Comments</label><br>
            <!-- JSLint -->
              <input type="checkbox" class="js_lint" name="js_lint" id="up_js_lint"> <label for="up_js_lint">JSLint</label><br>
            <!-- JS Concat -->
              <input type="checkbox" class="js_concat" name="js_concat" id="up_js_concat"> <label for="up_js_concat">Concatenate</label><br>
            </div><!-- END #js_options -->
      </section><!-- END .languages_options -->
    </form>
   </section><!-- END #code_upload -->
  </div><!-- END #decompress_wrapper -->
</div> <!-- END #container -->
