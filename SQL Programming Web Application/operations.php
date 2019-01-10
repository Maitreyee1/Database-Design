<!DOCTYPE html>
<html>
<body>


<form action="modify_operations.php" target="blank">

<fieldset>

<br> Enter Contact ID from below search results to modify or delete records<br>

<input type="text" name="mod_search"><br>

<br>
First name: &nbsp <input type="text" name="c1"> &nbsp
Middle name: &nbsp <input type="text" name="c2"> &nbsp
Last name: &nbsp <input type="text" name="c3"><br>
Address<br>
Address Type: &nbsp <input type="text" name="a1"> &nbsp
Street: &nbsp <input type="text" name="a2"> &nbsp
City: &nbsp <input type="text" name="a3"> &nbsp
State: &nbsp <input type="text" name="a4"> &nbsp
Zipcode: &nbsp <input type="text" name="a5"><br>
Phone Number<br>
Number Type: &nbsp <input type="text" name="p1"> &nbsp
Area Code: &nbsp <input type="text" name="p2"> &nbsp
Ph Number: &nbsp <input type="text" name="p3"><br>
Date:<br>
Date Type: &nbsp <input type="text" name="d1"> &nbsp
Date: &nbsp <input type="text" name="d2"><br>


<br> Choose the right button to modify / delete the record from respective data<br>
Deletion : Enter Address type for Address, Phone type for Phone  & Date type for Date along wih contact ID<br><br>

<input type="submit" name="Modify_Contact" value="Modify_Contact">
<input type="submit" name="Modify_Address" value="Modify_Address">
<input type="submit" name="Modify_Phone" value="Modify_Phone">
<input type="submit" name="Modify_Date" value="Modify_Date"><br><br>
<input type="submit" name="Delete_Contact" value="Delete_Contact">
<input type="submit" name="Delete_Address" value="Delete_Address">
<input type="submit" name="Delete_Phone" value="Delete_Phone">
<input type="submit" name="Delete_Date" value="Delete_Date">

</fieldset>

</form>
			


<?php
// MAITREYEE MHASAKAR mam171630
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
echo "<br><br><br>"; 
echo "MySQL Connected successfully \n";

printf("\n");
$sql = "USE address_book_f;";
if ($conn->query($sql) === TRUE) {
	echo "<br>";
    echo "Database selected successfully \n ";
	echo "<br>";
	printf("\n");
} else {
    echo "Error selecting database: " . $conn->error;
}
echo "<br>";
$sql = "SHOW TABLES FROM $dbname";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "DB Error, could not list tables \n";
    echo 'MySQL Error: ' . $conn->error;
    exit;
}
echo "Tables in database :: <br>";
if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
		echo "<br>";
    printf ("%s \n",$row[0]);
	printf("\n");
    }
  // Free result set
  mysqli_free_result($result);
}


 
 
 
 
 
 
 
 
 
 
	if (isset($_GET['Insert'])) {
		echo "<br>";
	 
		echo "Insert Operation";	
		
		$stmt = $conn->prepare("INSERT INTO Contact (Fname, Mname,Lname) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $firstname, $middlename, $lastname);

		// set parameters and execute
		$firstname = $_GET["firstname"];
		$middlename=$_GET["middlename"];
		$lastname = $_GET["lastname"];
		
		$stmt->execute();
		
		$sql="SELECT Contact_id FROM Contact ORDER BY Contact_id  DESC LIMIT 1";
		$result = mysqli_query($conn,$sql);

		if (!$result) {
			echo "Error \n";
			printf("\n");
			echo 'MySQL Error: ' . $conn->error;
			printf("\n");
			exit;
		}
		$row=mysqli_fetch_row($result);
		
		echo "<br>";
		echo "Contact ID is : ".$row[0];


		// Insert data into Address
		$stmt = $conn->prepare("INSERT INTO Address (Contact_id,Address_type,Address,City,State,Zip) VALUES (?,?, ?, ?,?,?)");
		$stmt->bind_param("ssssss",$row[0],$Addresstype,$Address,$City,$State,$Zip);

		// set parameters and execute
		$Addresstype=$_GET["Addresstype"];
		$Address=$_GET["Street"];
		$City=$_GET["City"];
		$State=$_GET["State"];
		$Zip=$_GET["Zipcode"];
		$stmt->execute();
		
		// Insert data into Phone
		$stmt = $conn->prepare("INSERT INTO Phone (Contact_id,Phone_type,Area_code,Ph_Number) VALUES (?,?,?,?)");
		$stmt->bind_param("ssss",$row[0],$Phone_type, $Area_code,$Ph_Number);

		// set parameters and execute
		$Phone_type=$_GET["Numbertype"]; 
		$Area_code=$_GET["Areacode"];
		$Ph_Number=$_GET["Phnumber"];
		$stmt->execute();
		
		// Insert data into Birthdate
		$stmt = $conn->prepare("INSERT INTO Birthdate (Contact_id,Date_type,Date_) VALUES (?,?,?)");
		$stmt->bind_param("sss",$row[0],$Date_type, $Date_);

		// set parameters and execute
		$Date_type=$_GET["Datetype"]; 
		$Date_=$_GET["Date"];
		$stmt->execute();
		
		
	}



	
	else if (isset($_GET['Display'])) {
		echo "<br>";
		echo "Display Operation \n";
		printf("\n");
		$Name=$_GET["firstname"];
		//$Name=mysql_real_escape_string($Name);

		  $sql="SELECT * FROM Contact WHERE  Fname LIKE '%".$Name."%' "; 
		//$sql->bind_param("s", $Name);

		$result = mysqli_query($conn,$sql);

		if (!$result) {
			echo "Error \n";
			printf("\n");
			echo 'MySQL Error: ' . $conn->error;
			printf("\n");
			exit;
		}



		if ($result=mysqli_query($conn,$sql))
		  {
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
			//printf ("%s \n",$row[0],"%s \n",$row[1]);
			echo "id: " . $row[0]. " - FirstName: " . $row[1]." - Middle Name: " . $row[2]." - Last Name: " . $row[3]."<br>";

			echo "<br>";
			printf("\n");
			}
		  // Free result set
		  mysqli_free_result($result);
		}
	}
	
	else if (isset($_GET['Modify'])) {
					$a=$_GET["Date"];
						$sql="UPDATE Contact SET Fname= '".$_GET["firstname"]."', Mname='".$_GET["middlename"]."',Lname='".$_GET["lastname"]."'  WHERE contact_id='".$a."' ";
				//$stmt->bind_param("sss", $firstname, $middlename, $lastname);
				//echo $ContactID;
				$result = mysqli_query($conn,$sql);
				if (!$result) {
					echo "Error \n";
					printf("\n");
					echo 'MySQL Error: ' . $conn->error;
					printf("\n");
					exit;
				}
			

	}
	
	else if (isset($_GET['Search'])){
		
		echo "<br>";
		echo "Search Operation";
		
		$Search=$_GET["search_key"];
		
		
		
		// Search in Contact
		$sql="SELECT * FROM Contact WHERE  Fname LIKE '%".$Search."%' OR Mname LIKE '%".$Search."%' OR Lname LIKE '%".$Search."%' "; 

		$result = mysqli_query($conn,$sql);

		if (!$result) {
			echo "No record in Contact Table \n";
			echo 'MySQL Error: ' . $conn->error;
			printf("\n");
			exit;
		}

		if ($result=mysqli_query($conn,$sql))
		  {
			  echo "<br>";
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
			echo "Contact ID: " . $row[0]. " FirstName: " . $row[1]." Middle Name: " . $row[2]." Last Name: " . $row[3]."<br>";

			echo "<br>";
		
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		//*********************************************
		// Search in Address
		$sql="SELECT * FROM Address WHERE  Address_type LIKE '%".$Search."%' OR Address LIKE '%".$Search."%' OR City LIKE '%".$Search."%' OR State LIKE '%".$Search."%' OR Zip LIKE '%".$Search."%' "; 
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo "No record in Address Table \n";
			echo 'MySQL Error: ' . $conn->error;
			printf("\n");
			exit;
		}
		if ($result=mysqli_query($conn,$sql)){
			  echo "<br>";
			  // Fetch one and one row
			  while ($row=mysqli_fetch_row($result))
				{
					echo "Contact ID: " . $row[1]. "Type: " . $row[2]." Street " . $row[3]." City: " . $row[4]." State: " .$row[5]." Zip: ".$row[6]."<br>";
					echo "<br>";
				}
			  // Free result set
			  mysqli_free_result($result);
		}
		
		//*********************************************
		
		// Search in Phone
				
		$sql="SELECT * FROM Phone WHERE  Phone_type LIKE '%".$Search."%' OR Area_code LIKE '%".$Search."%' OR Ph_Number LIKE '%".$Search."%' "; 
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo "No record in Phone Table \n";
			echo 'MySQL Error: ' . $conn->error;
			printf("\n");
			exit;
		}
		if ($result=mysqli_query($conn,$sql)){
			  echo "<br>";
			  // Fetch one and one row
			  while ($row=mysqli_fetch_row($result))
				{
					echo "Contact ID: " . $row[1]. "Ph Type: " . $row[2]." Area code: " . $row[3]." Number: " . $row[4]."<br>";
					echo "<br>";
				}
			  // Free result set
			  mysqli_free_result($result);
		}
		
		//*********************************************
		// Search in Date
		
		
				
		$sql="SELECT * FROM Birthdate WHERE  Date_type LIKE '%".$Search."%' OR Date_ LIKE '%".$Search."%' "; 
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo "No record in Date Table \n";
			echo 'MySQL Error: ' . $conn->error;
			printf("\n");
			exit;
		}
		if ($result=mysqli_query($conn,$sql)){
			  echo "<br>";
			  // Fetch one and one row
			  while ($row=mysqli_fetch_row($result))
				{
					echo "Contact ID: " . $row[1]. "Date Type: " . $row[2]." Date " . $row[3]."<br>";
					echo "<br>";
				}
			  // Free result set
			  mysqli_free_result($result);
		}


		

		
		
	}
	
	













	
	else {
    //no button pressed
	}


?>

</body>
</html>
