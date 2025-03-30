<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "123sagaiai@gmail.com"; // البريد المستلم
    $subject = "طلب حجز موعد";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $specialty = $_POST['specialty'];
    $confirmation = $_POST['confirmation'];

    // تصميم الرسالة بـ HTML
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
            .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px #aaa; width: 50%; margin: auto; }
            h2 { color: #D32F2F; }
            p { font-size: 18px; color: #333; }
            .yes { color: green; font-weight: bold; }
            .no { color: red; font-weight: bold; }
            table { width: 100%; border-collapse: collapse; }
            td, th { padding: 10px; border: 1px solid #ddd; text-align: left; }
            th { background-color: #D32F2F; color: white; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>تفاصيل حجز الموعد</h2>
            <table>
                <tr><th>البيان</th><th>التفاصيل</th></tr>
                <tr><td>👤 الاسم</td><td>$name</td></tr>
                <tr><td>📞 رقم الهاتف</td><td>$phone</td></tr>
                <tr><td>📧 البريد الإلكتروني</td><td>$email</td></tr>
                <tr><td>📅 التاريخ</td><td>$date</td></tr>
                <tr><td>🕒 الوقت</td><td>$time</td></tr>
                <tr><td>🏥 التخصص</td><td>$specialty</td></tr>
                <tr><td>✅ التأكيد</td><td class='". ($confirmation == "نعم" ? "yes" : "no") ."'>$confirmation</td></tr>
            </table>
            <p>شكراً لك على استخدام خدمة حجز المواعيد لدينا!</p>
        </div>
    </body>
    </html>
    ";

    // إعدادات البريد
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourclinic.com" . "\r\n";

    // إرسال البريد
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('تم إرسال الطلب بنجاح!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء الإرسال!');</script>";
    }
}
?>
