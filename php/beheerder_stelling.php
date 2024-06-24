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
    <div class="container">
        <div class="blockPC">
        <form method="POST" action="#">
            <label>Partij aanmaken:</label>
            <p class="empty2"></p>
            <input name="partij_naam" placeholder="Naam" type="text"/>
            <input name="partij_site" placeholder="Site" type="text"/>
            <input name="partij_volldignaam" placeholder="Volledige naam" type="texgt"/>
            <button type="submit" name="createP" value="createP">Aanmaken</button>
        </form>
        </div>

<<<<<<< HEAD
        <div class="blockPE">
        <label>Partij wijzigen of verwijderen:</label>
        <?php 
        require_once '../dbHandler/dbHandler.php';
        $dbHandler = new dbHandler();
        $partijen = $dbHandler->selectPartijen();

        foreach ($partijen as $partij){
        ?>
        <form method="POST" action="#">
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
        
        <div class="blockSC">
            <form method="POST" action="#">
                <label>Stelling aanmaken:</label>
                <p class="empty2"></p>
                <input name="titel" placeholder="Titel" type="text"/>
                <textarea id="stelling" name="vraag" placeholder="Stelling" type="text"></textarea>
                <button type="submit" name="createS" value="createS">Aanmaken</button>  
            </form>
        </div>

        <div class="blockSED">
            <label>Stelling wijzigen of verwijderen:</label>
            <?php
            require_once '../dbHandler/dbHandler.php';
            $dbHandler = new dbHandler();
            $stellingen = $dbHandler->selectStelling();

            foreach ($stellingen as $stelling){
            ?>
            <form method="POST" action="#">
                <p class="empty1"></p>
                <input type="hidden" name="vraag_id" value="<?= $stelling['vraag_id'];?>"/>
                <input id="titelED" name="titel" value="<?= $stelling['titel'];?>" type="text"/>
                <textarea id="stellingED" name="vraag" value="<?= $stelling['vraag'];?>" type="text"><?= $stelling['vraag']; ?></textarea>
                <button type="submit" name="editS" value="editS">Wijzigen</button>
                <button type="submit" name="deleteS" value="deleteS">Verwijderen</button>
            </form>
            <?php } ?>
        </div>

        <div class="blockNC">
            <label>Nieuws aanmaken:</label>
            <form method="POST" action="#">
                <p class="empty2"></p>
                <textarea id="nieuws_titel" name="nieuws_titel" placeholder="Titel" type="text"></textarea>
                <textarea id="nieuws_desc" name="nieuws_desc" placeholder="Beschrijving" type="text"></textarea>
                <textarea id="nieuws_text" name="nieuws_text" placeholder="Text" type="text"></textarea>
                <textarea id="nieuws_datum" name="nieuws_datum" placeholder="Datum" type="text"></textarea>
                <button type="submit" name="createN" value="createN">Aanmaken</button>
            </form>
            
        </div>

        <div class="blockNED">
            <label> Nieuws wijzigen of verwijderen:</label>
            <?php
            require_once '../dbHandler/dbHandler.php';
            $dbHandler = new dbHandler();
            $berichten = $dbHandler->selectNieuws();

            foreach ($berichten as $bericht){ 
            ?>
            <form method="POST" action="#">
                <p class="empty1"></p>
                <input type="hidden" name="nieuws_id" value="<?= $bericht['nieuws_id'];?>"/> 
                <textarea id="nieuws_titel" name="nieuws_titel" value="<?= $bericht['nieuws_titel'];?>" type="text"><?= $bericht['nieuws_titel'];?></textarea>
                <textarea id="nieuws_desc" name="nieuws_desc" value="<?= $bericht['nieuws_desc'];?>" type="text"><?= $bericht['nieuws_desc'];?></textarea>
                <textarea id="nieuws_text" name="nieuws_text" value="<?= $bericht['nieuws_text'];?>" type="text"><?= $bericht['nieuws_text'];?></textarea>
                <textarea id="nieuws_datum" name="nieuws_datum" value="<?= $bericht['nieuws_datum'];?>" type="text"><?= $bericht['nieuws_datum'];?></textarea>
                <button type="submit" name="editN" value="editN">Wijzigen</button>
                <button type="submit" name="deleteN" value="deleteN">Verwijderen</button>
            </form>
            <?php }?>
        </div>
=======
    foreach ($partijen as $partij){
    ?>
    <form method="POST" action="beheerder_stelling.php">
        <p class="empty1"></p>
        <input type="hidden" name="partij_id" value="<?= $partij['partij_id'];?>"/>
        <input name="partij_naam" value="<?= $partij['partij_naam'];?>" type="text"/>
        <input name="partij_site" value="<?= $partij['partij_site'];?>" type="text"/>
        <input name="partij_volldignaam" value="<?= $partij['partij_volldignaam'];?>" type="text"/>
        <button type="submit" name="editP" value="editP">Wijzigen</button>
        <div class="logo-Rand">
            <a href="<?= $partij['partij_site'] ?>" target="_blank" title="<?= $partij['partij_volldignaam'] ?>">
                <div class="start__party">
                    <img class="logo" src="data:image/png;base64,<?= base64_encode($partij['partij_logo']) ?>" alt="logo">
                </div>
            </a>
        </div>
        
        <input type="file" name="file" id="file" value="">
        <input type="submit" name="submit" value="Uploaden">

        <button type="submit" name="deleteP" value="deleteP">Verwijderen</button>
    </form>
    <?php } ?>
>>>>>>> 1c23159a3159f4a15699dd1b4cca2a6faac9eae3
    </div>
</body>
</html>