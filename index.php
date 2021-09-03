<?php
include('db.php');
if(isset($_POST['submit']))
{
$class=$_POST['class'];
$sholder=$_POST['sholder'];
 if(mysqli_query($conn,"insert into class(class) 
        values ('$class')") 
			)
			{
header("location:index.php");

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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<body >
            <h2 class="title-1"><label for="class" class="col-lg-2 control-label">Add Class</label></h2>
            <div class="row">
            <div class="col-lg-12">
            <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2" >
            <p style="margin-left:-170px;">
            <label for="class" class="col-lg-2 control-label">Class Name</label>
            </p>
            </div>
            </div>
            <form action="" method="post" name="form" enctype="multipart/form-data">
              <div class="items1" data-group="class"> 
                <div class="item-content">
                  <div class="form-group">
                    <div class="col-lg-6">
                      <input type="text" class="form-control" name="class" id="class" placeholder="class" data-name="class"  value="" required >
                    </div>
                  </div>
                </div>
                <div class="pull-right repeater-remove-btn">
                 <p style="margin-right:350;">
                  <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items1').remove()"> Remove </button>
                </p>
                </div>
              </div>
              <div id="repeater"> 
                <div class="pull-left repeater-heading">
                <p style="margin-left: 68px;padding:-2px 50px;margin-bottom: 0px;border-right-width: -;"">
                  <button type="submit" name="submit" class="btn btn-primary repeater-add-btn" >
                    Add </button></p>
                </div>
                <div class="items1" data-group="class"> 
                </div>
              </div>
              </form>
              </div>
              </div>
              
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="content"> 
                 <h2 class="title-1">Class Details</h2>
								<table class="table">
								  <thead class="thead-dark">
									<tr>
									<th scope="col">sr No</th>
      								<th scope="col">Class</th>
      							    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
     							    </tr>
                                  </thead>
                    	   <tbody>
           <?php
        $records = mysqli_query($conn,"select * from class"); // fetch data from database
        $cnt=1;
		while($data = mysqli_fetch_array($records))
        { 
           ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $data['cid']; ?></td>
                  <td><?php echo $data['class']; ?></td>
                  <td><a name="update" href="editclass.php?cid=<?php echo $data['cid']; ?>">Edit</a></td>
                  <td><a href="delete.php?cid=<?php echo $data['cid']; ?>">Delete</a></td>
                </tr>
                <?php
				$cnt++;
           }
           ?>
              </tbody>
              </table>
            
              </form>
    <a href="index.php"><button type="button" class="btn btn-primary">Add Class</button></a>          
    <a href="addsubject.php"><button type="button" class="btn btn-primary">Add Subject</button></a>
    <a href="addstudent.php"><button type="button" class="btn btn-primary">Add Student</button></a>
          </div>
    </div>
  </div>
</div>
</div>
</div></div>

</body>
</html>
<!-- end document-->