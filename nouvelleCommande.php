<!DOCTYPE html>
<html>
  <head>
    <?php require "/includes/db.php";
    session_start();
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idPro = $_SESSION['id'];
    //On regarde si c'est bien un producteur 
    $_SESSION['grade']; if($_SESSION['grade']==0) header('Location: login.php');
    include('/includes/titleAndImports.php');

    $tabCalibre = array();
    $tabNbNoix = array();
    $quantiteStock = 0;

    // On récupère tous les stocks amenés par les producteurs
    $query = $bdd->query('SELECT * FROM `livraison`
                                    INNER JOIN verger on verger.idVer = livraison.idVer
                                    INNER JOIN variete on variete.idVariete = verger.idVariete');
    while($donnees=$query->fetch()){
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

    //On récupère toutes les commandes effectuées par les client, qu'on soustrait au stock précédemment obtenu.
    $query = $bdd->query('SELECT * FROM Constituer 
                                    INNER JOIN variete on variete.idVariete = constituer.idVariete');
    while($donnees=$query->fetch()){
        if(key_exists($donnees['calibre'],$tabCalibre)) {
            if (key_exists($donnees['libelle'], $tabCalibre[$donnees['calibre']])) {
                $quantiteStock = $tabCalibre[$donnees['calibre']][$donnees['libelle']];
                $quantiteStock = $quantiteStock - $donnees['quantite'];
                $tabCalibre[$donnees['calibre']][$donnees['libelle']] = $quantiteStock;
            }
        }
    }
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
                        <div class="panel-body">

                            <form action="bonDeCommande.php" id="listeProduits"  method="post" onsubmit="return true;">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                    <thead>
                                    <tr>
                                        <th>Calibre</th>
                                        <th>Type de noix</th>
                                        <th>Quantité restante</th>
                                        <th>Quantité souhaitée</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $nbLigne = 1;
                                        foreach ($tabCalibre as $keyCalibre => $valCalibre){ ?>
                                            <tr id="<?php echo($keyCalibre);?>" class="odd gradeX">
                                                <td rowspan="<?php echo(count($tabCalibre[$keyCalibre])); ?>"><?php echo($keyCalibre); ?></td>

                                        <?php
                                            $nbLigne = 1;
                                            foreach ($valCalibre as $keyVariete => $quantite){
                                                $libelleStock = "" . $keyCalibre .";" . $keyVariete . ";" . $quantite;
                                                if($nbLigne == 1){?>
                                                    <td id="nomVariete"><?php echo($keyVariete);?></td>
                                                    <td id="quantite"><?php echo($quantite); ?><input id="input" type="text" name="<?php echo($libelleStock); ?>" style="visibility: hidden"></td>
                                                    <td id="quantiteVoulue"><input id="input" class="form-control" type="text" name="<?php echo($libelleStock); ?>"></td>
                                                    </tr>
                                                    <?php
                                                }
                                                else{?>
                                                    <tr id="<?php echo($keyCalibre);?>" class="odd gradeX">
                                                        <td id="nomVariete"><?php echo($keyVariete);?></td>
                                                        <td id="quantite"><?php echo($quantite);?><input id="input" type="text" name="<?php echo($libelleStock); ?>" style="visibility: hidden"></td>
                                                        <td id="quantiteVoulue"><input id="input" class="form-control" type="text" name="<?php echo($libelleStock); ?>"></td>
                                                    </tr><?php
                                                }
                                                $nbLigne = $nbLigne + 1;
                                            }
                                    ?>

                                    <?php
                                        }
                                    ?>
                                    <tr><td colspan="4"><button type="submit" onclick="window.location='bonDeCommande.php'">Confirmer la commande</button></td></tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>

		        </div>
        </div>
    </div>
    </div>
      <link href="../vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="../vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="../js/custom.js"></script>
    <script src="../js/tables.js"></script>
  </body>
</html>