
<?php

require_once('../../class/Plant.php');
include('../../head.php');

if (!isset($_GET['id']) || $_GET['id'] === null){
    header ('location:plant_index.php');
    exit;

} else {
    $id = $_GET['id'];

    $plant = new Plant;
    $onePlant = $plant->onePlant($id);

    // Pour obtenir le city name
    //$cityName = $member->getCityName($id);
    
    //echo "var_dump oneMember <br>";
    //var_dump($oneMember);
    extract($onePlant);

}

?>



<body>
   

    <article class="bigarticle">
        <picture class="pic">
            <img src="plant_img/stock_plant.jpg" alt="Plant Image">
        </picture>

        <section>
            <div>
                <h3>Nom</h3>
                <h4><?= $name;?></a></h4>                                         
            </div>

            <div>
                <h3>Type</h3>                                
                <h4><?= $type;?></h4>
            </div>

            <div>
                <h3>Description</h3>                                
                <p><?= $description;?></p>
            </div>

            <div>
                <h3>Soins</h3>                                
                <p><?= $care;?></p>
            </div> 
            
            <button>
                <a href="plant_edit.php?id=<?= $id; ?>">Mise à jour</a>
            </button>

            <form class="button" action="plant_delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="submit" value="Delete">
            </form>
        
        </section>        
    </article>

    <button>
        <a href="plant_index.php">Allons voir toutes les plantes !</a>
    </button>


    <form action="plant_delete.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input class="button" type="submit" value="Delete">
    </form>


</body>
</html>


