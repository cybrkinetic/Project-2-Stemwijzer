<?php
include_once "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();
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
            <li class="titel"><?= $row['titel'] ?></li>
            <p class="vraag"><?= $row['vraag'] ?></p>
            <p class="empty"></p>
        </ul>
  
    <?php 
    } 
    ?>
</div>
<script src="../js/dark-mode.js"></script>
</body>
</html>