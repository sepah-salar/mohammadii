<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// اتصال به دیتابیس
$link = mysqli_connect("localhost", "root", "", "onenewsdb");
if (!$link) {
    die("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");

// اجرای کوئری
$query = "SELECT * FROM news ORDER BY id DESC";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);
if (!$result) {
    die("خطا در اجرای کوئری: " . mysqli_error($link));
}

include("head.php");
?>

<div class="container mt-5">
    <h1 class="text-center">وبلاگ</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php 
                    while ($row) 
                    { 
                    
                    $full_text = htmlspecialchars($row['text'] ?? '');
                    $sentences = preg_split('/(?<=[.!؟])\s+/', $full_text, 2);
                    $first_sentence = $sentences[0] ?? $full_text;
                    $imageUrl = !empty($row['imageurl']) ? htmlspecialchars($row['imageurl']) : 'placeholder.jpg';
                    ?>
                    
                    <div class="card mb-4">
                        <img src="<?= $imageUrl ?>" class="card-img-top" alt="تصویر مقاله">
                        <div class="card-body" dir="rtl">
                            <h5 class="card-title"><?= htmlspecialchars($row['title'] ?? '') ?></h5>
                            <p class="card-text short-text"><?= $first_sentence ?>...</p>
                            <p class="card-text full-text d-none"><?= nl2br($full_text) ?></p>
                            <button class="btn btn-primary read-more">مطالعه بیشتر</button>
                            
                            <?php if(isset($_SESSION['username']) && $_SESSION['username'] === 'ghalesefid'): ?>
                                <a href="news_edit.php?id=<?= (int)$row['id'] ?>" class="btn btn-warning">✏ ویرایش</a>
                                <form action="news_delete.php" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟');">🗑 حذف</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $row = mysqli_fetch_array($result);
                    }
                    ?>
            <?php else: ?>
                <div class="alert alert-info text-center">مقاله‌ای یافت نشد.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
mysqli_free_result($result);
mysqli_close($link);
include("footer.php");
?>

<script>
document.querySelectorAll('.read-more').forEach(button => {
    button.addEventListener('click', function() {
        const cardBody = this.closest('.card-body');
        const shortText = cardBody.querySelector('.short-text');
        const fullText = cardBody.querySelector('.full-text');
        
        if (fullText.classList.contains('d-none')) {
            shortText.classList.add('d-none');
            fullText.classList.remove('d-none');
            this.textContent = 'نمایش کمتر';
        } else {
            shortText.classList.remove('d-none');
            fullText.classList.add('d-none');
            this.textContent = 'مطالعه بیشتر';
        }
    });
});
</script>