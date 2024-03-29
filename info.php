<?php 
session_start();
include 'includes/connexionBDD.php';
$requete=$dbh->prepare('SELECT * from vehicule WHERE ID=:ID');
$requete->bindParam(':ID',$_GET['id'] ,PDO::PARAM_INT);
$requete->execute();
$infocar=$requete->fetch();     
$couleur='Pas indiqué';
if($infocar['couleur'] != null ){
    $couleur=$infocar['couleur'];
}
$place='Pas indiqué';
if($infocar['place'] != null ){
    $place=$infocar['couleur'];
}
$kmpar='Pas indiqué';
if($infocar['kmparcouru'] != null ){
    $kmpar=$infocar['kmparcouru'];
}

$requete2=$dbh->prepare('SELECT * from utilisateurs WHERE ID=:ID');
$requete2->bindParam(':ID',$infocar['IDuser'],PDO::PARAM_INT);
$requete2->execute();
$user=$requete2->fetch();

if(isset($_POST['choix']) && $_POST['choix'] == "delete" ){
    $requete=$dbh->prepare('DELETE FROM vehicule WHERE ID=:ID');
    $requete->bindParam(':ID',$_GET['id']);
    $requete->execute();
    header('Location: accueil.php');
}
if(isset($_POST['choix']) && $_POST['choix'] == "modify"){
    echo"modify";
}
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
    <link rel="stylesheet" href="css/info.css">
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
   <div class="row" style="background-color: #191919;color: #FFFFFF;">
    <div class=" column">
      <img class="ui medium image" src=" <?php echo $infocar['image'] ?> ">
    </div>
    <div class=" column describ">
      Appartient à <?php echo $user['nom']?> <?php echo $user['prenom']; ?>
      <br>
      <?php echo 'Description:'.$infocar['description'] ?>
    </div>
    <div class="column"><img class="ui centered circular image" src="<?php echo $_SESSION['pic'];?>" style="position:relative;top:10%;"></div>
  </div>
  <table class="ui inverted red table">
  <thead>
    <tr><th>Matricule</th>
    <th>Marque</th>
    <th>Modèle</th>
    <th>Couleur</th>
    <th>Prix</th>
    <th>Catégorie</th>
    <th>Localisation</th>
    <th>Place</th>
    <th>Km Parcouru</th>
  </tr>
   </thead><tbody>
    <tr>
      <td> <?php echo $infocar['matricule'];?> </td>
      <td><?php echo $infocar['marque'];?></td>
      <td><?php echo $infocar['modele'];?></td>
      <td><?php echo $couleur; ?></td>
      <td><?php echo ' '.$infocar['prixheure'];?></td>
      <td><?php echo $infocar['categorie'];?></td>
      <td><?php echo $infocar['localisation'];?></td>
      <td><?php echo $place ;?></td>
      <td><?php echo $kmpar;?></td>
    </tr>
  </tbody>
</table>
<div class="ui form">
 <form method="POST">
  
  <div class="ui equal width center aligned padded grid">
  <div class="row">
   
    <div class="olive column">
          <div class="field">
      <div class="ui radio checkbox">
        <input name="choix" value="delete" tabindex="0"  type="radio">
        <label>Supprimer</label>
      </div>
    </div>
    </div>
    
    <div class="black column">
         <div class="field">
      <div class="ui radio checkbox">
        <input name="choix" value="modify" tabindex="0" type="radio">
        <label>Modifier</label>
      </div>
    </div>
    </div>
    
  </div>
  <div class="row" style="background-color: #869D05;color: #FFFFFF;">
    <div class="column">
            <input type="submit" value="Valider">
    </div>
  </div>

</div>
   </form>
  
</div>
</div>

                    


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>


</body>
</html>


<?php 
$requete-> CloseCursor();
$requete2-> CloseCursor();
?>