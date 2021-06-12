<?php 
  
    include_once "../includes/config.php";
    include_once "../includes/db.php";
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);	
	if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	
   
    // echo $visitor_ip;
    // Checking if visitor is unique 
    
    $query1 = "select count(id) from counter_table ";
    $result1 = mysqli_query($conn, $query1);
    // checking query error 
    if(!$result1)
    {
        die("Retriving Query Error <br>". $query);
    }

        // $total_visitor = mysqli_num_rows($result);
        $total_visitor = mysqli_fetch_array($result1, MYSQLI_NUM)[0];
        // $total = mysqli_fetch_array($result, MYSQLI_NUM)[0];
        echo $total_visitor;
    //     if($total < 1)
    //      {
    //          $query = "INSERT INTO counter_table (ip_address) VALUES ('$visitor_ip')";
    //          $result = mysqli_query($conn, $query);

    //     if(!$result)
    //      {
    //     die("Retriving Query Error <br>". $query);
    //      }
    // }
    mysqli_close($conn);
    $rows = dbSelect("tb_subscription","*","", "");
    
?>

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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered
                                Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <h4>Total Admin: *</h4>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
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
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">VISITOR COUNTER
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_visitor;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email Id</th>
                            <th>Email </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=1;
                            foreach($rows as $row)
                            {                      
                                      
                        ?>
                        <tr>
                            <td><?=$row['email_id']?></td>
                            <td><?=$row['email']?></td>

                        </tr>

                        <?php
                           $i++;
                            }           
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>