<?php
	/*$hello = $_GET['hi'];
	echo $hello. " was passed";*/
	
	$First_name = $_POST['First_name'];
	$Last_name = $_POST['Last_name'];
	$Email = $_POST['Email'];
	$CC = $_POST['CC'];
	$Phone_number = $_POST['Phone_number'];
	
	$missingData;
	
	if(empty($First_name)){
		$missingData[]='First_name';
	}
	if(empty($Last_name)){
		$missingData[]='Last_name';
	}
	if(empty($Email)){
		$missingData[]='Email';
	}
	if(empty($CC)){
		$missingData[]='CC';
	}
	if(empty($Phone_number)){
		$missingData[]='Phone_number';
	}
	
	if(!empty($missingData))
	{
		echo "<p> Missing data: ";
		foreach($missingData as $missing)
		{
			echo $missing. "; ";
		}
		echo "</p>";
		exit;
	}
	
	require_once('../MySQL-connect.php');
			
			$query = "INSERT INTO customers value('". trim($First_name)."',
					'".trim($Last_name)."','".trim($Email)."',
					".trim($CC).",".trim($Phone_number).",null)";
			
			$response = @mysqli_query($dbc,$query);
			
			if($response)
			{
				echo "Success <br/>";
			}
			else
			{
				echo "Failed to add customers <br/>".
				mysqli_error($dbc);
			}
	mysqli_close($dbc);
			
?>