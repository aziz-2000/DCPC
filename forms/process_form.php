<?php
// تحقق من إرسال البيانات عبر النموذج POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // تحقق من وجود البيانات المطلوبة
    $requiredFields = ['school_name', 'state', 'team', 'team_member1', 'team_phone1', 'team_email1', 'team_member2', 'team_phone2', 'team_email2', 'team_member3', 'team_phone3', 'team_email3'];
    $allFieldsPresent = true;

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $allFieldsPresent = false;
            break;
        }
    }

    if ($allFieldsPresent) {
        
        // تكوين اتصال PDO بقاعدة البيانات (يجب تعديل المعلومات هنا وفقًا لمعلومات الخادم الخاص بك)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // تعيين وضع الأخطاء لـ PDO للحصول على التنبيهات في حالة حدوث خطأ
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // استخدام استعلام الإدراج لإدراج البيانات في جدول قاعدة البيانات
            $stmt = $conn->prepare("INSERT INTO school_form (school_name, state, supervisor_name, email, phone, team, team_member1, team_phone1, team_email1, team_member2, team_phone2, team_email2, team_member3, team_phone3, team_email3) 
            VALUES (:school_name, :state, :supervisor_name, :email, :phone, :team, :team_member1, :team_phone1, :team_email1, :team_member2, :team_phone2, :team_email2, :team_member3, :team_phone3, :team_email3)");

            // تنقية المدخلات
            $school_name = htmlspecialchars($_POST['school_name']);
            $state = htmlspecialchars($_POST['state']);
            $supervisor_name = htmlspecialchars($_POST['supervisor_name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $phone = htmlspecialchars($_POST['phone']);
            $team = htmlspecialchars($_POST['team']);
            $team_member1 = htmlspecialchars($_POST['team_member1']);
            $team_phone1 = htmlspecialchars($_POST['team_phone1']);
            $team_email1 = filter_var($_POST['team_email1'], FILTER_SANITIZE_EMAIL);
            $team_member2 = htmlspecialchars($_POST['team_member2']);
            $team_phone2 = htmlspecialchars($_POST['team_phone2']);
            $team_email2 = filter_var($_POST['team_email2'], FILTER_SANITIZE_EMAIL);
            $team_member3 = htmlspecialchars($_POST['team_member3']);
            $team_phone3 = htmlspecialchars($_POST['team_phone3']);
            $team_email3 = filter_var($_POST['team_email3'], FILTER_SANITIZE_EMAIL);

            // التحقق من صحة البريد الإلكتروني
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || 
                !filter_var($team_email1, FILTER_VALIDATE_EMAIL) || 
                !filter_var($team_email2, FILTER_VALIDATE_EMAIL) || 
                !filter_var($team_email3, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("يرجى إدخال عناوين بريد إلكتروني صحيحة!");</script>';
                echo '<script>window.location.href = "school.php";</script>';
                exit();
            }

            // التحقق من صحة أرقام الهاتف (مثال: أرقام الهاتف في عمان تبدأ بـ +968)
            $phone_regex = '/^\+968[0-9]{8}$/';
            if (!preg_match($phone_regex, $phone) || 
                !preg_match($phone_regex, $team_phone1) || 
                !preg_match($phone_regex, $team_phone2) || 
                !preg_match($phone_regex, $team_phone3)) {
                echo '<script>alert("يرجى إدخال أرقام هواتف صحيحة!");</script>';
                echo '<script>window.location.href = "school.php";</script>';
                exit();
            }

            // ربط المتغيرات مع قيمها المستلمة من النموذج
            $stmt->bindParam(':school_name', $school_name);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':supervisor_name', $supervisor_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':team', $team);
            $stmt->bindParam(':team_member1', $team_member1);
            $stmt->bindParam(':team_phone1', $team_phone1);
            $stmt->bindParam(':team_email1', $team_email1);
            $stmt->bindParam(':team_member2', $team_member2);
            $stmt->bindParam(':team_phone2', $team_phone2);
            $stmt->bindParam(':team_email2', $team_email2);
            $stmt->bindParam(':team_member3', $team_member3);
            $stmt->bindParam(':team_phone3', $team_phone3);
            $stmt->bindParam(':team_email3', $team_email3);

            // تنفيذ الاستعلام
            $stmt->execute();

            // إغلاق الاتصال بقاعدة البيانات
            $conn = null;

            // إعادة توجيه المستخدم إلى صفحة نجاح الإرسال أو عرض رسالة نجاح
            echo '<script>alert("تم تسجيل البيانات بنجاح!");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
            exit();
        } catch(PDOException $e) {
            // إذا حدث خطأ، يمكنك عرض رسالة خطأ أو تسجيله في ملف السجلات
            echo "خطأ في التسجيل: " . $e->getMessage();
        }
    } else {
        // إذا لم تكن جميع الحقول المطلوبة متاحة، يمكنك إعادة توجيه المستخدم لتعبئة النموذج مرة أخرى أو عرض رسالة خطأ
        echo '<script>alert("يرجى تعبئة جميع الحقول المطلوبة!");</script>';
        echo '<script>window.location.href = "school.php";</script>';
        exit();
    }
}
?>
