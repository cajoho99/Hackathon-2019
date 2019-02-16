<?php
	$table = $_POST['table'];
	if(empty($table))
	{
		echo "No database entered";
		exit;
	}
	
	require_once('../MySQL-connect.php');
	
	$query = "SELECT * from customers";
	
	$response = @mysqli_query($dbc,$query);
	
	if($response)
	{
		echo "<table id='dataTable'>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>E-mail</th>
					<th>CC</th>
					<th>Phone number</th>
					<th>ID</th>
				</tr>";
					
		while($row = mysqli_fetch_array($response))
		{
			echo"<tr>
					<td>".$row['First_name']."</td>
					<td>".$row['Last_name']."</td>
					<td>".$row['Email']."</td>
					<td>".$row['CC']."</td>
					<td>".$row['Phone_number']."</td>
					<td>".$row['Customer_ID']."</td>
				</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "Failed to access table <br/>".
			mysqli_error($dbc);
	}
	mysqli_close($dbc);
?>