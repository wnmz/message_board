<?php
require '../includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$message = getMessageById($id);
$comments = getCommentsByMessageId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $message['title']; ?></title>
    <link rel="stylesheet" href="/styles/global.css">
</head>
<body>
    <?php include '../views/header.php'; ?>
    <div class="message-view">
        <h2><?php echo $message['title']; ?></h2>
        <p><strong>Автор:</strong> <?php echo $message['author']; ?></p>
        <p><?php echo $message['full_content']; ?></p>
    </div>
    <div class="comments">
        <h3>Комментарии:</h3>
        <?php foreach ($comments as $comment): ?>
            <div class="comment-item">
                <p><strong><?php echo $comment['author']; ?>:</strong> <?php echo $comment['comment']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="add-comment">
        <form action="/pages/add_comment.php" method="post">
            <input type="hidden" name="message_id" value="<?php echo $id; ?>">
            <input type="text" name="author" placeholder="Имя" required>
            <textarea name="comment" placeholder="Сообщение" required></textarea>
            <button type="submit">Добавить комментарий</button>
        </form>
    </div>
</body>
</html>
