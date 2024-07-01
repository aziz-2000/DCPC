<?php
// Start the session
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .home-box {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .home-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .button-group {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .action-button {
            width: 120px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .action-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="home-box">
        <h2>مرحبًا <?php echo $_SESSION['username']; ?></h2>
        <div class="button-group">
            <a href="school_data.php" class="action-button">بيانات المدارس</a>
            <a href="univer_data.php" class="action-button">بيانات الجامعات</a>
        </div>
    </div>
</body>
</html>
