<?php

$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$ID = $_GET["ID"];
$Passwords= $_GET["Passwords"];
$sql="SELECT Users.Passwords FROM Users WHERE ID = '$ID'";
$result = $mysqli->query($sql);
$num_rows=$result->num_rows;
$row = $result->fetch_assoc();
if ($num_rows==0 || $row['Passwords']!=$Passwords) {
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("<br><br>");
    print("The user ID and Passwords don't match or the user ID doesn't exsit."); 
}
else {
    
    $type1= $_GET["type1"];
    $type2= $_GET["type2"];
    $type3= $_GET["type3"];
    $type4= $_GET["type4"];
    $type5= $_GET["type5"];
    $type6= $_GET["type6"];
    $type7= $_GET["type7"];
    $type8= $_GET["type8"];
    
		if($type1 == "Price"){
			$Price = $_GET["Price"];
			$update1 = "UPDATE Sublessor SET Sublessor.Price = '$Price' WHERE Sublessor.ID = '$ID'";
			$result = $mysqli->query($update1);	
		}
        
        if($type2 == "Location"){
			$Location = $_GET["Location"];
			$update2 = "UPDATE Sublessor SET Sublessor.Location = '$Location' WHERE Sublessor.ID = '$ID'";
			$result = $mysqli->query($update2);
		}
		if($type3 == "Floor_plan"){
			$Floor_plan = $_GET["Floor_plan"];
			$update3 = "UPDATE Sublessor SET Sublessor.Floor_plan = '$Floor_plan' WHERE Sublessor.ID = '$ID'";
			$result = $mysqli->query($update3);
		}
		if($type4 == "Facilities"){
			$Facilities = $_GET["Facilities"];
			$update4 = "UPDATE Sublessor SET Sublessor.Facilities = '$Facilities' WHERE Sublessor.ID = '$ID'";
			$result = $mysqli->query($update4);
		}

        if($type5 == "Address"){
			$Address = $_GET["Address"];
			$update5 = "UPDATE Sublessor SET Sublessee.Address = '$Address' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update5);
		}

		if($type6 == "Distance_to_downtown"){
			$Distance_to_downtown = $_GET["Distance_to_downtown"];
			$update6 = "UPDATE Sublessor SET Sublessor.Distance_to_downtown = '$Distance_to_downtown' WHERE Sublessor.ID = '$ID'";
			$result = $mysqli->query($update6);
		}
		if($type7 == "Number_of_units"){
			$Number_of_units = $_GET["Number_of_units"];
			$update7 = "UPDATE Sublessor SET Sublessor.Number_of_units = '$Number_of_units' WHERE Sublessor.ID = '$ID'";
			$result = $mysqli->query($update7);
		}
		if($type8 == "Additional_info"){
			$Additional_info = $_GET["Additional_info"];
			$update8 = "UPDATE Sublessor SET Sublessee.Additional_info = '$Additional_info' WHERE Sublessee.ID ='$ID'";
			$result = $mysqli->query($update8);
		}


		if($result == true){
		    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
			print("<h1>Sublessor update is Successful!</h1>");
		}
		else {
			print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
			print("<h1>Sublessor update is Unsuccessful!</h1>");
		}
	

}

$mysqli->close();

?>
