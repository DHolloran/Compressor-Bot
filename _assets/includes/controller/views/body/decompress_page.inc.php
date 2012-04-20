<!-- Decompress BODY Section -->
  <div id="content" class="wrapper" role="main">
    <div id="decompress_wrapper" class="wrapper">
    <!-- Code Input Section -->
      <section id="code_insert">
        <hgroup>
          <h2>Insert text to decompress.</h2>
          <h3>Choose your language and options on the right then decompress.</h3>
        </hgroup>
        <ul class="tool_selection">
          <li>Insert</li>
          <li><a href="#code_upload" data-tool="code_insert" class="tool_switch">Upload</a></li>
        </ul>
        <form action="<?php echo "$homePage/_assets/includes/helpers/decompress.php"?>" method="post" name="decompress_insert" id="decompress_insert">
          <div id="text_input">
            <textarea name="input" placeholder="Paste your code here."></textarea>
            <input type="submit" class="tool_btn" data-page="decompress" value="Decompress">
          </div><!-- END .text_input -->
        <!-- .languages_options -->
          <section class="languages_options">
            <h4>Languages</h4>
            <!-- CSS Input -->
            <input type="radio" name="tool" id="in_css" data-lang="css" class="language_choice css" value="decompress_css" checked="checked">
              <label for="in_css">CSS</label><br>
            <!-- JS Input -->
            <input type="radio" name="tool" id="in_js" data-lang="js" class="language_choice js" value="decompress_js">
              <label for="in_js">Javascript</label>
          <!-- Options -->
            <h4>Options</h4>
          <!-- CSS Options -->
            <div class="css_options">
            <!-- CSS Whitespace-wsp (tabs/spaces)-->
              <input type="radio" id="in_css_wsp_tabs" name="wsp" value="tabs" checked="checked">
                <label for="in_css_wsp_tabs">Tabs</label><br>
              <input type="radio" id="in_css_wsp_spaces" name="wsp" value="spaces">
                <label for="in_css_wsp_spaces">Spaces</label><br>
            <!-- CSS Validate -->
              <input type="checkbox" name="css_validate" id="in_css_validate" value="true">
                <label for="in_css_validate">Validate</label><br>
            <!-- CSS Prefixer -->
              <input type="checkbox" name="css_prefixer" id="in_css_prefixer" value="true">
                <label for="in_css_prefixer">Vendor Prefixes</label>
            </div><!-- END #css_options -->
          <!-- JS Options -->
            <div class="js_options">
            <!-- JS wsp (tabs/spaces)-->
              <input type="radio" id="in_js_wsp_tabs" name="wsp" value="tabs" checked="checked">
                <label for="in_js_wsp_tabs">Tabs</label><br>
              <input type="radio" id="in_js_wsp_spaces" name="wsp" value="spaces">
                <label for="in_js_wsp_spaces">Spaces</label><br>
            </div><!-- END #js_options -->
          </section><!-- END #language_options -->
        </form>
      </section><!-- END #code_insert -->
  <!-- Code Upload Section -->
    <section id="code_upload">
      <hgroup>
          <h2>Upload Files to decompress.</h2>
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
          <input name="file" id="decompress_upload" type="file" multiple="">
          <input type="submit" class="tool_btn" data-page="decompress" value="Decompress">
        </div> <!-- END #file_upload -->
        <section class="languages_options">
        <!-- Languages -->
          <h4>Languages</h4>
            <input type="radio" name="tool" id="out_html" data-lang="html" class="language_choice html" value="decompress_html" checked="checked">
              <label for="out_html">HTML</label><br>
            <input type="radio" name="tool" id="out_css" data-lang="css" class="language_choice css" value="decompress_css">
              <label for="out_css">CSS</label><br>
            <input type="radio" name="tool" id="out_js" data-lang="js" class="language_choice js" value="decompress_js">
              <label for="out_js">Javascript</label>
        <!-- Options -->
          <h4>Options</h4>
          <!-- HTML Options -->
            <div class="html_options">
            <!-- HTML Validate -->
              <input type="checkbox" name="html_validate" id="up_html_validate">
                <label for="up_html_validate">Validate</label><br>
            </div><!-- END #html_options -->
          <!-- CSS Options -->
            <div class="css_options">
            <!-- CSS Whitespace-wsp (tabs/spaces)-->
              <input type="radio" id="out_css_wsp_tabs" name="wsp" value="tabs" checked="checked">
                <label for="out_css_wsp_tabs">Tabs</label><br>
              <input type="radio" id="out_css_wsp_spaces" name="wsp" value="spaces">
                <label for="out_css_wsp_spaces">Spaces</label><br>
            <!-- CSS Validate -->
              <input type="checkbox" name="css_validate" id="up_css_validate">
                <label for="up_css_validate">Validate</label><br>
            <!-- CSS Prefixer -->
              <input type="checkbox" name="css_prefixer" id="up_css_prefixer">
                <label for="up_css_prefixer">Vendor Prefixes</label><br>
            <!-- CSS Concatenate -->
              <input type="checkbox" name="css_concat" id="up_css_concat">
                <label for="up_css_concat">Concatenate</label><br>
            </div><!-- END #css_options -->
            <!-- JS Options -->
              <div class="js_options">
              <!-- JS wsp (tabs/spaces)-->
                <input type="radio" id="out_js_wsp_tabs" name="wsp" value="tabs" checked="checked">
                  <label for="out_js_wsp_tabs">Tabs</label><br>
                <input type="radio" id="out_js_wsp_spaces" name="wsp" value="spaces">
                  <label for="out_js_wsp_spaces">Spaces</label><br>
              </div><!-- END #js_options -->
        </section><!-- END .languages_options -->
      </form>
     </section><!-- END #code_upload -->
    </div><!-- END #decompress_wrapper -->
  </div> <!-- END #container -->
