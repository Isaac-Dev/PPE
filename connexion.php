<?php require "db.php"; ?>
<?php
$login = $_POST['login'];
$pass = $_POST['mdp'];

$req = $bdd->prepare('SELECT IdPro,grade FROM producteur WHERE nomUtilisateur = :login AND mdp = :pass');
$req->execute(array(
    'login' => $login,
    'pass' => $pass));
	$resultat = $req->fetch();
	if (!$resultat)
{
    echo "Mauvais identifiant ou mot de passe !".'</div></body></html>';
	include('login.php');
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['IdPro'];
	$_SESSION['grade'] = $resultat['grade'];
    echo 'Vous êtes connecté !';
	echo $resultat['grade'];
	echo $resultat['IdPro'];
	}
?>