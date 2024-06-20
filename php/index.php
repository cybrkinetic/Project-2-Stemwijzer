<?php 
if (session_status() === PHP_SESSION_NONE) {
    
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/index.css">
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
  <article class="article-main">
    <div class="block">
      <p id="intro">Welkom bij de stemwijzer van het Neutraal Kieslab. Wij hebben deze gemaakt om u te helpen uw keuze te maken in de verkiezingen. Klik op de start knop om te beginnen!</p>
      <a id="startBtn" href="stemwijzer.php">Start</a>
    </div>
  </article>
  <script src="../js/dark-mode.js"></script>
</body>

</html>
