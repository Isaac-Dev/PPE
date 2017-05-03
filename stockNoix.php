
<?php require "/includes/db.php";
    session_start();
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idPro = $_SESSION['id'];
    //Ont regarde si ces bien un poducteur 
    $_SESSION['grade']; if($_SESSION['grade']==0) header('Location: login.php');

    $tabVariete = array();
    $tabNbNoix = array();
    $quantiteStock = 0;

    $query = $bdd->query('SELECT * FROM `livraison`
                                    INNER JOIN verger on verger.idVer = livraison.idVer
                                    INNER JOIN variete on variete.idVariete = verger.idVariete');
    while($donnees=$query->fetch()){
    	if(key_exists($donnees['libelle'],$tabVariete)){
    	    $quantiteStock = $tabVariete[$donnees['libelle']];
    	    $quantiteStock = $quantiteStock + $donnees['quantite'];
    	    $tabVariete[$donnees['libelle']] = $quantiteStock;

        }
        else{
            $tabVariete[$donnees['libelle']] = $donnees['quantite'];
        }
    }
?>


