<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';
include 'head.php';

$stmt = $conn->prepare("SELECT * FROM news ORDER BY id DESC");
$stmt->execute();
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>خرید اکانت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Vazir', sans-serif; background-color: #f8f9fa; }
        .card-img-top { height: 200px; object-fit: cover; }
        .comment-box { background: #eee; padding: 10px; margin-bottom: 10px; border-radius: 5px; font-size: 14px; }
        .edit-form textarea { margin-top: 5px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">خرید اکانت</h1>
    <div class="row">
        <?php foreach ($newsItems as $news): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= htmlspecialchars($news['imageurl'] ?? 'placeholder.jpg') ?>" class="card-img-top" alt="تصویر">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($news['title']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars(mb_substr($news['text'], 0, 100))) ?>...</p>

                        <a href="news_edit_action.php?id=<?= $news['id'] ?>" class="btn btn-warning btn-sm mt-auto <?php if ($_SESSION['username'] !== 'ghalesefid') echo 'd-none'; ?>">ویرایش</a>

                        <form action="news_delete.php" method="post" class="d-inline <?php if ($_SESSION['username'] !== 'ghalesefid') echo 'd-none'; ?>">
                            <input type="hidden" name="id" value="<?= $news['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟');">حذف</button>
                        </form>

                        <!-- نظرات -->
                        <div class="mt-3">
                            <h6>نظرات:</h6>
                            <?php
                            $stmt_comments = $conn->prepare("SELECT * FROM comments WHERE news_id = :news_id ORDER BY created_at DESC");
                            $stmt_comments->execute([':news_id' => $news['id']]);
                            $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <?php if ($comments): ?>
                                <?php foreach ($comments as $comment): ?>
                                    <div class="comment-box">
                                        <strong><?= htmlspecialchars($comment['username']) ?></strong>
                                        <small><?= $comment['created_at'] ?></small>
                                        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

                                        <?php if ($_SESSION['user_id'] == $comment['user_id'] || $_SESSION['username'] === 'ghalesefid'): ?>
                                            <a href="delete_comment.php?id=<?= $comment['id'] ?>" class="btn btn-danger btn-sm">حذف</a>
                                            <button class="btn btn-primary btn-sm" onclick="toggleEditForm(<?= $comment['id'] ?>)">ویرایش</button>

                                            <form method="POST" action="edit_comment.php" id="edit-form-<?= $comment['id'] ?>" class="edit-form d-none mt-2">
                                                <textarea name="comment" class="form-control" required><?= htmlspecialchars($comment['comment']) ?></textarea>
                                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                                <button type="submit" class="btn btn-success btn-sm mt-1">ذخیره</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted">نظری ثبت نشده است.</p>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['user_id'])): ?>
                                <form method="POST" action="add_comment.php">
                                    <textarea name="comment" class="form-control mb-2" rows="2" placeholder="نظر خود را وارد کنید..." required></textarea>
                                    <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
                                    <button type="submit" class="btn btn-primary btn-sm">ارسال نظر</button>
                                </form>
                            <?php else: ?>
                                <p class="text-muted">برای ارسال نظر ابتدا وارد شوید.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function toggleEditForm(id) {
    const form = document.getElementById('edit-form-' + id);
    form.classList.toggle('d-none');
}
</script>

</body>
</html>
