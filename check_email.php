<?php
// الاتصال بقاعدة البيانات
include_once("connect.php");

// التأكد من الاتصال
if (!$conn) {
  die("فشل الاتصال: " . mysqli_connect_error());
}

// استقبال قيمة البريد الإلكتروني من الطلب
$email = $_GET['email'];

// تنفيذ الاستعلام
$selectemail = "SELECT * FROM teacher WHERE email='$email'";
$emailresult = mysqli_query($conn, $selectemail);

// التحقق من وجود البريد الإلكتروني
if (mysqli_num_rows($emailresult) > 0) {
  // البريد الإلكتروني موجود
  echo true;
} else {
  // البريد الإلكتروني غير موجود
  echo false;
}

// إغلاق الاتصال بقاعدة البيانات
// mysqli_close($connect);
?>
