<?php
// логгирование для отладки
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('log_errors', 1);
// ini_set('error_log', '/var/log/php_errors.log');

require 'includes/functions.php';

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;

$messages = getMessages($page, $limit);

// Подсчёт страниц для пагинации
$total_messages = getTotalMessagesCount();
$total_pages = ceil($total_messages / $limit);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Доска сообщений</title>
</head>

<body>
    <?php include 'views/header.php'; ?>
    <div class="message-list">
        <button><a href="/pages/add_message.php">Добавить сообщение</a></button>
        <?php if (empty($messages)): ?>
            <p>Список сообщений пуст.</p>
        <?php else: ?>
            <?php foreach ($messages as $message): ?>
                <div class="message-item">
                    <h2><?php echo htmlspecialchars($message['title']); ?></h2>
                    <p><?php echo htmlspecialchars($message['short_content']); ?></p>
                    <a href="/pages/view_message.php?id=<?php echo htmlspecialchars($message['id']); ?>">Читать далее...</a>
                    <a href="/pages/edit_message.php?id=<?php echo htmlspecialchars($message['id']); ?>">Редактировать</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <p>Страница: <?php echo $page; ?> из <?php echo $total_pages; ?></p>
        <div>
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">Назад</a>
            <?php endif; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>">Вперед</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
