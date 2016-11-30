<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Bootstrap Admin Theme</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li class="current"><a href="Adherent.php"><i class="glyphicon glyphicon-list"></i> Informations Entreprise</a></li>
                    <li><a href="regle.php"><i class="glyphicon glyphicon-list"></i> Reglement des cotisation</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
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
          $login = "AFFECTER LE NOM D'UTILISATEUR DU CLIENT ICI";
          $password = "AFFECTER LE MDP DU CLIENT ICI";
          $idPro = "idPro"; // A remplacer par la requête ci-dessous
          // "SELECT IdPro FROM Producteur WHERE ‘ + $login + ‘ = identifiant AND ‘ + $password + ‘ = mdp "; 
          // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
        ?>
        
          
            
                <div class="panel-heading">
                <div class="panel-title">Bienvenue sur votre espace personnel</div>                    <!-- 1 ET 2 -->
              </div>
              <div class="panel-heading">
                <div class="panel-title">
                  <?php
                    $resp[0] = "SELECT nomResponsable, prenomResponsable FROM Producteur WHERE ‘ + $idPro + ‘ = IdPro"; // Mettre sous forme de tableau le nom et le prénom du responsable

                    echo $resp[0] + " " + $resp[1];
                                ?></div>
              </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nom de l'entreprise</label>                 <!-- 3 ET 4 -->
                    <div class="col-sm-6">
                      <span class="form-control"><?php
                        $nomEntreprise = "SELECT nom FROM Producteur WHERE ‘ + $idPro + ‘ = IdPro"; // Récupération du nom de l'entreprise

                       echo $nomEntreprise ?></span>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Adresse</label>                             <!-- 5 ET 6 -->
                    <div class="col-sm-6">
                      <span class="form-control"><?php
                        $adresse = "SELECT adresse FROM Producteur WHERE ‘ + $idPro + ‘ = IdPro" ; // Récupération de l'adresse de l'entreprise

                       echo $adresse ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                      <label>Adhérent</label>
                      <span class="form-control"><?php 

                        $adherent = "SELECT IdPro FROM Producteur WHERE ‘ + $idPro + ‘ = Adherent.IdPro" ; // La requête renvoit, ou non une valeur
                        if ($adherent != ""){ 
                          //$adherent = "Oui"; // Si la requête renvoie quelque chose, on affecte la chaine "Oui"
                        }
                        
                        else { 
                          //$adherent = "Non"; // Si la requête renvoie RIEN, on affecte la chaine "Non"
                        }


                        echo $adherent;

                        ?>
                      </span>
                    </div>
                  </div>

                  <?php 
                    // Si le producteur est adhérent, alors on ajoute le code HTML pour afficher la date d'adhésion

                  if($adherent != ""){



                  ?>
                  <div class="form-group">
                      <label>Date d'adhésion</label>
                      <span class="form-control"><?php

                        $dateAdhe = "SELECT dateDadhesion FROM Adherent WHERE ‘ + $idPro + ‘ = Adherent.IdPro";

                        echo $dateAdhe;


                        ?>
                      </span>
                    </div>
                    <?php

                    } //Fermeture if

                    ?>
                  
                  
                    <div class="form-group">
                      <label>Certification</label>
                      <span class="form-control"><?php
                        $certif = "SELECT IdCertification FROM Certification WHERE ‘ + $idPro + ‘ = Obtenir.IdPro AND Obtenir.IdCertification = Certification.IdCertification";

                        if ($certif != ""){
                          //$certif = "Oui";  // Si la requête renvoie quelque chose, on affecte la chaine "Oui"
                        }
                        else {
                          //$certif = "Non"; // Si la requête renvoie RIEN, on affecte la chaine "Non"
                        }

                        echo $certif;
                        ?>
                      </span>
                    </div>

                    <?php 
                    // Si le producteur a une certification, alors on ajoute le code HTML pour afficher la date dobtention

                      if($certif != ""){



                    ?>





                    <div class="form-group">
                      <label>Date obtention</label>
                      <span class="form-control"><?php 

                          $dateObten = "SELECT dateObtention FROM Obtenir WHERE ‘ + $idPro + ‘ = Obtenir.IdPro AND Obtenir.IdCertification = Certification.IdCertification";

                          echo $dateObten;


                        ?>
                      </span>
                    </div>

                  <?php
                    } //Fermeture if
                  ?>

                  </div>


                <button type="button" class="btn btn-lg btn-block btn-primary">Vos vergers</button>

                <button type="button" class="btn btn-lg btn-block btn-primary">Vos livraisons</button>



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