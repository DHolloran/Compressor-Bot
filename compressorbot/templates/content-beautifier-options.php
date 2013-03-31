<div class="span4 options">
	<!-- Language Options -->
	<div class="row">
		<div id="lb_options" class="span3 options-section">
			<h3>Choose Your Language</h3>
			<p>
				<label><input checked type="radio" name="lb_language" class="lb-language" id="lb_cb_language" value="cb-options-section"> CSS</label>
				<label><input type="radio" name="lb_language" class="lb-language" id="lb_jb_language" value="jb-options-section"> JS</label>
				<label><input type="radio" name="lb_language" class="lb-language" id="lb_hb_language" value="hb-options-section"> HTML</label>
			</p>
		</div>
	</div> <!-- /.row -->
	<!-- END Language Options -->

	<!-- CSS Options -->
	<div class="row">
		<div class="span3">
			<h3>Select Your Options</h3>
		</div>
		<div id="cb_options" class="span3 cb-options-section options-section">
			<p>
				<h4>Indent</h4>
				<label><input checked type="radio" name="cb_indent" class="cb-spacing" id="cb_tab" value="tab"> tab</label>
				<label><input type="radio" name="cb_indent" class="cb-spacing" id="cb_fourspaces" value="fourspaces"> 4 spaces</label>
				<label><input type="radio" name="cb_indent" class="cb-spacing" id="cb_twospaces" value="twospaces"> 2 spaces</label>
			</p>
			<p>
				<h4>Braces</h4>
				<label><input checked type="radio" name="cb_openbrace" class="cb-braces" id="cb_openbrace_separate_line" value="separate-line"> separate line</label>
				<label><input type="radio" name="cb_openbrace" class="cb-braces" id="cb_end_of_line" value="end-of-line"> end of line</label>
			</p>
			<p>
				<h4>Semicolon</h4>
				<label><input checked type="checkbox" name="cb_autosemicolon" class="cb-auto-semicolon" id="cb_cb_autosemicolon" value="on"> Automatic semicolon</label>
			</p>
			<p>
				<h4>CSS Linting</h4>
				<label><input checked type="checkbox" name="cb_csslint" class="cb-css-lint" id="cb_csslint" value="on"> CSS Lint</label>
			</p>
		</div>
	</div> <!-- /.row -->
	<!-- END CSS Options -->

	<!-- JS Options -->
	<div class="row">
		<div id="jb_options" class="span3 jb-options-section options-section hide">
			<p>
				<h4>Indent</h4>
				<label><input checked type="radio" name="jb_indent_char" class="jb-indent-char" id="jb_indent_char_tab" value="tab"> tab</label>
				<label><input type="radio" name="jb_indent_char" class="jb-indent-char" id="jb_indent_char_twospaces" value="twospaces"> two spaces</label>
				<label><input type="radio" name="jb_indent_char" class="jb-indent-char" id="jb_indent_char_fourspaces" value="fourspaces"> four spaces</label>
			</p>
			<p>
				<h4>Braces</h4>
				<label><input checked type="radio" name="jb_braces" class="jb-braces" id="jb_collapse_brace" value="collapse"> collapsed</label>
				<label><input type="radio" name="jb_braces" class="jb-braces" id="jb_expand" value="expand"> expanded</label>
				<label><input type="radio" name="jb_braces" class="jb-braces" id="jb_end_expanded" value="end-expand"> end expanded</label>
				<label><input type="radio" name="jb_braces" class="jb-braces" id="jb_expand_strict" value="expand-strict"> expand strict</label>
			</p>
			<p>
				<a href="#jb_options_advanced" id="jb_options_advanced_link" class="options-advanced-link">Show Advanced Options</a>
			</p>
			<div id="jb_options_advanced" class="options-advanced hide">
				<p>
					<label><input checked type="checkbox" name="jb_preserve_newlines" class="jb-preserve-newlines" id="jb_preserve_newlines" value="on"> preserve newlines</label>
				</p>
				<p>
					<label><input type="checkbox" name="jb_break_chained_methods" class="jb-break-chained-methods" id="jb_break_chained_methods" value="on"> break chained methods</label>
				</p>
				<p>
					<label>max preserve new lines<input type="number" name="jb_max_preserve_newlines" class="jb-max-preserve-newlines" id="jb_max_preserve_newlines" min="0" value="0"></label>
				</p>
				<p>
					<label><input type="checkbox" name="jb_jslint_happy" class="jb-jslint-happy" id="jb_jslint_happy" value="on"> jslint happy</label>
				</p>
				<p>
					<label><input type="checkbox" name="jb_keep_array_indentation" class="jb-keep-array-indentation" id="jb_keep_array_indentation" value="on"> keep array indentation</label>
				</p>
				<p>
					<label><input checked type="checkbox" name="jb_space_before_conditional" class="jb-space-before-conditional" id="jb_space_before_conditional" value="on"> space before conditional</label>
				</p>
				<p>
					<label><input type="checkbox" name="jb_unescape_strings" class="jb-unescape-strings" id="jb_unescape_strings" value="on"> unescape strings</label>
				</p>
				<p>
					<label>wrap line length<input type="number" name="jb_wrap_line_length" class="jb-wrap-line-length" id="jb_wrap_line_length" min="0" value="0"></label>
				</p>
			</div>
			<p>
				<h4>JS Linting</h4>
				<!-- <label><input checked type="radio" name="jb_linting" class="jb-linting" id="jb_jslint" value="jslint"> JSLint</label> -->
				<label><input checked type="checkbox" name="jb_linting" class="jb-linting" id="jb_jshint" value="jshint"> JSHint</label>
			</p>
		</div> <!-- /#jb_options -->
	</div> <!-- /.row -->
	<!-- END JS Options -->

	<!-- HTML Options -->
	<div class="row">
		<div id="hb_options" class="span3 hb-options-section options-section hide">
			<p>
				<h4>Indent</h4>
				<label><input checked type="radio" name="hb_indent_char" class="hb-indent-char" id="hb_indent_char_tab" value="tab"> tab</label>
				<label><input type="radio" name="hb_indent_char" class="hb-indent-char" id="hb_indent_char_twospaces" value="twospaces"> two spaces</label>
				<label><input type="radio" name="hb_indent_char" class="hb-indent-char" id="hb_indent_char_fourspaces" value="fourspaces"> four spaces</label>
			</p>
			<p>
				<h4>Braces</h4>
				<label><input checked type="radio" name="hb_braces" class="hb-braces" id="hb_collapse_brace" value="collapse"> collapsed</label>
				<label><input type="radio" name="hb_braces" class="hb-braces" id="hb_expand" value="expand"> expanded</label>
				<label><input type="radio" name="hb_braces" class="hb-braces" id="hb_end_expanded" value="end-expand"> end expanded</label>
			</p>
			<p>
				<h4>Indent Scripts</h4>
				<label><input checked type="radio" name="hb_indent_scripts" class="hb-indent-scripts" id="hb_normal" value="normal"> normal</label>
				<label><input type="radio" name="hb_indent_scripts" class="hb-indent-scripts" id="hb_keep" value="keep"> keep</label>
				<label><input type="radio" name="hb_indent_scripts" class="hb-indent-scripts" id="hb_seperate" value="seperate"> seperate</label>
			</p>
		</div> <!-- /#hb_options -->
	</div> <!-- /.row -->
	<!-- END HTML Options -->

</div> <!-- /.row -->