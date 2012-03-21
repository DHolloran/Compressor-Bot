Body Section
<input id="file_upload" type="file" name="file_upload" />
<input type="submit" class="submit">
<script type="text/javascript" src="uploadify/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
// <![CDATA[
$(document).ready(function() {
	$('.submit').uploadifyUpload();
  $('#file_upload').uploadify({
    'uploader'  : 'uploadify/uploadify.swf',
    'script'    : 'files/upload_files.php',
    'cancelImg' : 'uploadify/cancel.png',
    'folder'    : 'uploads',
    'auto'      : false,
    'expressInstall' : '/uploadify/expressInstall.swf',
    'fileDataName' : 'upload',
    'fileExt'     : '*.js;*.css;*.html',
    'fileDesc'    : 'Code (CSS,JS,HTML)',
    'method'	: 'post',
    'multi': true,
    'removeCompleted': true
  });
});
// ]]>
</script>

<?php

var_dump($_FILES);
