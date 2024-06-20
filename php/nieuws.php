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
echo '<div class="info-flex">';
    echo '<a class="article-link" href="article.php?nieuws_id=' . $nieuwsbericht['nieuws_id'] . '">'; // Ensure the parameter name matches ?>
    <img class="article-image" src="data:image/png;base64,<?= base64_encode($nieuwsbericht['nieuws_foto']); ?>" alt="' . $nieuwsbericht['nieuws_titel'] . '"><?php
    echo '<div class="article-text">';
    echo '<div class="date">' . $nieuwsbericht['nieuws_datum'] . '</div>';
    echo '<div class="title">' . $nieuwsbericht['nieuws_titel'] . '</div>';
    echo '<div class="description">' . $nieuwsbericht['nieuws_desc'] . '</div>';
    echo '</div>';
    echo '</a>';
    echo '</div>';
    }
    ?>
   </div>
   <script src="../js/dark-mode.js"></script>
</body>
</html>
