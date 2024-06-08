
<?php
session_start();
require_once('connect.php');
// echo $_POST['email'];
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $pass=$_POST['pass_'];
$otp = rand(100000,999999);
// $_SESSION['otp'] = $otp;
$_SESSION['mail'] = $email;
require "Mail/phpmailer/PHPMailerAutoload.php";
$mail = new PHPMailer;
// echo $email;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='denaalbustanji35@gmail.com';
$mail->Password='cjmd qupk eico gfjg';


$mail->setFrom('denaalbustanji35@gmail.com','MUTAH');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject="اعادة تعيين كلمة السر";

$mail->Body=" <div style='font-family: Arial, sans-serif; color: #333;'>
<div style='background-color: #f7f7f7; padding: 20px; text-align: center;'>
    <img src='https://bdc.org.jo/wp-content/uploads/2021/06/635083595481697317.png' alt='Logo' style='width: 150px;'>
</div>
<div style='padding: 20px; background-color: #fff; border: 1px solid #ddd;'>
    <p style='font-size: 18px;'>  طلب اعادة تعيين كلمة السر </p>
    <h3 style='color: #333;'>كود التعيين  هو: <span style='color: #e74c3c;'>$otp </span></h3>
    <br>
    <p style='font-size: 16px;'>شكرا لتعاملكم معنا...</p>
    <p style='font-size: 14px; color: #999;'>إذا كانت لديك أية أسئلة، لا تتردد في الاتصال بنا.</p>
</div>
<div style='background-color: #f7f7f7; padding: 20px; text-align: center;'>
    <p style='font-size: 12px; color: #999;'>© 2024 TTSFC MUTAH. جميع الحقوق محفوظة.</p>
</div>
</div>";

$mail->CharSet = "UTF-8";
        if(!$mail->send()){
            ?>
                <script>
                    alert("<?php echo "Register Failed, Invalid Email "?>");
                </script>
            <?php
            echo $email;
        }else{
            $_SESSION['otp'] = $otp;
            $_SESSION['pass_'] = $pass;
            ?>
            <script>
                alert("<?php echo "Successfully, OTP sent to " . $email ?>");
                window.location.replace('recov_pass.php');
            </script>
            <?php
        }
    }
?>
