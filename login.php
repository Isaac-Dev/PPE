<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<?php include('/includes/header.php') ?>
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
					<form action="connexion.php" method="post" class="box">
			            <div class="content-wrap">
			                <h6>Connexion</h6>
			                <label>Vous êtes :</label>
			                <select class="form-control" id="select-1" name="typeUtilisateur">
								<option value="Producteur">Producteur</option>
								<option value="Client">Client</option>
								<option value="Producteur">Administrateur</option>
							</select>
			                <input class="form-control" type="text" placeholder="Nom Utilisateur " name="login">
			                <input class="form-control" type="password" placeholder="Mot de passe" name="mdp">
							<p id="fail"></p>
			                <div class="action">
			                    <input class="btn btn-primary signup" type="submit" value="Connexion" onclick="window.location='connexion.php'" />
			                </div>                
			            </div>
			        </form>
			        <div class="already">
			            <p>Toujours pas de compte?</p>
			            <a href="signup.php">S'inscrire</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
	
  </body>
</html>