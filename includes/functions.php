<?php
require 'db.php';

function getMessages($page, $limit) {
    global $conn;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT id, title, short_content FROM messages LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getTotalMessagesCount() {
    global $conn;
    $sql = "SELECT COUNT(*) AS total FROM messages";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

function getMessageById($id) {
    global $conn;
    $sql = "SELECT * FROM messages WHERE id = $id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function getCommentsByMessageId($message_id) {
    global $conn;
    $sql = "SELECT * FROM comments WHERE message_id = $message_id";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addMessage($title, $author, $short_content, $full_content) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO messages (title, author, short_content, full_content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $author, $short_content, $full_content);
    $stmt->execute();
}

function editMessage($id, $title, $author, $short_content, $full_content) {
    global $conn;
    $stmt = $conn->prepare("UPDATE messages SET title = ?, author = ?, short_content = ?, full_content = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $author, $short_content, $full_content, $id);
    $stmt->execute();
}

function addComment($message_id, $author, $comment) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comments (message_id, author, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $message_id, $author, $comment);
    $stmt->execute();
}
?>
