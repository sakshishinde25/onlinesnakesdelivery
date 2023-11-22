<?php
include("header1.php");
?>

<h1 align=center>Recent Feedbacks</h1>
</br>
 <table class="table">
    <thead>
      <tr>
        <th>Emailid</th>
        <th>Rating</th>
        <th>Title</th>
        <th>comment</th>
     </tr>
    </thead>
    <tbody>
<?php
include("../connection.php");

$rs=mysqli_query($cn,"select * from feedback ");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$emailid</td><td>$rating</td><td>$title</td><td><td>$comment</td><td></tr>";

}
?>
    </tbody>
  </table>
<?php
include("footer.php");
?>