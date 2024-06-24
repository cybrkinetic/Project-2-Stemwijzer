<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../dbHandler/dbHandler.php";
$dbHandler = new dbHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $results = [];
    foreach ($_POST['stelling'] as $stelling) {
        $voteKey = 'vote_' . $stelling;
        if (isset($_POST[$voteKey])) {
            $results[$stelling] = $_POST[$voteKey];
        }
    }

    include '../php/stempartijen.php';
    function KiesPartij($results, $partijen) {
    $scores = [];

    foreach ($partijen as $partij => $keuzes) {
        $score = 0;
        foreach ($results as $stelling => $antwoord) {
            if (isset($keuzes[$stelling]) && $keuzes[$stelling] == $antwoord) {
                $score++;
            }
        }
        $scores[$partij] = $score;
    }

    arsort($scores);
    return array_keys($scores)[0];
}

    $bestePartij = KiesPartij($results, $partijen);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/result.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/logo-neutraal-kieslab-lichtblauw.svg">
    <title>Neutraal KiesLab Stemwijzer</title>
</head>
<body class="container">
    <header class="header-flex">
        <?php require "header.php" ?>
    </header>
    <div class="block">
        <h2 class="text">Uw resultaat voor de verkiezingen</h2>
        
        <?php if (isset($bestePartij)): ?>
            <p class="result text">De partij die het beste bij uw antwoorden past: <strong class="text"><?= htmlspecialchars($bestePartij) ?></strong></p>
            
        <?php endif; ?>
    </div>
    <script src="../js/dark-mode.js"></script>
</body>
</html>
