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
                     <div class="ui right floated primary button " >
                        Modifier <i class="right settings icon"></i>
                        
                     </div>
                    </a>  
                     <div class="ui right floated" >
                        <button id="btn-del" class="ui red button">Supprimer</button>
                        
                     </div>
                    
                   </div>
                    
                    
                    </div>
              </div>
              <hr class="carligne">
            </div>
           
            <?php
        }
        $requete->closeCursor(); // Termine le traitement de la requête
        ?>
                
<script>
    $('.special.cards .image').dimmer({
        on: 'hover'
    });

</script>

<script>
// Get the modal
var modal = document.getElementById('delete');

// Get the button that opens the modal
var btn = document.getElementById("btn-del");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}     
    
</script>
<?php echo $infocar['ID'] ?>

