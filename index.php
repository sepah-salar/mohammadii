<?php
// فایل اتصال به پایگاه داده را شامل می‌شود
include 'db.php';
// شروع یک session جدید یا ادامه session موجود
session_start();


// بررسی می‌کند که آیا درخواست از نوع POST است یا خیر
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // دریافت نام کاربری از فرم
    $username = $_POST['username'];
    // دریافت رمز عبور از فرم
    $password = $_POST['password'];
    
    // آماده‌سازی query برای انتخاب کاربر با نام کاربری داده شده
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    // اتصال پارامتر :username به متغیر $username برای جلوگیری از SQL injection
    $stmt->bindParam(':username', $username);                                     //پارامتر
    // اجرای query
    $stmt->execute();
    // دریافت نتیجه به صورت یک آرایه انجمنی
    $user = $stmt->fetch(PDO::FETCH_ASSOC);                                  //ارایه انجمنی

    // بررسی می‌کند آیا کاربر وجود دارد و رمز عبور صحیح است
    if ($user && password_verify($password, $user['password'])) {
        // ذخیره شناسه کاربر در session
        $_SESSION['user_id'] = $user['id'];
        // ذخیره نام کاربری در session
        $_SESSION['username'] = $user['username'];
        // هدایت کاربر به صفحه home.php
        header("Location: home.php"); 
    } else {
        // نمایش پیام خطا اگر نام کاربری یا رمز عبور اشتباه باشد
        echo '<script type=text/javascript>alert("چنین کاربری در سیستم موجود نیست : رمز اشتباه یا یوزر نیم اشتباه")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- تعیین encoding صفحه -->
    <meta charset="UTF-8">
    <!-- تنظیم viewport برای نمایش صحیح در دستگاه‌های مختلف -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- عنوان صفحه -->
    <title>Login</title>
    <!-- لینک به فایل CSS -->
    <link rel="stylesheet" href="login.css">
    <!-- لینک به آیکون‌های boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <!-- div اصلی برای فرم لاگین -->
    <div class="wrapper">
        <!-- فرم لاگین با method POST که به همین صفحه ارسال می‌شود -->
        <form method="POST" action="">
            <!-- عنوان فرم -->
            <h1>Login</h1>
            <!-- div برای فیلد نام کاربری -->
            <div class="input-bux">
                <!-- input برای وارد کردن نام کاربری -->
                <input type="text" placeholder="Username" id="username" name="username" required>
                <!-- آیکون کاربر -->
                <i class='bx bxs-user'></i>
            </div>
            <!-- div برای فیلد رمز عبور -->
            <div class="input-bux">
                <!-- input برای وارد کردن رمز عبور -->
                <input type="password" placeholder="Password" id="password" name="password" required>
                <!-- آیکون قفل -->
                <i class='bx bxs-lock'></i>

            </div>
            <!-- div برای گزینه‌های "مرا به خاطر بسپار" و "فراموشی رمز عبور" -->
            <div class="remember-forgot">
                <!-- چک باکس برای به خاطر سپردن کاربر -->
                <label><input type="checkbox"> Remember me </label>
                <!-- لینک بازیابی رمز عبور -->
                <a href="#">Forgot password ?</a>
            </div>
            <!-- دکمه ارسال فرم -->
            <button type="submit" class="btn">Login</button>
            <!-- div برای لینک ثبت نام -->
            <div class="sign-up">
                <!-- متن و لینک به صفحه ثبت نام -->
                <p>Don't have an account?<a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>