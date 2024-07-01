<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استمارة تسجيل مسابقة ظفار للبرمجة</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>تسجيل</header>
        
        <form action="process_form2.php" method="POST">
            <div class="form first">
                <div class="details personal">
               

                    <div class="fields">
                    <p>
               شروط الاشتراك في المسابقة :<br>
- أن يكون المشارك مقيد كطالب جامعي في إحدى جامعات السلطنة.<br>
- أن يتم التسجيل كفريق مكون من ثلاث متسابقين ( لا يشترط أن يكون الفريق من نفس الجامعة )<br>
- أن يلتزم الطالب بالحضور للورش التدريبية التي ستقام قبل المسابقة و لمدة أسبوعين ( عن بعد ) مع مدرب متخصص بمسابقات البرمجة التنافسية.
               </p>
               
               <div class="input-field">
                            <label>اسم الجامعة </label>
                            <input type="text" name="university" placeholder="اسم الجامعة " required>
                        </div>
               
                    </div>
                </div>
                <br><br><br><br>
                <div class="details ID">
          
                    <button class="nextBtn" type="button">
                        <span class="btnText">التالي</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">بيانات الفريق</span>

                    <div class="fields">
                    <div class="input-field">
                            <label>اسم المتسابق الأول</label>
                            <input type="text" name="team_member1" placeholder="اسم المتسابق الأول" required>
                        </div>

                        <div class="input-field">
                            <label>رقم الهاتف المتسابق الأول</label>
                            <input type="tel" name="team_phone1" placeholder="+968" required>
                        </div>

                        <div class="input-field">
                            <label>ايميل المتسابق الأول</label>
                            <input type="email" name="team_email1" placeholder="ايميل المتسابق الأول" required>
                        </div>
                        <div class="input-field">
                            <label>اسم المتسابق الثاني </label>
                            <input type="text" name="team_member2" placeholder="اسم المتسابق الثاني" required>
                        </div>

                        <div class="input-field">
                            <label>رقم الهاتف المتسابق الثاني</label>
                            <input type="tel" name="team_phone2" placeholder="+968" required>
                        </div>

                        <div class="input-field">
                            <label>ايميل المتسابق الثاني</label>
                            <input type="email" name="team_email2" placeholder="ايميل المتسابق الثاني" required>
                        </div>
                        <div class="input-field">
                            <label>اسم المتسابق الثالث</label>
                            <input type="text" name="team_member3" placeholder="اسم المتسابق الثالث" required>
                        </div>

                        <div class="input-field">
                            <label>رقم الهاتف المتسابق الثالث</label>
                            <input type="tel" name="team_phone3" placeholder="+968" required>
                        </div>

                        <div class="input-field">
                            <label>ايميل المتسابق الثالث</label>
                            <input type="email" name="team_email3" placeholder="ايميل المتسابق الثالث" required>
                        </div>
                    </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">الرجوع</span>
                        </div>
                        
                        <button class="submit" type="submit" onclick="showPopup()">
                            <span class="btnText">إرسال</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                    </div>
                </div> 
            </div>
        </form>
        <!-- Popup Modal -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <p>تم تسليم استمارتك بنجاح!</p>
            </div>
        </div>
        

    </div>

    <script src="script.js"></script>
</body>
</html>
