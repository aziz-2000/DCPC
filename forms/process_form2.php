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

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO university_form (university, team_member1, team_phone1, team_email1, team_member2, team_phone2, team_email2, team_member3, team_phone3, team_email3, submission_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    // Bind parameters
    $stmt->bind_param("ssssssssss", $university, $team_member1, $team_phone1, $team_email1, $team_member2, $team_phone2, $team_email2, $team_member3, $team_phone3, $team_email3);

    // Set parameters and execute
    $university = $_POST["university"];
    $team_member1 = $_POST["team_member1"];
    $team_phone1 = $_POST["team_phone1"];
    $team_email1 = $_POST["team_email1"];
    $team_member2 = $_POST["team_member2"];
    $team_phone2 = $_POST["team_phone2"];
    $team_email2 = $_POST["team_email2"];
    $team_member3 = $_POST["team_member3"];
    $team_phone3 = $_POST["team_phone3"];
    $team_email3 = $_POST["team_email3"];

    if ($stmt->execute()) {
        echo '<script>alert("تم تسجيل البيانات بنجاح!");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    } else {
        echo '<script>alert("يرجى تعبئة جميع الحقول المطلوبة!");</script>';
        echo '<script>window.location.href = "Universities.php";</script>';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
    ?>