<?php
if (session_status() === PHP_SESSION_NONE) {

    session_start();
}
include "../dbHandler/dbHandler.php";
$dbHandler = new DBHandler();


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
        <div class="Container_profiel">
            <h1>Mijn profiel</h1>
            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Naam" class="inputs_contact" required>
                <input type="email" name="email" placeholder="Email" class="inputs_contact" required>
                <input type="password" name="password" placeholder="Password" class="inputs_contact" required>
                <input value="Wijzegen" type="submit" class="btn_Contact">
            </form>
        </div>
    </main>
    <script src="../js/dark-mode.js"></script>
</body>

</html>