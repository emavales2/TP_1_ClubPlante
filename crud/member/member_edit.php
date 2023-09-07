<?php

require_once('../../class/Member.php');
include('../../head.php');

if (!isset($_GET['id']) || $_GET['id'] == null){
    header('location:member_index.php');
    exit;
} else {

    $id =  $_GET['id'];    

    $member = new Member;
    $oneMember = $member->oneMember($id);
    
    // Pour obtenir le city name
    $cityName = $member->getCityName($id);

    extract($oneMember);
}


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "yes";
    // Handle form submission and update
    $update = $member->updateMember($_POST);

    // Pour envoyer vers member_show mise à jour si l'update est fait avec succes
    if ($update) {
        
        $id = $_POST['id'];

        //$updatedPage = "member_show.php?id=$id";
        //header("Location: $updatedPage");
        header("Location: member_show.php?id=$id");
        exit;

    } else {   
        echo "Mise à jour pas efectuée. SVP d'essayer à nouveau";
    }
}

?>




    <h2>Mise à Jour</h2>

    <form action="member_update.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        
        <label>Nom
            <input type="text" name="name" value="<?= $name; ?>">
        </label>
        
        <label>Ville
        <select name="city_id">
            <option value="1" <?= ($cityName == 1) ? 'selected' : ''; ?>>Montréal</option>
            <option value="2" <?= ($cityName == 2) ? 'selected' : ''; ?>>Québec</option>
            <option value="3" <?= ($cityName == 3) ? 'selected' : ''; ?>>Sherbrooke</option>
            <option value="4" <?= ($cityName == 4) ? 'selected' : ''; ?>>Gaspé</option>
            <option value="5" <?= ($cityName == 5) ? 'selected' : ''; ?>>Lévis</option>
            <option value="6" <?= ($cityName == 6) ? 'selected' : ''; ?>>Trois-Rivières</option>
        </select>
    </label>
        
        <label>Code Postal
            <input type="text" name="postal_code" value="<?= $postal_code; ?>"> 
        </label>

        <label>Courriel
            <input type="email" name="email" value="<?= $email; ?>">
        </label>

        <label>Phone
            <input type="text" name="phone" value="<?= $phone; ?>">
        </label>

        <label>Wishlist
            <input type="text" name="wishlist" value="<?= $wishlist; ?>">
        </label>

        <input type="submit" value="Save">
    </form>
    
    <form class="button" action="member_delete.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" value="Delete">
    </form>
    
</body>
</html>
