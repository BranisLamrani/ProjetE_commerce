<?php
include 'includes/connexionBDD.php';
$requete= $dbh->query('SELECT INTO nom,prenom FROM utilisateurs');
$infoUser=$requete->fetch();
$prenom=$infoUser['prenom'];
$nom=$infoUser['nom'];
echo  $prenom=$infoUser['prenom'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/semantic/semantic/dist/semantic.min.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="css/semantic/semantic/dist/semantic.min.js"></script>
</head>
<body>
<div class="ui grid">
    <div class="row">
        <div class="three wide olive column" style="height:1000px;">
            <img  class="ui small circular image centered" src="images/vehicule/photo5a2d9a97701f6.jpg">
            <br>
            <br>
            <p>nom prenom </p>
            <p>Localisation</p>

        </div>
    </div>
</div>

</body>
</html>
