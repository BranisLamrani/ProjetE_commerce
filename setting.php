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
      
      <!--Materialize -->
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
       
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="css/setting.css">
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
   <div class="contenu">
        <div class="ui top attached tabular menu">
          <a class="item active" data-tab="first">Mon profil</a>
          <a class="item" data-tab="second">Coordonnée</a>
          <a class="item" data-tab="third">Contact</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <div class="ui equal width aligned grid">
              <div class="row">
                <div class="column my-img">
                  <img class="ui small circular image" src="<?php echo $_SESSION['pic'];?>" 0le="z-index:1000;">
                </div>
                <div class="column profil">
                    <form method="POST">
                    <div class="ui form">
                      <div class="fields">
                        <div class="field">
                          <label>Nom:</label>
                          <input type="text"  style="color:black" value="<?php echo $_SESSION['nom']; ?>">
                        </div>
                        <div class="field">
                          <label>Prénom:</label>
                          <input type="text" style="color:black" value="<?php echo $_SESSION['prenom']; ?>">
                        </div>
                      </div>
                      <div class="inline fields birth">
                        <label>Date de naissance</label>
                        <div class="field">
                            <select class="ui dropdown">
                              <option value="">Jour</option>
                              <?php
                                for($i=0;$i<32;$i++){
                                ?>
                              <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                              <?php  } ?>
                            </select>
                        </div>
                        <div class="field">
                            <select class="ui dropdown">
                              <option value="">Mois</option>
                              <option value="Janvier">Janvier</option>
                              <option value="Février">Février</option>
                              <option value="Mars">Mars</option>
                              <option value="Avril">Avril</option>
                              <option value="Mai">Mai</option>
                              <option value="Juin">Juin</option>
                              <option value="Juillet">Juillet</option>
                              <option value="Août">Août</option>
                              <option value="Septembre">Septembre</option>
                              <option value="Octobre">Octobre</option>
                              <option value="Novembre">Novembre</option>
                              <option value="Décembre">Décembre</option>                                         
                            </select>
                        </div>
                        <div class="field">
                            <select class="ui dropdown">
                              <option value="">Année</option>
                              <?php
                                for($i=1900;$i<2018;$i++){
                                ?>
                              <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                              <?php  } ?>
                            </select>                                    
                            
                        </div>
                      </div>
                    </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
          sdfsdfsdf
        </div>
        <div class="ui bottom attached tab segment" data-tab="third">
          Third
        </div>
   </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>

<script>
$('.demo.sidebar')
  .sidebar('setting', 'transition', 'overlay')
  .sidebar('toggle')
;    
</script>
<script>
    $('.menu .item')
  .tab()
;
</script>
</body>
</html>