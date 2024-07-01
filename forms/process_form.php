<?php
// تحقق من إرسال البيانات عبر النموذج POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // تحقق من وجود البيانات المطلوبة
    if (isset($_POST['school_name'], $_POST['state'], $_POST['team'], $_POST['team_member1'], $_POST['team_phone1'], $_POST['team_email1'], $_POST['team_member2'], $_POST['team_phone2'], $_POST['team_email2'], $_POST['team_member3'], $_POST['team_phone3'], $_POST['team_email3'])) {
        
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

            // ربط المتغيرات مع قيمها المستلمة من النموذج
            $stmt->bindParam(':school_name', $_POST['school_name']);
            $stmt->bindParam(':state', $_POST['state']);
            $stmt->bindParam(':supervisor_name', $_POST['supervisor_name']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':phone', $_POST['phone']);
            $stmt->bindParam(':team', $_POST['team']);
            $stmt->bindParam(':team_member1', $_POST['team_member1']);
            $stmt->bindParam(':team_phone1', $_POST['team_phone1']);
            $stmt->bindParam(':team_email1', $_POST['team_email1']);
            $stmt->bindParam(':team_member2', $_POST['team_member2']);
            $stmt->bindParam(':team_phone2', $_POST['team_phone2']);
            $stmt->bindParam(':team_email2', $_POST['team_email2']);
            $stmt->bindParam(':team_member3', $_POST['team_member3']);
            $stmt->bindParam(':team_phone3', $_POST['team_phone3']);
            $stmt->bindParam(':team_email3', $_POST['team_email3']);

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
