<?php
  include 'connect.php';
  if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Giveaway Generator</title>
    <link rel="shortcut icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="giveawaygenerator.css">
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
	  <li class="nav-item">
		<a href="giveawaygenerator.php" class="nav-link text-dark">
				  <i class="fa fa-gift mr-3 text-dark fa-fw"></i>
				  Giveaway Generator
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
    <h2 class="display-4 text-white text-center title">GIVEAWAY GENERATOR</h2>
    <form method="POST">
    <div class="separator"></div>
    <div class="row text-white">
      <div class="col-lg-6">
        <div class="form-group row d-flex justify-content-center">
          <label for="name" class="col-sm-3 col-form-label text-light">Number of records</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="rec" id="rec" placeholder="" required>
          </div>
        </div>
        </div>
        <br>
        <div class="col-lg-6">
        
        <div class="form-group row d-flex justify-content-center">
          <div class="btn-toolbar mr-3 ml-4" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group " role="group" aria-label="First group">
              <button type="submit" name="submit" class="btn btn-light"><b>Generate</b></button>
            </div>
          </div>
        </div>
        </div>
</form> 
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      $id=$_SESSION['user_id'];
      $n=$_POST['rec'];
      $sql = "SELECT DISTINCT(cust_name),cust_mob,cust_email FROM bills WHERE user_id='$id' ORDER BY RAND() LIMIT ".$n;
      $result = mysqli_query($conn, $sql);
      echo "<div class='container'><center><table class='table'><tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th></tr>";
              $count=1;
              while($row = mysqli_fetch_assoc($result))
              {
                  echo "<tr><td>".$count."</td><td>".$row['cust_name']."</td><td>".$row['cust_mob']."</td><td>".$row['cust_email']."</td></tr>";
                  $count++;
              }
              echo "</table><center></div>";
  }
?>
  </div>
  
  
  
  
  
  </div>
  
  
<div class="footer">
    <p>&copy; Copyright Bill Book</p>
</div>  










<!-- End demo content -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

