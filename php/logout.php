<?php
session_start();

// Controleer of de gebruiker is ingelogd (optioneel)
if (!isset($_SESSION['user_mail'])) {
    // Als de gebruiker niet is ingelogd, doorsturen naar de inlogpagina of ergens anders
    header('Location: login.php');
    exit;
}

// Verwijder alle sessievariabelen
$_SESSION = array();

// Vernietig de sessie
session_destroy();

// Stuur door naar de inlogpagina of ergens anders na uitloggen
header('Location: login.php');
exit;
?>
