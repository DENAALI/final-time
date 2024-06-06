<?php
session_start();
if ($_SESSION['teacher_id'] ==null)
{
  header('Location:login.php');
}

?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connect.php');
?>
<style>
  @import url("https://fonts.googleapis.com/css?family=Raleway:900&display=swap");
  
section{
  position: relative;
  width: 100%;
  height: 100vh;
  background: #512da8;
  overflow: hidden;
}
section .air{
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100px;
  background: url(https://1.bp.blogspot.com/-xQUc-TovqDk/XdxogmMqIRI/AAAAAAAACvI/AizpnE509UMGBcTiLJ58BC6iViPYGYQfQCLcBGAsYHQ/s1600/wave.png);
  background-size: 1000px 100px
}
section .air.air1{
  animation: wave 30s linear infinite;
  z-index: 1000;
  opacity: 1;
  animation-delay: 0s;
  bottom: 0;
}
section .air.air2{
  animation: wave2 15s linear infinite;
  z-index: 999;
  opacity: 0.5;
  animation-delay: -5s;
  bottom: 10px;
}
section .air.air3{
  animation: wave 30s linear infinite;
  z-index: 998;
  opacity: 0.2;
  animation-delay: -2s;
  bottom: 15px;
}
section .air.air4{
  animation: wave2 5s linear infinite;
  z-index: 997;
  opacity: 0.7;
  animation-delay: -5s;
  bottom: 20px;
}
@keyframes wave{
  0%{
    background-position-x: 0px; 
  }
  100%{
    background-position-x: 1000px; 
  }
}
@keyframes wave2{
  0%{
    background-position-x: 0px; 
  }
  100%{
    background-position-x: -1000px; 
  }
}

#container {
    position: absolute ;
    margin: auto;
    width: 100vw;
    height: 80pt;
   
    top: 0;
    bottom: 0;

    filter: url(#threshold) blur(0.6px);
}

#text1,
#text2 {
  color: #fff;
    position: absolute;
    width: 100%;
    display: inline-block;

    font-family: "Raleway", sans-serif;
    font-size: 80pt;

    text-align: center;

    user-select: none;
}
.patterns {
  height: 100vh;
}



svg text {
  font-family: Lora;
  letter-spacing: 10px;
  stroke: #e1edff;
  font-size: 100px;
  font-weight: 500;
  stroke-width: 2;
 
  animation: textAnimate 5s infinite alternate;
  
}

@keyframes textAnimate {
  0% {
    stroke-dasharray: 0 50%;
    stroke-dashoffset:  20%;
    fill:hsl(189, 68%, 75%)

  }
  
  100% {
    stroke-dasharray: 50% 0;
    stroke-dashoffstet: -20%;
    fill: hsla(189, 68%, 75%,0%)
  }
  
}



</style>
<script src= "js/countup.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div> -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4>Total Admin: <?php
               
              //  $sql="SELECT COUNT(*) FROM teacher WHERE type='admin'";
              //  $result=mysqli_query($conn,$sql);
              //  $row=mysqli_fetch_array($result);
              //  echo $row[0]; 
               
               
               ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Earnings (Monthly) Card Example -->
    <?php
$type = $_SESSION['type'];
?>
<?php if ($type == 'admin') { ?>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Admin </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
               
               $sql="SELECT COUNT(*) FROM teacher WHERE type='admin'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_array($result);
               echo ' <h5 class="text-gradient text-info" id="state3" countTo='.$row[0].'>0</h5>'; 
               
               
               ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Teachers </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
               
               $sql="SELECT COUNT(*) FROM teacher WHERE type='teacher'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_array($result);
               echo ' <h5 class="text-gradient text-info" id="state1" countTo='.$row[0].'>0</h5>'; 
               
               
               ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Head Department </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
               $sql="SELECT COUNT(*) FROM teacher WHERE type='head'";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_array($result);
               echo ' <h5 class="text-gradient text-info" id="state2" countTo='.$row[0].'>0</h5>'; 
               
               
               ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Pending Requests Card Example -->
 
  </div>
  <section>
    
  <div class="patterns">
  <svg width="100%" height="100%">
    <defs>
      <pattern id="polka-dots" x="0" y="0"                    width="100" height="100"
               patternUnits="userSpaceOnUse">
        <!-- <circle fill="#be9ddf" cx="25" cy="25" r="3"></circle> -->
      </pattern>  
        <style>
     @import url("https://fonts.googleapis.com/css?  family=Lora:400,400i,700,700i");
   </style>
      
    </defs>
              
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
     
    
   
 <text x="50%" y="60%"  text-anchor="middle"  >
   TTSFC
   MUTAH
  
 </text>
 </svg>
</div>
  <!-- <div id="container">
    <span id="text1"></span>
    <span id="text2"></span>
</div>

<svg id="filters">
    <defs>
        <filter id="threshold">
            <feColorMatrix in="SourceGraphic" type="matrix" values="1 0 0 0 0
									0 1 0 0 0
									0 0 1 0 0
									0 0 0 255 -140" />
        </filter>
    </defs>
</svg> -->
  <div class='air air1'></div>
  <div class='air air2'></div>
  <div class='air air3'></div>
  <div class='air air4'></div>
</section -->
  <!-- Content Row -->



 
  <script>
    // get the element to animate
    // var element = document.getElementById('count-stats');
    // var elementHeight = element.clientHeight;

    // listen for scroll event and call animate function

    document.addEventListener("DOMContentLoaded", animate);

    // check if element is in view
    // function inView() {
    //   // get window height
    //   var windowHeight = window.innerHeight;
    //   // get number of pixels that the document is scrolled
    //   var scrollY = window.scrollY || window.pageYOffset;
    //   // get current scroll position (distance from the top of the page to the bottom of the current viewport)
    //   var scrollPosition = scrollY + windowHeight;
    //   // get element position (distance from the top of the page to the bottom of the element)
    //   var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

    //   // is scroll position greater than element position? (is element in view?)
    //   if (scrollPosition > elementPosition) {
    //     return true;
    //   }

    //   return false;
    // }

    var animateComplete = true;
    // animate element when it is in view
    function animate() {

      // is element in view?
      // if (inView()) {
        // if (!animateComplete) {
          if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
              countUp.start();
            } else {
              console.error(countUp.error);
            }
          }
          if (document.getElementById('state2')) {
            const countUp2 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp2.error) {
              countUp2.start();
            } else {
              console.error(countUp2.error);
            }
          }
          if (document.getElementById('state3')) {
            const countUp3 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp3.error) {
              countUp3.start();
            } else {
              console.error(countUp3.error);
            };
          }
          if (document.getElementById('state4')) {
            const countUp4 = new CountUp('state4', document.getElementById("state4").getAttribute("countTo"));
            if (!countUp4.error) {
              countUp4.start();
            } else {
              console.error(countUp4.error);
            };
          }
          animateComplete = false;
        }
    
    // }

    if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 90,
        backSpeed: 90,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
  </script>


<script>
const elts = {
    text1: document.getElementById("text1"),
    text2: document.getElementById("text2")
};

const texts = [
    "If",
    "You",
    "Like",
    "It",
    "Please",
    "Give",
    "a Love",
    ":)",
    "by @DotOnion"
];

const morphTime = 1;
const cooldownTime = 0.25;

let textIndex = texts.length - 1;
let time = new Date();
let morph = 0;
let cooldown = cooldownTime;

elts.text1.textContent = texts[textIndex % texts.length];
elts.text2.textContent = texts[(textIndex + 1) % texts.length];

function doMorph() {
    morph -= cooldown;
    cooldown = 0;

    let fraction = morph / morphTime;

    if (fraction > 1) {
        cooldown = cooldownTime;
        fraction = 1;
    }

    setMorph(fraction);
}

function setMorph(fraction) {
    elts.text2.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
    elts.text2.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

    fraction = 1 - fraction;
    elts.text1.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
    elts.text1.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

    elts.text1.textContent = texts[textIndex % texts.length];
    elts.text2.textContent = texts[(textIndex + 1) % texts.length];
}

function doCooldown() {
    morph = 0;

    elts.text2.style.filter = "";
    elts.text2.style.opacity = "100%";

    elts.text1.style.filter = "";
    elts.text1.style.opacity = "0%";
}

function animate() {
    requestAnimationFrame(animate);

    let newTime = new Date();
    let shouldIncrementIndex = cooldown > 0;
    let dt = (newTime - time) / 1000;
    time = newTime;

    cooldown -= dt;

    if (cooldown <= 0) {
        if (shouldIncrementIndex) {
            textIndex++;
        }

        doMorph();
    } else {
        doCooldown();
    }
}

animate();


  </script>

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>