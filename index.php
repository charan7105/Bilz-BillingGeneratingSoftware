<?php
  include 'connect.php';
  if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>BILL BOOK</title>
    <link rel="shortcut icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

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
  <h2 class="display-4 text-white text-center">Bilz - Billing Generation software</h2>
  <p class="display-5 text-white text-center">By Sai Charan Venna・Kalyani Viswanadha</p>

  <div class="separator"></div>
  <div class="row text-white">
    <div class="col-lg-6">
      <p class="lead">This Web-based Billing Software (WBS) tool allows organizations to set up online bill management, consumers to read bills, and owners to save or download invoices for new businesses. In addition, the developer is creating an online billing webpage to handle invoices in the system and to assist clients in creating, updating, and calculating bills/invoices without having to manually list them.</p>
    </div>
    <div class="col-lg-6">
      <p class="lead">This software system will rely only on the internet to provide a user-friendly environment for both owners and customers. This solution is designed for Businessmen, Enterprises, Shopkeepers, Vendors, and Government Officers who don't want to spend time manually maintaining bills/invoices or computing whole bill computations.</p>
    </div>
</div>

<div class="mt-3">
	<img src="bill2.jpg" width="1000rem" height="auto" class="rounded mx-auto d-block" alt="...">
</div>

<div class="footer-copyright text-center text-light py-3 mt-5">&copy; Copyright Kalyani and Charan </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>