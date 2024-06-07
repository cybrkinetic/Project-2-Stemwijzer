<?php include "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nieuws.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../img/logo-neutraal-kieslab-lichtblauw.svg">
    <title>Neutraal KiesLab Nieuwsberichten</title>
</head>
<body class="container">
<?php require "header.php"?>

<div class="block">
    <h2 id="intro">Nieuwsberichten</h2>
    <?php 
    $nieuws = $dbHandler->selectNieuws();
    $nieuws = array_reverse($nieuws); // Reverse array
    foreach($nieuws as $nieuwsbericht){

    
    ?>
   <div class="info-flex infoplace">
    <a href="<?= $nieuwsbericht['nieuws_href']?>" class="article-link">
        <img src="data:image/png;base64,<?= base64_encode($nieuwsbericht['nieuws_foto']); ?>" class="article-image">
        <div class="article-text">
            <p class="date"><?= $nieuwsbericht['nieuws_datum'] ?></p>
            <h3 class="title"><?= $nieuwsbericht['nieuws_titel']?></h3>
            <p class="description"><?= $nieuwsbericht['nieuws_desc']?><p>
        </div>
    </a>
</div>
<?php } ?>
</body>
</html>