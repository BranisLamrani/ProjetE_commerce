<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/showvehicule.css">
</head>
<body>
   <div class="cars">
    <?php
include 'includes/connexionBDD.php';
$requete = $dbh->query('SELECT * FROM vehicule');
?>

        <?php
        while($infocar = $requete->fetch()){
            if($infocar['image']==null ){
                $infocar['image']='images\vehicule\nopic';
            }
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
        ?>
        </div>
</body>
</html>


        
<script>$('.special.cards .image').dimmer({
        on: 'hover'
    });</script>

<?php echo $infocar['ID'] ?>

