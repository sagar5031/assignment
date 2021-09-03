<?php
include('db.php');
	$cid=$_GET['cid'];
	$result = mysqli_query($conn,"SELECT * FROM class where cid='$cid'");
		while($row = mysqli_fetch_array($result))
			{
				$cid=$row['cid'];
			}

?>
<!DOCTYPE html>
<html lang="en">
<body >

            <h2 class="title-1">Upadte Class</h2>
            <div class="row">
            <div class="col-lg-12">
            <div class="form-group">             
            <form action="" method="post" name="form" enctype="multipart/form-data">
            <label for="class" class="col-lg-2 control-label">class</label>
            
<input type="text" class="form-control" name="class" id="class" placeholder="class" data-name="class" value="<?php echo $class=$_GET['cid'] ?>" required / >
            <input type="submit" value="Update" id="button1">
            
            </form>
          </div>
        </div>
  </div>
</body>
</html>
<?php
if(isset($_POST["Update"]))
{
  $class = implode(',',$_POST["class"]);
	$sql = "Update class set class='".$_POST["class"]."'";
	
	if(mysql_query($sql,$conn)){
		//echo 'Update';	
		header('location:index.php');
	}else{
		echo mysql_error();	
	}
}
 ?>