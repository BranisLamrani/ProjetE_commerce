<?php

$requete=$dbh->('DELETE FROM vehicule WHERE ID=:ID');
$requete->bindParam(':ID',$_GET['id']);
$requete->execute();
?>