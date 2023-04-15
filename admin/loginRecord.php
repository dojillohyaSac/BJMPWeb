<?php
include('includes/config.php');
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/side_nav.php');
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="fas fa-info-circle"></i> Log in Record</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Log in Record</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class="card-body">
                                

                                
                                </table>
                                <table class="Table" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User ID</th>
                                            <th>Last name</th>
                                            <th>First name</th>
                                            <th>Rank</th>
                                            <th>Email</th>
                                            <th>Logged In</th>
                                            <th>Logged Out</th>
                                        </tr>
                                    </thead>
                                    
                                            <?php
                                            $query = "SELECT * FROM `login_record` ";
                                            $query_run = mysqli_query($connection, $query);
                                                while($row = mysqli_fetch_array($query_run))
                                                {
                                            ?>
                                    <tbody>
                                    <tr>
                                                    <td> <?php echo $row["id"];?></td>
                                                    <td> <?php echo $row["userID"];?></td>
                                                    <td> <?php echo $row["lastname"];?></td>
                                                    <td> <?php echo $row["firstname"];?></td>
                                                    <td> <?php echo $row["rank"];?></td>
                                                    <td> <?php echo $row["email"];?></td>
                                                    <td> <?php echo $row["logged_in"];?></td>
                                                    <td><?php echo $row["logged_out"];?></td>
                                            </tr>
                                    </tbody>
                                  
                                    <?php
                                                }
                                              
                                            ?>
                                    
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  
                <script>
                   
    $('#table').DataTable();
                </script>
<?php

include('includes/footer.php');
?>