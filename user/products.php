<?php
include("header.php");
$type="farsana";
if(isset($_GET["type"]))
$type=$_GET["type"];
?>
<h1 align=center> Experience <?php echo ucfirst($type);?> Products</h1>
<div class="row">

<?php
include("connection.php");
$rs=mysqli_query($cn,"select* from productdetails where name='$type'");
$i=0;
while($a=mysqli_fetch_array($rs))
{
$no=$a["srno"];
$pn=$a["name"];
$pr=$a["price"];
$type=$a["type"];
$im=$a["photo"];

echo"<div class='col-md-3'>";
echo"<div class=\"thumbnail\">";
echo"<a href=buy.php?name=$pn&price=$pr target=\"_blank\">";
echo"<img src=\"../images/$im\" width=100% height=200px>";
echo"<div class=\"caption\">";
echo"<b>$type select type</b><br>$pr price</div></a><a class=\"btn btn-primary\" href=buy.php?name=$pn&price=$pr&srno=$no>Buy Now</a></div></div>";
$i++;
if($i==4)
{                                                  
echo"</div>";
echo"<div class=\"row\">";
$i=0;
}

}
?>
</div>
<?php
include("footer.php");
?>
