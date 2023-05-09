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
	$content .= "
	<center><h3>Your Bill Report</h3></center><br><hr><br><br>
    <table class='table text-white table-border'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Bill Id</th>
                <th>Mode</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Quantity</th>
                <th>Total Cost</th>
            </tr>
        </thead>
		<tbody>";

			if(isset($_SESSION['from_date']) && isset($_SESSION['to_date']))
			{
				$from_date = $_SESSION['from_date'];
				$to_date = $_SESSION['to_date'];
				$sesid=$_SESSION['user_id'];
				$query = "SELECT bill_id, mode, cust_name, cust_mob, prod_quantity, prod_price*prod_quantity AS totalcost FROM bills WHERE user_id='$sesid' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY cust_mob";
				$query_run = mysqli_query($conn, $query);
				$countervar = 1;

					foreach($query_run as $row)
					{
								$content.='  
								<tr>   
									<td>'.$countervar.'</td>  
									<td>'.$row["bill_id"].'</td>  
									<td>'.$row["mode"].'</td>  
									<td>'.$row["cust_name"].'</td>
									<td>'.$row["cust_mob"].'</td>
									<td>'.$row["prod_quantity"].'</td>  
									<td>'.$row["totalcost"].'</td>
								</tr>';
								$countervar++;
					}
					$content.='</table>';
			}
	$obj_pdf->WriteHTML($content);
	$obj_pdf->Output("Report.pdf");
?>