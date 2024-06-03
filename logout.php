<?php
// بدء أو استمرار الجلسة
session_start();

// إلغاء جميع البيانات المخزنة في الجلسة
$_SESSION = array();

// إنهاء الجلسة
session_destroy();
session_unset();
// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول أو أي صفحة أخرى
header("Location: login.php");
exit;
?>
