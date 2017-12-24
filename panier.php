<?php 
session_start();
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
            <a href="accueil.php"><img src="images/icone/home.png"></a><br>
              <span>Accueil</span>
          <hr>
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
          
           <div class="contenu box" style="overflow-y:hidden;">    
                    
                    <?php
                    
                        for($i=0;$i<count($_SESSION['panier']);$i++){
                             
include 'includes/connexionBDD.php';
$requete = $dbh->prepare('SELECT * FROM vehicule WHERE id=:id');
$requete->bindParam(':id',$_SESSION[$i]);
$requete->execute();
$infocar=$requete->fetch();
?>        
            <div class="ui divided items">
              <div class="item">
                <div class="image">
                  <img src="<?php echo $infocar['image'];?>" style="height: 150px;width: 160px;">
                </div>
                <div class="content">
                  <a class="header"><?php echo $infocar['marque'];?></a>
                  <div class="meta">
                    <span class="cinema"><?php echo 'Modèle: '.$infocar['modele'];?></span>
                  </div>

                              <div class="extra">
                                <div class="ui label">
                                <?php 
                                if($infocar['categorie']!=null)
                                {
                                    echo 'Catégorie: '.$infocar['categorie'];
                                }
                                else{
                                    echo 'Catégorie: ---';
                                } 
                                    ?></div>

                              </div>
                                   <div class="description">
                    <p><?php echo $infocar['description'];?></p>
                  </div>
                   <div class="extra">
                    </div>
                </div>
              </div>
              <hr class="carligne">
            </div>
           
            <?php
        }
        $requete->closeCursor(); // Termine le traitement de la requête
        ?>
                        }
               
               
               
               
               ?>
           </div> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>


</body>
</html>