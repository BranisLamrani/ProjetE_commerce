<?php
$chemin_file='';
$Errormessage='';
if(isset($_POST['matricule'])&& isset($_POST['marque']) && isset($_POST['modele'])&&
    isset($_POST['prix']) && isset($_POST['localisation'])){

    include 'includes/connexionBDD.php';
    if(isset($_FILES['image'])){
        $repertory_image = "images/Vehicule/";
        $extensionAuthorized =  array('png','jpg','jpeg'); // Extensions autorisées
        $mimesAuthorized = array('image/jpg','image/jpeg','image/png'); //Mimes autorisées
        $imageName= $_FILES['image']['name'];
        $imageNametmp= $_FILES['image']['tmp_name'];
        $mime=finfo_file(finfo_open(FILEINFO_MIME_TYPE),$imageNametmp);
        if(!in_array($mime,$mimesAuthorized)){
            echo "Le type MIME du fichier n'est pas authorisé.";
        }
        else{
            $tableau = explode('.',$imageName);
            $newname= "photo".uniqid().".".$tableau[1];
            $chemin_file=$repertory_image.$newname;
            move_uploaded_file($imageNametmp,$chemin_file);
        }
    }
    else{
        $messageerror="Vous n'avez pas insérez de photo";
    }
    $matricule=$_POST['matricule'];
    $marque=$_POST['marque'];
    $modele=$_POST['modele'];
    $prix=$_POST['prix'];
    $localisation=$_POST['localisation'];
    $requete= $dbh->prepare('INSERT INTO vehicule(matricule,marque,modele,prixheure,localisation,image) 
                              VALUES(:matricule,:marque,:modele,:prix,:localisation,:image)');
    $requete->execute(array(
        'matricule' => $matricule,
        'marque' => $marque,
        'modele' => $modele,
        'prix' => $prix,
        'localisation' => $localisation,
        'image' => $chemin_file
    ));
    $requete->closeCursor();
    $searchID= $dbh-> lastInsertId();

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Louez votre voiture ! :)</title>
    <link rel="stylesheet" type="text/css" href="css/semantic/semantic/dist/semantic.min.css">
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>
</head>
<body>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <form class="ui form" method="post" action="PutVehicule.php" enctype="multipart/form-data">
            <div class="field">
                <input placeholder="La matricule*" type="text" name="matricule">
            </div>
            <div class="field">
                <input placeholder="Marque*" type="text" name="marque">
            </div>
            <div class="field">
                <input placeholder="Le modèle*" type="text" name="modele">
            </div>
            <div class="field">
                <input placeholder="La couleur" type="text" name="couleur">
            </div>
            <div class="field">
                <input placeholder="à combien vous la louer ?*" type="text" name="prix">
            </div>
            <div class="field">
                <input placeholder="localisation"  type="text" name="localisation">
            </div>
            <div class="field">
                <input placeholder="selectionnner une image" id="viewPic" type="file" name="image">
            </div>

            <button class="fluid ui green button" type="submit">Submit</button>
        </form>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
</body>
</html>
