<?php
$link = mysqli_connect("localhost", "root", "", "onenewsdb");
if (!$link) {
    die("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}

if (!isset($_POST['id'])) {
    die("شناسه مقاله ارسال نشده است!");
}

$id = $_POST['id'];
echo("sss");
$query = "DELETE FROM news WHERE id = $id";
$result = mysqli_query($link, $query);

mysqli_close($link);

if ($result) {
    echo "<script>alert('خبر با موفقیت حذف شد!'); location.replace('wablog.php');</script>";
} else {
    echo "<script>alert('حذف خبر انجام نشد!'); location.replace('wablog.php');</script>";
}
?>
