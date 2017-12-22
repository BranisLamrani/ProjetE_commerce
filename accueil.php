<?php 
session_start();
include 'includes/connexionBDD.php';
$requete=$dbh->prepare('SELECT * from utilisateurs WHERE ID=:ID');
$requete->bindParam(':ID',$_SESSION['id'] ,PDO::PARAM_INT);
$requete->execute();
$infouser=$requete->fetch();

//Si l'utilisateur n'a pas de photo

        $_SESSION['pic']=$infouser['profilpic'];
        $_SESSION['nom']=$infouser['nom'];
        $_SESSION['prenom']=$infouser['prenom'];
        $_SESSION['adresse']=$infouser['adresse'];
        $_SESSION['birth']=$infouser['birth'];
        $_SESSION['contact']=$infouser['contact'];
        $_SESSION['coordonnee'] = $infouser['coordonnee'];
        if($infouser['coordonnee']){
            $infolieu = explode(";", $infouser['coordonnee']);
            $_SESSION['adresse'] = $infolieu[0];
            $_SESSION['postal'] = $infolieu[1];
            $_SESSION['ville'] = $infolieu[2];
        }
$requete->CloseCursor();

            $requete2=$dbh->prepare('SELECT * from images WHERE ID=:ID');
            $requete2->bindParam(':ID',$_SESSION['id']);
            $requete2->execute();
            $infopic=$requete2->fetch();
            $chemin=$infopic['Chemin'];
            if($chemin == null){
                $chemin='images\Profil\user-icon.png';
            }
            $_SESSION['pic']=$chemin;
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/semantic/semantic/dist/semantic.min.css">
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      
      <!--Semantic UI-->
      <link rel="stylesheet" type="text/css" href="framework/semantic/dist/semantic.min.css">
           <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
       
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="css/accueil.css">
</head>
<body>
  <nav class="navbar justify-content-between" style="background-color:#0D0C0C;">
  <a class="navbar-brand sticky-top">VShare</a>
  <form method="POST" action="deconnexion.php" class="form-inline">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Déconnexion</button>
  </form>
</nav>

      <div class="mymenu box">
          <img class="ui small centered circular image" src="<?php echo $_SESSION['pic'];?>" style="z-index:1000;">
          <br>
          <span> <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></span> 
          <br>
          <span> <?php echo $_SESSION['adresse'];?> </span>
          <br>
          <br>
        
          <div class="liens">

             <a href="mycar.php"><img src="images/icone/sports-car.png"></a><br>
              <span>Vos véhicules</span>
          <hr>
              <a href="panier.php"><img src="images/icone/shopping-cart.png"></a><br>
              <span>Mon Panier</span><br>
          <hr>
              <a href="setting.php"><img src="images/icone/settings.png"></a><br>      
              <span>Paramètre</span>
          <hr> 
          </div>
     </div>
          
          <div class="searchbox"> 
          <div class="ui fluid category search">
              <div class="ui inverted icon input">
               <i class="search icon"></i>
                <input class="searchbar" placeholder="Chercher un véhicule" type="text">
                
              </div>
              <div class="results"></div>
          </div>
          </div>
           <div class="contenu box">
                 
                    <?php include 'ShowVehicule.php'?>
           </div> 

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>


</body>
</html>