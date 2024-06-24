<?php
// Start de sessie aan het begin van het script
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    // Als de gebruiker niet is ingelogd, stuur ze naar de inlogpagina
    header("Location: login.php");
    exit();
}

// Inclusie van DBHandler class
include "../dbHandler/dbHandler.php";
$dbHandler = new DBHandler();

// Haal gebruikersgegevens op
$user_name = $_SESSION['username'];
$user_data = $dbHandler->getUserByUsername($user_name); // Methode in DBHandler om gebruikersgegevens op te halen




// Verwerk het formulier als het is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_user_name = $_POST['username'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];

    // Roep de methode aan om het gebruikersprofiel bij te werken
    $result = $dbHandler->updateUserProfile($user_name, $new_user_name, $new_email, $new_password);

    if ($result === true) {
        // Vernieuw de gebruikersgegevens na een succesvolle update
        $user_data = $dbHandler->getUserByUsername($new_user_name); // Opnieuw ophalen van gegevens na updaten
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Profiel Pagina</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <div class="Container_profiel">
            <h1>Mijn profiel</h1>
            <?php if (!empty($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            <?php if (!empty($success_message)) { ?>
                <p class="success"><?php echo $success_message; ?></p>
            <?php } ?>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Naam" class="inputs_contact" value="<?php echo htmlspecialchars($user_data['user_naam']); ?>" required>
                <input type="email" name="email" placeholder="Email" class="inputs_contact" value="<?php echo htmlspecialchars($user_data['user_mail']); ?>" required>
                <input type="password" name="password" placeholder="Nieuw wachtwoord" class="inputs_contact">
                <input type="submit" value="Opslaan" class="btn_Contact">
            </form>
        </div>
    </main>
    <script src="../js/dark-mode.js"></script>
</body>
</html>
