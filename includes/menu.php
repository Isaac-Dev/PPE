<?php 
    $idPro = $_SESSION['id'];
    $grade = $_SESSION['grade'];

?>

<div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="consul.php"><i class="glyphicon glyphicon-home"></i>Profil</a></li>
                    <li><a href="vergers.php"><i class="glyphicon glyphicon-tree-deciduous"></i>Mes vergers</a></li>
                    <li><a href="mesCommandes.php"><i class="glyphicon glyphicon-barcode"></i>Mes commandes</a></li>
                    <li><a href="adherent.php"><i class="glyphicon glyphicon-list"></i>Listes des Adherent</a></li>
                    <li><a href="stockNoix.php"><i class="glyphicon glyphicon-list"></i>StockNoix</a></li>
                    <li><a href="nouvelleCommande.php"><i class="glyphicon glyphicon-list"></i>Nouvelle commande</a></li>
                    <?php 
                        if($grade == 9999){
                            ?><li><a href="administrationComptes.php"><i class="glyphicon glyphicon-tower"></i>Administration</a></li><?php
                            ?><li><a href="insertValuesInDB.php"><i class="glyphicon glyphicon-tower"></i>Ajouter les values dans la BDD</a></li><?php
                        }
                    ?>
                    
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i>Forms</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Commandes
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="nouvelleCommande.php">Nouvelle commande</a></li>
                            <li><a href="signup.html">Mes commandes</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>