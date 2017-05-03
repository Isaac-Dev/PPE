<?php require "/includes/db.php"; ?>
<?php
$typeUtilisateur = $_POST['typeUtilisateur'];
$login = $_POST['login'];
$pass = $_POST['mdp'];

if($typeUtilisateur == "Producteur"){
	$req = $bdd->prepare('SELECT IdPro,grade FROM Producteur WHERE nomUtilisateur = :login AND mdp = :pass');
}
else {
	$req = $bdd->prepare('SELECT id_Client,grade FROM Client WHERE nomUtilisateur = :login AND mdp = :pass');
}
$req->execute(array(
    'login' => $login,
    'pass' => $pass));
	$resultat = $req->fetch();
	if (!$resultat){
    	echo "Mauvais identifiant ou mot de passe !";
		include('login.php');
	}
	else if($resultat['grade']==3){
		echo "Votre compte a été rejeté par l'administrateur, veuillez vous recréer un compte avec des informations en adéquation avec le mail que vous a envoyé l'administrateur";
		include('login.php');
	}
	else if($resultat['grade']==2){
		echo "Votre compte est en cours d'approbation par nos administrateurs";
		include('login.php');
	}
	else if(($resultat['grade']==1)||($resultat['grade']==9999)){
	    session_start();
	    if($typeUtilisateur == "Producteur"){
			$_SESSION['id'] = $resultat['IdPro'];
		}
		else {
			$_SESSION['id'] = $resultat['id_Client'];
		}
		
		$_SESSION['grade'] = $resultat['grade'];
		header('Location: consul.php');    
		}
?>