<!-- Compress Output Modal -->
	<div class="modal_wrapper">
		<section id="compress_modal" class="output_modal">
			<a href="#" class="modal_close">CLOSE (X)</a><br>
			<hgroup>
				<h2>Compressed Code</h2>
				<h3>Copy your code below or download it as a file.</h3>
			</hgroup>
			<form action="../_assets/includes/helpers/files/download.php" method="post" accept-charset="utf-8">
				<textarea name="compressed_code" class="code_output"></textarea><br>
				<input type="hidden" name="download_url" value="" class="dl_url">
				<button class="code_download" type="submit">DOWNLOAD</button>
			</form>
		</section><!-- END #compress_out_modal -->
	</div> <!-- END .modal_wrapper -->
