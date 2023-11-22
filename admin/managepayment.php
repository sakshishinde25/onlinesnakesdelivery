<?php
include("header1.php");
?>
<h1 align=center>Receipt</h1>
<div<div class="row">

<form id=frmreg method="post" name="myForm">
<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="date" id="date" type="text" class="form-control" name="date" placeholder="Date" 
pattern="\D+" required>
</div>
<br>

<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="receiptno" id="receiptno" type="text" class="form-control" name="receiptno" placeholder="Receipt No." 
pattern="\D+" required>
</div>
<br>
  

<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="time" id="time" type="text" class="form-control" name="time" placeholder="Time" 
pattern="\D+" required>
</div>
<br>
  

<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input ng-model="paidamount" id="paidamount" type="text" class="form-control" name="paidamount" placeholder="Paid Amount" 
pattern="\D+" required>
</div>
<br>
  
<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
<button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>
</div>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
include("connection.php");
$q="insert into receipt values('$date','$receiptno','$time','$paidamount')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Receipt');window.location='managepayment.php'</script>";
}

?>





