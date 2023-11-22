<?php
include("header.php");
?>
<h1 align=center>Sign Up Here</h1>
<div class="row">
<div class="col-sm-8"><br>
<form id=frmreg method="post" name="myForm">

<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="name" id="name" type="text" class="form-control" name="name" placeholder="Name" 
pattern="\D+" required>

</div>

<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
<input ng-model="contactno" id="contactno" type="text" class="form-control" name="contactno" placeholder="Contact No" 
pattern="\d{10}"required>

</div>

<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input ng-model="address" id="address" type="text" class="form-control" name="address" placeholder="Address" required>

</div>
<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input ng-model="password" id="password" type="password" class="form-control" name="password" placeholder="Password" required>
</div>

<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="emailid" id="emailid" type="text" class="form-control" name="emailid" placeholder="EmailId" required>

</div>

<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
<select class="form-control" name="sque" required>
<option>--select--</option>
<option value="What is your favourite color">What is your favourite color</option>
<option value="What is your favourite fruit">What is your favourite fruit</option>
</select>
</div><br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="text" class="form-control" name="sans" placeholder="Answer" required>
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
$q="insert into registration values('$name','$contactno','$address','$password','$emailid','$sque','$sans')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('registration successful');window.location='login.php'</script>";
}

?>





