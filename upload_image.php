<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload d'image</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="upload_image.php">
        <label>Upload d'image</label>
        <input type="file" name="image">
        <input type="submit">
    </form>
</body>
</html>

<?php
$repertory_image = "images/vehicule/";
$extensionAuthorized =  array('png','jpg','jpeg'); // Extensions autorisées
$mimesAuthorized = array('image/jpg','image/jpeg','image/png'); //Mimes autorisées

$verifytype = FALSE;
$verifyMime = FALSE;

if(isset($_FILES['image'])){
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
        include 'includes/connexionBDD.php';
        $request= $dbh->prepare('INSERT INTO images(Chemin) VALUES (:chemin)');
        $request->execute(array(
                'chemin' => $chemin_file
        ));
    }
}
?>