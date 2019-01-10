<!DOCTYPE html>
<html>
<body>

<h1 align="center">CS 6360 Database Design: Programming Assignment 1</h1>
<h3 align="center"> by Maitreyee Mhasakar (net ID: mam171630)</h3>

<?php
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
//echo "Connected successfully";
$sql = "USE address_book_f;";
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


?>

<form action="operations.php" target="blank">
<fieldset>
<br>
<fieldset style="width:1000px">
<legend> Contact Name </legend>
First name: &nbsp <input type="text" name="firstname"> &nbsp
 Middle name: &nbsp <input type="text" name="middlename"> &nbsp
Last name: &nbsp <input type="text" name="lastname"><br>
 </fieldset>
  <fieldset style="width:1000px">
  <legend>Address</legend>
  Address Type: &nbsp
  <input type="text" name="Addresstype"> &nbsp
  Street: &nbsp
  <input type="text" name="Street"> &nbsp
  City: &nbsp
  <input type="text" name="City"><br><br>
  State: &nbsp
  <input type="text" name="State"> &nbsp
  Zipcode: &nbsp
  <input type="text" name="Zipcode"><br>
  </fieldset>
  <fieldset style="width:1000px">
  <legend>Phone Number</legend><br>
  Number Type: &nbsp
  <input type="text" name="Numbertype"> &nbsp
  Area Code: &nbsp
  <input type="text" name="Areacode"> &nbsp
  Ph Number: &nbsp
  <input type="text" name="Phnumber"> &nbsp
  </fieldset>
  <fieldset style="width:1000px">
  <legend>Date:</legend><br>
  Date Type: &nbsp
  <input type="text" name="Datetype"> &nbsp
  Date: &nbsp
  <input type="text" name="Date"><br>
  </fieldset>

<br>
  
  <input type="submit" name="Insert" value="Insert" />
  <input type="submit" name="Modify" value="Modify" />
  <input type="submit" name="action" value="Delete" />
</fieldset>

</form>

<form action="operations.php" target="blank" >
<fieldset>
<legend>Search</legend>

  Enter Search keyword: &nbsp
  <input type="text" name="search_key"> &nbsp <input type="submit" name="Search" value="Search">
</fieldset>
</form>


<br>
<br>
<form action="display.php" target="blank">
<fieldset>
<legend>Display</legend>
  Enter Contact ID: &nbsp
  <input type="text" name="DID"> &nbsp <input type="submit" name="DisplaybyID" value="DisplaybyID"><br><br>
  <input type="submit" name="Display_Contact" value="Display_Contact">&nbsp
  <input type="submit" name="Display_Address" value="Display_Address">&nbsp
  <input type="submit" name="Display_Phone" value="Display_Phone">&nbsp
  <input type="submit" name="Display_Date" value="Display_Date">&nbsp
</fieldset>
</form>









































</body>
</html>
