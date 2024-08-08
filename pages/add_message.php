<?php
require '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $short_content = $_POST['short_content'];
    $full_content = $_POST['full_content'];
    addMessage($title, $author, $short_content, $full_content);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить сообщение</title>
    <link rel="stylesheet" href="/styles/global.css">
</head>
<body>
<?php include '../views/header.php'; ?>
    <div class="add-message">
        <form action="/pages/add_message.php" method="post">
            <input type="text" name="title" placeholder="Заголовок" required>
            <input type="text" name="author" placeholder="Автор" required>
            <textarea name="short_content" placeholder="Краткое содержание" required></textarea>
            <textarea name="full_content" placeholder="Полное содержание" required></textarea>
            <button type="submit">Добавить сообщение</button>
        </form>
    </div>
    <?php include 'views/footer.php'; ?>
</body>
</html>
