<?php
define("PER_PAGE",1);


function connect_db(){
	$mysqli= new mysqli('localhost','root','','mysqli');

	if($mysqli->connect_error){
		die('Connect Error: '.$mysqli->connect_error);
	}
	return $mysqli;
}
function select_list(){
	
	$p = (!isset($_GET['p'])) ?$p=0:$p=$_GET['p'];
	$p=$_GET['p'];
	$p = $p*PER_PAGE;
	$mysqli=connect_db();
	$sql = "SELECT * FROM list LIMIT ".$p.",".PER_PAGE;
	if($res = $mysqli->query($sql)){
		if($res->num_rows > 0){
			$row = $res->fetch_all(MYSQL_ASSOC);
			
		}

	}else{
		echo 'zapros ne proshol'.$mysqli->error;
	}
	return $row;
}
function del(){
	$mysqli=connect_db();

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$sql = "DELETE FROM list WHERE id = ? LIMIT 1";
		if($stmt = $mysqli->prepare($sql)){
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$stmt->close();
			header("Location: view.php");
		}else{
			echo "zapros db ne proshol".$mysqli->error;
		}
	}
}

function record(){
	$mysqli=connect_db();
	if(isset($_POST['firstname'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$firstname = mysqli_real_escape_string($mysqli, $firstname);
		$lastname = mysqli_real_escape_string($mysqli, $lastname);
		if($firstname!= '' && $lastname!=''){
			$sql="INSERT INTO list VALUES(NULL,'$firstname','$lastname')";
			if($mysqli->query($sql)){
				header("Location: view.php");
			}else{
				echo "zapros ne proshol".$mysqli->error;
		}
			
		
		}else{
			echo "<h3>zapolnite polya</h3>".$mysqli->error;
		}
	}
}

function edit(){
	$mysqli=connect_db();
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$sql = "UPDATE list SET firstname = ?, lastname = ? WHERE id = ?";
		if($stmt = $mysqli->prepare($sql)){
			$stmt->bind_param('ssi',$firstname,$lastname,$id);
			$stmt->execute();
			$stmt->close();
			header("Location: view.php");
		}


	}else{
		echo "zapros ne proshol";
	}
}

function select_one(){
	$mysqli=connect_db();
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$sql = "SELECT * FROM list WHERE id = '$id' LIMIT 1";
		if($res = $mysqli->query($sql)){
			if($res->num_rows > 0){
				$row = $res->fetch_assoc();
			}else{
				echo "zapis na db ne proshol".$mysqli->error;
			}
		}
	}
	return $row;
}

function page(){
$mysqli=connect_db();
$sql = "SELECT COUNT(*) FROM list";
if($res = $mysqli->query($sql)){
	$res = $res->fetch_assoc();
	$res = ceil($res['COUNT(*)']/PER_PAGE);
}	
return $res;
}
function pagination($pages){
	echo '<a style="text-decoration:none;color:black;" href="view.php?p=0">nachalo</a>&nbsp';
	for($i=0; $i<$pages;$i++){
		$p = $_GET['p'];
		if($i<($p-PER_PAGE) || $i>($p+ PER_PAGE)) continue;
		if($p==$i){
		echo '<a style="text-decoration:none;color:red;" href="view.php?p='.$i.'">'.($i+1).'</a>&nbsp';
		}else{
		echo '<a style="text-decoration:none;color:black;" href="view.php?p='.$i.'">'.($i+1).'</a>&nbsp';
		}
	}
	echo '<a style="text-decoration:none;color:black;" href="view.php?p='.($pages-1).'">kanec</a>&nbsp';
}

?>
