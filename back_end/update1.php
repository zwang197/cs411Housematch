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
    $type9= $_GET["type9"];

		if($type1 == "Price_Lower"){
			$Price_Lower = $_GET["Price_Lower"];
			$update = "UPDATE Sublessee SET Sublessee.Price_Lower = '$Price_Lower' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);	
		}
        if($type2 == "Price_Upper"){
			$Price_Upper = $_GET["Price_Upper"];
			$update = "UPDATE Sublessee SET Sublessee.Price_Upper = '$Price_Upper' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}
		if($type3 == "Location"){
			$Location = $_GET["Location"];
			$update = "UPDATE Sublessee SET Sublessee.Location = '$Location' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type4 == "Floor_plan"){
			$Floor_plan = $_GET["Floor_plan"];
			$update = "UPDATE Sublessee SET Sublessee.Floor_plan = '$Floor_plan' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type5 == "Facilities"){
			$Facilities = $_GET["Facilities"];
			$update = "UPDATE Sublessee SET Sublessee.Facilities = '$Facilities' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type6 == "Address"){
			$Address = $_GET["Address"];
			$update = "UPDATE Sublessee SET Sublessee.Address = '$Address' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type7 == "prefered_distance"){
			$prefered_distance = $_GET["prefered_distance"];
			$update = "UPDATE Sublessee SET Sublessee.prefered_distance = '$prefered_distance' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type8 == "Number_of_units_want"){
			$Number_of_units_want = $_GET["Number_of_units_want"];
			$update = "UPDATE Sublessee SET Sublessee.Number_of_units_want = '$Number_of_units_want' WHERE Sublessee.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type9 == "Additional_info"){
			$Additional_info = $_GET["Additional_info"];
			$update = "UPDATE Sublessee SET Sublessee.Additional_info = '$Additional_info' WHERE Sublessee.ID ='$ID'";
			$result = $mysqli->query($update);
		}


		if($result == true){
			print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
			print("<h1>Sublessee update is Successful!</h1>");
		}
		else {
			print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
			print("<h1>Sublessee update is Unsuccessful!</h1>");

		}

}

$mysqli->close();

?>
