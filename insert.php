<?php

//insert.php

//$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

if(isset($_POST["student_name"]))
{
	$sid = implode(", ", $_POST["sid"]);

	$data = array(
		':student_name'		=>	$_POST["student_name"],
		':sid'		=>	$sid,
		':cid'		=>	$_POST["cid"]
	);

	$query = "
	INSERT INTO student_table 
	(student_name,sid,cid) 
	VALUES (:student_name, :sid, :cid)
	";

	$statement = $connect->prepare($query);

	if($statement->execute($data))
	{
		echo '
		<div class="alert alert-success">
			Data Successfully Inserted
		</div>
		';
	}
}

?>