<?php include "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stemwijzer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../img/logo-neutraal-kieslab-lichtblauw.svg">
    <title>Neutraal KiesLab Stemwijzer</title>
</head>
<body class="container">
<?php require "header.php"?>


<div class="block">
    <h2 class="text">Klik een antwoord aan voor alle stellingen</h2>
    <?php 
    
    $stelling = $dbHandler->selectStelling();
    foreach($stelling as $stellingen){
    
    ?>
    <div class="grid-container">
        <div class="statement-block">
            <div class="stelling-column">
                <h2 class="text"><?= $stellingen['titel']?></h2>
                <p id="vraag"><?= $stellingen['vraag']?></p>
            </div>
            <div class="checkbox-column">
                <form id="form_<?= $stellingen['titel']?>" method="POST" action="index.php"> <!-- Verander dit naar de result pagina later -->
                    <input type="hidden" name="stelling" value="<?= $stellingen['titel']?>">
                    <div class="radio-group">
                    <label class="text">
                        <input type="radio" name="vote_<?= $stellingen['titel']?>" value="Eens" required> Eens
                    </label>
                    <br>
                    <label class="text">
                        <input type="radio" name="vote_<?= $stellingen['titel']?>" value="GeenMening" required> Geen Mening
                    </label>
                    <br>
                    <label class="text">
                        <input type="radio" name="vote_<?= $stellingen['titel']?>" value="Oneens" required> Oneens
                    </label>
    </div>
                 
            </div>
        </div>
    </div>
    <?php }
     ?>
       <button type="submit" name="submitBtn" id="submitBtn">SUBMIT</button>
                </form>
</div>
</body>



</html>