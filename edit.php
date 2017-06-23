<?php
include_once "fn.php";
if(isset($_POST['id'])){
edit();
}
if(isset($_GET['edit'])){
$row=select_one();
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>redaktirovot</title>
</head>
<body>
<h2>redaktirovot zapis</h2>
<div style="margin:0 auto; width: 450px;">
<fieldset>
	<legend>redaktirovot zapis</legend>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<label>vvedite imya</label><br>
<input type="text" name="firstname" value="<?= $row['firstname'] ?>"><br>
<label>vvedite familya</label><br>
<input type="text" name="lastname" value="<?= $row['lastname'] ?>"><br><br>
<input type="submit" name="">
<input type="hidden" name="id" value="<?= $row['id'] ?>">
</fieldset>

	
</form>
</div>
</body>
</html>
<?php 
}else{
header("Location: view.php");
	} 
	?>