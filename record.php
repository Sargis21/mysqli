<?php
require_once 'fn.php';
record();
?>

<!DOCTYPE html>
<html>
<head>
	<title>novoe zapis</title>
</head>
<body>
<h2>novie zapis</h2>
<div style="margin:0 auto; width: 450px;">
<fieldset>
	<legend>novoe zapis</legend>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<label>vvedite imya</label><br>
<input type="text" name="firstname"><br>
<label>vvedite familya</label><br>
<input type="text" name="lastname"><br><br>
<input type="submit" name="">
</fieldset>

	
</form>
</div>
</body>
</html>