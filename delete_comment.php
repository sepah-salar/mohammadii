<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $is_admin = $_SESSION['username'] === 'ghalesefid';

    $stmt = $conn->prepare("SELECT * FROM comments WHERE id = :id");
    $stmt->bindParam(':id', $comment_id);
    $stmt->execute();
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($comment && ($comment['user_id'] == $user_id || $is_admin)) {
        $stmt = $conn->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $comment_id);
        $stmt->execute();
    }

    header("Location: home.php");
    exit();
}
?>