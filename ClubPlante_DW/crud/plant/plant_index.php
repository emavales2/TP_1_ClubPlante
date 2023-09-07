
<?php

require_once('../../class/Plant.php');
include('../../head.php');


$plant = new Plant;
$allPlants = $plant->allPlants();

//var_dump($allMembers);
?>



    

    <h2>Toutes Nos Plantes</h2>

    <button>
        <a href="plant_create.php">Créer Nouvelle Fiche</a>
    </button>

    <div class="content">

    <?php
        foreach($allPlants as $infoBit) {
        ?>
    
        <article>
            <section>
                <div>
                    <h3>Nom</h3>
                    <h4><a href="plant_show.php?id=<?= $infoBit['id']?>"><?= $infoBit['name']; ?></a></h4>                                         
                </div>

                <div>
                    <h3>Type</h3>                                
                    <h4><?= $infoBit['type']; ?></h4>
                </div>
                
                <h5><a href="plant_show.php?id=<?= $infoBit['id']?>"> > >  Plus d'information</a></h5>
            </section>
                    
            <picture class="pic">
                    <img src="plant_img/stock_plant.jpg" alt="Plant Image">
            </picture>
            
        </article>

    <?php        
        }
    ?>
    </div>

</body>
</html>