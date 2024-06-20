<?php
session_start();
include "../dbHandler/dbHandler.php";
$dbHandler = new DBHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; // Corrected the field name
    $password = $_POST['password']; // Corrected the field name

    $user = $dbHandler->verifyUser($email, $password);

    if ($user) {
        $role = $user['role'];
        if ($role == "gebruiker") {
            header('Location: index.php');
            exit;
        } else if ($role == "admin") {
            header('Location: beheerder_stelling.php');
            exit;
        }
    } else {
        // Redirect to login page if the user does not exist or the password is incorrect
        header('Location: login.php');
        exit;
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
    <title>Login Page</title>
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
                    <h1>LOGIN</h1>
                </div>
                <form method="POST" action="login.php">
                    <input type="email" name="email" placeholder="Email" class="inputs_contact" required>
                    <input type="password" name="password" placeholder="Password" class="inputs_contact" required>
                    <input value="LOGIN" type="submit" class="btn_Contact">
                </form>
                <div class="account_maken">
                    <a href="register.php">Nieuwe Account maken</a>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/dark-mode.js"></script>
</body>

</html>