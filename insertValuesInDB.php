<?php 
	require "/includes/db.php";
	session_start();
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idPro = $_SESSION['id'];
    //Ont regarde si ces bien un poducteur 
    $_SESSION['grade']; if($_SESSION['grade']==0) header('Location: login.php');

    $query = $bdd->prepare("INSERT INTO Commune(AOC,nom) VALUES ('0','Grenoble'),('1','Lyon')");
    $query->execute();
    $query = $bdd->prepare("INSERT INTO Variete(AOC,libelle) VALUES ('1','Franquette'),('0','Mayette'),('1','Parisienne')");
    $query->execute();
    $query = $bdd->prepare("INSERT INTO Producteur(Nom,Adresse,nomResponsable,prenomResponsable,nomUtilisateur,mdp,grade) VALUES ('Admin','Admin','Admin','Admin','admin','admin',9999)");
    $query->execute();
	$query = $bdd->prepare("INSERT INTO Verger(superficie,nbArbreParHectar,idPro,idCommune,idVariete) VALUES (50000,1000,1,2,1)");
    $query->execute();
	$query = $bdd->prepare("INSERT INTO Verger(superficie,nbArbreParHectar,idPro,idCommune,idVariete) VALUES (25000,500,1,2,2)");
    $query->execute();
	$query = $bdd->prepare("INSERT INTO Verger(superficie,nbArbreParHectar,idPro,idCommune,idVariete) VALUES (25000,500,1,2,3)");
    $query->execute();
	$query = $bdd->prepare("INSERT INTO Livraison(dateLivraison,quantite,calibre,idVer) VALUES ('2012-12-05',500,200,1)");
    $query->execute();
	$query = $bdd->prepare("INSERT INTO Livraison(dateLivraison,quantite,calibre,idVer) VALUES ('2012-12-06',150,200,2)");
    $query->execute();
	$query = $bdd->prepare("INSERT INTO Livraison(dateLivraison,quantite,calibre,idVer) VALUES ('2012-12-05',250,300,3)");
    $query->execute();
?>