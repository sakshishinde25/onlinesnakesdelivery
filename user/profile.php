<?php
session_start();
include("header.php");
include("connection.php");
$emailid=$_SESSION["emailid"];
$rs=mysqli_query($cn,"select * from registration where emailid='$emailid'");

if($a=mysqli_fetch_array($rs))
{
extract($a);
}

?>

<h1 align=center>Update Profile Here</h1>
<div<div class="row">
<div class="col-sm-8">
<form id=frmreg method="post" name="myForm">

<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name" 
pattern="\D+" required value="<?php echo $name; ?>">
 
</div>

<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
<input ng-model="contactno" id="contactno" type="text" class="form-control" name="contactno" placeholder="Contact No" 
pattern="\d{10}"required value="<?php echo $contactno; ?>">

</div>

<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input ng-model="address" id="address" type="text" class="form-control" name="address" placeholder="Address" required value="<?php echo $address; ?>">

</div>
<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input ng-model="password" id="password" type="password" class="form-control" name="password" placeholder="Password" required value="<?php echo $password; ?>">
</div>

<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="emailid" id="emailid" type="emailid" class="form-control" name="emailid" placeholder="EmailId" required value="<?php echo $emailid; ?>"readonly>

</div>

<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
<select class="form-control" name="sque" required>
<option><?php echo $sque; ?></option>
<option value="What is your favourite color">What is your favourite color</option>
<option value="What is your favourite fruit">What is your favourite fruit</option>
</select>
</div><br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="text" class="form-control" name="sans" placeholder="Answer" required value="<?php echo $answer; ?>">
</div>
<br>
<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
<button type="reset" class="btn btn-danger" id="btnres">Reset</button>
<br>

</form>


</div>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
include("connection.php");
$q="update registration set name='$name',contactno='$contactno',address='$address',password='$password',sque='$sque',answer='$sans' where emailid='$emailid'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Profile Updated Successfully');window.location='index.php'</script>";
}

?>





