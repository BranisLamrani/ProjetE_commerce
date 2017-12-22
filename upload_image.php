<?php
$repertory_image = "images/Profil/";
$extensionAuthorized = array('png','jpg','jpeg'); // Extensions autorisées
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
        include 'includes/connexionBDD.php';
        $request= $dbh->prepare('INSERT INTO images(Chemin,IDuser) VALUES (:Chemin,:IDuser)');
        $request->execute(array(
                'Chemin'=>$chemin_file,
                'IDuser'=> $_SESSION['id']
                ));
        $_SESSION['pic']=$chemin_file; 
    }

?>