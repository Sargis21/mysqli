<?php
require_once 'fn.php';
$row = select_list();
?>

<!DOCTYPE html>
<html>
<head>
	<title>spisok</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myscript.js"></script>
</head>
<body>
<h2>MYSQLI CRUD</h2>
<h3 style="text-align:center">spisok</h3>
<div style="margin:0 auto; width:450px">
<table border="2">
	<tr>
	<th>id</th>
	<th>imya</th>
	<th>familya</th>
	<th>redaktirovot</th>
	<th>udalit</th>	
	</tr>
	<?php foreach (select_list() as $val): ?>
	<tr>

		
	
		<td><?= $val['id'] ?></td>
		<td><?= $val['firstname'] ?></td>
		<td><?= $val['lastname'] ?></td>
		<td><button><a href="edit.php?edit=<?= $val['id'] ?>">redaktirovot</a></button></td>
		<td><button data-del="<?= $val['id'] ?>">udalit</button></td>
	</tr>
<?php endforeach; ?>
	
</table>
<?php pagination(page()) ?>
</div>
<p><a href="record.php">dabavit zapis</a></p>
</body>
</html>