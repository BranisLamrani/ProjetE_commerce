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
<?php
include 'includes/connexionBDD.php';
$requete = $dbh->query('SELECT * FROM vehicule');
?>
    <div class="ui link special cards">
        <?php
        while($infocar = $requete->fetch()){
        ?>
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui inverted dimmer">
                    <div class="content">
                        <div class="center">
                            <a href="info.php?id=<?php echo $infocar['ID'] ?>">
                            <div class="ui primary button">Information</div>
                            </a>
                        </div>
                    </div>
                </div>

                <img src="<?php echo $infocar['image'];?>">

            </div>
            <div class="content">
                <a class="header"><?php echo $infocar['marque'];?></a>
                <div class="meta">
                    <span class="date"><?php echo 'Modèle: '.$infocar['modele'];?></span>
                </div>
            </div>
            <div class="extra content">
                <a>
                    <i class="shop icon"></i>
                    <?php echo $infocar['prixheure'].' Euro/heure';?>
                    <?php echo $infocar['ID']?>
                </a>
            </div>
        </div>
            <?php
        }
        $requete->closeCursor(); // Termine le traitement de la requête
        ?>
    </div>

<script>$('.special.cards .image').dimmer({
        on: 'hover'
    });</script>
</body>

</html>
<?php echo "info.php?id=".$infocar['id'] ?>
<?php echo $infocar['image'];?>
<?php echo $infocar['marque'];?>
<?php echo 'Modèle: '.$infocar['modele'];?>
<?php echo $infocar['prixheure'].' Euro/heure'; ?>
