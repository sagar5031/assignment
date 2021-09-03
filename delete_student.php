<?php


include('db.php');
$cid = $_GET['cid']; // get id through query string

$del = mysqli_query($conn,"delete from class where cid = '$cid'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:index.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>