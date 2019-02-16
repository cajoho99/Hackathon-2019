<?php
	$ID = $_POST['ID'];
	if(empty($ID))
	{
		echo "No ID entered";
		exit;
	}
	require_once('../MySQL-connect.php');
	
	$response = @mysqli_query($dbc,"DELETE from customers where Customer_ID = ".$ID);
	if($response)
	{
		echo "Customer no. ".$ID." was deleted";
	}
	else
	{
		echo "Failed to delete ID.no ". $ID ."<br/>".
		mysqli_error($dbc);
	}
	mysqli_close($dbc);
?>