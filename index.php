<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BJMP VISITOR'S LOG MONITORING SYSTEM</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css"> -->

</head>
<body>
<script src="admin/js/sweetalert.min.js"></script>
<?php
    if (isset($_SESSION['register'])){
?>
    <script>
        swal({
        title: "<?php echo $_SESSION['register']; ?>",
        text: "<?php echo $_SESSION['register_text']; ?>",
        icon: "<?php echo $_SESSION['register_code']; ?>",
        button: "<?php echo $_SESSION['register_btn']; ?>",
      });
    </script>
    
    <?php
    unset($_SESSION['register']);
    }
?>
   
<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">  
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="fs-4 nav-link px-2 text-white">BJMP VISITOR'S LOG MONITORING WEBSITE</a></li>
      </ul>
    
      <div class="text-end">
        <div class="row">
          <div class="col">
              <a class="btn btn-dark" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="glyphicon glyphicon-name"></span><i class="fa fa-bars"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="offcanvas offcanvas-end text-bg-dark <?php if (isset($_SESSION['set'])) { echo $_SESSION['set']; unset ($_SESSION['set']);}?>" data-bs-backdrop="static" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Registration</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <div class="mb-3">
      <center><img src="admin/images/bjmp-logo.png" alt="" height="100" width="100"></center>
      <h5 class="fw-bold lh-1 text-center mt-2">Bureau of Jail and Penology Managaement</h5>
      <p class="fs-6 text-center">Log Monitoring System</p>
    </div>

    <form class="p-3 p-md-5" method="POST" action="registercode.php">
      <div class="form-floating mb-3 text-dark">
          <input type="text" class="form-control" id="adminCode" name="adminCode" placeholder="Admin Code" value="<?php if (isset($_SESSION['id'])) { echo $_SESSION['id']; unset($_SESSION['id']);}?>" required>
          <label for="adminCode"><span class="glyphicon glyphicon-name"></span><i class="fa fa-user"></i> Admin Code</label>
      </div>
      <div class="form-floating mb-3 text-dark">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <span  hidden="hidden" class="fa fa-fw field-icon ps-toggle fa-eye" style="position: absolute; right: 15px; transform:translate(0, -50%); top: 50%; cursor: pointer;" id="adminIcon"></span>
          <label for="password"><span class="glyphicon glyphicon-name"></span><i class="fa fa-lock"></i> Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit" name="confirm" id="confirm">Confirm</button>

      <div class="mt-3">
        <center><small class="text-muted "><a class="text-white" href="forgot_password.php">Forgot Password?</a></small></center>
      </div>
    </form>
  </div>
</div>

<main>
        <div class="container col-xl-10 col-xxl-10 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
              <div class="col-lg-7 text-center text-lg-start">
               <center> <img class="w-25 mb-3" src="admin/images/bjmp-logo.png" alt="">
                <h2 class="display-5 fw-bold mb-3">Welcome</h2>
                <p class="col-lg-10 fs-4">“Every day is a chance to begin again. Don’t focus on the failures of yesterday, start today with positive thoughts and expectations.”
                  - Catherine Pulsifer
                </p>
                </center>
              </div>
              <div class="col-md-10 mx-auto col-lg-4">
              <script src="admin/js/sweetalert.min.js"></script>
                  <?php
                      if (isset($_SESSION['status'])){

                        ?>
                        <script>
                            swal({
                            title: "<?php echo $_SESSION['status']; ?>",
                            text: "<?php echo $_SESSION['status_text']; ?>",
                            icon: "<?php echo $_SESSION['status_code']; ?>",
                            button: "<?php echo $_SESSION['status_btn']; ?>",
                          });
                        </script>
                        
                        <?php
                        unset($_SESSION['status']);

                      }
                  ?>
                <form class="shadow p-3 mb-5 bg-body-tertiary rounded-3 bg-light border" action="logincode.php" method="POST">
                <h5 class="h4 mb-3 fw-bold text-center">Log In</h5>
                  <div class="form-floating mb-3">
                    <select class="form-select" name="position" required>
                        <option value="" selected>Select Position</option>
                        <option value="Officer">Officer</option>
                        <option value="Admin">Admin</option>
                    </select>
                  </div>
              
                  <div class="form-floating">
                    <input type="text" class="form-control" id="UserIDInput" placeholder="UserID" name="UserIDInput" required>
                    <label for="UserIDInput"><span class="glyphicon glyphicon-name"></span><i class="fa fa-user"></i> User ID</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="UserPasswordInput" placeholder="Password" name="UserPasswordInput" required>
                    <span  hidden="hidden" class="fa fa-fw field-icon toggle-password fa-eye" style="position: absolute; right: 15px; transform:translate(0, -50%); top: 50%; cursor: pointer;" id="icon"></span>
                    <label for="UserPasswordInput"><span class="glyphicon glyphicon-name"></span><i class="fa fa-lock"></i> Password</label>
                  </div>
              
                  <button class="w-100 btn btn-lg btn-dark" type="submit" name="loginbtn">Log in</button>

                  <center><p class="mt-3 mb-3 text-muted">Did not recieve your Verification Email? <a href="resend_verification.php">Resend</a></p></center>

                  <center><p class="mt-3 mb-3 text-muted"><a href="forgot_password.php">Forgot Password?</a></p></center>
                  <center><p class="mt-5 mb-3 text-muted">&copy; APJ Website 2022</p></center>
                </form>
              </div>
            </div>
          </div>
    </main>

<div class="container">
</div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">About Us</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 pb-2 pt- py-2 px-2">
        <span class="glyphicon glyphicon-name"></span><i class="fa fa-flag"></i>
      </div>
        <h3 class="fs-2">PROVINCE OF ANTIQUE</h3>
        <p>ANTIQUE is a province in the Philippines located in the Western Visayas region. It's capital is San Jose de Buenavista, the most populous town in Antique. One of the provinces comprising Panay Island; the other three are Iloilo, Capiz and Aklan. It is a narrow strip of land stretching along the entire west coast of the island shielded from storms by mountain ranges in the east that cut off the rains of the northwest monsoon and cause a dry season from November to April. Antique is composed of 18 municipalities on a land area of 2,522 square kilometers. It had a population of 289,172 in 1970,</p>
      </div>
      <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 pb-2 pt- py-2 px-2">
        <span class="glyphicon glyphicon-name"></span><i class="fa fa-bookmark"></i>
        </div>
        <h3 class="fs-2">MISSION AND VISION</h3>
          <p> Mission</p>
          <p> To enhance public safety by ensuring humane safekeeping and development of Person's Deprived of Liberty (PDL) in all district city, and municipal jails for their reintegration to society.</p>
          <p>Vision</p>
          <p> A premier institution highly regarded by society for the secure and humane treatment of Person Deprived of Liberty(PDL) by its competent and motivated corps.</p>
      </div>
      <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 pb-2 pt- py-2 px-2">
        <span class="glyphicon glyphicon-name"></span><i class="fa fa-shield"></i>
        </div>
        <h3 class="fs-2">BJMP</h3>
          <p> On January 2, 1991, the Bureau of Jail Management and Penology was created thru Republic Act 6975 as a line Bureau under the Department of Interior and Local Government. The Jail Bureau is the upgraded version of its forerunner, the Office of Jail Management and Penology of the defunct PC/INP last headed by  BRIG GEN Arsenio E. Concepcion. As mandated by law, the BJMP shall operate under the reorganized Department of the Interior and Local Government. Starting from scratch with 500 personnel in 1991 the BJMP weaned from its mother PC/INP as a mere component, to become a full-fledged bureau. Director Charles S. Mondejar took his oath of office on July 1 of 1991 as the first Chief of the Bureau. The Bureau of Jail Management and Penology supervises and controls all district, city and municipal jails.</p>
          <p> Antique Provincial Jail is located in  San Jose Antique, Binirayan Hill.</p>
      </div>
    </div>

    <hr class="featurette-divider">

<!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2022-2023 St. Anthony's College - BSIT4 &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>


<!-- Show Password Dashboard Login -->
<script type="text/javascript">
            $(document).ready(function(){
              $("#UserPasswordInput").keyup(function(){
                  var input = $(this).val();

                  let element = document.getElementById("icon");
                  let hidden = element.getAttribute("hidden");

                   if (input == null || input == "") {
                    element.setAttribute("hidden", "hidden");
                   } 
                    else{
                      element.removeAttribute("hidden");
                   }
              });
            });
        </script>


<script>
  const togglePassword = document.querySelector('.toggle-password');
  const password = document.querySelector('#UserPasswordInput');
  togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });
</script>


<!-- Show Password Registration on offcanvas -->
<script type="text/javascript">
            $(document).ready(function(){
              $("#password").keyup(function(){
                  var input = $(this).val();

                  let element = document.getElementById("adminIcon");
                  let hidden = element.getAttribute("hidden");

                   if (input == null || input == "") {
                    element.setAttribute("hidden", "hidden");
                   } 
                    else{
                      element.removeAttribute("hidden");
                   }
              });
            });
</script>

<script>
  const passwordToggle = document.querySelector('.ps-toggle');
  const ps = document.querySelector('#password');
  passwordToggle.addEventListener('click', function (e) {
    const type = ps.getAttribute('type') === 'password' ? 'text' : 'password';
    ps.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });
</script>
</html>

