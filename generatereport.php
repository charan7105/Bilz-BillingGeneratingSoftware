<?php
  include 'connect.php';
  if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Generate Report</title>
    <link rel="shortcut icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="generatereport.css">
</head>
<body>
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="pic.jpg" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0"><?php echo $_SESSION['name']; ?></h4>
       
      </div>
    </div>
  </div>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="index.php" class="nav-link text-dark">
                <i class="fa fa-home mr-3 text-dark fa-fw"></i>
                Home
            </a>
    </li>
  </ul>
  <br>
  

  <p class="text-dark font-weight-bold text-uppercase px-3 small pb-4 mb-0">Operations</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="createbill.php" class="nav-link text-dark bg-light">
                <i class="fa fa-pencil-square-o mr-3 text-dark fa-fw"></i>
                Create Bill
            </a>
    </li>
    <li class="nav-item">
      <a href="managebill.php" class="nav-link text-dark">
                <i class="fa fa-bar-chart mr-3 text-dark fa-fw"></i>
                Manage Bill
            </a>
    </li>
    
    <li class="nav-item">
      <a href="generatereport.php" class="nav-link text-dark">
                <i class="fa fa-window-restore mr-3 text-dark fa-fw"></i>
                Generate Report
            </a>
    </li>
	<li class="nav-item">
		<a href="productshorthand.php" class="nav-link text-dark">
				  <i class="fa fa-th-list mr-3 text-dark fa-fw"></i>
				  Product Shorthand
			  </a>
	  </li>
  </ul>

  <div class="mt-5 text-center">
  <button type="button" class="btn btn-dark"><a href="logout.php" style="color:white;text-decoration: none;">Logout</a></button>
	</div>
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Menu</small></button>

  <!-- Demo content -->
    <h2 class="display-4 text-white text-center title">REPORT GENERATOR</h2>
  <div class="separator"></div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mycardcolor text-white card mt-5">
                    <div class="card-body border-0">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-light">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body mycardcolor border-0">
                        <table class="table text-white table-border">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Bill Id</th>
                                    <th>Mode</th>
                                    <th>Customer Name</th>
                                    <th>Customer Mobile</th>
                                    <th>Quantity</th>
                                    <th>Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","billing");

                                if(isset($_POST['from_date']) && isset($_POST['to_date']))
                                {
                                    $from_date = $_POST['from_date'];
                                    $_SESSION['from_date'] = $_POST['from_date'];
                                    $to_date = $_POST['to_date'];
                                    $_SESSION['to_date'] = $_POST['to_date'];
                                    $sesid=$_SESSION['user_id'];

                                    $query = "SELECT bill_id, mode, cust_name, cust_mob, SUM(prod_quantity) AS quan, SUM(prod_price*prod_quantity) AS totalcost FROM bills WHERE user_id='$sesid' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY bill_id";
                                    $query_run = mysqli_query($con, $query);
                                    $countervar = 1;

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $countervar; ?></td>
                                                <td><?= $row['bill_id']; ?></td>
                                                <td><?= $row['mode']; ?></td>
                                                <td><?= $row['cust_name']; ?></td>
                                                <td><?= $row['cust_mob']; ?></td>
                                                <td><?= $row['quan']; ?></td>
                                                <td><?= $row['totalcost']; ?></td>
                                            </tr>
                                            <?php
                                            $countervar++;
                                        }
                                    }
                                    else
                                    {
                                        echo "<span class='text-white'>"."No Record Found"."</span> <br>";
                                    }
                                }
                            ?>
                            </tbody>
                        </table> <br>
                        <div style="display: flex; justify-content:center" class="text-center">
                            <form action="reportaspdf.php" method="POST">
                        <button type="submit" name="printpdf" class="mr-3 btn btn-light">Print</button>
                        </form>
                            <form action="reportaspdf.php" method="POST">
                        <button type="submit" name="downloadpdf" class="btn btn-light">Download</button>
                        </form>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
  
  <div class="row text-white">
    
</div>
<!-- <div class="footer">
    <p>&copy; copyright SWE Group 3</p>
</div>   -->




</div>





<!-- End demo content -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

