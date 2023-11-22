<?php
include("header.php");
$type="farsana";
if(isset($_GET["type"]))
$type=$_GET["type"];
?>
<h1 align=center>Experience<?php echo ucfirst($type);?>products</h1>
<div class="row">

<?php
include("connection.php");
$rs=mysqli_query($cn,"select* from order where productname='$type'");
$i=0;
while($a=mysqli_fetch_array($rs))
{
$im=$a["productimg"];
$id=$a["emailid"];
$no=$a["orderno"];
$prname=$a["productname"];
$pr=$a["price"];
$qnt=$a["quantity"];
$date=$a["date"];
$address=$a["address"];

echo"<div class='col-md-3'>";
echo"<div class=\"thumbnail\">";
echo"<a href=buy.php?orderno=$no&price=$pr target=\"_blank\">";
echo"<img src=\"../images/$im\" class=\"img-responsive\" width=100% height=80%>";
echo"<div class=\"caption\">";
echo"<b>$type select type</b><br>$pr price</div></a><a class=\"btn btn-primary\" href=buy.php?orderno=$no&price=$pr>Buy Now</a></div></div>";
$i++;
if($i==3)
{
echo"</div>"
echo"<div class=\"row\">";
$i=0;
}

}
?>
</div>
<?php
include("footer.php");
?>