<?php
include("header1.php");
?>

<h1 align=center>Recent Orders</h1>
 <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>address</th>
        <th>contctno</th>
        <th>date</th>
      
      </tr>
    </thead>
    <tbody>
<?php
include("connection.php");

$rs=mysqli_query($cn,"select * from delivery ");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$name</td><td>$address</td><td>$contactno</td><td>$date</td><td></tr>";
}
?>
    </tbody>
  </table>
<?php
include("footer.php");
?>
