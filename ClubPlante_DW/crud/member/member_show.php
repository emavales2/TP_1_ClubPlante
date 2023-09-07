
<?php

require_once('../../class/Member.php');
include('../../head.php');

if (!isset($_GET['id']) || $_GET['id'] === null){
    header ('location:member_index.php');
    exit;

} else {
    $id = $_GET['id'];

    $member = new Member;
    $oneMember = $member->oneMember($id);

    // Pour obtenir le city name
    $cityName = $member->getCityName($id);
    
    extract($oneMember);

}

?>


    <h2>Information Membre</h2>

    <article class = "smallarticle">
        <section>
            <div>
                <h3>Nom</h3>
                <h4><?= $name;?></a></h4>                                         
            </div>

            <div>
                <h3>Ville</h3>                                
                <h4><?= $cityName;?></h4>
            </div>

            <div>
                <h3>Code Postale</h3>                                
                <p><?= $postal_code;?></p>
            </div>

            <div>
                <h3>Courriel</h3>                                
                <p><?= $email;?></p>
            </div> 

            <div>
                <h3>Phone</h3>                                
                <p><?= $phone;?></p>
            </div>

            <div>
                <h3>Wishlist</h3>                                
                <p><?= $wishlist;?></p>
            </div>
            
            <button>
                <a href="member_edit.php?id=<?= $id; ?>">Mise à jour</a>
            </button>

            <form class="button" action="member_delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="submit" value="Eliminer Compte">
            </form>
       
        </section>        
    </article>
</body>
</html>

