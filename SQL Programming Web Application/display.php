
<!DOCTYPE html>
<html>
<body>


<?php
// MAITREYEE MHASAKAR mam171630
//**************************************************
// Initialize connection for database

$servername = "localhost";
$username = "root";
$password = "root";
$dbname ="address_book_f";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
//echo "Connected successfully \n";
echo "<br>";
printf("\n");
$sql = "USE address_book_f;";
if ($conn->query($sql) === TRUE) {
    //echo "Database selected successfully \n ";
	echo "<br>";
	printf("\n");
} else {
    echo "Error selecting database: " . $conn->error;
}
//**************************************************

// Option selection

//*************************************************

if(isset($_GET['DisplaybyID']))
{
	echo "Display by Contact ID <br>";
	
	// Contact ID of data to be modified
	$ContactID=$_GET['DID'];
	echo "",$ContactID;
	
	$sql="SELECT * FROM Contact WHERE contact_id='".$ContactID."'";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	echo"<br>";
	echo "Contact info <br>";
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo " ".$row[1]." ".$row[2]." ".$row[3];
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	echo"<br>";
	echo "Address info <br>";
	$sql="SELECT * FROM Address WHERE contact_id='".$ContactID."'";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo " ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5];
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
		  
		  
	}
	echo"<br>";
	echo "Phone info <br>";
	$sql="SELECT * FROM Phone WHERE contact_id='".$ContactID."'";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				
				echo " ".$row[2]." ".$row[3]." ".$row[4];
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	echo"<br>";
	echo "Date info <br>";
	$sql="SELECT * FROM Birthdate WHERE contact_id='".$ContactID."'";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo " ".$row[2]." ".$row[3];
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	
	
	
		
}

else if(isset($_GET['Display_Contact']))
{
	
	echo "Display Contacts <br>";
	
	// Contact ID of data to be modified
	$ContactID=$_GET['DID'];
	echo "",$ContactID;
	
	$sql="SELECT * FROM Contact";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	echo "Contact ID \t First Name \t Middle Name \t Last Name <br>";
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo" |&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp|".$row[0]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp| ".$row[1]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp| ".$row[2]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp| ".$row[3]."|";
				echo"<br>----------------------------------------------------------------------------------------------------------------------------";
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	
}








else if(isset($_GET['Display_Address']))
{
		echo "Update Address";
		
		
		echo "Display Address <br>";
	
	// Contact ID of data to be modified
	$sql="SELECT * FROM Address";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	echo "Contact ID \t Address type \t Adddress \t City \t State \t Zip <br>";
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo" |&nbsp &nbsp|".$row[0]."&nbsp &nbsp| ".$row[1]."&nbsp &nbsp| ".$row[2]."&nbsp &nbsp| ".$row[3]."&nbsp &nbsp| ".$row[4]."&nbsp &nbsp| ".$row[5]."|";
				echo"<br>----------------------------------------------------------------------------------------------------------------------------";
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	
		
	

}

else if(isset($_GET['Display_Phone']))
{
		
		
		echo "Display Phone <br>";
	
	// Contact ID of data to be modified
	$sql="SELECT * FROM Phone";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	echo "Contact ID \t Phone type \t Area code \t Phone<br>";
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo" |&nbsp &nbsp|".$row[1]."&nbsp &nbsp| ".$row[2]."&nbsp &nbsp| (".$row[3]." ) &nbsp &nbsp| ".$row[4]."|";
				echo"<br>----------------------------------------------------------------------------------------------------------------------------";
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	
		
	

}

else if(isset($_GET['Display_Date']))
{
		
		
		echo "Display Phone <br>";
	
	// Contact ID of data to be modified
	$sql="SELECT * FROM Birthdate";
	$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
	echo "Contact ID \t Date type \t Date<br>";
	if ($result=mysqli_query($conn,$sql)){
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				echo" |&nbsp &nbsp|".$row[1]."&nbsp &nbsp| ".$row[2]."&nbsp &nbsp|".$row[3]."|";
				echo"<br>----------------------------------------------------------------------------------------------------------------------------";
				echo"<br>";
			}
		  // Free result set
		  mysqli_free_result($result);
	}
	
		
	

}







/*
else if(isset($_GET['Modify_Phone']))
{
		echo "Update Phone Number";
		// Contact ID of data to be modified
		$ContactID=$_GET['mod_search'];
		
		if($_GET["p1"])
	{
		//echo " In c1";
		$sql="UPDATE Phone SET Phone_type= '".$_GET["p1"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}	
	if($_GET["p2"])
	{
		//echo " In c1";
		$sql="UPDATE Phone SET Area_code= '".$_GET["p2"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}	
	if($_GET["p3"])
	{
		//echo " In c1";
		$sql="UPDATE Phone SET Ph_Number= '".$_GET["p3"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}	
	
		


}
else if(isset($_GET['Modify_Date']))
{
		echo "Update Date";
		// Contact ID of data to be modified
		$ContactID=$_GET['mod_search'];
		if($_GET["d1"])
	{
		//echo " In c1";
		$sql="UPDATE Birthdate SET Date_type= '".$_GET["d1"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}	
	if($_GET["d2"])
	{
		//echo " In c1";
		$sql="UPDATE Birthdate SET Date_= '".$_GET["d2"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}	
	


}

else
{
	// No button is pressed
}



























*/












?>


</body>
</html>
