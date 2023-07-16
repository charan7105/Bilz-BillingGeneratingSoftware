<?php
  include 'connect.php';
  if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Bill</title>
    <link rel="shortcut icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="createbill.css">
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
  <form method="POST"><button type="submit" name="add" style="float: right !important;margin-top:-70px;" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-plus mr-2"></i><small class="text-uppercase font-weight-bold">New Bill</small></button></form>
      
      <?php
        $value=$_SESSION['user_id'];
        $val1="";
        if (isset($_POST['add'])) {
          $query = "SELECT MAX(bill_id) AS bill_val FROM bills WHERE user_id='$value'";
          $result = mysqli_query($conn, $query)or die($mysqli_error($conn));
          while($row = mysqli_fetch_assoc($result)){
            $_SESSION['billno']=$row['bill_val']+1;
          }
          $_SESSION['cust_name']="";
          $_SESSION['cust_addr']="";
          $_SESSION['mode']="";
          $_SESSION['cust_mob']="";
          $_SESSION['cust_email']="";
          //echo "hii";
        }
        if(isset($_SESSION['billno'])){
          $val1=$_SESSION['billno'];
        }else{
          $val1="";
        }
        if(isset($_SESSION['mode'])){
          $val2=$_SESSION['mode'];
        }else{
          $val2="";
        }
        if(isset($_SESSION['cust_name'])){
          $val3=$_SESSION['cust_name'];
        }else{
          $val3="";
        }
        if(isset($_SESSION['cust_addr'])){
          $val4=$_SESSION['cust_addr'];
        }else{
          $val4="";
        }
        if(isset($_SESSION['cust_mob'])){
          $val5=$_SESSION['cust_mob'];
        }else{
          $val5="";
        }
        if(isset($_SESSION['cust_email'])){
          $val6=$_SESSION['cust_email'];
        }else{
          $val6="";
        }
      ?>

  <!-- Demo content -->
  <h2 class="display-4 text-white text-center title">CREATE BILL</h2>
  <div class="separator"></div>
  <form method="post"> 
  <div class="row text-white">
    <div class="col-lg-6">
    <div class="form-group row d-flex justify-content-center">
      <label for="name" class="col-sm-3 col-form-label text-light">Bill no.</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="billno" id="billno" value="<?php echo $val1; ?>" placeholder="" disabled>
      </div>
    </div>
    </div>
    <br>
    <div class="col-lg-6">
    
    <div class="form-group row d-flex justify-content-center">
      <label for="name" class="col-sm-2 col-form-label text-light">Mode</label>
      <div class="col-sm-3">
        <select class="form-control" name="mode" required>
          <option selected disabled hidden></option>
          <option value="Cash" <?=$val2=='Cash'? 'selected="selected"' : '';?>>Cash</option>
          <option value="UPI" <?=$val2=='UPI'? 'selected="selected"' : '';?>>UPI</option>
        </select>
        
      </div>
    </div>
    </div>
 
  
</div>
<hr style="border-top: 1px dashed rgb(255, 255, 255);">
  <div class="row text-white">
      <div class="col-lg-6">
      <div class="form-group row d-flex justify-content-center">
        <label for="name" class="col-sm-3 col-form-label text-light">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name" id="name" placeholder="" value="<?php echo $val3; ?>" required>
        </div>
      </div>
      <div class="form-group row d-flex justify-content-center">
        <label for="name" class="col-sm-3 col-form-label text-light">Mobile No.</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="mob" id="mob" placeholder="" value="<?php echo $val5; ?>" required>
        </div>
      </div>
      </div>
      <br>
      <div class="col-lg-6">
      <div class="form-group row d-flex justify-content-center">
        <label for="name" class="col-sm-2 col-form-label text-light">Address</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="addr" id="addr" placeholder="" value="<?php echo $val4; ?>" required>
        </div>
      </div>
      <div class="form-group row d-flex justify-content-center">
        <label for="name" class="col-sm-2 col-form-label text-light">Email</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?php echo $val6; ?>" required>
        </div>
      </div>
      </div>
    
</div>
<hr style="border-top: 1px dashed rgb(255, 255, 255);">
  <div class="row text-white"> 
    <div class="col-sm-3">
      <p class="lead">
          <div class="form-group row d-flex justify-content-center">
            <label for="pcode" class=" col-form-label text-light">Code</label>
            <div class="col-sm-5">
            <select class="form-control" name="pcode" id="pcode" onchange="load_item();load_price()"> 
            <option value=' '></option>
              <?php 
              $sql = mysqli_query($conn, "SELECT code FROM products WHERE user_id=".$_SESSION['user_id']);
              while ($row = $sql->fetch_assoc()){
                $code=$row['code'];
                echo "<option value='$code'>" . $row['code'] . "</option>";
              }
              ?>
            </select>
            </div>
          </div>
      </p>
      
    </div>
    <script>
       function load_item() {
        let val = document.getElementById("pcode").value;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","retrieve.php?codeval="+val,true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("pitem").value = this.responseText;
            }
          };
        }
        function load_price() {
        let val1 = document.getElementById("pcode").value;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","retrieve.php?priceval="+val1,true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("price").value = this.responseText;
            }
          };
        }
     </script>
    <div class="col-sm-4">
      <p class="lead">
          <div class="form-group row d-flex justify-content-center">
            <label for="pcode" class=" col-form-label text-light">Item</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="pitem" id="pitem" placeholder="" disabled>
            </div>
          </div>
      </p>
    </div>
    <div class="col-sm-2">
      <p class="lead">
          <div class="form-group row d-flex justify-content-center">
            <label for="pcode" class=" col-form-label text-light">Quantity</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="quantity" id="quantity" placeholder="" required>
            </div>
          </div>
      </p>
      
    </div>
    <div class="col-sm-3"> 
      <p class="lead">
          <div class="form-group row d-flex justify-content-center">
            <label for="pcode" class=" col-form-label text-light">Price</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="price" id="price" placeholder="">
            </div>
          </div>
      </p>
      
    </div>
    <div class="col-sm-1 px-1 px-sm-5 mx-auto">
    <div class="flex-row d-flex justify-content-center">
      <div class="btn-toolbar  mt-3" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group " role="group" aria-label="First group">
          <button type="submit" name="addbill" class="btn btn-light"><b>Add</b></button>
        </div>
      </div>
  </div>
  </div>
</form>
<?php
  if (isset($_POST['addbill']))
  {
     $userid=$_SESSION['user_id'];
      $billid = $_SESSION['billno'];
      $mode=$_POST['mode'];
      $_SESSION['mode']=$mode;

      $cust_name=$_POST['name'];
      $_SESSION['cust_name']=$cust_name;

      $cust_addr=$_POST['addr'];
      $_SESSION['cust_addr']=$cust_addr;

      $cust_mob=$_POST['mob'];
      $_SESSION['cust_mob']=$cust_mob;

      $cust_email=$_POST['email'];
      $_SESSION['cust_email']=$cust_email;

      $prod_code=$_POST['pcode'];
      $prod_quantity=$_POST['quantity'];
      $prod_price=$_POST['price'];
      $query = "INSERT INTO bills(user_id,bill_id,mode,cust_name,cust_addr,cust_mob,cust_email,prod_code,prod_quantity,prod_price) VALUES ('$userid','$billid','$mode','$cust_name','$cust_addr','$cust_mob','$cust_email','$prod_code','$prod_quantity','$prod_price')";
      $result = mysqli_query($conn, $query)or die($mysqli_error($conn));
      echo("<meta http-equiv='refresh' content='1'>");
  }
  $user=$_SESSION['user_id'];
      $sql = "SELECT * FROM bills WHERE user_id='$user' AND bill_id='$val1'";
      $result = mysqli_query($conn, $sql);
      $sql1="SELECT SUM(prod_quantity*prod_price) AS TOTAL FROM bills WHERE user_id='$user' AND bill_id='$val1'";
      $result1=mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1);
      echo "<div class='container-fluid'><br><center><table class='table'><tr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Amount</th></tr>";
              $count=1;
              while($row = mysqli_fetch_assoc($result))
              {
                  echo "<tr><td>".$count."</td><td>".$row['prod_code']."</td><td>".$row['prod_quantity']."</td><td>".$row['prod_price']."</td><td>".$row['prod_quantity']*$row['prod_price']."</td></tr>";
                  $count++;
              }
              echo "<tr><td></td><td></td><td></td><td></td><td><b>Total: RS ".$row1['TOTAL']."</b></td></tr>";
              echo "</table><center></div>";
?>
    
      </div>
     
     
      
      <div class="text-center"><br><br>
          <form action="printbill.php" method="POST">
            <button type="submit" name="printbill" class="mr-3 btn btn-light"> <b>Print Bill</b> </button>
          </form>
      </div>
    </div>
</div>

<div class="footer">
    <p>&copy; Copyright Bill Book</p>
</div>  
</div>

<!-- End demo content -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

