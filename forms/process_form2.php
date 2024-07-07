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
$university = htmlspecialchars($_POST["university"]);
$team_member1 = htmlspecialchars($_POST["team_member1"]);
$team_phone1 = htmlspecialchars($_POST["team_phone1"]);
$team_email1 = filter_var($_POST["team_email1"], FILTER_SANITIZE_EMAIL);
$team_member2 = htmlspecialchars($_POST["team_member2"]);
$team_phone2 = htmlspecialchars($_POST["team_phone2"]);
$team_email2 = filter_var($_POST["team_email2"], FILTER_SANITIZE_EMAIL);
$team_member3 = htmlspecialchars($_POST["team_member3"]);
$team_phone3 = htmlspecialchars($_POST["team_phone3"]);
$team_email3 = filter_var($_POST["team_email3"], FILTER_SANITIZE_EMAIL);

// Validate email addresses
if (!filter_var($team_email1, FILTER_VALIDATE_EMAIL) || 
    !filter_var($team_email2, FILTER_VALIDATE_EMAIL) || 
    !filter_var($team_email3, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("يرجى إدخال عناوين بريد إلكتروني صحيحة!");</script>';
    echo '<script>window.location.href = "Universities.php";</script>';
    exit;
}

// Validate phone numbers (example: Oman phone numbers starting with +968)
$phone_regex = '/^\+968[0-9]{8}$/';
if (!preg_match($phone_regex, $team_phone1) || 
    !preg_match($phone_regex, $team_phone2) || 
    !preg_match($phone_regex, $team_phone3)) {
    echo '<script>alert("يرجى إدخال أرقام هواتف صحيحة!");</script>';
    echo '<script>window.location.href = "Universities.php";</script>';
    exit;
}

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
