<?php
require '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message_id = $_POST['message_id'];
    $author = $_POST['author'];
    $comment = $_POST['comment'];
    addComment($message_id, $author, $comment);
    header('Location: /pages/view_message.php?id=' . $message_id);
}
?>
