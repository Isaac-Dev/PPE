 <?php
if(isset($_POST['nom']))      $nom=$_POST['nom'];
else      $nom="";

if(isset($_POST['prenom']))      $prenom=$_POST['prenom'];
else      $prenom="";

if(isset($_POST['email']))      $email=$_POST['email'];
else      $email="";

if(isset($_POST['icq']))      $icq=$_POST['icq'];
else      $icq="";

if(isset($_POST['titre']))      $titre=$_POST['titre'];
else      $titre="";

if(isset($_POST['url']))      $url=$_POST['url'];
else      $url="";
if(isset($_POST['username']))      $username=$_POST['username'];
else      $url="";
if(isset($_POST['mdp']))      $url=$_POST['mdp'];
else      $url="";


if(empty($nom) OR empty($prenom) OR empty($email) OR empty($titre) OR empty($url))
    {
    echo '<font color="red">Attention, seul le champs <b>ICQ</b> peut rester vide !</font>';
    }


else     
    {

$db = mysql_connect('localhost', 'login', 'password')  or die('Erreur de connexion '.mysql_error());

    mysql_select_db('nom_de_la_base',$db)  or die('Erreur de selection '.mysql_error());
    $sql = "INSERT INTO infos_tbl(id, nom, prenom,email, icq, titre, url) VALUES('','$nom','$prenom','$email','$icq','$titre','$url')";

    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
    echo 'Vos infos on été ajoutées.';

    mysql_close();  // on ferme la connexion
    } 
?> 