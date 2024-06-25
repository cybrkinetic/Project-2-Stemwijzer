<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../dbHandler/dbHandler.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    $dbHandler = new DBHandler();
    $isRegistreerd = $dbHandler->REGISTREREN($user_name, $email, $wachtwoord);

    if ($isRegistreerd === true) {
        $_SESSION['user_mail'] = $email;
        header('Location: login.php');
        exit;
    } else {
        echo 'Registreren is niet gelukt: ' . $isRegistreerd;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" type="image/x-icon" href="../img/logo-neutraal-kieslab-lichtblauw.svg">
    <title>Register Page</title>
</head>

<body>
    <?php include "header.php"; ?>
    <main>
        <div class="Container_Contact">
            <div>
                <img id="contact_logo" src="../img/logo-neutraal-kieslab-lichtblauw.svg" alt="Kieslab Logo">
            </div>
            <div class="Contact_formulier">
                <div>
                    <h1>REGISTREREN</h1>
                </div>
                <form action="register.php" method="POST">
                    <input type="text" name="user_name" placeholder="Name" class="inputs_contact" required>
                    <input type="email" name="email" placeholder="Email" class="inputs_contact" required>
                    <input type="password" name="password" placeholder="Password" class="inputs_contact" required>
                    <input value="Registreren" type="submit" class="btn_Contact">
                </form>
                <div class="account_maken">
                    <a href="login.php">Heeft u wel een account?</a>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/dark-mode.js"></script>
</body>

</html>