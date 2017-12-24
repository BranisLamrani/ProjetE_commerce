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

<div class="ui top attached tabular menu thecars">
  <a class="active item" data-tab="first">Mes véhicules en location</a>
  <a class="item" data-tab="second">Mettre à louer</a>
</div>
<div class="ui bottom attached active tab segment" data-tab="first">
  
  <?php include 'PutVehicule.php'; ?>
  
</div>
<div class="ui bottom attached tab segment" data-tab="second">
  <?php include 'owncar.php'; ?>
  
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>
<script>
    $('.thecars .item')
  .tab()
;
</script>

</body>
</html>