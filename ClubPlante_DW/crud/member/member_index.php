
<?php

require_once('../../class/Member.php');
include('../../head.php');

$member = new Member;
$allMembers = $member->allMembers();

//var_dump($allMembers);
?>


    <h2>Liste de Membres</h2>  

    <button>
        <a href="member_create.php">Créer Nouvelle Compte Membre</a>
    </button>

    <div class="content">

    <?php
        foreach($allMembers as $infoBit) {
        ?>
    
        <article class="smallarticle">
            <section>
                <div>
                    <h3>Nom</h3>
                    <h4><a href="member_show.php?id=<?= $infoBit['id']?>"><?= $infoBit['name']; ?></a></h4>                                         
                </div>

                <div>
                    <h3>Wishlist</h3>                                
                    <h4><?= $infoBit['wishlist']; ?></h4>
                </div>
                
                <h5><a href="member_show.php?id=<?= $infoBit['id']?>"> > >  Plus d'information</a></h5>
            </section>            
        </article>

    <?php        
        }
    ?>
    </div>
</body>
</html>

    