<?php	
	require("/includes/db.php");
	$type = $_POST['typechamp'];
	$idVer = $_POST['idVer'];
	$value = $_POST['value'];
	echo $idVer;
	echo $value;
	echo $type;
	$query = $bdd->query("UPDATE verger SET $type='$value' WHERE idVer='$idVer'");

	header('Location: vergers.php');
?>