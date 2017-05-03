<!DOCTYPE html>
<html>

<?php
	
	session_start();
	require("/includes/db.php");
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idPro = $_SESSION['id'];
    //On regarde si c'est bien un producteur 
    $_SESSION['grade'];

	/*$idPro = $_POST['idPro'];
	$adresse = $_POST['adresse'];
	$adherent = $_POST['adherent'];
	$dateAdhe = $_POST['dateAdhe'];
	$certif = $_POST['certif'];
	$dateObten = $_POST['dateObten'];*/
	$adresse = $_POST['adresse'];

	$query = $bdd->query("UPDATE Producteur SET adresse='$adresse' WHERE IdPro='$idPro'");
	
	header('Location: consul.php');

?>
</html>