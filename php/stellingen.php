<?php
include_once "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();

if (isset($_POST["createP"])){
    $dbHandler->createPartij($_POST["partij_naam"], $_POST["partij_site"], $_POST["partij_volldignaam"]);
} elseif (isset($_POST["editP"])){
    $dbHandler->editPartij($_POST["partij_id"], $_POST["partij_naam"], $_POST["partij_site"], $_POST["partij_volldignaam"]);
} elseif (isset($_POST['deleteP'])){
    $dbHandler->deletePartij($_POST["partij_id"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stellingen.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>Stellingen</title>
</head>
<body class="container">
<?php require "header.php"?>
<div class="ulBlock">
    <?php
    $rows = $dbHandler->selectStelling();
    foreach ($rows as $row) {
    ?>
        <ul class="ulStelling">
            <strong><li class="titel"><?= $row['titel'] ?></li></strong>
            <p class="vraag"><?= $row['vraag'] ?></p>
            <p class="empty"></p>
        </ul>
  
    <?php 
    } 
    ?>
</div>
<form method="POST" action="beheerder_stelling.php">
    <button type="submit">Beheerder</button>
</form>
<script src="../js/dark-mode.js"></script>
</body>
</html>