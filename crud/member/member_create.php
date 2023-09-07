
<?php

require_once('../../class/Member.php');
include('../../head.php');

$member = new Member;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $showOneId = $member->createMember($data);
    header("location:member_show.php?id=$showOneId");
}

?>


    <h2>Créer Nouvelle Compte Membre</h2>

    <!--<form action="member_store.php" method="post">-->
    <form action="member_create.php" method="post">
        <label>Nom
            <input type="text" name="name">
        </label>

        <label>Ville
            <select name="city_id">
                <option value="1">Montréal</option>
                <option value="2">Québec</option>
                <option value="3">Sherbrooke</option>
                <option value="4">Gaspé</option>
                <option value="5">Lévis</option>
                <option value="6">Trois-Rivières</option>
            </select>
        </label>

        <label>Code Postal
            <input type="text" name="postal_code">
        </label> 

        <label>Courriel
            <input type="email" name="email">
        </label>

        <label>Phone
            <input type="text" name="phone">
        </label>

        <label>Wishlist
            <input type="text" name="wishlist">
        </label>

        <input type="submit" value="Save">
    </form>
    
</body>
</html>