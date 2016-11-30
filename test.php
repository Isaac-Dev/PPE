<?PHP
// try
      // {
       // $bdd = new PDO('mysql:host=localhost;dbname=adherent', 'root', 'root');
       // $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // }
    // catch(Exception $e)
     // {
      // die('Erreur : '.$e->getMessage());
     // }
	 
	 // $reponse = $bdd->query('SELECT * FROM adherent ');


// while ($donnees = $reponse->fetch())
// {
     // echo $donnees['nom'] . ' prenom ' . $donnees['prenom'] . '<br />';
// }

// $reponse->closeCursor();


?>
<html>
<?php   
     
$pdo = new PDO('mysql:host=localhost;dbname=adherent', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM adherent';   
$req = $pdo->query($sql);   
    
?>
<?php while($row = $req->fetch()) { ?>
<table>
<td><?php echo $row['nom']; ?></td>
<th><?php echo $row['prenom'];?></th>
<th><?php echo $row['dateNaissance'];?></th>
</table>
 
<?php }   
$req->closeCursor();   
?>

</html>