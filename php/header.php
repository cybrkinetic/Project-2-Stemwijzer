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
       <a href="stellingen.php" id="stellingen">STELLINGEN</a>
       <a href="partijen.php" id="partijen">PARTIJEN</a>
       <a href="nieuws.php" id="nieuws">NIEUWSBERICHTEN</a>
       <?php if (isset($_SESSION['username'])): ?>
            <span>Welkom, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <a href="logout.php" id="logout">LOG OUT</a>
        <?php else: ?>
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
       <a href="index.php">HOME</a>
       <a href="stellingen.php">STELLINGEN</a>
       <a href="partijen.php">PARTIJEN</a>
       <a href="nieuws.php">NIEUWSBERICHTEN</a>
       <a href="login.php">LOG IN</a>
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

