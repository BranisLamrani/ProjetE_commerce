
 <link rel="stylesheet" href="css/showvehicule.css">
 <link rel="stylesheet" href="css/owncar.css">

   <div class="cars">
    <?php
include 'includes/connexionBDD.php';
$requete = $dbh->prepare('SELECT * FROM vehicule WHERE IDuser=:IDuser');
$requete->bindParam(':IDuser',$_SESSION['id']);
$requete->execute();
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
                    <a href="<?php echo 'info.php?id='.$infocar['ID']; ?>">
                     <div class="ui right floated primary button" >
                        Modifier <i class="right settings icon"></i> 
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
        
<script>$('.special.cards .image').dimmer({
        on: 'hover'
    });</script>

<?php echo $infocar['ID'] ?>

