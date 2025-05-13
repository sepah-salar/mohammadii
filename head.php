<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت خرید و فروش اکانت کلش</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #fff8e1;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        header {
            background: linear-gradient(135deg, #f9a825, #f57f17);
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 1px 1px 3px #000;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .navbar {
            background: #ffe082;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: bold;
            color: #d84315 !important;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #bf360c !important;
        }

        .user-menu {
            position: fixed;
            top: 20px;
            left: 30px; /* این تغییر باعث می‌شود که منو به سمت چپ صفحه منتقل شود */
            z-index: 1000;
        }

        .username {
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: #d84315;
            padding: 8px 15px;
            border-radius: 6px;
            background: #ffe0b2;
            transition: 0.3s;
        } 

        .username:hover {
            background: #ffcc80;
        }

        .dropdown {
            display: none;
            position: absolute;
            left: 0;
            background: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            border-radius: 6px;
            overflow: hidden;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #d84315;
            text-decoration: none;
        }

        .dropdown a:hover {
            background: #fbe9e7;
        }

        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin: 10px 0;
            }

            .user-menu {
                position: static;
                margin-top: 10px;
                text-align: center;
            }

            .navbar-toggler {
                border: none;
            }
        }
    </style>
</head>
<body>

<header>فروشگاه اکانت کلش اف کلنز</header>

<nav class="navbar navbar-expand-lg navbar-light" dir="rtl">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <div class="user-menu">
            <?php if(isset($_SESSION['username'])): ?>
                <div class="username" onclick="toggleMenu()">
                    <?= htmlspecialchars($_SESSION['username']) ?>
                    <div class="dropdown" id="dropdownMenu">
                        <a href="logout.php">خروج</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="index.php" class="btn btn-warning">ورود</a>
            <?php endif; ?>
        </div>
      
        <ul class="navbar-nav">

        <li class="nav-item"><a class="nav-link" href="khane.php">خانه</a></li>
            <li class="nav-item"><a class="nav-link" href="home.php">خرید کانت</a></li>
            <?php if(isset($_SESSION['username']) && $_SESSION['username'] === 'ghalesefid'): ?>
                <li class="nav-item"><a class="nav-link" href="news_add.php">افزودن اکانت</a></li>
            <?php endif; ?>

            <?php if(isset($_SESSION['username']) && $_SESSION['username'] === 'ghalesefid'): ?>
                <li class="nav-item"><a class="nav-link" href="wablog.php">پنل مدیریت</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link" href="connectme.php">تماس با ما</a></li>
            <li class="nav-item"><a class="nav-link" href="aboutme.php">درباره ما</a></li>
        </ul>
    </div>
    
</nav>

<script>
    function toggleMenu() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }
</script>

</body>
</html>
