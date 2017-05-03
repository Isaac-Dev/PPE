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
              <div class="panel-heading">
                <div class="panel-title">Bienvenue sur votre espace personnel</div>                    <!-- 1 ET 2 -->
              </div>
              <div class="panel-heading">
                <div class="panel-title">
                  <?php
                    $query = $bdd->query("SELECT nomResponsable, prenomResponsable FROM Producteur WHERE IdPro = '$idPro'"); // Mettre sous forme de tableau le nom et le prénom du responsable
                    if($donnee = $query->fetch()){
                    $respNom = $donnee[0];
                    $respPrenom = $donnee[1]; 
                    
                    echo $donnee[0] . " " . $respPrenom; }
                    else {echo "non";
                  };
                                ?></div>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" action="modification.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nom de l'entreprise</label>                 <!-- 3 ET 4 -->
                    <div class="col-sm-6">
                      <span class="form-control"><?php
                        
                        $query = $bdd->query("SELECT nom FROM Producteur WHERE '$idPro' = IdPro");
                        $donnee = $query->fetch();
                        $nomEntreprise = $donnee['nom'] ; // Récupération du nom de l'entreprise

                       echo $nomEntreprise ?></span>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Adresse</label>                             <!-- 5 ET 6 -->
                    <div class="col-sm-6">
                      <?php
                        $query = $bdd->query("SELECT adresse FROM Producteur WHERE '$idPro' = IdPro");
                        $donnee = $query->fetch();
                        $adresse = $donnee[0]; // Récupération de l'adresse de l'entreprise ?>
                      <input type="text" class="form-control" placeholder="" value="<?php echo $adresse ?>" name="adresse" id="adresse"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Adhérent</label>
                    <span class="form-control">
                      <?php 
                        $query = $bdd->query("SELECT producteur.IdPro FROM producteur, adherent WHERE producteur.IdPro = adherent.IdPro AND adherent.IdPro = '$idPro' ");
                        // La requête renvoit, ou non une valeur
                        $donnee = $query->fetch();
                        if ($donnee != ''){ 
                          $adherent = "Oui"; // Si la requête renvoie quelque chose, on affecte la chaine "Oui"
                        }
                        
                        else { 
                          $adherent = "Non"; // Si la requête renvoie RIEN, on affecte la chaine "Non"
                        }
                        echo $adherent; ?>
                    </span>
                  </div>
              <?php 
                // Si le producteur est adhérent, alors on ajoute le code HTML pour afficher la date d'adhésion
                if($adherent == "Oui"){
              ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Date d'adhésion</label>
                  <span class="form-control">
                    <?php

                    $query = $bdd->query("SELECT dateDadhesion FROM Adherent WHERE '$idPro' = Adherent.IdPro");
                    $donnee = $query->fetch();
                    $dateAdhe = $donnee[0];
                    echo $dateAdhe ?> 
                  </span>
                </div>
              <?php
                }; //Fermeture if
              ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Certification</label>
                    <span class="form-control">
                      <?php
                        $query = $bdd->query("SELECT Certification.IdCertification FROM Certification, Obtenir WHERE '$idPro' = Obtenir.IdPro AND Obtenir.IdCertification = Certification.IdCertification");
                        if ($donnee = $query->fetch()){
                          $certif = "Oui";  // Si la requête renvoie quelque chose, on affecte la chaine "Oui"
                        }
                        else {
                          $certif = "Non"; // Si la requête renvoie RIEN, on affecte la chaine "Non"
                        }
                        echo $certif 
                      ?>
                    </span>
                  </div>
                  <?php 
                  // Si le producteur a une certification, alors on ajoute le code HTML pour afficher la date dobtention
                    if($certif == "Oui"){
                  ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date obtention</label>
                    <span class="form-control">
                    <?php 
                      $query = $bdd->query("SELECT Obtenir.dateObtention FROM Obtenir, Certification WHERE '$idPro' = Obtenir.IdPro AND Obtenir.IdCertification = Certification.IdCertification");
                      $donnee = $query->fetch();
                      $dateObten = $donnee[0];
                      echo $dateObten ?>
                    </span>
                  </div>
                  <?php
                    } //Fermeture if
                  ?>
                  <input type="hidden" id="idPro" name="idPro" value="<?php echo $idPro ;?>"> 
                  <a href="modification.php"><button type="submit" class="btn btn-lg btn-block btn-primary">Modifier les infos</button></a>
                <a href="vergers.php"><button type="button" class="btn btn-lg btn-block btn-primary">Vos vergers</button></a>
                <a href="commandes.php"><button type="button" class="btn btn-lg btn-block btn-primary">Vos commandes</button></a>
                </form>
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