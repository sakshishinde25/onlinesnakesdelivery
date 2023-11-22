<?php
include("header1.php");
?>

<h1 align=center>Add Products Here</h1>
<div class="row">
<div class="col-sm-4"><br>
<form id=frmreg method="post" name="myForm" enctype="multipart/form-data">

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<select name="name" class="form-control">
<option>--select product--</option>
<option value="Farsana">Farsana</option>
<option value="Shev">Shev</option>
<option value="Papdi">Papdi</option>
<option value="Bundi">Bundi</option>
<option value="Chirmure">Chirmure</option>
<option value="Chivada">Chivada</option>
<option value="Bhadang">Bhadang</option>
<option value="Weferse">Weferse</option>
<option value="Shengadane">Shengadane</option>
<option value="Futane">Futane</option>
<option value="Maka">Maka</option>
</select>
</div>
<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input id="prize" type="text" class="form-control" name="prize" placeholder="Prize" pattern="\d+" required>
</div>
<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span>
<select name="type" class="form-control">
<option>--select type--</option>
<option value="Sainik Farsana">Sainik Farsana</option>
<option value="Premium Sainik Farsana">Premium Sainik Farsana</option>
<option value="Anusawad">Anusawad</option>
</select>
</div>
<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
<input ng-model="address" id="address" type="file" class="form-control" name="photo" placeholder="Select image" required>
</div>
<br>



<button type="submit" class="btn btn-success" id="btnsub" name=btnsub>Submit</button>
<button type="reset" class="btn btn-danger" id="btnres" name=btnres>Reset</button>

</form>
</div>
<div class="col-sm-8">
</div>
</div>
<h2>Products</h2>
<table class=table>
<thead>
<tr>                                                                                              
<th>Actions</th><th>SrNo</th><th>Name</th><th>Price</th><th>Type</th><th>Image</th>          
</tr>
</thead>
<tbody>
<?php
include("connection.php");
$q="select * from productdetails";
$rs=mysqli_query($cn,$q);
while($a=mysqli_fetch_array($rs))
{
extract($a);
echo "<tr>";
echo "<td><a href=delete.php?srno=$srno>Delete</a> <a href=update.php?srno=$srno>Update</a>  
</td><td>$srno</td><td>$name</td><td>$price</td><td>$type</td><td><img src='../images/$photo' width=100 height=100></td>";
echo "</tr>";
}

?>
</tbody>
</table>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
//code for image uploading
$fn=$_FILES['photo']['name'];
$s=$_FILES['photo']['size'];
$tnm=$_FILES['photo']['tmp_name'];

$ptr1=fopen($tnm,"r");
$ptr2=fopen("../images/$fn","w");

$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);

//end of image uploading
include("connection.php");
$q="insert into productdetails(srno,name,price,type,photo) values('$srno''$name','$price','$type','$fn')";

mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Product Added Successfully');window.location='manageproduct.php'</script>";
}
?>



























































