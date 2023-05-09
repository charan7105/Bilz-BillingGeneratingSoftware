<?php
include 'connect.php';
$sql = "DELETE FROM bills WHERE bill_id='" . $_GET["billid"] . "'";
if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='managebill.php'</script>";
    }
    else{
        echo "<script>alert('Failed to delete!');window.location='managebill.php'</script>";
        header("location:managebill.php");
}
?>