<?php
include('includes/config.php');
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
include('includes/side_nav.php');
?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard - Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <!-- Visitors Tally Board -->
                            <div class="card mb-3 shadow">
                            <div class="card-header">
                                <h5>Releasing Tally</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">
                                            Number of Visitors
                                            <?php

                                            $query_number = "SELECT `IDNumber` FROM `visitors_record` ORDER BY `IDNumber`";
                                            $query_number_run = mysqli_query($connection, $query_number);

                                            if ($row = mysqli_num_rows($query_number_run)) {
                                                echo '<h1 class="mb-0">'.$row.'</h1>';
                                            }else {
                                                echo '<h1 class="mb-0"> No Data Found </h1>';
                                            }
                                            ?>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-secondary text-white mb-4">
                                        <div class="card-body">
                                        Non-Active Visitor's Data
                                        <?php
                                            $query = "SELECT `IDNumber` FROM `visitors_record` WHERE `Status`= 0 ORDER BY `IDNumber`";
                                            $query_run = mysqli_query($connection, $query);

                                            if ($row = mysqli_num_rows($query_run)) {
                                                echo '<h1 class="mb-0">'.$row.'</h1>';
                                            }else {
                                                echo '<h1 class="mb-0"> No Data Found </h1>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">
                                            Number of Inmates
                                            <?php
                                            $query_number = "SELECT * FROM `inmates_record` ORDER BY `IDNumber`";
                                            $query_number_run = mysqli_query($connection, $query_number);

                                            if ($row = mysqli_num_rows($query_number_run)) {
                                                echo '<h1 class="mb-0">'.$row.'</h1>';
                                            }else {
                                                echo '<h1 class="mb-0"> No Data Found </h1>';
                                            }
                                            ?>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-secondary text-white mb-4">
                                        <div class="card-body">
                                        Released Inmate's Data
                                        <?php
                                            $query = "SELECT `IDNumber` FROM `inmates_record` WHERE `Status` = 0";
                                            $query_run = mysqli_query($connection, $query);

                                            if ($row = mysqli_num_rows($query_run)) {
                                                echo '<h1 class="mb-0">'.$row.'</h1>';
                                            }else {
                                                echo '<h1 class="mb-0"> No Data Found </h1>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4 shadow">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4 shadow">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Example
                                    </div>
                                    <center><div style="height:416px;" class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div></center>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php
  $current_year = "SELECT YEAR(CURRENT_TIMESTAMP)";
  $current_year_run = mysqli_query($connection, $current_year);

  if ($current_year_run) {
    $query = "SELECT EXTRACT(YEAR FROM date_issued) AS year, EXTRACT(MONTH FROM date_issued) AS month FROM inmates_record WHERE YEAR(date_issued) = YEAR(CURRENT_TIMESTAMP) ORDER BY IDNumber";
    $query_run = mysqli_query($connection, $query);

    $row = mysqli_num_rows($query_run);
    
    while ($data = mysqli_fetch_assoc($query_run)){

      $year = $data['year'];

      //January
      $jan = 'Jan';
      $jan_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '1' AND YEAR(date_issued) = '$year' AND Status = 0";
      $jan_data_run = mysqli_query($connection, $jan_data);

      $value_jan = mysqli_num_rows($jan_data_run);

      //February
      $feb = 'Feb';
      $feb_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '2' AND YEAR(date_issued) = '$year' AND Status = 0";
      $feb_data_run = mysqli_query($connection, $feb_data);

      $value_feb = mysqli_num_rows($feb_data_run);

      //March
      $march = 'March';
      $march_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '3' AND YEAR(date_issued) = '$year' AND Status = 0";
      $march_data_run = mysqli_query($connection, $march_data);

      $value_march = mysqli_num_rows($march_data_run);

      //April
      $april = 'April';
      $april_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '4' AND YEAR(date_issued) = '$year' AND Status = 0";
      $april_data_run = mysqli_query($connection, $april_data);

      $value_april = mysqli_num_rows($april_data_run);

      //May
      $may = 'May';
      $may_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '5' AND YEAR(date_issued) = '$year' AND Status = 0";
      $may_data_run = mysqli_query($connection, $may_data);

      $value_may = mysqli_num_rows($may_data_run);

      //June
      $jun = 'Jun';
      $jun_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '6' AND YEAR(date_issued) = '$year' AND Status = 0";
      $jun_data_run = mysqli_query($connection, $jun_data);

      $value_jun = mysqli_num_rows($jun_data_run);

      //July
      $jul = 'Jul';
      $jul_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '7' AND YEAR(date_issued) = '$year' AND Status = 0";
      $jul_data_run = mysqli_query($connection, $jul_data);

      $value_jul = mysqli_num_rows($jul_data_run);

      //August
      $aug = 'Aug';
      $aug_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '8' AND YEAR(date_issued) = '$year' AND Status = 0";
      $aug_data_run = mysqli_query($connection, $aug_data);

      $value_aug = mysqli_num_rows($aug_data_run);
      
      //September
      $sept = 'Sept';
      $sept_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '9' AND YEAR(date_issued) = '$year' AND Status = 0";
      $sept_data_run = mysqli_query($connection, $sept_data);

      $value_sept = mysqli_num_rows($sept_data_run);
      
      //October
      $oct = 'Oct';
      $oct_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '10' AND YEAR(date_issued) = '$year' AND Status = 0";
      $oct_data_run = mysqli_query($connection, $oct_data);

      $value_oct = mysqli_num_rows($oct_data_run);

      //November
      $nov = 'Nov';
      $nov_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '11' AND YEAR(date_issued) = '$year' AND Status = 0";
      $nov_data_run = mysqli_query($connection, $nov_data);

      $value_nov = mysqli_num_rows($nov_data_run);

      //December
      $dec = 'Dec';
      $dec_data = "SELECT * FROM inmates_record WHERE MONTH(date_issued) = '12' AND YEAR(date_issued) = '$year' AND Status = 0";
      $dec_data_run = mysqli_query($connection, $dec_data);

      $value_dec = mysqli_num_rows($dec_data_run);
    }
  }

    $query_pie_male = "SELECT * FROM `inmates_record` WHERE `inSex`= 'Male' AND `Status`= 0";
    $query_pie_male_run = mysqli_query($connection, $query_pie_male);

    $row_male = mysqli_num_rows($query_pie_male_run);


    $query_pie_female = "SELECT * FROM `inmates_record` WHERE `inSex`= 'Female' AND `Status`= 0";
    $query_pie_female_run = mysqli_query($connection, $query_pie_female);

    $row_female = mysqli_num_rows($query_pie_female_run);

include('includes/footer.php');
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          const bar_labels = <?php echo "['".$jan."', '".$feb."', '".$march."', '".$april."', '".$may."', '".$jun."', '".$jul."', '".$aug."', '".$sept."', '".$oct."', '".$nov."', '".$dec."'"."]"?>;
          const bar_data = {
            labels: bar_labels,
            datasets: [{
              label: 'Number of Release as of <?php echo $year;?>',
              data: <?php echo "['".$value_jan."', '".$value_feb."', '".$value_march."', '".$value_april."', '".$value_may."', '".$value_jun."', '".$value_jul."', '".$value_aug."', '".$value_sept."', '".$value_oct."', '".$value_nov."', '".$value_dec."'"."]"?>,
              backgroundColor: "rgba(2,117,216,1)",
              borderColor: "rgba(2,117,216,1)",
              borderWidth: 1
            }]
          };
          const bar_config = {
            type: 'bar',
            data: bar_data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
          };

          var barChart = new Chart(
            document.getElementById('myBarChart'),
            bar_config
          );
</script>

<script>
          const data = {
            labels: [
              'Female',
              'Male'
            ],
            datasets: [{
              label: 'Released Inmate/s',
              data: [<?php echo $row_female;?>, <?php echo $row_male;?>],
              backgroundColor: [
                '#007bff',
                '#000000',
              ],
              hoverOffset: 4
            }]
          };
          const pie_config = {
            type: 'doughnut',
            data: data,
          };

          var pieChart = new Chart(
            document.getElementById('myPieChart'),
            pie_config
          );
</script>
