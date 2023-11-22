<?php
session_start();
include("header.php");
?>

<h1 align=center>Admin Login Here</h1>
<div class="row">

<?php
if(isset($_POST['btnsub']))
{
$emailid=$_POST['emailid'];
$password=$_POST['password'];
include("connection.php");
$q="select * from adminlogin where emailid='$emailid' and password='$password'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
$_SESSION['adminname']=$emailid;
echo"<script>window.location='index1.php'</script>";
}
else
echo"<center><b><font color=red>Incorrect emailid or password</font></b></center>";
mysqli_close($cn);
}
?>
<form id=frmreg method="post" name="myForm">
<br>
 <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input ng-model="emailid" id="emailid" type="text" class="form-control" name="emailid" placeholder="EmailId" required>
</div>

<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input ng-model="password" id="password" type="password" class="form-control" name="password" placeholder="Password" required>
</div>

<br>

 <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
<button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>

</div>

<?php
include("footer.php");
?>











