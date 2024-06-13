<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>login Page</title>
</head>

<body>
    <?php include "header.php" ?>
    <main>
        <div class="Container_Contact">
            <div>
                <img id="contact_logo" src="../img/logo-neutraal-kieslab-lichtblauw.svg" alt="Kieslab Logo">
            </div>
            <div class="Contact_formulier">
                <div>
                    <h1>REGISTREREN</h1>
                </div>
                <form action="register.php">
                    <input type="text" placeholder="Name" class="inputs_contact">
                    <input type="email" placeholder="Email" class="inputs_contact">
                    <input type="password" placeholder="Password" class="inputs_contact">
                    <input value="Registreren" type="submit" class="btn_Contact">
                </form>
                <div class="account_maken">
                    <a href="login.php">Heeft U wel een account?</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html