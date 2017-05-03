<!DOCTYPE html>
<html>
<head>
    <?php require "/includes/db.php";
    session_start();
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idPro = $_SESSION['id'];
    //Ont regarde si ces bien un poducteur
    $_SESSION['grade']; if($_SESSION['grade']==0) header('Location: login.php');

    include('/includes/titleAndImports.php');
    ?>

</head>
<body>
<?php include('/includes/header.php'); ?>
<div class="page-content">
    <div class="row">
        <?php include('/includes/menu.php'); ?>
        <div class="content-box-large">
            <div class="panel-heading">
                <?php include('/includes/logo.php'); ?>
            </div>
            <?php
            $query = $bdd->query("SELECT numCommande,dateEnvoi FROM Commande WHERE '$idPro '= id_Client");
            $compt = 0;
            $dataCommande = $query->fetch();
            if(!($dataCommande)){
                ?>
                <div class="panel-title">Vous n'avez pas de commandes en cours</div>
                <?php
            }
            else {

                do{

                $compt = $compt+1;
                $idCommande = $dataCommande['numCommande'];
                ?>

                <div class="panel-heading">
                    <div class="panel-title">Commande n°
                        <?php
                            $dateEnvoi = $dataCommande['dateEnvoi'] ; // Récupération de la date d'envoi

                            echo $compt . " - date : " . $dateEnvoi;?></div>
                    <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Calibre</th>
                                    <th>Type de noix</th>
                                    <th>Quantité</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nbLigne = 1;
                                $tabCalibre = array();
                                $queryCommande=$bdd->query("SELECT * FROM Constituer INNER JOIN Variete ON Variete.idVariete = Constituer.idVariete WHERE numero='$idCommande'");

                                while($donnees=$queryCommande->fetch()){
                                    if(key_exists($donnees['calibre'],$tabCalibre)){
                                        if(key_exists($donnees['libelle'],$tabCalibre[$donnees['calibre']])){
                                            $quantiteStock = $tabCalibre[$donnees['calibre']][$donnees['libelle']];
                                            $quantiteStock = $quantiteStock + $donnees['quantite'];
                                            $tabCalibre[$donnees['calibre']][$donnees['libelle']] = $quantiteStock;
                                        }
                                        else{
                                            $tabCalibre[$donnees['calibre']][$donnees['libelle']] = $donnees['quantite'];
                                        }
                                    }
                                    else{
                                        $tabCalibre[$donnees['calibre']][$donnees['libelle']] = $donnees['quantite'];
                                    }
                                }
                                foreach ($tabCalibre as $keyCalibre => $valCalibre) {
                                    if ($valCalibre != 0) { ?>
                                        <tr class="odd gradeX">
                                        <td rowspan="<?php echo(count($tabCalibre[$keyCalibre])); ?>"><?php echo($keyCalibre); ?></td>

                                        <?php
                                        $nbLigne = 1;
                                        foreach ($valCalibre as $keyVariete => $quantite) {
                                            $libelleInput = "" . $keyCalibre . ";" . $keyVariete;

                                            if ($nbLigne == 1) {
                                                ?>
                                                <td><?php echo($keyVariete); ?></td>
                                                <td><?php echo($quantite); ?></td>
                                                </tr>
                                                <?php

                                            } else {
                                                ?>
                                                <tr>
                                                <td><?php echo($keyVariete); ?></td>
                                                <td><?php echo($quantite); ?></td>
                                                </tr><?php
                                            }

                                            $nbLigne = $nbLigne + 1;

                                        }
                                    }
                                }

                    } //Fermeture while
                    while ($dataCommande = $query->fetch());
                }
                ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../vendors/datatables/dataTables.bootstrap.js"></script>

<script src="../js/custom.js"></script>
<script src="../js/tables.js"></script>
</body>
</html>