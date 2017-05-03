<?php require "/includes/db.php";
    session_start();
    // Récupération de l'ID du producteur, que l'on utilisera tous le long ensuite
    $idPro = $_SESSION['id'];
    //On regarde si c'est bien un poducteur 
    $_SESSION['grade']; if($_SESSION['grade']==0) header('Location: login.php'); ?>