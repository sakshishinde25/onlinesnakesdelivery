<?php
$id=$_GET['srno'];
include("connection.php");
$q="delete from productdetails where srno='$id'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Record deleted');window.location='manageproduct.php';</script>";
?>