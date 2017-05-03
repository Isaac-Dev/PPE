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
					<div class="panel-title">Formulaire de livraison</div>
				</div>
        <?php
        

        ?>
                <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">Bootstrap dataTables</div>
        </div>
          <div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
              <tr>
                <th>Calibre</th>
                <th>Type de noix</th>
                <th>Poids</th>
                <th>CSS grade</th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd gradeX">
                <td rowspan="2">Trident</td>
                <td>Internet
                   Explorer 4.0</td>
                <td>Win 95+</td>
                <td class="center"> 4</td>
                <td class="center">X</td>
              </tr>
              <tr class="odd gradeX">
               
                <td>Internet
                   Explorer 4.0</td>
                <td>Win 95+</td>
                <td class="center"> 4</td>
                <td class="center">X</td>
              </tr>
              
            </tbody>
          </table>
          </div>
        </div>
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