<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل كلمة المرور</title>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- jQuery library -->
</head>
<body class="bg-grey" >

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
<?php
// $_SESSION['otp']=null;
if(!isset($_SESSION['otp'])){
?>
    <div class="card text-center" style="width: 300px;">
        <div class="card-header h5 text-white bg-gradient-primary opacity-8">اعادة تعيين كلمة المرور</div>
        <div class="card-body px-4">
            <p class="card-text py-2 ">
                تأكد من ان البريد الالكتروني مطابق مع بريدك الذي قمت بتسجيل الدخول من خلالة 
            </p>
            <div data-mdb-input-init class="form-outline">
                <form id="formv" onsubmit=" return checkEmail(event)" action="" method="post">

                    <label class="form-label" for="typeEmail">ادخل البريد الالكتروني</label>
                    <input type="email" id="email" name="email" class="form-control my-3" placeholder="البريد الالكتروني" required autofocus />
                    <input type="text" id="pass" name="password"  class="form-control my-3" placeholder=" كلمة المرور الجديدة" required  />
                    <input type="text" id="passc" name="passwordc" class="form-control my-3" placeholder="تاكيد كلمة المرور الجديدة" required  />
                    <button   data-mdb-button-init data-mdb-ripple-init style=" box-shadow: none;" class="btn btn-primary bg-gradient-primary opacity-8 w-100">اعادة تعيين</button>
                </form>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a class="" href="./sign-in.php">تسجيل الدخول</a>
                <a class="" href="./add acont.php">انشاء حساب</a>
            </div>
        </div>
    </div>
<?php
}else{
?>
    <div class="card text-center" style="width: 300px;     position: fixed; ">
        <div class="card-header h5 text-white bg-gradient-primary opacity-8">التحقق</div>
        <div class="card-body px-4">
            <p class="card-text py-2 ">
                تم ارسال رمز تحقق الى بريدك تحقق من صندوق الرسائل خاصتك
        </p>
            <div data-mdb-input-init class="form-outline">
                <form id="vervi" onsubmit="" action="" method="post">

                    <!-- <label class="form-label" for="typeEmail">ادخل البريد الالكتروني</label>
                    <input type="email" id="email" name="email" class="form-control my-3" placeholder="البريد الالكتروني" required autofocus />
                    <input type="text" id="typeEmail" name="password"  class="form-control my-3" placeholder=" كلمة المرور الجديدة" required  /> -->
                    <input type="text" id="otp" name="otpcode" class="form-control my-3" placeholder="ادخل هنا كود OTP" required  />
                    <button   data-mdb-button-init data-mdb-ripple-init style=" box-shadow: none;" class="btn btn-primary bg-gradient-primary opacity-8 w-100">تحقق </button>
                </form>
            </div>
            
        </div>
    </div>
    <?php

}
if(isset($_POST['otpcode'])){
    require_once('connect.php');
    if($_SESSION['otp']==$_POST['otpcode']){
        $passs=$_SESSION['pass_'];
      
        $mail=$_SESSION['mail'];
        $Update="UPDATE `teacher` SET password='$passs' WHERE email = '$mail'";
        $ersult=mysqli_query($conn,$Update);
        if($ersult){
            $_SESSION['otp']=null;
            $_SESSION['pass_']=null;
            $_SESSION['mail']=null;
echo "<script>
alert('تم اعادة تعيين كلمة المرور ');

</script>";
header("Location: ./login.php");
exit; // Stop further execution
        }else{
            ?>
            <h1 style="z-index: 1;" > <?php echo $_SESSION['otp'] ?></h1>
            <?php
            echo $_SESSION['otp'];
            echo "<script>
alert('حدث خطا اثناء التعديل يرجى المحاولة لاحقا ');
</script>";
header("Location: ./login.php");
        }
    }else {
        echo "<script>alert('كود التحقق غير صحيح');</script>";
    }
}
?>
    <div  class="  w-25 alert alert-danger opacity-9 text-center border-0 ml-2 mr-2 d-none " id="alertt" style="position: fixed; height: 20%; " >
    <button class="btn mb-4" onclick="closeAlert()" style="padding: 0;">
    <i class="fa fa-times" aria-hidden="true"></i>
</button>           
            <h3></h3>
              </div>
</div>
<form id="sent" action="sentOTP.php" method="POST" style="display: none;" >
<input type="email" id="email_" name="email" class="form-control my-3" placeholder="البريد الالكتروني" required autofocus />
<input type="text" id="pass_" name="pass_"  class="form-control my-3" placeholder=" كلمة المرور الجديدة" required  />
<input type="text" id="passc_" name="passc_" class="form-control my-3" placeholder="تاكيد كلمة المرور الجديدة" required  />

</form>
</body>
</html>


<script>
    function closeAlert() {

        // $('#alertt h3').text('Your Text Here');
    $('#alertt').removeClass('d-block').addClass('d-none');
}

function checkEmail(event) {
    event.preventDefault();
  var xhr = new XMLHttpRequest();
  email=document.getElementById('email').value;
  pass=document.getElementById('pass').value;
  passc=document.getElementById('passc').value;
  if(pass==passc){
  // تهيئة الطلب
  xhr.open('GET', 'check_email.php?email=' + email, true);
  
  // تعريف دالة التابعة لمناسبة حدوث حالة جديدة في الطلب
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
    //   var formData = new FormData($('form[name="add-pro"]')[0]);

      // التعامل مع الرد هنا
      if(response) {
          document.getElementById('email_').value=email;
          document.getElementById('pass_').value=pass;
          document.getElementById('passc_').value=passc;
        $('#sent').submit();
        
        //   window.location.href ="./sentOTP.php";
        // $('form[id="formv"]').submit();
        // sentform ()
        // showDialog("خطأ", "البريد موجود بالفعل");
    //    console.log(response);
    //    $('#formv').submit();
       return true; 
    } else {
        
        $('#alertt h3').text('لا يوجد تطابق بالبريد');
        $('#alertt').removeClass('d-none').addClass('d-block'); // استدعاء الcallback بقيمة false
        return false;
      }
    }
  };
}else{
    $('#alertt h3').text('لا يوجد تطابق بكلمات المرور');
        $('#alertt').removeClass('d-none').addClass('d-block');
}
  
  // إرسال الطلب
  xhr.send();
}


</script>
      <script>
      
      function sentform() {
    var formData = new FormData($('form[id="formv"]')[0]);
      
    $.ajax({
        type: 'POST',
        url: 'sentOTP.php',
        data: formData,
        processData: false,  // Prevent jQuery from automatically processing the data
        contentType: false,  // Prevent jQuery from automatically setting the content type
        success: function(response) {
            // window.location.href ="./sentOTP.php";
        }
    });
}

      </script>