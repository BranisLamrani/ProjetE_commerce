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
    <link rel="stylesheet" href="css/putvehicule.css">
    <link rel="stylesheet" href="css/owncar.css">
    <style>
     /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
} 
    </style>
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
     
<div class="ui equal width center aligned padded grid">
    <div class="ui top attached tabular menu" >
      <a class=" active item" data-tab="first">Mes véhicules en location</a>
      <a class="  item" data-tab="second">Mettre à louer</a>

    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
            <?php include 'owncar.php';?>
    </div>
    <div class="ui bottom attached tab segment put-ve" data-tab="second">
            <?php include 'PutVehicule.php'; ?>
    </div>
</div>

            <div id="myModal" class="modal"></div> 
<!-- The Modal -->
<div id="delete" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div> 

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>

<script>
$('.menu .item')
  .tab()
;    
</script>
</body>
</html>












