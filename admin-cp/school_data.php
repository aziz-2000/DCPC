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
    <title>عرض بيانات الاستمارات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl; /* Right-to-left text direction */
            text-align: right; /* Right-align text */
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .print-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        .print-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>عرض بيانات الاستمارات</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المدرسة</th>
                    <th>الولاية</th>
                    <th>اسم المشرف</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>اسم الفريق</th>
                    <th>اسم المتسابق الأول</th>
                    <th>رقم هاتف المتسابق الأول</th>
                    <th>ايميل المتسابق الأول</th>
                    <th>اسم المتسابق الثاني</th>
                    <th>رقم هاتف المتسابق الثاني</th>
                    <th>ايميل المتسابق الثاني</th>
                    <th>اسم المتسابق الثالث</th>
                    <th>رقم هاتف المتسابق الثالث</th>
                    <th>ايميل المتسابق الثالث</th>
                    <th>تاريخ التسجيل</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Replace with your database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from database
                $sql = "SELECT * FROM school_form";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["school_name"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . $row["supervisor_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["team"] . "</td>";
                        echo "<td>" . $row["team_member1"] . "</td>";
                        echo "<td>" . $row["team_phone1"] . "</td>";
                        echo "<td>" . $row["team_email1"] . "</td>";
                        echo "<td>" . $row["team_member2"] . "</td>";
                        echo "<td>" . $row["team_phone2"] . "</td>";
                        echo "<td>" . $row["team_email2"] . "</td>";
                        echo "<td>" . $row["team_member3"] . "</td>";
                        echo "<td>" . $row["team_phone3"] . "</td>";
                        echo "<td>" . $row["team_email3"] . "</td>";
                        echo "<td>" . $row["submission_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>لا توجد بيانات لعرضها</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <button class="print-button" onclick="window.print()">طباعة الصفحة</button>
    </div>
</body>
</html>
