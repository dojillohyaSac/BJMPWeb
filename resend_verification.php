<?php
include ('includes/bootstrapHeader.php');
include ('includes/script.php');
session_start();
?>

<body>

<header class="p-3 text-bg-dark">
    <div class="row bg-dark text-white pb-3 pt-3">
          <h1 style="text-align: center;"><img src="images/apj-logo.png" height="70" width="70" alt=""> APJ VISITOR'S LOG MONITORING WEBSITE</h1>
    </div>
</header>
<script src="js/sweetalert.min.js"></script>
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

    <div class="container py-5 mt-5">
        <div class="row justify-content-center pb-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white">Resend Verification Email</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-floating" action="resend_verification_code.php" method="POST">
                            <h6 class="text-muted mb-3">Input your Registered Email to receive a new Verification Email</h6>
                            <div class="row mb-4 mt-3">
                                <div class="col-md-9">
                                    <div class="form-floating mb-2">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="resendEmail" required>
                                        <label for="floatingInput"><span class="glyphicon glyphicon-name"></span><i class="fa fa-envelope"></i> Email address</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select form-select-lg" aria-label="Default select example" name="position" required>
                                        <option value="" selected>Position</option>
                                        <option value="admin_token">Admin</option>
                                        <option value="officer_token">Officer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <button class="btn btn-primary me-md-2" type="submit" name="resendBtn"><span class="glyphicon glyphicon-name"></span><i class="fa fa-send"></i> Resend Verification</button>
                            </div>
                        </form>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-3 mb-3">
                            <a class="btn btn-dark me-md-2" href="index.php"><span class="glyphicon glyphicon-name"></span><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>