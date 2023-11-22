<?php
include("header1.php");
?>

<h1 align=center>Recent Orders</h1>
 <table class="table">
    <thead>
      <tr>
        <th>emailid</th>
        <th>Order No</th>
        <th>Product Name</th>
        <th>Price</th>
       <th>quantity</th>
       <th>date</th>
       <th>address</th> 
      </tr>
    </thead>
    <tbody>
<?php
include("connection.php");

$rs=mysqli_query($cn,"select * from ordertbl");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$emailid</td><td>$orderno</td><td>$productname</td><td>$price</td><td>$quantity</td><td>$date</td><td>$address</td></tr>";
}
?>
    </tbody>
  </table>
<?php
include("footer.php");
?>