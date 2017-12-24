   <link rel="stylesheet" href="css/putvehicule.css">

<?php
$matricule='';
$modele='';
$marque='';
$couleur='';
$prix='';
$categorie='';
$chemin_file='';
$description='';
$kmparcouru='';
$place='';
$Errormessage='';
if(!empty($_POST)){
    include 'includes/connexionBDD.php';
    if(!empty($_FILES['image'])){
        $repertory_image = "images/Vehicule/";
        $extensionAuthorized =  array('png','jpg','jpeg'); // Extensions autorisées
        $mimesAuthorized = array('image/jpg','image/jpeg','image/png'); //Mimes autorisées
        $imageName= $_FILES['image']['name'];
        $imageNametmp= $_FILES['image']['tmp_name'];
        $mime=finfo_file(finfo_open(FILEINFO_MIME_TYPE),$imageNametmp);
        if(in_array($mime,$mimesAuthorized)){
            $tableau = explode('.',$imageName);
            $newname= "photo".uniqid().".".$tableau[1];
            $chemin_file=$repertory_image.$newname;
            move_uploaded_file($imageNametmp,$chemin_file);
        }
       
            $matricule=$_POST['matricule'];
            $matricule=strtoupper($matricule);
        
            $marque=$_POST['marque'];
            $tabmarque=str_split($marque);
            $marque=strtoupper($tabmarque[0]);
            for($i=1;$i<count($tabmarque);$i++){
                $marque.=strtolower($tabmarque[$i]);
            }
            $couleur=$_POST['couleur'];
            $tabcouleur=str_split($couleur);
            $couleur=strtoupper($tabcouleur[0]);
            for($i=1;$i<count($tabcouleur);$i++){
                $couleur.=strtolower($tabcouleur[$i]);
            }
        
            $kmparcouru='';
            $place=$_POST['place'];
            $kmparcouru=$_POST['kmparcouru'];
            $modele=$_POST['modele'];
            $modele=strtoupper($modele);
        
            $prix=$_POST['prix'];
            if(!empty($_POST['kmparcouru'])){
                $kmparcouru=$_POST['kmparcouru'];
            }
        
            $localisation=$_POST['localisation'];
            $tablocalisation=str_split($localisation);
            $localisation=strtoupper($tablocalisation[0]);
            for($i=1;$i<count($tablocalisation);$i++){
                $localisation.=strtolower($tablocalisation[$i]);
            }
            $categorie=$_POST['categorie'];
            $description=$_POST['description'];
            
            $requete= $dbh->prepare('INSERT INTO vehicule(matricule,marque,modele,couleur,prixheure,localisation,image,categorie,IDuser,description,:kmparcouru,:place) 
                                      VALUES(:matricule,:marque,:modele,:couleur,:prix,:localisation,:image,:categorie,:IDuser,:description,:kmparcouru,:place)');
            $requete->execute(array(
                'matricule' => $matricule,
                'marque' => $marque,
                'modele' => $modele,
                'couleur' => $couleur,
                'prix' => $prix,
                'localisation' => $localisation,
                'image' => $chemin_file,
                'categorie' => $categorie,
                'IDuser'=>$_SESSION['id'],
                ':description'=>$description,
                ':kmparcouru'=> $kmparcouru,
                ':place'=> $place
            ));
            $requete->closeCursor();
    }
    
}
?>


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
             <label >Prix de location:</label>
            <input type="text" placeholder="Prix en euro" name="prix">
          </div>
          <div class="field">
            <label>Couleur:</label>
             <input type="text" placeholder="Optionnel" name="couleur">
          </div>
        </div>
          <div class="field">
            <label>Catégorie</label>
                <div id="categorie" class="ui selection dropdown" >
                  <input name="categorie" type="hidden">
                  <i class="dropdown icon"></i>
                  <div class="default text">Optionnelle(Vous serez plus visible au près des autres membre si vous en choissisez 1.)</div>
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
        <div class="field">
            <label>Photo du véhicule:</label>
      <input type="file" class="form-control" name="image">
        </div>
        <div class="field">
            <label>Description</label>
      <textarea name="description" rows="2"></textarea>
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
        <div class="ui primary submit button">Valider</div>
        <div class="ui error message"></div>
    </form>
</div> 



<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
 <!--Bootstrap-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/dist/semantic.min.js"></script>


<script>
    $('.ui.form')
  .form({
    fields: {
      Marque: {
        identifier: 'marque',
        rules: [
          {
            type   : 'empty',
            prompt : 'Entrer la marque du véhicule'
          }
        ]
      },
      Modele: {
        identifier: 'modele',
        rules: [
          {
            type   : 'empty',
            prompt : 'Entrer le modèle du véhicule'
          }
        ]
      },
      Matriculation: {
        identifier: 'matricule',
        rules: [
          {
            type   : 'empty',
            prompt : 'Entrez le numéro de matriculation'
          }
        ]
      },
      localisation: {
        identifier: 'localisation',
        rules: [
          {
            type   : 'empty',
            prompt : 'Où se trouve le véhicule ? (Localisation)'
          }
        ]
      },
      Prix: {
        identifier: 'prix',
        rules: [
          {
            type   : 'integer',
            prompt : 'Entrer le prix du véhicule'
          },
        ]
      },
      Place: {
        identifier: 'place',
        rules: [
          {
            type   : 'integer',
            prompt : 'Nombre de place ?'
          },
        ]
      },
      Photo: {
        identifier: 'image',
        rules: [
          {
            type   : 'empty',
            prompt : 'Insérer une photo'
          }
        ]
      }
    }
  })
;
</script>

<script>
  $('#categorie')
    .dropdown()
  ;
  $('#place')
    .dropdown()
  ;
</script>

 