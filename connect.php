<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "billing")or die($mysqli_error($conn));
if(!isset($_SESSION))
{
    session_start();
}
?>