<?php


include('db.php');
$sid = $_GET['sid']; // get id through query string

$del = mysqli_query($conn,"delete from subject_table where sid = '$sid'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:delete_subject.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>