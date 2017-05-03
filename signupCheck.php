<?php require "/includes/db.php"; ?>
<?php

	function getIdUser($bdd, $typeUtilisateur){
		if($typeUtilisateur == "Producteur"){
			$query = $bdd->query('SELECT idPro FROM Producteur');
			$typeClient = 'idPro';
		}
		else{
			$query = $bdd->query('SELECT id_Client FROM Client');
			$typeClient = 'id_Client';
		}
		$id = 0;

		while($res = $query->fetch()){
			if($res[$typeClient] >= $id){
				$id = $res[$typeClient] + 1 ;
			}
		}

		return $id;
	}

	$typeUtilisateur = $_POST['typeUtilisateur'];

	if($typeUtilisateur == "Producteur"){
		$idType = "idPro";
	}
	else{
		$idType = "id_Client";
	}

	$nomClient = $_POST['nomClient'];
	$adresseClient = $_POST['adresseClient'];
	$nomResponsable = $_POST['nomResponsable'];
	$prenomResponsable = $_POST['prenomResponsable'];
	$nomUtilisateur = $_POST['nomUtilisateur'];
	$mdp = $_POST['mdp'];

	if($typeUtilisateur == "Producteur"){
		$req = $bdd->prepare('SELECT idPro FROM Producteur WHERE nomUtilisateur = :login');
	}
	else{
		$req = $bdd->prepare('SELECT id_Client FROM Client WHERE nomUtilisateur = :login');
	}
	$req->execute(array(
	    'login' => $nomUtilisateur
		));
	
	if ($resultat = $req->fetch()){
	    echo "Le nom d'utilisateur a déjà été pris";
		include('signup.php');
	}
	else{
		$idUser = getIdUser($bdd,$typeUtilisateur);

		if($typeUtilisateur == "Producteur"){
			$inscription = $bdd->prepare('INSERT INTO Producteur VALUES(:id,:nomClient,:adresseClient,:nomResponsable,:prenomResponsable,:nomUtilisateur,:mdp,2)');		
		}
		else{
			$inscription = $bdd->prepare('INSERT INTO Client VALUES(:id,:nomClient,:adresseClient,:nomResponsable,:prenomResponsable,:nomUtilisateur,:mdp,2)');		
		}
		$inscription->execute(array(
			'id'=>$idUser,
			'nomClient'=> $nomClient,
			'adresseClient'=> $adresseClient,
			'nomResponsable'=> $nomResponsable,
			'prenomResponsable'=> $prenomResponsable,
			'nomUtilisateur'=> $nomUtilisateur,
			'mdp'=> $mdp
			));

		echo('Votre inscription a bien été prise en compte, vous serez notifié lorsque l\'administrateur aura approuvé votre inscription');
		include('login.php');
	}
?>