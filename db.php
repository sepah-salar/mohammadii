<?php
$host = 'localhost';  // سرور دیتابیس
$dbname = 'onenewsdb';  
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); //برای اتصال به دیتابیس
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //خطا یابی

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>