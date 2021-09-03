<?php
include('db.php');
if(isset($_POST['submit']))
{
$cid=$_POST['cid'];
$sub_name=$_POST['sub_name'];
$passing_mark=$_POST['passing_mark'];
$out_of_mark=$_POST['out_of_mark'];

 if(mysqli_query($conn,"insert into subject_table(cid,sub_name,passing_mark,out_of_mark) 
        values ('$cid','$sub_name','$passing_mark','$out_of_mark')") 
			)
			{
header("location:addsubject.php");
			}
}
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
crossorigin="anonymous">
</script>
<script src="repeater.js">
(function(){
  $("#repeater").createRepeater();
});</script>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body >
<h2 class="title-1"><label for="class" class="col-lg-2 control-label">Add Subject</label></h2>
</div>
<form action="" method="post" name="form" enctype="multipart/form-data">
  <div class="row">
  <div class="col-lg-12">
  <div class="form-group">
  <div class="items1" data-group="class">
    <div class="col-sm-10 col-sm-offset-2" >
      <p style="margin-left:-170px;">
        <label for="class" class="col-lg-2 control-label">Class Name</label>
      </p>
    </div>
    <div class="col-md-4">
    <p style="margin-right:-2100px;">
      <select class="col-lg-2 control-label" name="cid" style="height:30px;" >
        <?php         echo'<option>-----select Class-----</option>';  
                     $r = mysqli_query($conn,"select * from class"); 
                     while($row = mysqli_fetch_array($r)){
                     echo '<option value='.$row['cid'].'>'.$row['class'].'</option>';
                     }
                      ?>
      </select>
      </p>
    </div>
    <div class="col-sm-10 col-sm-offset-2" >
      <p style="margin-left:-170px;">
        <label for="class" class="col-lg-2 control-label">Subject Name</label>
      </p>
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="sub_name" id="sub_name" placeholder="sub_name" data-name="class"  value="" required >
    </div>
    <div class="col-sm-10 col-sm-offset-2" >
      <p style="margin-left:-170px;">
        <label for="class" class="col-lg-2 control-label">Passing Mark</label>
      </p>
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="passing_mark" id="passing_mark" placeholder="passing_mark" data-name="class"  value="" required >
    </div>
    <div class="col-sm-10 col-sm-offset-2" >
      <p style="margin-left:-170px;">
        <label for="class" class="col-lg-2 control-label">Out Of Marks</label>
      </p>
    </div>
    <div class="col-md-4">
      <input type="text" class="form-control" name="out_of_mark" id="out_of_mark" placeholder="out_of_mark" data-name="class"  value="" required >
    </div>
    <div class="pull-right repeater-remove-btn">
      <p style="margin-right:550;">
        <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items1').remove()"> Remove </button>
      </p>
    </div>
  </div>
  <div id="repeater">
    <div class="pull-left repeater-heading">
      <p style="margin-left: 68px;padding:-2px 50px;margin-bottom: 0px;border-right-width: -;"">
        <button type="submit" name="submit" class="btn btn-primary repeater-add-btn" > Add </button>
      </p>
    </div>
    <div class="items1" data-group="class"> </div>
  </div>
  </div>
</div>
</div>
</form>

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="container-fluid">
        <div class="content">
          <h2 class="title-1">Subject Details</h2>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">sr No</th>
                <th scope="col">Class</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Passing Mark</th>
                <th scope="col">out Of Mark</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        $records = mysqli_query($conn,"select * from subject_table"); // fetch data from database
						$cnt=1;
						while($data = mysqli_fetch_array($records))
							{
						  ?>
              <tr>
                <td><?php  echo $cnt; ?></td>
                <td><?php  echo $data['cid']; ?></td>
                <td><?php echo $data['sub_name']; ?></td>
                <td><?php echo $data['passing_mark']; ?></td>
                <td><?php echo $data['out_of_mark']; ?></td>
                <td><a href="editsubject.php?sid=<?php $data['sid']; ?>">Edit</a></td>
                <td><a href="deletesubject.php?sid=<?php  $data['sid']; ?>">Delete</a></td>
              </tr>
            </tbody>
            
            <?php    
			        $cnt++;
                                 }
                           ?>
          </table>
        </div>
<a href="index.php">
<button type="button" class="btn btn-primary">Add Class</button>
</a><a href="addsubject.php">
<button type="button" class="btn btn-primary">Add Subject</button>
</a><a href="addstudent.php">
<button type="button" class="btn btn-primary">Add Student</button>
</a>      </div>
    </div>
  </div>
</div>
</body>
</html>
