<!DOCTYPE html>
<html>
  <head>
    <script src="../js/modifVergers.js"></script>
    <?php require "/includes/db.php";
    session_start();
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idClient = $_SESSION['id'];
    //On regarde si c'est bien un poducteur 
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
                $query = $bdd->query("SELECT numCommande, dateEnvoi FROM Commande WHERE '$idClient '= id_Client");

                $compt = 0;
                $dataVergers = $query->fetch();
                if(!($dataVergers)){
                  ?>
                  <div class="panel-title">Vous n'avez pas de vergers</div>
                  <?php
                }
                else {

                  do{

                    $compt = $compt+1;
                    $idVer = $dataVergers['idVer'];
              ?>
   
              <div class="panel-heading">
                <div class="panel-title">Vergers <?php echo $compt; ?></div>                    
                  <div class="panel-body">
                    <form id="variete<?php echo $compt;?>"class="form-horizontal" role="form" method="post">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Variété</label>                 <!-- 3 ET 4 -->
                        <div class="col-sm-6">
                          <input type="text" name="value" class="form-control" value="<?php echo $dataVergers['variete'];?>" />
                          <input type="text" name="typechamp" class="form-control" value="variete" style="display:none"/>
                          <input type="text" name="idVer" class="form-control" value="<?php echo $dataVergers['idVer'];?>" style="display:none"/>
                          <a href="modifVerger.php"><button class="btn btn-primary" onclick="modifForm('variete<?php echo $compt;?>')">Modifier</button></a>
                        </div>
                      </div>
                    </form>
                  </div>
                      
                  <div class="panel-body">
                    <form id="superficie<?php echo $compt;?>" class="form-horizontal" role="form" method="post">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Superficie</label>
                        <div class="col-sm-6">    
                          <input type="text" name="value" class="form-control" value="<?php echo $dataVergers['superficie'];?>" />
                          <input type="text" name="typechamp" class="form-control" value="superficie" style="display:none"/>
                          <input type="text" name="idVer" class="form-control" value="<?php echo $dataVergers['idVer'];?>" style="display:none"/>
                          <a href="modifVerger.php"><button class="btn btn-primary" onclick="modifForm('superficie<?php echo $compt;?>')">Modifier</button></a>
                        </div>
                      </div>
                    </form>
                  </div>
                         
                  <div class="panel-body">
                    <form id="localisation<?php echo $compt;?>" class="form-horizontal" role="form" method="post">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Localisation</label>                 <!-- 3 ET 4 -->
                        <div class="col-sm-6">
                          <input type="text" name="value" class="form-control" value="<?php echo $dataVergers['localisation'];?>" />
                          <input type="text" name="typechamp" class="form-control" value="localisation" style="display:none"/>
                          <input type="text" name="idVer" class="form-control" value="<?php echo $dataVergers['idVer'];?>" style="display:none"/>
                          <a href="modifVerger.php"><button class="btn btn-primary" onclick="modifForm('localisation<?php echo $compt;?>)'">Modifier</button></a>
                        </div>
                      </div>
                    </form>
                  </div>
                         
                  <div class="panel-body">
                    <form id="nbArbreParHectar<?php echo $compt;?>" class="form-horizontal" role="form" method="post">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nombre d'arbres(/hec)</label>                 <!-- 3 ET 4 -->
                        <div class="col-sm-6">
                          <input type="text" name="value" class="form-control" value="<?php echo $dataVergers['nbArbreParHectar'];?>" />
                          <input type="text" name="typechamp" class="form-control" value="nbArbreParHectar" style="display:none"/>
                          <input type="text" name="idVer" class="form-control" value="<?php echo $dataVergers['idVer'];?>" style="display:none"/>
                          <a href="modifVerger.php"><button class="btn btn-primary" onclick="modifForm('nbArbreParHectar<?php echo $compt;?>)'">Modifier</button></a>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php

                      } //Fermeture while
                      while ($dataVergers = $query->fetch());
                    }
                  ?>
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