<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location: accueil.php'); 
}
else{
    header('Location: Log.php');
}
?>

