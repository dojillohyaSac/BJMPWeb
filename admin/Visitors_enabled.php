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
                        <h1 class="mt-4"><i class="fas fa-info-circle"></i> Log in Record</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Visitors_enabled.php">Visitors</a></li>
                            <li class="breadcrumb-item active">Active Records</li>
                        </ol>
                        
                        <div class="card shadow card shadow mt-4">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="adminVisitors_enabled.php">Active Records</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="adminVisitors_disabled.php">Non-Active Record</a>
                                    </li>
                                </ul>
                                <input type="text" placeholder="Search" id="search" name="search" aria-label="Search" >
                            </div>

                            <div class="card-body">
                            <div class="table-responsive" id="searchresult">
                            <?php
                                    $query = "SELECT * FROM `visitors_record` WHERE `Status` = '1'";
                                    $query_run = mysqli_query($connection, $query);
                            ?>
                                <table class="table table-striped table-sm" id="myTable">
                                
                                <thead class="table table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Visitor ID</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Inmate ID</th>
                                    <th scope="col">Relationship to Inmate</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
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
                                    <td class="idNum"> <?php echo $row['IDNumber']; ?> </td>
                                    <td> <?php echo $row['visitorID']; ?> </td>
                                    <td> <?php echo $row['viLastname']; ?> </td>
                                    <td> <?php echo $row['viFirstname']; ?> </td>
                                    <td> <?php echo $row['viMiddlename']; ?> </td>
                                    <td> <?php echo $row['InmateID']; ?> </td>
                                    <td> <?php echo $row['Rel_to_inmate']; ?> </td>
                                    <td> <?php echo $row['viAddress']; ?> </td>
                                    <td>
                                    <?php
                                    if ($row['Status'] == '1') {
                                        echo '<label class="text-success"><strong>Active</strong></label>';
                                    }
                                    ?>
                                    </td>
                                    <td>  
                                        <?php
                                        echo '<a class="btn btn-sm btn-danger" href="status.php?role=Visitor&status_id='.$row['IDNumber'].'&Status='.$row['Status'].'"><i class="fas fa-circle-minus"></i> Deactivate</a>';
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
                    </div>
                </main>

            <script type="text/javascript">
            $(document).ready(function(){
              $("#search").keyup(function(){
                  var input = $(this).val();
                    $.ajax({
                        url:"visitorDataCode.php",
                        method: "POST",
                        data: {input, input},

                        success:function(response){
                          $("#searchresult").html(response);
                        }
                    });
              });
            });
        </script>
                
<?php

include('includes/footer.php');
?>