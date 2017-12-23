<?php

include 'includes/connexionBDD.php';
//On regarde si il a déjà une photo
$havepic=$dbh->prepare('SELECT COUNT(*) AS nbpic FROM images WHERE IDuser=:IDuser');
$havepic->bindParam(':IDuser',$_SESSION['id']);
$havepic->execute();
$number=$havepic->fetch();


if($number['nbpic']==0){
$repertory_image = "images/Profil/";
$extensionAuthorized = array('png','jpg','jpeg'); // Extensions autorisées
$mimesAuthorized = array('image/jpg','image/jpeg','image/png'); //Mimes autorisées

    if(isset($_FILES['ownimage']) && !empty($_FILES['ownimage'])){
        $imageName= $_FILES['ownimage']['name'];
        $imageNametmp= $_FILES['ownimage']['tmp_name'];
        $mime= mime_content_type($imageNametmp);
    if(in_array($mime,$mimesAuthorized)){

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

    }
}
else{
    $lastpic=$_SESSION['pic'];
$repertory_image = "images/Profil/";
$extensionAuthorized = array('png','jpg','jpeg'); // Extensions autorisées
$mimesAuthorized = array('image/jpg','image/jpeg','image/png'); //Mimes autorisées

    if(isset($_FILES['ownimage']) && !empty($_FILES['ownimage'])){
        $imageName= $_FILES['ownimage']['name'];
        $imageNametmp= $_FILES['ownimage']['tmp_name'];
        $mime= mime_content_type($imageNametmp);
    if(in_array($mime,$mimesAuthorized)){

        $tableau = explode('.',$imageName);
        $newname= "photo".uniqid().".".$tableau[1];
        $chemin_file=$repertory_image.$newname;
        move_uploaded_file($imageNametmp,$chemin_file);
        include 'includes/connexionBDD.php';
        $request= $dbh->prepare('UPDATE images SET Chemin=:Chemin WHERE IDuser=:IDuser ');
        $request->execute(array(
                'Chemin'=>$chemin_file,
                'IDuser'=> $_SESSION['id']
                ));
        $_SESSION['pic']=$chemin_file;  
        unlink($lastpic);
    }

    }
}

?>
