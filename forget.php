<?php
session_start();
include("header.php");
?>

<h1 align=center>Recover password Here</h1>
<div class="row">
<form id=frmreg method="post" name="myForm">
  <br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input ng-model="id" id="id" type="text" class="form-control" name="emailid" placeholder="Email Id" required>
  </div>

<br>

<br>
        <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
        <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>

<?php
if(isset($_POST['btnsub']))
{
$emailid=$_POST['emailid'];

include("connection.php");
$q="select * from registration where emailid='$emailid'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
$sque=$a["sque"];
 ?>
<form method=post>
<input type=hidden name=txtid class=form-control value="<?php echo $emailid; ?>"><br>
<input type=text class=form-control name=sque value="<?php echo $sque; ?>" readonly><br>
<input type=text class=form-control name=sans value=""><br>
<input type=submit name=btns value="Submit">
</form>
<?php

}
mysqli_close($cn);
}
?>

<?php
if(isset($_POST["btns"]))
{

  $emailid=$_POST["txtid"];
  $sque=$_POST["sque"];
$sans=$_POST["sans"];
include("connection.php");
$q="select * from registration where emailid='$emailid' and sque='$sque' and answer='$sans'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
 $answer=$a["password"];
echo "<h2><font color=green><b>Your password is $answer</b></font></h2>";
}
}
?>

</div>


<?php
include("footer.php");

?>
