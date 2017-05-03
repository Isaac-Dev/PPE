
<?php	
	require("/includes/db.php");
	$state = $_POST['state'];
	if($state == "accepted"){
		$id = $_POST['idUtilisateur'];
		if($typeUtilisateur == "Producteur"){
			$query = $bdd->query("UPDATE Producteur SET grade=3 WHERE IdPro='$id'");
		}
		else{
			$query = $bdd->query("UPDATE Client SET grade=3 WHERE id_Client='$id'");
		}
		
	}
	header('Location: administrationComptes.php');
?>