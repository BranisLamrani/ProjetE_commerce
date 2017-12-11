<?php
session_start();

if(isset($_POST['nom']) && isset($_POST['password'])){
    include 'includes/connexionBDD.php';
    $login = $dbh->prepare('SELECT ID FROM utilisateurs WHERE nom = :pseudo AND password = :password');
    $login->bindParam(':pseudo', $_POST['nom'], PDO::PARAM_STR);
    $login->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
    $login->execute();
    $user = $login->fetchAll();
    $_SESSION['user']=$user;
    if (count($user)>0) {
        $_SESSION['connected'] = true;
        $_SESSION['id'] = $user[0]['ID'];
        $_SESSION['pseudo'] = $_POST['nom'];
        echo "Les info sont correctes";
        if ($_SESSION['connected'] == true){
            header('Location: user.php');
        }
    } else {
        echo 'Connexion impossible. Veuillez réessayer.';
    }
    $login->closeCursor();

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="connexion.php">
        <input type="text" placeholder="Nom" name="nom">
        <input type="text" placeholder="Mot de passe" name="password">
        <button type="submit">Valider</button>

    </form>
</body>
</html>

