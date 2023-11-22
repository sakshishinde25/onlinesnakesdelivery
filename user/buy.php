<?php
session_start();
include("header.php");
$name=0;
$price=0;
$type="";
$no=0;
$im="";
$emailid=$_SESSION["emailid"];
if(isset($_GET["name"]))
{
$no=$_GET["srno"];
$pn=$_GET["name"];
$price=$_GET["price"];
}
include("connection.php");
$rs=mysqli_query($cn,"select * from productdetails where srno=$no");
if($a=mysqli_fetch_array($rs))
{
$no=$a["srno"];
 $type=$a["name"];
 $type=$a["price"];
  $type=$a["type"];
$im=$a["photo"];

}
?>

<h1 align=center>Order Details</h1>
<div class="row">
<form id=frmreg method="post" name="myForm">                                            
  <div class="input-group">
<?php
echo "<center><img src=\"../images/$im\" width=200 height=200></center></div>";
?>
<br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="type" type="text" class="form-control" name="type" placeholder="Type" value="<?php echo $type; ?>" required readonly>

  </div>
<br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="price" type="text" class="form-control" name="price" placeholder="Price" value="<?php echo $price; ?>" required readonly>

  </div>
<br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
    <select id=wt name=wt onchange="cal()" class="form-control">
<option>--select weight--</option>
<option value="0.5">Half Kg</option>
<option value="1">1 Kg</option>
<option value="2">2 Kg</option>
<option value="3">3 Kg</option>
<option value="4">4 Kg</option>
<option value="5">5 Kg</option>
</select>
 <script>
function cal()
{
  var p,w,a;
 p=document.getElementById("price").value;
 w=document.getElementById("wt").value;
a=p*w;
document.getElementById("amt").value=a;
}
</script>
  </div>

<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="amt" type="text" class="form-control" name="amt" placeholder="0" required readonly>

  </div>

<br>
 
<br>
        <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Add to cart</button>
        <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>




</div>


<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$emailid=$_SESSION['emailid'];

$wt=$_POST['wt'];
$am=$_POST['amt'];

include("connection.php");
$q="insert into ordertbl(emailid,orderno,productname,price,quantity,date,address) values('$emailid','$orno','$prname','$pr','$quantity','$date','$address')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>window.location='payment.php?amount=$am'</script>";
}

?>




