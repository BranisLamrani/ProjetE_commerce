<?php
$errorMatricule=false;
$errorMarque=false;
$errorModele=false;
$errorPrix=false;
$errorImage=false;
$sucessfull=false;
$matricule='';
$modele='';
$marque='';
$prix='';
$categorie='';
if(isset($_POST['matricule']) && !empty(trim($_POST['matricule']))){
	$matricule=$_POST['matricule'];
    
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errorMatricule=true ;
}
if(isset($_POST['marque']) && !empty(trim($_POST['marque']))){
	$marque=$_POST['marque'];
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errorMarque=true ;
}
if(isset($_POST['modele']) && !empty(trim($_POST['modele']))){
	$modele=$_POST['modele'];
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errorModele=true ;
}
if(isset($_POST['prix']) && !empty(trim($_POST['prix'])) && is_float($_POST['prix'])){
	$prix=$_POST['prix'];
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errorPrix=true ;
}
if(isset($_POST['image']) && !empty(trim($_POST['image']))){
	$image=$_POST['image'];
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errorImage=true ;
}
?>



<?php
$chemin_file='';
$Errormessage='';
if(isset($_POST['matricule'])&& isset($_POST['marque']) && isset($_POST['modele'])&&
    isset($_POST['prix']) && isset($_POST['localisation']) ){
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
    }
    if(filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_INT) != false){
            $matricule=$_POST['matricule'];
            $matricule=strtoupper($matricule);
        
            $marque=$_POST['marque'];
            $tabmarque=str_split($marque);
            $marque=strtoupper($tabmarque[0]);
            for($i=1;$i<count($tabmarque);$i++){
                $marque.=strtolower($tabmarque[$i]);
            }
        
            $modele=$_POST['modele'];
            $modele=strtoupper($modele);
        
            $prix=$_POST['prix'];
        
            $localisation=$_POST['localisation'];
            $tablocalisation=str_split($localisation);
            $localisation=strtoupper($tablocalisation[0]);
            for($i=1;$i<count($localisation);$i++){
                $localisation.=strtolower($tablocalisation[$i]);
            }
            
            $categorie=$_POST['categorie'];
            
            $requete= $dbh->prepare('INSERT INTO vehicule(matricule,marque,modele,prixheure,localisation,image,categorie) 
                                      VALUES(:matricule,:marque,:modele,:prix,:localisation,:image,:categorie)');
            $requete->execute(array(
                'matricule' => $matricule,
                'marque' => $marque,
                'modele' => $modele,
                'prix' => $prix,
                'localisation' => $localisation,
                'image' => $chemin_file,
                'categorie' => $categorie
            ));
            $requete->closeCursor();
            $errorMatricule=false;
            $errorMarque=false;
            $errorModele=false;
            $errorPhoto=false;
            $errorPrix=false;
            $sucessfull=true;
        }
    
    $searchID= $dbh-> lastInsertId();
}
?>
<div class="ErreurMessage">
<?php
if($errorMatricule){
    ?>
    <div class="alert alert-danger" role="alert"> 
Veuillez indiquer le numéro de matricule
</div>
<?php
 }
?>
         
<?php
if($errorMarque){
	  ?>
	  <div class="alert alert-danger" role="alert">
  Veuillez indiquer la marque du véficule.
</div>
<?php
  }
 ?>
            
           
<?php
 if($errorModele){
	  ?>
	  <div class="alert alert-danger" role="alert">
  Veuillez indiquez le modèle du véhicule
</div>
<?php
  }
 ?>
 
 <?php
 if($errorPrix){
	  ?>
	  <div class="alert alert-danger" role="alert">
  Veuillez indiquez le prix du véhicule ou le prix indiqué n'est pas valide
</div>
<?php
  }
 ?>	 
 <?php
 if($sucessfull){
	  ?>
	  <div class="alert alert-success" role="alert">
  Le véhicule est enregistré et prêt à étre loué ! 
</div>
<?php
  }
 ?>	 
  </div>
   
   <form class="container" method="post" action="PutVehicule.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label >Marque:</label>
      <input type="text" class="form-control" placeholder="Marque" name="marque">
    </div>
    <div class="form-group col-md-2">
      <label>Modèle:</label>
      <input type="text" class="form-control" placeholder="Modèle" name="modele">
    </div>
      <div class="form-group col-md-2">
      <label>Couleur:</label>
      <input type="text" class="form-control" placeholder="Optionnel" name="couleur">
    </div>
  </div>
  <div class="form-row"> 
      <div class="form-group col-md-2">
        <label >Numéro de matriculation:</label>
        <input type="text" class="form-control"  placeholder="Matriculation"  name="matricule">
      </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Localisation:</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Ville" name="localisation">
    </div>
  </div>
  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label >Prix de location:</label>
      <input type="text" class="form-control" placeholder="Prix en euro" name="prix">
    </div>
    <div class="form-group col-md-6">
      <label>Photo du véhicule:</label>
      <input type="file" class="form-control" name="image">
    </div>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleFormControlSelect1">Catégorie</label>
    <select class="form-control" name="categorie">
      <option value="Optionnelle">Optionnelle</option>
      <option value="Citadine">Citadine</option>
      <option value="Utilitaire">Utilitaire</option>
      <option value="Coupé">Coupé</option>
      <option value="4x4">4x4</option>
      <option value="Familliale">Familiale</option>
      <option value="Minibus">Minibus</option>
      <option value="Cabriolet">Cabriolet</option>
      <option value="Collection">Collection</option>
      <option value="Berline">Berline</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Validation</button>
  
</form>
