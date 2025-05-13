<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

$news_id = $_POST['news_id'] ?? null;
$comment = trim($_POST['comment'] ?? '');
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if ($news_id && $comment) {
    $stmt = $conn->prepare("INSERT INTO comments (news_id, user_id, username, comment) VALUES (:news_id, :user_id, :username, :comment)");
    $stmt->execute([
        ':news_id' => $news_id,
        ':user_id' => $user_id,
        ':username' => $username,
        ':comment' => $comment
    ]);
}

header("Location: home.php");
exit();
