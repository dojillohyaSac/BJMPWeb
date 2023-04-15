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
                        <h4 class="card-title text-white">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-floating" action="password_changeCode.php" method="POST">
                            <div class="row mb-4 mt-3">
                                <div class="col-md">
                                    <input type="hidden" class="form-control" id="floatingInput" placeholder="Email Address" name="password_token" 
                                        
                                        value="<?php if (isset($_GET['token'])) {
                                            echo $_GET['token'];
                                        } ?>" 
                                    required>
                                    <input type="hidden" class="form-control" id="floatingInput" placeholder="Email Address" name="type_user" 
                                        
                                        value="<?php if (isset($_GET['type'])) {
                                            echo $_GET['type'];
                                        } ?>" 
                                    required>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="email" 
                                        
                                            value="<?php if (isset($_GET['email'])) {
                                                echo $_GET['email'];
                                            } ?>" 
                                        required>
                                        <label for="floatingInput"><span class="glyphicon glyphicon-name"></span><i class="fa fa-envelope"></i> Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="resetPassword" placeholder="New Password" name="newPassword" required>
                                        <label for="floatingInput"> <span class="glyphicon glyphicon-name"></span><i class="fa fa-lock"></i> New Password</label>
                                    </div>
                                    <div class="form-floating ">
                                        <input type="password" class="form-control" id="resetCpassword" placeholder="Confirm Password" name="confirmPassword" required>
                                        <label for="floatingInput"> <span class="glyphicon glyphicon-name"></span><i class="fa fa-lock"></i> Confirm Password</label>
                                    </div>
                                    <div class="form-check mb-2 mt-2">
                                        <input class="form-check-input showPassword" type="checkbox">
                                        <label class="form-check-label" for="showPassword">
                                        Show Password
                                        </label>
                                    </div>
                                        <script>
                                                var toggleAdmin = document.querySelector('.showPassword');
                                                var adPassword = document.querySelector('#resetPassword');
                                                var adCpassword = document.querySelector('#resetCpassword');

                                                toggleAdmin.addEventListener("click", handleToggleClick, false);

                                                function handleToggleClick(event) {
                                                if (this.checked) {
                                                    console.warn("Change input 'type' to: text")
                                                    adPassword.type = 'text';
                                                    adCpassword.type = 'text';
                                                }else{
                                                    console.warn("Change input 'type' to: password")
                                                    adPassword.type = 'password';
                                                    adCpassword.type = 'password';
                                                }
                                                }
                                            </script>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
                                <button class="btn btn-primary me-md-2" type="submit" name="newPSBtn"><span class="glyphicon glyphicon-name"></span><i class="fa fa-send"></i> Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>