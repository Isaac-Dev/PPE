<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/ajax.js"></script>
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="../vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="../vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="../vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="../css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include("includes/header.php") ?>
      <div class="page-content">
    	   <div class="row">
		    <div class="col-md-2">
		<?php  include("includes/menu.php") ?>
		</div>
<?php
try
      {
       $bdd = new PDO('mysql:host=localhost;dbname=agrur', 'root', 'root');
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    catch(Exception $e)
     {
      die('Erreur : '.$e->getMessage());
     }	 
?>
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Logo à placer</div>
          <!--<a ="/images/logo.png" /> -->
				</div>
        <?php
         // Requête SQL - Récupération du numéro de livraison
          $numeroLiv = "xxxx";
          $login = "sibnmassoul";
          $password = "isofiane";
          // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
          $query = $bdd->query("SELECT IdPro FROM Producteur WHERE nomUtilisateur='$login'  AND mdp='$password'");
          $donnee = $query->fetch();
          $idPro = $donnee['IdPro'];
          // A remplacer par la requête ci-dessous // Jeu de test 1 : "0001"
          // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
          $query->closeCursor();
          $query = $bdd->query("SELECT variete, superficie, localisation, nbArbreParHectar FROM Verger WHERE '$idPro '= IdPro");

          $compt = 0;

          while ($dataVergers = $query->fetch()){

          $compt = $compt+1;
          

        ?>
        
          
            
        <div class="panel-heading">
                <div class="panel-title">Vergers <?php echo $compt; ?></div>                    
                <div class="panel-body">
                  <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Variété</label>                 <!-- 3 ET 4 -->
                    <input type="text" name="variete" class="form-control" value="<?php echo $dataVergers['variete'];?>" />
                    <button class="btn btn-primary" type="button" onclick="<?php //query ?>">Modifier</button>
                    </div>
                  </div>
                  

                <div class="panel-body">
                  <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Superficie</label>                 <!-- 3 ET 4 -->
                    <input type="text" name="superficie" class="form-control" value="<?php echo $dataVergers['superficie'];?>" />
                    <button class="btn btn-primary" type="button" onclick="<?php //query ?>">Modifier</button>
                    </div>
                  </div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Localisation</label>                 <!-- 3 ET 4 -->
                    <input type="text" name="localisation" class="form-control" value="<?php echo $dataVergers['localisation'];?>" />
                    <button class="btn btn-primary" type="button" onclick="<?php //query ?>">Modifier</button>
                    </div>
                  </div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nombre d'arbres(/hec)</label>                 <!-- 3 ET 4 -->
                    <input type="text" name="nbArbre" class="form-control" value="<?php echo $dataVergers['nbArbreParHectar'];?>" />
                    <button class="btn btn-primary" type="button" onclick="<?php //query ?>">Modifier</button>
                    </div>
                  </div>
                    <?php

                    } //Fermeture while

                    ?>
                </form>
                </div>
		  </table>
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