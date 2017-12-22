<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/semantic/semantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<div  class="col s9 offset-s3">
<nav class="nav-extended">
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1">Test 1</a></li>
        <li class="tab"><a class="active" href="#test2">Test 2</a></li>
        <li class="tab"><a href="#test3">Disabled Tab</a></li>
        <li class="tab"><a href="#test4">Test 4</a></li>
      </ul>
    </div>
  </nav>
</div> 
<div class="ui left demo vertical inverted sidebar labeled icon menu">
  <a class="item" href="ShowVehicule.php">
    <i class="home icon"></i>
    Accueil
  </a>
  <a class="item">
    <i class="block layout icon"></i>
    Galèrie
  </a>
  <a class="item">
    <i class="smile icon"></i>
    Profil
  </a>
</div>
 <div class="ui basic icon top fixed menu">
  <a id="toggle" class="item">
    <i class="sidebar icon"></i>
    Menu
  </a>
</div>
  <div class="pusher">
    <!-- Site content !-->
  
<?php
include 'includes/connexionBDD.php';
      echo 'mon id qui reste est'.$_SESSION['id'];
$requete = $dbh->prepare('SELECT * FROM vehicule WHERE IDuser=:IDuser');
$requete->bindParam(':IDuser',$_SESSION['id']);
$requete->execute();
?>

<div class="ui equal width center aligned padded grid">
  <div class="row">
    <div class="column">
      
    </div>
  </div>
  <div class="row" style="background-color: #240907;color: #FFFFFF;">
    <div class="column">Mes voitures </div>
  </div>
  <div class="row">
    <div class="column">
      
    </div>
    <div class=" column">
      
    </div>
  </div>
</div>
<div class="ui relaxed grid">
  <div class="three column row">
    <div class="column">
        
    </div>
    <div class="column">
               
            <div class="ui link special cards small" div="mycar">
    <?php
    while($infocar = $requete->fetch()){
        ?>
        <div class="card" id="">
            <div class="blurring dimmable image">
                <div class="ui inverted dimmer">
                    <div class="content">
                        <div class="center">
                            <div class="ui primary button">Information</div>
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
                    <i class="delete icon"></i>
                    <?php echo "Supprimer";?>
                </a>
            </div>
        </div>
        <?php
    }
    $requete->closeCursor(); // Termine le traitement de la requête
    ?> 
</div>
    </div>

  </div>

</div>
<div class="ui equal width center aligned padded grid">
  <div class="row">
    <div class="column">
      
    </div>
  </div>
  <div class="row" style="background-color: #240907;color: #FFFFFF;">
    <div class="column">Mes informations personnelles </div>
  </div>
  <div class="row">
    <div class="column">
      
    </div>
    <div class=" column">
      
    </div>
  </div>
</div>

 
  <div id="test1" class="col s12">Test 1</div>
  <div id="test2" class="col s12">Test 2</div>
  <div id="test3" class="col s12">Test 3</div>
  <div id="test4" class="col s12">Test 4</div>



</div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="css/semantic/semantic/dist/semantic.min.js"></script>

<script>
$('.special.cards .image').dimmer({
    on: 'hover'});
</script>

<script>
    $('#toggle').click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>


