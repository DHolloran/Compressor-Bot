<div class="span8 jm-options-section hide">
	<h2>Minify Your JavaScript <span class="muted">powered by <a href="" target="_blank"></a></span></h2>
	<div class="row">
		<div class="span8">
			<textarea id="jm_input" class="pull-left input" name="jm_input">
				function test(){
					console.log("something");
				}
			</textarea>
		</div>
		<div class="span8">
			<h3>Minified JavaScript</h3>
			<textarea id="jm_output" class="pull-left output" name="jm_output" readonly></textarea>
		</div>
	</div>
	<div id="jm_jslint_errors" class="hide">
		<h3>JSLint Errors</h3>
		<textarea  class="span8 errors" readonly value=""></textarea>
	</div>

	<div id="jm_jshint_errors" class="hide">
		<h3>JSHint Errors</h3>
		<textarea  class="span8 errors" readonly value=""></textarea>
	</div>
</div>