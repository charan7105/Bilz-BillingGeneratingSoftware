<?php
	include 'connect.php';
	require_once('./tcpdf/tcpdf.php');
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("YOUR BILL REPORT");
	$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
	$obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$obj_pdf->setDefaultMonospacedFont('helvetica');
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	$obj_pdf->SetMargins(PDF_MARGIN_LEFT,'0',PDF_MARGIN_RIGHT);
	$obj_pdf->setPrintHeader(false);
	$obj_pdf->setPrintFooter(false);
	$obj_pdf->SetAutoPageBreak(TRUE, 10);
	$obj_pdf->SetFont('helvetica', '', 12);
	$obj_pdf->setPrintHeader(false);
	$obj_pdf->AddPage();

	$content = "";
	$shopname = $_SESSION['name'];
	$cname = $_SESSION['cust_name'];
	$cmobile = $_SESSION['cust_mob'];
	$caddr = $_SESSION['cust_addr'];
	$cemail = $_SESSION['cust_email'];
	$content .= "<h1 class='text-center' style='text-align:center;'> ".$shopname."</h1>";
	$content .= "<h4 style='text-align:center;'> Name : ".$cname."</h4>";
	$content .= "<h4 style='text-align:center;'> Mobile : ".$cmobile."</h4>";
	$content .= "<h4 style='text-align:center;'> City : ".$caddr."</h4>";
	$content .= "<h4 style='text-align:center;'> Email : ".$cemail."</h4>";
	$content .= "
	<h2>Your Bill Summary</h2>";
    $user=$_SESSION['user_id'];
    $val1=$_SESSION['billno'];
      $sql = "SELECT * FROM bills WHERE user_id='$user' AND bill_id='$val1'";
      $result = mysqli_query($conn, $sql);
      $sql1="SELECT SUM(prod_quantity*prod_price) AS TOTAL FROM bills WHERE user_id='$user' AND bill_id='$val1'";
      $result1=mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1);
      $content .= "<div class='container-fluid'><center><table class='table'><tr><hr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Amount</th><hr></tr>";
              $count=1;
              while($row = mysqli_fetch_assoc($result))
              {
                $content .= "<tr><td>".$count."</td><td>".$row['prod_code']."</td><td>".$row['prod_quantity']."</td><td>".$row['prod_price']."</td><td>".$row['prod_quantity']*$row['prod_price']."</td></tr>";
                  $count++;
              }
              $content .= "<tr><td></td><td></td><td></td><td></td><td><b>Total: RS ".$row1['TOTAL']."</b></td></tr>";
              $content .= "</table><center></div>";
	$obj_pdf->WriteHTML($content);
	$obj_pdf->Output("Bill.pdf");
?>