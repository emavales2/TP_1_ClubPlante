
<?php

// CHECKING CONNECTION ---------------------------------------------------------

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


// try {
//     $db = new PDO('mysql:host=localhost;dbname=e2395411;charset=utf8', 'e2395411', 'iLPd9vZnaB90nGRPfXXT');
//     echo 'Connected to the database successfully!';
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
// }

// ------------------------------------------------------------------------------


include('head.php');

?>

<!-- le path pour le fichier css dans head.php ne fonctionne pas ici, donc... -->
<link rel='stylesheet' href='css/styles.css'>

<body>
    <h1>Bienvenu/e au Club Plante</h1>

    <div class="item-row">
        <button>
            <a href="crud/member/member_index.php">Liste de Membres</a>
        </button>

        <button>
            <a href="crud/member/member_create.php">Créer Compte Membre</a>
        </button>

        <button>
            <a href="crud/plant/plant_show.php">Voir Toutes Nos Plantes</a>
        </button>
    </div>

    <picture class="pic">
        <img src="crud/plant/plant_img/stock_plant.jpg" alt="Plant Image">
    </picture>

</body>
</html>