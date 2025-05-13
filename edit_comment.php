<?php
include 'db.php'; // وصل شدن به دیتابیس
session_start();  // شروع جلسه برای استفاده از اطلاعات کاربر

// اگر کاربر لاگین نیست یا درخواست POST نیست، برگرد به صفحه اصلی
if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

// گرفتن اطلاعات از فرم
$comment_id = $_POST['comment_id'] ?? null;
$new_comment = trim($_POST['comment'] ?? '');

// گرفتن اطلاعات کاربر از سشن
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$is_admin = ($username === 'ghalesefid'); // اگر کاربر ادمین باشه

// اگر اطلاعات ناقص هست، کاری نکن
if (!$comment_id || !$new_comment) {
    header("Location: home.php");
    exit();
}

// پیدا کردن نویسنده‌ی نظر از دیتابیس
$stmt = $conn->prepare("SELECT user_id FROM comments WHERE id = :id");
$stmt->execute([':id' => $comment_id]);
$comment = $stmt->fetch();

// بررسی اینکه آیا کاربر خودش نویسنده است یا ادمین
if ($comment && ($comment['user_id'] == $user_id || $is_admin)) {
    // انجام ویرایش
    $stmt = $conn->prepare("UPDATE comments SET comment = :comment WHERE id = :id");
    $stmt->execute([
        ':comment' => $new_comment,
        ':id' => $comment_id
    ]);
}

// برگشت به صفحه اصلی
header("Location: home.php");
exit();
