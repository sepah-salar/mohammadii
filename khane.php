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
    <h1 class="text-center"> </h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php if (mysqli_num_rows($result) > 0): ?>




<div class="container my-4">
        <h2 class="mb-4">iran jem</h2>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 mb-3">
                <div class="card">
                    <img src="images/logo (1).jpg" class="card-img-top" alt="Article 1">
                    <div class="card-body">
                        <h5 class="card-title">همه چیز درباره کلش</h5>
                        <p class="text-muted">تاریخ انتشار: 2024  </p>
                        <p class="card-text">کلش اف کلنز یک بازی در سبک استراتژیک است که در جهان علاقه مندان زیادی....</p>
                        <a href="#" class="btn btn-primary">ادامه مطلب</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 mb-3">
                <div class="card">
                    <img src="images/logo (5).jpg" class="card-img-top" alt="Article 2" style="    height: 233px;">
                    <div class="card-body">  
                        <h5 class="card-title">پرسنل سوپرسل</h5>
                        <p class="text-muted">تعداد : 400 نفر  </p>
                        <p class="card-text">سوپرسل کارمندانی در بخش هایی از جمله توسعه بازی . بازاریابی و...</p>
                        <a href="#" class="btn btn-primary">ادامه مطلب</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 mb-3">
                <div class="card">
                    <img src="images/logo (3).jpg" class="card-img-top" alt="Article 3">
                    <div class="card-body">
                        <h5 class="card-title">برنامه های مرتبط</h5>
                        <p class="text-muted">تعداد : 10 عدد  </p>
                        <p class="card-text"> سوپرسل در این سال ها توانسته چندین بازی پرطرف دار تولید کند که بعضی از این بازی ها فعلا غیر فعال هستند و...</p>
                        <a href="#" class="btn btn-primary">ادامه مطلب</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

 
<?php
                    $row = mysqli_fetch_array($result);
                    {
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