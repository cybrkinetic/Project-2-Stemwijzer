<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../dbHandler/dbHandler.php"; 

if (!isset($_SESSION['username'])) {
    echo "Sorry, hiervoor moet je ingelogd zijn.";
    exit();
}

$dbHandler = new dbHandler();
$nieuws = $dbHandler->selectNieuws();
$articleId = $_GET['nieuws_id'];
$article = $dbHandler->getNieuwsById($articleId); // Pak het artikel uit de ID

$username = $_SESSION['username']; // Pak user uit de session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment']) && !empty($_POST['comment_text'])) {
        $commentText = $_POST['comment_text'];
        $parentId = isset($_POST['parent_id']) ? $_POST['parent_id'] : null;
        $dbHandler->saveComment($articleId, $username, $commentText, $parentId);
        header("Location: article.php?nieuws_id=" . $articleId); // Zodat form niet opnieuw kan sturen
        exit();
    } elseif (isset($_POST['edit'])) {
        $commentId = $_POST['comment_id'];
        $newText = $_POST['new_text'];
        $dbHandler->editComment($commentId, $username, $newText);
    } elseif (isset($_POST['delete'])) {
        $commentId = $_POST['comment_id'];
        $dbHandler->deleteComment($commentId, $username);
    }
}

$comments = $dbHandler->getCommentsByArticleId($articleId); // Pak alle reacties op dat artikel

function displayComments($comments, $parentId = null) {
    foreach ($comments as $comment) {
        if ($comment['parent_id'] == $parentId) {
            echo '<div class="comment Quicksand">';
            echo '<p><strong>' . htmlspecialchars($comment['comment_naam']) . ':</strong> ' . nl2br(htmlspecialchars($comment['comment_text'])) . '</p>';
            echo '<p class="comment-date Quicksand">' . htmlspecialchars($comment['comment_datum']) . '</p>';
            if ($_SESSION['username'] == $comment['comment_naam']) {
                echo '<form method="POST">';
                echo '<input type="hidden" name="comment_id" value="' . $comment['id'] . '">';
                echo '<textarea name="new_text">' . htmlspecialchars($comment['comment_text']) . '</textarea>';
                echo '<button type="submit" name="edit" class="button Inter">Wijzig</button>';
                echo '<button type="submit" name="delete" class="button Inter">Verwijder</button>';
                echo '</form>';
            }
            echo '<form method="POST" class="reply-form">';
            echo '<input type="hidden" name="parent_id" value="' . $comment['id'] . '">';
            echo '<textarea name="comment_text" placeholder="Reageer op deze reactie" class="Quicksand" required></textarea>';
            echo '<button type="submit" name="comment" class="button Inter">Reageer</button>';
            echo '</form>';
            displayComments($comments, $comment['id']);
            echo '</div>';
        }
    }
}

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
        <h2>Reacties</h2>
        <?php displayComments($comments); ?>

        <h3>Laat een reactie achter!</h3>
        <form action="article.php?nieuws_id=<?= $articleId ?>" method="POST">
            <label for="comment_text" class="Quicksand">Reactie:</label><br>
            <textarea id="comment_text" name="comment_text" rows="4" required></textarea><br>
            <button type="submit" name="comment" class="button Inter">Verstuur</button>
        </form>
    </section>
</body>
</html>
<?php
} else {
    echo "Artikel niet gevonden.";
}
?>
