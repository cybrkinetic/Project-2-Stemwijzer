<?php
// article.php
require "../dbHandler/dbHandler.php"; // Include your database handler
$dbHandler = new dbHandler();
$nieuws = $dbHandler->selectNieuws();
$articleId = $_GET['nieuws_id'];
$article = $dbHandler->getNieuwsById($articleId); // Fetch the article by ID

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $commentText = $_POST['comment_text'];
    $dbHandler->saveComment($articleId, $name, $commentText);
    header("Location: article.php?nieuws_id=" . $articleId); // Prevent form resubmission
    exit();
}

$comments = $dbHandler->getCommentsByArticleId($articleId); // Fetch comments for the article

if ($article) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/article.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/logo-neutraal-kieslab-lichtblauw.svg">
    <title><?= htmlspecialchars($article['nieuws_titel']) ?></title>
</head>
<body>
    <header>
        <?php require 'header.php'; ?>
    </header>
    
    <article class="article-content">
        <div class="container">
            <img id="image" src="data:image/png;base64,<?= base64_encode($article['nieuws_foto']); ?>" alt="<?= htmlspecialchars($article['nieuws_titel']) ?>">
            <p class="date Quicksand"><?= htmlspecialchars($article['nieuws_datum']) ?></p>
            <h1 class="Inter titel"><?= htmlspecialchars($article['nieuws_titel']) ?></h1>
            <div class="content Quicksand" id="text">
                <?= nl2br(htmlspecialchars($article['nieuws_text'])) ?>
            </div>
        </div>
    </article>

    <section class="comments-section">
<div class="allComments">
        <h2 id="comments">Reacties</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><strong><?= htmlspecialchars($comment['comment_naam']) ?>:</strong> <?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
                <p class="comment-date"><?= htmlspecialchars($comment['comment_datum']) ?></p>
            </div>
        <?php endforeach; ?>

        <h3 id="leaveComment">Laat een reactie achter!</h3>
        <form action="article.php?nieuws_id=<?= $articleId ?>" method="POST" id="formComment">
            <label for="name">Naam:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="comment_text">Reactie:</label><br>
            <textarea id="comment_text" name="comment_text" rows="4" required></textarea><br>
            <button type="submit">Submit</button>
        </form>
        </div>
    </section>
    <script src="../js/dark-mode.js"></script>
</body>
</html>
<?php
} else {
    echo "Article not found.";
}
?>
