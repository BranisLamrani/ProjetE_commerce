<?php 
session_start();

if(isset($_POST['newnom']) && !empty($_POST['newnom'])){
    include 'includes/connexionBDD.php';
    $newnom = $_POST['newnom'];
    $nom_requete = $dbh ->prepare('UPDATE utilisateurs SET nom=:nom WHERE ID=:id');
    $nom_requete->bindParam(':nom',$newnom);
    $nom_requete->bindParam(':id',$_SESSION['id']); 
    $nom_requete->execute();
    $_SESSION['nom']=$newnom;
    header('Location: setting.php');   
}

if(isset($_POST['newprenom']) && !empty($_POST['newprenom'])){
    include 'includes/connexionBDD.php';
    $newprenom = $_POST['newprenom'];
    $pre_requete = $dbh ->prepare('UPDATE utilisateurs SET prenom=:prenom WHERE ID=:id');
    $pre_requete->bindParam(':prenom',$newprenom);
    $pre_requete->bindParam(':id',$_SESSION['id']); 
    $pre_requete->execute();
    $_SESSION['prenom']=$newprenom;
    header('Location: setting.php');  
}

if(isset($_POST['jour']) && !empty($_POST['jour'])||isset($_POST['mois']) && !empty($_POST['mois']) || isset($_POST['mois']) && !empty($_POST['newprenom'])){
    include 'includes/connexionBDD.php';
    $newjour = $_POST['jour'];
    $newmois = $_POST['mois'];
    $newannee = $_POST['annee'];
    $birth=$newjour.';'.$newmois.';'.$newannee;
    $pre_requete = $dbh ->prepare('UPDATE utilisateurs SET birth=:birth WHERE ID=:id');
    $pre_requete->bindParam(':birth',$birth);
    $pre_requete->bindParam(':id',$_SESSION['id']); 
    $pre_requete->execute();
    header('Location: setting.php');  
}

if(isset($_POST['newprenom']) && !empty($_POST['newprenom'])){
    include 'includes/connexionBDD.php';
    $newprenom = $_POST['newprenom'];
    $pre_requete = $dbh ->prepare('UPDATE utilisateurs SET prenom=:prenom WHERE ID=:id');
    $pre_requete->bindParam(':prenom',$newprenom);
    $pre_requete->bindParam(':id',$_SESSION['id']); 
    $pre_requete->execute();
    $_SESSION['prenom']=$newprenom;
    header('Location: setting.php');  
}

if(isset($_POST['adresse']) && !empty($_POST['adresse'])){
    if(isset($_POST['postal']) && !empty($_POST['postal'])){
            if(isset($_POST['ville']) && !empty($_POST['ville'])){
                    include 'includes/connexionBDD.php';
                    $_SESSION['adresse'] = $_POST['adresse'];
                    $_SESSION['postal'] = $_POST['postal'];
                    $_SESSION['ville'] = $_POST['ville'];
                    $coord=$_SESSION['adresse'].";". $_SESSION['postal'].";".$_SESSION['ville'];
                    $requete = $dbh ->prepare('UPDATE utilisateurs SET coordonnee=:coord WHERE ID=:id');
                    $requete->bindParam(':coord',$coord);
                    $requete->bindParam(':id',$_SESSION['id']); 
                    $requete->execute();
                    $_SESSION['coordonnee']=$coord;
                    header('Location: setting.php');  
            }
    }
}

if(isset($_FILES['ownimage']) && !empty($_FILES['ownimage'])){
    include 'upload_image.php';
}
if(!empty($_POST['numberphone'])){
    include 'includes/connexionBDD.php';
    $number =$_POST['numberphone'];
    $pre_requete = $dbh ->prepare('UPDATE utilisateurs SET contact=:number WHERE ID=:id');
    $pre_requete->bindParam(':number',$number);
    $pre_requete->bindParam(':id',$_SESSION['id']); 
    $pre_requete->execute();
    $_SESSION['contact']=$number;
    header('Location: setting.php');     
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
<?php 
    
    if(!empty($_GET['pass'])){
    if(!empty($_POST['passc'])){
        echo "ça marche";
    }
}

   
    ?>
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
   <div class="contenu">
        <div class="ui top attached tabular menu">
          <a class="item active" data-tab="first">Mon profil</a>
          <a class="item" data-tab="second">Coordonnée</a>
          <a class="item" data-tab="third">Gestion du compte</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <div class="ui equal width aligned grid">
              <div class="row">
                <div class="column my-img">
                <form method="POST" enctype="multipart/form-data">
                  <img class="ui small circular image imgclick" src="<?php echo $_SESSION['pic'];?>">
                  <input id="file" type="file" name="ownimage" id="upload-photo" />
                  <label for="file">Placer une photo</label>
                  
                  <br>
                  <button class="ui primary button centered" type="submit">Modifier photo</button>
                </form>
                </div>
                <div class="column profil">
                    
                    <div class="ui form">
                     <form method="POST">
                      <div class="fields">
                       
                        <div class="field">
                          <label>Nom:</label>
                          <input type="text"  name="newnom" style="color:black" value="<?php echo $_SESSION['nom']; ?>">
                        </div>
                        <div class="field">
                          <label>Prénom:</label>
                          <input type="text" name= "newprenom" style="color:black" value="<?php echo $_SESSION['prenom'];?>">
                        </div>
                        
                      </div>
                      <div class="fields birth">    
                        <div class="field">
                            <table>
                        <tr>
                            <label>Date de naissance:</label>
                        </tr>
                         <tr>
                             <td>
                                <select name="jour" class="ui dropdown">
                                  <option value="">Jour</option>
                                  <?php
                                    for($i=0;$i<32;$i++){
                                    ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                                  <?php  } ?>
                                </select>
                             </td>
                             <td>
                                    <select name="mois" class="ui dropdown" style="width=300px;">
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
                             </td>
                             <td>
                                <div class="field">
                                    <select name="annee" class="ui dropdown">
                                      <option value="">Année</option>
                                      <?php
                                        for($i=1900;$i<2018;$i++){
                                        ?>
                                      <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                                      <?php  } ?>
                                    </select>    
                                </div>
                             </td>
                         </tr>
                     </table>
                    </div>

                      </div>
                      <div class="fields">
                        <div class="field">
                          <label>Numèro de téléphone</label>
                          <input type="text"  name="numberphone" value="<?php echo $_SESSION['contact']; ?>">
                        </div>

                      </div>
                     <div class="fields">
                       
                        <div class="field">
                          <label>Modifier le mot de passe ?</label>
                          <input type="password"  name="pass" >
                        </div>
                        <div class="field">
                          <label>Tapez une seconde fois:</label>
                          <input type="password" name= "passc">
                        </div>
                      </div>
                      <button class="ui green button centered" type="submit">Modifier</button>
                      </form>
                    </div>
                    
                    <br>
                </div>
              </div>
            </div>
        </div>
        <div class="ui bottom attached tab segment " data-tab="second"> 
            <form class = "ui form coord" method="POST">
            <div class="ui equal width center aligned padded grid">
              <div class="row">
                <div class="column">       
                       <label>Adresse:</label>
                        <input type="text" placeholder="Adresse" name="adresse" value="<?php echo $_SESSION['adresse'];?>">
                        <label>Code Postal:</label>
                        <input type="text" placeholder="Code postal" name="postal" value="<?php echo $_SESSION['postal']; ?>">
                        <label>Ville:</label> 
                        <input type="text" placeholder="Ville" name ="ville" value="<?php echo $_SESSION['ville']; ?>">    
                </div>
                <div class="column left-coord">
                   <button class="ui green button" type="submit">Modifier</button>  
                </div>
              </div>
            </div>
       </form> 
        </div>
        <div class="ui bottom attached tab segment" data-tab="third">
          Supprimer mon compte ?
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









