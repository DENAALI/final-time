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

<script src= "js/countup.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

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




  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>