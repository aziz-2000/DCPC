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
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .print-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
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
                    <th>الجامعة</th>
                    <th>المتسابق الأول</th>
                    <th>رقم الهاتف المتسابق الأول</th>
                    <th>البريد الإلكتروني المتسابق الأول</th>
                    <th>المتسابق الثاني</th>
                    <th>رقم الهاتف المتسابق الثاني</th>
                    <th>البريد الإلكتروني المتسابق الثاني</th>
                    <th>المتسابق الثالث</th>
                    <th>رقم الهاتف المتسابق الثالث</th>
                    <th>البريد الإلكتروني المتسابق الثالث</th>
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
                $sql = "SELECT * FROM university_form";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["university"] . "</td>";
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
                    echo "<tr><td colspan='12'>لا توجد بيانات لعرضها</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <button class="print-button" onclick="window.print()">طباعة الصفحة</button>
    </div>
</body>
</html>
