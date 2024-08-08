<?php
require '../includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$message = getMessageById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $short_content = $_POST['short_content'];
    $full_content = $_POST['full_content'];
    editMessage($id, $title, $author, $short_content, $full_content);
    header('Location: /pages/view_message.php?id=' . $id);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать сообщение</title>
    <link rel="stylesheet" href="/styles/global.css">
</head>
<body>
    <?php include '../views/header.php'; ?>
    <div class="add-message">
        <form action="/pages/edit_message.php?id=<?php echo $id; ?>" method="post">
            <input type="text" name="title" value="<?php echo htmlspecialchars($message['title']); ?>" placeholder="Заголовок" required>
            <input type="text" name="author" value="<?php echo htmlspecialchars($message['author']); ?>" placeholder="Автор" required>
            <textarea name="short_content" placeholder="Краткое содержание" required><?php echo htmlspecialchars($message['short_content']); ?></textarea>
            <textarea name="full_content" placeholder="Полное содержание" required><?php echo htmlspecialchars($message['full_content']); ?></textarea>
            <button type="submit">Сохранить изменения</button>
        </form>
    </div>
    <?php include 'views/footer.php'; ?>
</body>
</html>
