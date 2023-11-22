<?php
session_start();
include("header.php");
?>

<h1 align=center>delivery</h1>
<form method=post>
<div class="form-group">
<div class=container>
<div class="row">

  <div class="col-sm-2">
  </div>

<div class="col-sm-8">
<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name">
    </div>
<div class="form-group">
      <label for="address">address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
    </div>

<div class="form-group">
      <label for="contactno">contact no</label>
      <input type="tel" class="form-control" id="contactno" placeholder="Enter contactno" name="contactno">
    </div>

<div class="form-group">
      <label for="date">date:</label>
      <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
    </div>


</div>


 </div>
 </div>


<center>
  <button type="submit" class="btn btn-primary" name="btnsub">Submit</button>
  <button type="submit" class="btn btn-warning" name="btnresets">Reset</button>
<center>
</form> 
  

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$id=$_SESSION['emailid'];
extract($_POST);
include("connection.php");
$q="insert into delivery values('$name','$address','$contactno','$date')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('your order is successful');window.location='index.php'</script>";
}
?>


