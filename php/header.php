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
elseif (isset($_POST["createS"])){
    $dbHandler->createStelling($_POST["titel"], $_POST["vraag"]);
} elseif (isset($_POST["editS"])){
    $dbHandler->editStelling($_POST["vraag_id"], $_POST["titel"], $_POST["vraag"]);
} elseif (isset($_POST["deleteS"])){
    $dbHandler->deleteStelling($_POST["vraag_id"]);
}
elseif (isset($_POST["createN"])){
    $dbHandler->createNieuws($_POST["nieuws_titel"], $_POST["nieuws_desc"], $_POST["nieuws_text"], $_POST["nieuws_datum"]);
} elseif (isset($_POST["editN"])){
    $dbHandler->editNieuws($_POST["nieuws_id"], $_POST["nieuws_titel"], $_POST["nieuws_desc"], $_POST["nieuws_text"], $_POST["nieuws_datum"]);
} elseif (isset($_POST["deleteN"])){
    $dbHandler->deleteN($_POST["nieuws_id"]);
}
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<header class="header-flex">
  <a id="kieslab" href="index.php">
    <img id="kieslablogo" src="../img/logo-neutraal-kieslab-lichtblauw.svg" alt="Kieslab Logo">
  </a>
  <a href="index.php" id="stemwijzer">NEUTRAAL<br id="break"> KIESLAB</a>
  <div class="navbar" id="navbar-place">
    <a href="index.php" id="home">HOME</a>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { ?>
      <form mehtod="POST" action="#">
        <a href="beheerder_stelling.php" id="beheerder">BEHEERDER</a>
      </form>
      <?php } ?>

    <a href="stellingen.php" id="stellingen">STELLINGEN</a>
    <a href="partijen.php" id="partijen">PARTIJEN</a>
    <a href="nieuws.php" id="nieuws">NIEUWSBERICHTEN</a>
    <?php if (isset($_SESSION['username'])) : ?>
      <a href="profiel.PHP" class="welkom">Welkom <?php echo ($_SESSION['username']); ?></a>
      <a href="logout.php" id="logout">LOG OUT</a>
    <?php else : ?>
      <a href="login.php" id="login">LOG IN</a>
    <?php endif; ?>
  </div>
  <div class="dark-mode-toggle">
    <label class="switch">
      <input type="checkbox" id="dark-mode-toggle">
      <span class="slider round"></span>
    </label>
  </div>
  <div id="burger-icon" onclick="toggleMobileNav()" class="nav-toggle">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

  <div id="mobile-nav" class="mobile-nav">
    <a href="index.php" id="mobile_home">HOME</a>
    <a href="stellingen.php" id="mobile_stellingen">STELLINGEN</a>
    <a href="partijen.php" id="mobile_partijen">PARTIJEN</a>
    <a href="nieuws.php" id="mobile_nieuwsbericht">NIEUWSBERICHTEN</a>
    <a href="MIJN_PROFIEL.php">MIJN PROFIEL</a>
  </div>
</header>
<script>
  function toggleMobileNav() {
    var mobileNav = document.getElementById('mobile-nav');
    if (mobileNav.style.display === "flex") {
      mobileNav.style.display = "none";
    } else {
      mobileNav.style.display = "flex";
    }
  }
</script>