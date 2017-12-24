<?php
session_start();


/* Pour la connexion d'un utilisateur*/
if(isset($_POST['mail']) && isset($_POST['password'])){
    include 'includes/connexionBDD.php';
    $login = $dbh->prepare('SELECT ID FROM utilisateurs WHERE email = :mail AND password = :password');
    $login->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
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
            header('Location: accueil.php');
        }
    } else {
        echo 'Connexion impossible. Veuillez réessayer.';
    }
    $login->closeCursor();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Semantic UI-->
    <link rel="stylesheet" type="text/css" href="framework/semantic/dist/semantic.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!--Personnal CSS-->
    <link rel="stylesheet" href="css/log.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet"> 
    <link rel="stylesheet" href="fontawesome\web-fonts-with-css\css\font-awesome.min.css">

    
    
</head>
<body>
    <div class="ui basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
   <p>Lamrani Qui vous parle:</p>
  </div>
  <div class="content">
    <p style="position:relative; left:20%;">Ce site est un projet réalisé par Lamrani Branis,Seif Ben Mahmoud, Johan Louap</p>
  </div>
  <div class="actions">
    <div class="ui green basic ok inverted button">
      <i class="checkmark icon"></i>
      D'accord
    </div>
  </div>
</div>
   
    
<div class="ui modal form">

<div class="ui equal width aligned padded grid">
  <div class="row">
    <div class="column">
    <div class="input-btn">
            <input type="file" name="file" id="file" class="inputfile" />
         
            <label for="file">Photo de profil</label>
   </div>
    </div>
    <div class="column">
     <form method="POST" action="" enctype="multipart/form-data" >
     <div class="ui form">
  <div class="fields">
    <div class="field">
      <label>Nom</label>
      <input type="text" placeholder="Nom" name="in_nom" class="input1"> 
    </div>
    <div class="field">
      <label>Prénom</label>
      <input type="text" placeholder="Prénom" name="in_prenom" class="input1">
    </div>
  </div>
  <div class="fields">
      <div class="field">
      <label>Email</label>
      <input type="text" placeholder="Email" name="in_email" style="width:392px;">
      
    </div>
  </div>
  <div class="fields">
      <div class="field">
      <label>Mot de passe</label>
      <input type="password" placeholder="Mot de passe" class="input3" name="in_pass1">
      </div>
      <div class="field">
      <label>Vérifiation mot de passe</label>
      <input type="password" placeholder="Vérification mot de passe" class="input3" name="in_pass1">
      </div>
  </div>
</div>
     <div class="btn-valid">
       <button class="positive ui button btn-valide" type="submit">Valider</button>
    </div>

      </form>
    </div>
  </div>
</div>


<div class="info">
    <?php 
/* Pour l'inscription d'un utilisateur */
if(isset($_POST['in_email']) && !empty($_POST['in_email'])){
include 'includes/connexionBDD.php';
$requete=$dbh->prepare('SELECT COUNT(email) AS mailcompt FROM utilisateurs WHERE email=:email');
$requete->bindParam(':email',$_POST['in_email']);
$requete->execute();
$verifymail = $requete->fetch();
if($verifymail['mailcompt'] == 0){
    echo"email accepté";
}
    }
?> 
</div>

    
</div>     
  

<nav class="navbar justify-content-between" style="background-color:#0D0C0C;">
  <a class="navbar-brand sticky-top">VShare</a>
  <form method="POST" action="Log.php" class="form-inline">
    <input class="form-control mr-sm-2" type="text" placeholder="Email" name="mail" aria-label="Email">
    <input class="form-control mr-sm-2" type="password" placeholder="Mot de passe" name="password" aria-label="Mot de passe">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button>
  </form>
</nav>
    
    
    

<div class="ui equal width center aligned padded grid" style="position:relative; top:13%;" >
  <div class="row">
    <div class="column maintitle" ><label>Bienvenue à VShare</label></div>
  </div>
    <div class="row" >
    <div class="column describe" style="color:white;" >Louer ou mettez en location votre véhicule gratuitement </div>
  </div>
    <div class="row" style="position:relative; top:50%;">
    <div class="column button" style="color:white;"><button class="inscription formbtn">S'inscrire</button>></div>
  </div>
  
</div>
  
  
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>

<script>
$('.ui.basic.modal')
  .modal('show')
;    
</script>

<script>
    $('.ui.modal.form')
  .modal('attach events','.formbtn','show')
;
    
</script>

</body>
</html>

