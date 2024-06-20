<?php
if (session_status() === PHP_SESSION_NONE) {
    
    session_start();
}
include "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stellingen.css">
    <link rel="stylesheet" href="../css/beheerder.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>Beheerder</title>
</head>
<?php require "header.php"?>
<body> 
    <div class="blockPC">
    <form method="POST" action="stellingen.php">
        <label>Partij aanmaken:</label>
        <p class="empty2"></p>
        <input name="partij_naam" placeholder="Naam" type="text"/>
        <input name="partij_site" placeholder="Site" type="text"/>
        <input name="partij_volldignaam" placeholder="Volledige naam" type="texgt"/>
        <button type="submit" name="createP" value="createP">Aanmaken</button>
    </form>
    </div>
    <div class="blockPE">
    <label>Partij wijzigen of verwijderen:</label>
    <?php 
    require_once '../dbHandler/dbHandler.php';
    $dbHandler = new dbHandler();
    $partijen = $dbHandler->selectPartijen();

    foreach ($partijen as $partij){
    ?>
    <form method="POST" action="stellingen.php">
        <p class="empty1"></p>
        <input type="hidden" name="partij_id" value="<?= $partij['partij_id'];?>"/>
        <input name="partij_naam" value="<?= $partij['partij_naam'];?>" type="text"/>
        <input name="partij_site" value="<?= $partij['partij_site'];?>" type="text"/>
        <input name="partij_volldignaam" value="<?= $partij['partij_volldignaam'];?>" type="text"/>
        <button type="submit" name="editP" value="editP">Wijzigen</button>
        <button type="submit" name="deleteP" value="deleteP">Verwijderen</button>
    </form>
    <?php } ?>
    </div>
</body>
</html>