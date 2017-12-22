<?php
include 'includes/connexionBDD.php';
$requete= $dbh->query('SELECT nom,prenom FROM utilisateurs');
$infoUser=$requete->fetch();
$prenom=$infoUser['prenom'];
$nom=$infoUser['nom'];
$requete->closeCursor();
?>

<?php
$requete=$dbh->prepare('SELECT * FROM vehicule WHERE ID=:ID');
$requete->bindParam(':ID',$_GET['id'],PDO::PARAM_STR);
$requete->execute();
$infoCar= $requete->fetch();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>information</title>
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
		<script src="js/fonts.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/icons.css" />
		<link rel="stylesheet" href="css/style2.css" />
		<link rel="stylesheet" href="css/custom.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	</head>
   <div class="profil" >
       
   </div>
    <body class="light-page">
		<div id="wrap">
			<section id="desc-img-text-list" class="pt-150 pb-150 light">
    			<div class="container">
        			<div class="row">
            			<div class="col-md-4 col-md-push-8">
                			<h2 class="mb-10"><strong><?php echo $infoCar['marque']; ?></strong></h2>
                			<h4 class="mb-50"><?php echo $infoCar['modele']; ?></h4>
                			<p class="mb-20"><?php echo $infoCar['description']; ?></p>
                			<ul class="text-icon-list text-icon-list-sep">
                    			<li class="clearfix"><i class="fa fa-users"></i>

                        			<span>Places</span>
                        			<span class="pull-right"><?php echo $infoCar['place']; ?></span>
                    			</li>
                    			<li class="clearfix"><i class="fa fa-car"></i>

                        			<span>Km parcouru</span>
                        			<span class="pull-right"><?php echo $infoCar['kmparcouru'].' KM'; ?></span>
                    			</li>
                    			<li class="clearfix"><i class="fa fa-map-marker"></i>

                        			<span>Localisation</span>
                        			<span class="pull-right">
                        			<?php 
                                        if($infoCar['localisation']!= null){
                                            echo $infoCar['localisation'];
                                            }
                                        else{
                                            echo'inconnue';
                                        }
                                        ?>

                        			</span>
                    			</li>
                    			
                    			<li class="clearfix"><i class="icon-tag icon-color icon-size-m icon-position-left"></i>
                        			<span>Prix</span>
                        			<span class="pull-right"><strong><?php echo $infoCar['prixheure'].'€'; ?></strong>/jour</span>
                    			</li>
                			</ul>
                			<a href="#" class="btn btn-default mt-60"><span>Acheter</span><i class="icon-arrow-right icon-position-right"></i></a>
            			</div>
            			<div class="col-md-8 col-md-pull-4 text-center">
                			<img src="<?php echo $infoCar['image']?>" alt="screen" class="screen" >
            			</div>
        			</div>
    			</div>
    			<div class="bg"></div>
			</section>
		</div>
		<footer></footer>
		<div class="modal-container"></div>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCByts0vn5uAYat3aXEeK0yWL7txqfSMX8"></script>
		<script src="https://cdn.jsdelivr.net/jquery.goodshare.js/3.2.8/goodshare.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>