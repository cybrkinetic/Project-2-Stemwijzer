<?php
// article.php
require "../dbHandler/dbHandler.php"; // Include your database handler
$dbHandler = new dbHandler();
    $nieuws = $dbHandler->selectNieuws();
    $articleId = $_GET['nieuws_id'];
    $article = $dbHandler->getNieuwsById($articleId); // Fetch the article by ID

    if ($article) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/article.css">
            <title><?= htmlspecialchars($article['nieuws_titel']) ?></title>
        </head>
        <body>
            <header>
                <?php require 'header.php'; ?>
            </header>
            <article class="article-content">
                <h1><?= htmlspecialchars($article['nieuws_titel']) ?></h1>
                <p class="date"><?= htmlspecialchars($article['nieuws_datum']) ?></p>
                <img src="<?= htmlspecialchars($article['nieuws_foto']) ?>" alt="<?= htmlspecialchars($article['nieuws_titel']) ?>">
                <div class="content">
                    <?= nl2br(htmlspecialchars($article['nieuws_text'])) ?>
                </div>
            </article>
        </body>
        </html>
        <?php
    } 
    else {
        echo "Article not found.";
    }
    
?>


</body>
</html>