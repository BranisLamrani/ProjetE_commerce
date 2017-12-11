<?php
include 'includes/connexionBDD.php';
$reponse = $dbh->query('SELECT * FROM vehicule');


// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())

{

    ?>

    <p>

        <strong>Jeu</strong> : <?php echo $donnees['matricule']; ?><br />

        Le possesseur de ce jeu est : <?php echo $donnees['modele']; ?>, et il le vend à <?php echo $donnees['prixheure']; ?> euros !<br />

        Ce jeu fonctionne sur <?php echo $donnees['couleur']; ?> et on peut y jouer à <?php echo $donnees['categorie']; ?> au maximum<br />



    </p>

    <?php

}


$reponse->closeCursor(); // Termine le traitement de la requête


?>
