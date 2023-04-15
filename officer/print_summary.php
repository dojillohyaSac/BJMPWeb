<?php
include('includes/bootstrapHeader.php');

    $type = $_GET['type'];

    if ($type == "Daily") {
        ?>

<body id="printThis">
    <div class="container-fluid mt-5">
        <div class="row align-items-center">
            <div class="col-4">
                <img class="float-end" src="images/apj-logo.png" height="80" width="80" alt="">
            </div>
            <div class="col-8">
                <h3 class="fw-bold">Antique Provicial Jail</h3>
                <h6>San Jose de Buenavista, Antique</h6>
                <h5>Visitor's Log Monitoring System</h5>
            </div>
        </div>

        <div class="row text-center mt-2">
            <h5>DAILY VISIT REPORT</h5>
        </div>

        <div class="row mt-3">
            <div class="row px-2">
                    <table class="table table-responsive table-sm text-center">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Total Visits</th>
                          <th scope="col">Male</th>
                          <th scope="col">Female</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="col">
                            <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE `date_created` = CURRENT_DATE()";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h6 class="mb-0">'.$row.'</h6>';
                              }else {
                                echo '<h6 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE `date_created` = CURRENT_DATE() AND `viSex`='Male'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h6 class="mb-0">'.$row.'</h6>';
                              }else {
                                echo '<h6 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE `date_created` = CURRENT_DATE() AND `viSex`='Female'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h6 class="mb-0">'.$row.'</h6>';
                              }else {
                                echo '<h6 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row mt-3 px-2">
                    <table class="table table-responsive table-sm">
                      <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT * FROM `visitors_log` WHERE `date_created` = CURRENT_DATE()";
                              $query_run = mysqli_query($connection, $query);

                          ?>
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Visitor's ID</th>
                          <th scope="col">Visitor's Name</th>
                          <th scope="col">Sex</th>
                          <th scope="col">Inmate's ID</th>
                          <th scope="col">Inmate's Name</th>
                          <th scope="col">Relationship to Inmate</th>
                          <th scope="col">Address</th>
                          <th scope="col">Date Visited</th>
                        </tr>
                      </thead>
                      <?php
                if($query_run)
                {
                  foreach($query_run as $row)
                  {
              ?>
                      <tbody>
                        <tr>
                          <td scope="col"><?php echo $row['visitorsID']; ?></td>
                          <td scope="col"><?php echo $row['viLastname'].', '.$row['viFirstname']; ?></td>
                          <td scope="col"><?php echo $row['viSex']; ?></td>
                          <td scope="col"><?php echo $row['InmateID']; ?></td>
                          <td scope="col"><?php echo $row['inLastname'].', '.$row['inFirstname']; ?></td>
                          <td scope="col"><?php echo $row['rel_to_inmate']; ?></td>
                          <td scope="col"><?php echo $row['viAddress']; ?></td>
                          <td scope="col"><?php echo $row['date_created']; ?></td>
                        </tr>
                      </tbody>
                      <?php
                  }
                }
                else
                {
                  echo "No Record Found";
                }
            ?>
                    </table>
                  </div>
        </div>
    </div>
    
</body>


        <?php

       
    }elseif ($type == "Weekly") {
        ?>
<body id="printThis">
    <div class="container-fluid mt-5">
        <div class="row align-items-center">
            <div class="col-4">
                <img class="float-end" src="images/apj-logo.png" height="80" width="80" alt="">
            </div>
            <div class="col-8">
                <h3 class="fw-bold">Antique Provicial Jail</h3>
                <h6>San Jose de Buenavista, Antique</h6>
                <h5>Visitor's Log Monitoring System</h5>
            </div>
        </div>

        <div class="row text-center mt-2">
            <h5>DAILY VISIT REPORT</h5>
        </div>

        <div class="row mt-3">
            <div class="row px-2">
            <table class="table table-responsive table-sm text-center">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Total Visits</th>
                          <th scope="col">Male</th>
                          <th scope="col">Female</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="col">
                            <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE WEEK(`date_created`) = WEEK(CURRENT_DATE())";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE WEEK(`date_created`) = WEEK(CURRENT_DATE()) AND `viSex`='Male'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE WEEK(`date_created`) = WEEK(CURRENT_DATE()) AND `viSex`='Female'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row mt-3 px-2">
                    <table class="table table-responsive table-sm">
                      <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT DISTINCT * FROM visitors_log WHERE WEEK(`date_created`) = WEEK(CURRENT_DATE()) GROUP BY visitorsID";
                              $query_run = mysqli_query($connection, $query);

                          ?>
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Visitor's ID</th>
                          <th scope="col">Visitor's Name</th>
                          <th scope="col">Sex</th>
                          <th scope="col">Inmate's ID</th>
                          <th scope="col">Inmate's Name</th>
                          <th scope="col">Relationship to Inmate</th>
                          <th scope="col">Address</th>
                          <th scope="col">Total Visits This Year</th>
                        </tr>
                      </thead>
                      <?php
                if($query_run)
                {
                  foreach($query_run as $row)
                  {
              ?>
                      <tbody>
                        <tr>
                          <td scope="col"><?php echo $id = $row['visitorsID']; ?></td>
                          <td scope="col"><?php echo $row['viLastname'].', '.$row['viFirstname']; ?></td>
                          <td scope="col"><?php echo $row['viSex']; ?></td>
                          <td scope="col"><?php echo $row['InmateID']; ?></td>
                          <td scope="col"><?php echo $row['inLastname'].', '.$row['inFirstname']; ?></td>
                          <td scope="col"><?php echo $row['rel_to_inmate']; ?></td>
                          <td scope="col"><?php echo $row['viAddress']; ?></td>
                          <td scope="col" class="text-center">
                              <?php
                                $visits_num = "SELECT COUNT(visitorsID) as visits FROM visitors_log WHERE visitorsID='$id'";
                                $visits_num_run = mysqli_query($conn, $visits_num);
                                $v = mysqli_fetch_array($visits_num_run);

                                echo $v['visits'];
                              ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                  }
                }
                else
                {
                  echo "No Record Found";
                }
            ?>
                    </table>
                  </div>
        </div>
    </div>
    
</body>


<?php
       
    }elseif ($type == "Monthly") {
        ?>
<body id="printThis">
    <div class="container-fluid mt-5">
        <div class="row align-items-center">
            <div class="col-4">
                <img class="float-end" src="images/apj-logo.png" height="80" width="80" alt="">
            </div>
            <div class="col-8">
                <h3 class="fw-bold">Antique Provicial Jail</h3>
                <h6>San Jose de Buenavista, Antique</h6>
                <h5>Visitor's Log Monitoring System</h5>
            </div>
        </div>

        <div class="row text-center mt-2">
            <h5>DAILY VISIT REPORT</h5>
        </div>

        <div class="row mt-3">
            <div class="row px-2">
            <table class="table table-responsive table-sm text-center">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Total Visits</th>
                          <th scope="col">Male</th>
                          <th scope="col">Female</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="col">
                            <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE MONTH(`date_created`) = MONTH(CURRENT_DATE())";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE MONTH(`date_created`) = MONTH(CURRENT_DATE()) AND `viSex`='Male'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE MONTH(`date_created`) = MONTH(CURRENT_DATE()) AND `viSex`='Female'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row mt-3 px-2">
                    <table class="table table-responsive table-sm">
                      <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT DISTINCT * FROM visitors_log WHERE MONTH(`date_created`) = MONTH(CURRENT_DATE()) GROUP BY visitorsID";
                              $query_run = mysqli_query($connection, $query);

                          ?>
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Visitor's ID</th>
                          <th scope="col">Visitor's Name</th>
                          <th scope="col">Sex</th>
                          <th scope="col">Inmate's ID</th>
                          <th scope="col">Inmate's Name</th>
                          <th scope="col">Relationship to Inmate</th>
                          <th scope="col">Address</th>
                          <th scope="col">Total Visits This Year</th>
                        </tr>
                      </thead>
                      <?php
                if($query_run)
                {
                  foreach($query_run as $row)
                  {
              ?>
                      <tbody>
                        <tr>
                          <td scope="col"><?php echo $id = $row['visitorsID']; ?></td>
                          <td scope="col"><?php echo $row['viLastname'].', '.$row['viFirstname']; ?></td>
                          <td scope="col"><?php echo $row['viSex']; ?></td>
                          <td scope="col"><?php echo $row['InmateID']; ?></td>
                          <td scope="col"><?php echo $row['inLastname'].', '.$row['inFirstname']; ?></td>
                          <td scope="col"><?php echo $row['rel_to_inmate']; ?></td>
                          <td scope="col"><?php echo $row['viAddress']; ?></td>
                          <td scope="col" class="text-center">
                              <?php
                                $visits_num = "SELECT COUNT(visitorsID) as visits FROM visitors_log WHERE visitorsID='$id'";
                                $visits_num_run = mysqli_query($conn, $visits_num);
                                $v = mysqli_fetch_array($visits_num_run);

                                echo $v['visits'];
                              ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                  }
                }
                else
                {
                  echo "No Record Found";
                }
            ?>
                    </table>
                  </div>
        </div>
    </div>
    
</body>


<?php
       
    }elseif ($type == "Annual") {
        ?>
<body id="printThis">
    <div class="container-fluid mt-5">
        <div class="row align-items-center">
            <div class="col-4">
                <img class="float-end" src="images/apj-logo.png" height="80" width="80" alt="">
            </div>
            <div class="col-8">
                <h3 class="fw-bold">Antique Provicial Jail</h3>
                <h6>San Jose de Buenavista, Antique</h6>
                <h5>Visitor's Log Monitoring System</h5>
            </div>
        </div>

        <div class="row text-center mt-2">
            <h5>DAILY VISIT REPORT</h5>
        </div>

        <div class="row mt-3">
            <div class="row px-2">
            <table class="table table-responsive table-sm text-center">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Total Visits</th>
                          <th scope="col">Male</th>
                          <th scope="col">Female</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="col">
                            <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE YEAR(`date_created`) = YEAR(CURRENT_DATE())";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE YEAR(`date_created`) = YEAR(CURRENT_DATE()) AND `viSex`='Male'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                          <td scope="col">
                          <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT `IDNumber` FROM `visitors_log` WHERE YEAR(`date_created`) = YEAR(CURRENT_DATE()) AND `viSex`='Female'";
                              $query_run = mysqli_query($connection, $query);

                              if ($row = mysqli_num_rows($query_run)) {
                                echo '<h4 class="mb-0">'.$row.'</h4>';
                              }else {
                                echo '<h4 class="mb-0">0</h6>';
                              }
                          ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row mt-3 px-2">
                    <table class="table table-responsive table-sm">
                      <?php
                    
                              include('includes/dbconfig.php');

                              $query = "SELECT DISTINCT * FROM visitors_log WHERE YEAR(`date_created`) = YEAR(CURRENT_DATE()) GROUP BY visitorsID";
                              $query_run = mysqli_query($connection, $query);

                          ?>
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Visitor's ID</th>
                          <th scope="col">Visitor's Name</th>
                          <th scope="col">Sex</th>
                          <th scope="col">Inmate's ID</th>
                          <th scope="col">Inmate's Name</th>
                          <th scope="col">Relationship to Inmate</th>
                          <th scope="col">Address</th>
                          <th scope="col">Total Visits This Year</th>
                        </tr>
                      </thead>
                      <?php
                if($query_run)
                {
                  foreach($query_run as $row)
                  {
              ?>
                      <tbody>
                        <tr>
                          <td scope="col"><?php echo $id = $row['visitorsID']; ?></td>
                          <td scope="col"><?php echo $row['viLastname'].', '.$row['viFirstname']; ?></td>
                          <td scope="col"><?php echo $row['viSex']; ?></td>
                          <td scope="col"><?php echo $row['InmateID']; ?></td>
                          <td scope="col"><?php echo $row['inLastname'].', '.$row['inFirstname']; ?></td>
                          <td scope="col"><?php echo $row['rel_to_inmate']; ?></td>
                          <td scope="col"><?php echo $row['viAddress']; ?></td>
                          <td scope="col" class="text-center">
                              <?php
                                $visits_num = "SELECT COUNT(visitorsID) as visits FROM visitors_log WHERE visitorsID='$id'";
                                $visits_num_run = mysqli_query($conn, $visits_num);
                                $v = mysqli_fetch_array($visits_num_run);

                                echo $v['visits'];
                              ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                  }
                }
                else
                {
                  echo "No Record Found";
                }
            ?>
                    </table>
                  </div>
        </div>
    </div>
    
</body>


        <?php
    }else {
        echo "Data Cannot Be Found!";
    }

?>

<style>
  .row{
    font-size: .6rem;
    

  }

  @media print{
    body *:not(#printThis):not(#printThis *){
      visibility: hidden;
    }

    #printThis{
      position: absolute;
      top: 0;
      left: 0;

    }
  }

</style>


<script>
        window.print();
</script>