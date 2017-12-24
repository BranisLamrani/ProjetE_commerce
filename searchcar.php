<?php session_start();?>
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
    <link rel="stylesheet" href="css/searchcar.css">
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
          
           <div class="contenu box">
                 <div class="ui equal width center aligned padded grid">
  <div class="row" style="background-color: black;color: #FFFFFF;">
    <div class="column">
        <p>Recherce avancé</p>
    </div>
  </div>
  <div class="row" style="background-color: grey;color: #FFFFFF;">
    <div class="column">
        <div class="form-put">
      <form class="ui form segment" method="post" enctype="multipart/form-data">
        <p>Mettre un véhicule en vente</p>
        <div class="two fields">
          <div class="field">
            <label>Marque</label>
            <input placeholder="Marque" name="marque" type="text">
          </div>
          <div class="field">
            <label>Modèle</label>
            <input type="text" placeholder="Modèle" name="modele">
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label >Numéro de matriculation:</label>
        <input type="text" placeholder="Matriculation"  name="matricule">
          </div>
          <div class="field">
            <label for="inputCity">Localisation:</label>
            <input type="text" id="inputCity" placeholder="Ville" name="localisation">
          </div>
        </div>
        <div class="two fields">
          <div class="field">
             <label >Prix minimum:</label>
            <input type="text" placeholder="Prix min" name="prixmin">
          </div>
          <div class="field">
            <label>Prix maximum</label>
             <input type="text" placeholder="Prix max" name="prixmax">
          </div>
        </div>
          <div class="field">
            <label>Catégorie</label>
                <div id="categorie" class="ui selection dropdown" >
                  <input name="categorie" type="hidden">
                  <i class="dropdown icon"></i>
                  <div class="default text">Catégorie</div>
                  <div class="menu">
                    <div class="item" data-value="Citadine">Citadine</div>
                    <div class="item" data-value="Utilitaire">Utilitaire</div>
                    <div class="item" data-value="Coupé">Coupé</div>
                    <div class="item" data-value="4x4">4x4</div>
                    <div class="item" data-value="Familliale">Familliale</div>
                    <div class="item" data-value="Minibus">Minibus</div>
                    <div class="item" data-value="Cabriolet">Cabriolet</div>
                    <div class="item" data-value="Collection">Collection</div>
                    <div class="item" data-value="Berline">Berline</div>
                  </div>
                </div>
          </div>
        <div class="two fields">
          <div class="field">
            <label>Km parcouru</label>
            <input placeholder="Marque" name="kmparcouru" type="text">
          </div>
          <div class="field">
            <label>Place</label>
                <div id="place" class="ui selection dropdown" >
                  <input name="place" type="hidden">
                  <i class="dropdown icon"></i>
                  <div class="default text">Nombre de places</div>
                  <div class="menu">
                    <div class="item" data-value="2">2</div>
                    <div class="item" data-value="4">4</div>
                    <div class="item" data-value="5">5</div>
                    <div class="item" data-value="7">7</div>

                  </div>
                </div>
          </div>
        </div>
        <div class="ui primary submit button">Chercher</div>
        <div class="ui error message"></div>
    </form>
</div> 

    </div>
  </div>  
  <div class="row" style="background-color: transparent;color: #FFFFFF;">
    <div class="column"><p><!-- pour sauter une ligne entre les rows-->    </p></div>
  </div>  
  <div class="row" style="background-color: #869D05;color: #FFFFFF;">
    <div class="column">
        <div class="cars">
    <?php
    if(isset($_POST['marque']) && !empty($_POST['marque'])){
        include 'includes/connexionBDD.php';
        $requete = $dbh->prepare('SELECT * FROM vehicule WHERE marque=:marque');
        $requete->bindParam(':marque',$_POST['marque']);
        $requete->execute();
        while($infocar = $requete->fetch()){
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
                    <a href="<?php echo 'infocar.php?id='.$infocar['ID']; ?>">
                     <div class="ui right floated primary button" >
                          Info <i class="right chevron icon"></i> 
                     </div>
                    </a>
                    <a href="<?php echo 'louer.php?id='.$infocar['ID']; ?>">
                     <div class="ui right floated green button" >
                          Louer <i class="right chevron icon"></i> 
                     </div>
                    </a>
                    </div>
                </div>
              </div>
              <hr class="carligne">
            </div>
           
            <?php
        }
        $requete->closeCursor(); // Termine le traitement de la requête
        
        }
        
        ?>
        </div>
    </div>
  </div>
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


<script>
  $('#categorie')
    .dropdown()
  ;
  $('#place')
    .dropdown()
  ;
</script>