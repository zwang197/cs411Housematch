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
        if($type1 == "Price_Upper"){
			$Price_Upper = $_GET["Price_Upper"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Price_Upper = '$Price_Upper' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}
		if($type2 == "Price_Lower"){
			$Price_Lower = $_GET["Price_Lower"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Price_Lower = '$Price_Lower' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);	
		}
		if($type3 == "Location"){
			$Location = $_GET["Location"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Location = '$Location' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type4 == "Floor_plan"){
			$Floor_plan = $_GET["num_bedroom"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Floor_plan = '$Floor_plan' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type5 == "Smoke"){
			$Smoke = $_GET["Smoke"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Smoke = '$Smoke' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type6 == "Pet"){
			$Pet = $_GET["Pet"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Pet = '$Pet' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type7 == "Noise"){
			$Noise = $_GET["Noise"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Noise = '$Noise' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($type8 == "Gender"){
			$Gender= $_GET["Gender"];
			$update = "UPDATE Roomate_matching SET Roomate_matching.Gender = '$Gender' WHERE Roomate_matching.ID = '$ID'";
			$result = $mysqli->query($update);
		}

		if($result == true){
			print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
			print("<h1>Roommate matching update is Successful!</h1>");
		}
		else {
			print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
			print("<h1>Roommate matching update is Unsuccessful!</h1>");

		}

}

$mysqli->close();

?>
