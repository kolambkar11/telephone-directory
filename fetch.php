<?php
include "db.php";
//$con= connect();
$output = '';
session_start();
$email = $_SESSION['email'];
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$query = "SELECT * FROM contact WHERE 
	firstname LIKE '%".$search."%' OR 
	middlename LIKE '%".$search."%' OR 
	lastname LIKE '%".$search."%' OR 
	email LIKE '%".$search."%' OR 
	mobilenumber LIKE '%".$search."%' OR 
	landlinenumber LIKE '%".$search."%' OR 
	notes LIKE '%".$search."%'
	AND user_email_address='$email'";
	//print_r($query);die;
	// $query = "SELECT * FROM criminalereg WHERE CriName LIKE '%".$search."%' OR VicName LIKE '%".$search."%' OR CriPic LIKE '%".$search."%' OR CriDate LIKE '%".$search."%' OR CriArr LIKE '%".$search."%'OR CriDes LIKE '%".$search."%'OR CriCauBy LIKE '%".$search."%'";
	}
else
{
	$query = "SELECT * FROM contact WHERE user_email_address='$email' ORDER BY id";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Mobile Number</th>
				<th>Landline Number</th>
				<th>Notes</th>
				<th>Contact Add on</th>
				</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '			

			<tr>
				<td>'.$row["firstname"].'</td>
				<td>'.$row["middlename"].'</td>
				<td>'.$row["lastname"].'</td>	
				<td>'.$row["email"].'</td>	
				<td>'.$row["mobilenumber"].'</td>	
				<td>'.$row["landlinenumber"].'</td>	
				<td>'.$row["notes"].'</td>
				<td>'.$row["createddate"].'</td>
			</tr>
		';
	}
								

	echo $output;
}
else
{
	echo '<div class="container-fluid">Data Not Found!</div>';
}
?>