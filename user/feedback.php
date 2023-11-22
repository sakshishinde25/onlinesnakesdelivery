<?php
session_start();
include("header.php");
?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<form id="feedback" method="POST">
<div class="form-group">
<h4>Rate this product</h4>
<button type="button" class="btn btn-default btn-sm rateButton" aria-label="Left Align" name="rt" onclick="changestar(0)">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(1)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(2)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(3)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(4)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<input type="hidden" class="form-control" id="rating" name="rating" value="0">
</div>
<div class="form-group">
<label for="usr">Title*</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="comment">Comment*</label>
<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-info" id="saveReview" name=btnsub>Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
</div>
</form>
<script>
function changestar(i)
{
var rt=document.getElementsByClassName("rateButton");



var j;
for(j=0;j<=4;j++)
{
rt[j].className="btn btn-default btn-sm rateButton";
}
for(j=0;j<=i;j++)
{
rt[j].className="btn btn-warning btn-sm rateButton";
}

document.getElementById("rating").value=i+1;

}
</script>
<?php
include("connection.php");
if(isset($_POST["btnsub"]))
{
  $emailid=$_SESSION['emailid'];
  $rating=$_POST["rating"];
  $title=$_POST["title"];
 $comment=$_POST["comment"];

$q="insert into feedback values('$emailid',$rating,'$title','$comment')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo "<script>alert('Thank You for feedback');window.location='index.php'</script>";
}
?>
</div>
</div>
<div class="row">
<div class="col-sm-7">
<hr/>
<div class="review-block">
<?php
$ratinguery = "SELECT * FROM feedback";
$ratingResult = mysqli_query($cn, $ratinguery) ;
while($rating = mysqli_fetch_array($ratingResult)){
$emailid=$rating["emailid"];
$rt=$rating["rating"];
$title=$rating["title"];
$cmt=$rating["comment"];

?>
<div class="row">
<div class="col-sm-3">
<div class="review-block-name">By <a href="#"><?php echo $emailid; ?></a></div>

</div>
<div class="col-sm-9">
<div class="review-block-rate">
<?php
for ($i = 1; $i <= 5; $i++) {
$ratingClass = "btn-default btn-grey";
if($i <= $rating['rating']) {
$ratingClass = "btn-warning";
}
?>
<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<?php } ?>
</div>
<div class="review-block-title"><?php echo $rating['title']; ?></div>
<div class="review-block-description"><?php echo $rating['comment']; ?></div>
</div>
</div>
<hr/>
<?php } ?>
</div>
</div>
</div>
</body>
</html>