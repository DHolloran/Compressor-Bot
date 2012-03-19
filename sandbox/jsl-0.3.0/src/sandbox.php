<form action="?" method="post" accept-charset="utf-8">
	<textarea name="text" cols="80" rows="40"></textarea>
	<input type="submit" name="" value="Lint">
</form>
<?php
$code = $_POST['text'];

require_once("_jsl_online.php");
$engine = new JSLEngine('.priv/jsl', '.priv/jsl.server.conf');
$result = $engine->Lint($code);
if ($result === true)
   OutputLintHTML($engine);
else
   echo '<b>' . htmlentities($result) . '</b>';
