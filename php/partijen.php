<?php 
include "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/partijen.css">
    <title>Partijen</title>
</head>

<body>
    <?php include "header.php"?>
    <main>
        <h1 id="title">Deze partijen doen mee aan de verkiezingen</h1>
        <div class="partijen-container">

        <?php

        $partijen = $dbHandler->selectPartijen();
        foreach($partijen as $partij) { 
            echo ' 
            <div class="logo-Rand">
                <a href="'. $partij['partij_site'] .'" target="_blank" title="'. $partij['partij_volldignaam'] .'">
                    <div class="start__party">
                        <div class="start__party">
                            <img class="logo" src="data:image/png;base64,'.  base64_encode($partij['partij_logo']) .'"
                                alt="logo">
                        </div>
                    </div>
                </a>
            </div>
            <div>

                <a href="'. $partij['partij_site'].'" target="_blank">
                    <div class="partijen-naam">
                        <h1>
                            '. $partij['partij_naam'].'
                        </h1>
                    </div>
                </a>
            </div>
        
            ';}?>

        
        
        </div>
    </main>
</body>

</html>