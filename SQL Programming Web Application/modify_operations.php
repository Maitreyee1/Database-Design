<!DOCTYPE html>
<html>
<body>


<?php
//MATREYEE MHASAKAR mam171630
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

if(isset($_GET['Modify_Contact']))
{
	echo "Update Contact";
	
	// Contact ID of data to be modified
	$ContactID=$_GET['mod_search'];
	echo "",$ContactID;
	
	if($_GET["c1"])
	{
		//echo " In c1";
		$sql="UPDATE Contact SET Fname= '".$_GET["c1"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}
	if($_GET["c2"])
	{
		//echo " In c1";
		$sql="UPDATE Contact SET Mname= '".$_GET["c2"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}
	if($_GET["c3"])
	{
		//echo " In c1";
		$sql="UPDATE Contact SET Lname= '".$_GET["c3"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}
	
	
	
	
	
	
	
}
else if(isset($_GET['Modify_Address']))
{
		echo "Update Address";
		// Contact ID of data to be modified
		$ContactID=$_GET['mod_search'];
		
		echo "",$ContactID;
		
		
		
		if($_GET["a1"])
	{
		//echo " In c1";
		$sql="UPDATE Address SET Address_type='".$_GET["a1"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}if($_GET["a2"])
	{
		//echo " In c1";
		$sql="UPDATE Address SET Address= '".$_GET["a2"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}if($_GET["a3"])
	{
		//echo " In c1";
		$sql="UPDATE Address SET City= '".$_GET["a3"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}if($_GET["a4"])
	{
		//echo " In c1";
		$sql="UPDATE Address SET State= '".$_GET["a4"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}
	if($_GET["a5"])
	{
		//echo " In c1";
		$sql="UPDATE Address SET Zip= '".$_GET["a5"]."' WHERE contact_id='".$ContactID."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
					echo 'MySQL Error: ' . $conn->error;
					echo "<br>";
					exit;
		}
		
	}	
		
	

}
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
if(isset($_GET['Delete_Contact']))
{
	echo "Delete from  Contact";
	
	// Contact ID of data to be modified
	$ContactID=$_GET['mod_search'];
	echo "",$ContactID;
	
	
	
	$sql="DELETE FROM Contact WHERE contact_id='".$ContactID."'";
	$result = mysqli_query($conn,$sql);
	if (!$result) {
		echo 'MySQL Error: ' . $conn->error;
		echo "<br>";
		exit;
		}
	
}
else if(isset($_GET['Delete_Address']))
{
		echo "Delete from  Address";
		// Contact ID of data to be modified
		$ContactID=$_GET['mod_search'];
		$Add_type=$_GET['a1'];
		
		echo "",$ContactID;
		
		if($_GET["a1"]){
		
		$sql="DELETE FROM Address WHERE contact_id='".$ContactID."' AND Phone_type='".$Add_type."' ";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo 'MySQL Error: ' . $conn->error;
			echo "<br>";
			exit;
		}
		}
	
		
		
	

}
else if(isset($_GET['Delete_Phone']))
{
		echo "Delete from Phone";
		// Contact ID of data to be modified
		$ContactID=$_GET['mod_search'];
		$type=$_GET['p1'];
		
		if($_GET["p1"]){
		
		$sql="DELETE FROM Phone WHERE contact_id='".$ContactID."' AND Phone_type='".$type."'";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo 'MySQL Error: ' . $conn->error;
			echo "<br>";
			exit;
		}
		}
		
		

}
else if(isset($_GET['Delete_Date']))
{
		echo "Delete from Date";
		// Contact ID of data to be modified
		$ContactID=$_GET['mod_search'];
		$Datetype=$_GET['d1'];
		if($_GET["d1"]){
		//echo " In c1";
		$sql="DELETE FROM Birthdate WHERE contact_id='".$ContactID."' AND Date_type='".$Datetype."' ";
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


?>


</body>
</html>