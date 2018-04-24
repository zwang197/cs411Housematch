<?php



$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$userID = $_POST['userID'];
$Passwords= $_POST["Passwords"];
$sql="SELECT Users.Passwords FROM Users WHERE ID = '$userID'";
$result = $mysqli->query($sql);
$num_rows=$result->num_rows;
$row = $result->fetch_assoc();
if ($num_rows==0 || $row['Passwords']!=$Passwords) {
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("<br><br>");
    print("The user ID and Passwords don't match or the user ID doesn't exsit."); 
}

else{

$userType = "unknown";
$myInfo = "unknown";

$checkUserType = "SELECT * FROM (Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.ID = $userID";
$result = $mysqli->query($checkUserType);
$num_rows = $result->num_rows;
if ($num_rows != 0) {
    $userType = "sublessor";
    $myInfo = $result->fetch_assoc();
}
$result->free();

$checkUserType = "SELECT * FROM (Sublessee INNER JOIN Users ON Users.ID=Sublessee.ID) WHERE Sublessee.ID = $userID";
$result = $mysqli->query($checkUserType);
$num_rows = $result->num_rows;
if ($num_rows != 0) {
    $userType = "sublessee";
    $myInfo = $result->fetch_assoc();
}
$result->free();

$checkUserType = "SELECT * FROM (Roomate_matching INNER JOIN Users ON Users.ID=Roomate_matching.ID) WHERE Roomate_matching.ID = $userID";
$result = $mysqli->query($checkUserType);
$num_rows = $result->num_rows;
if ($num_rows != 0) {
    $userType = "roomate";
    $myInfo = $result->fetch_assoc();
}
$result->free();



if($userType == "unknown"){
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
    print("<h1>User not found!</h1>");
}

else{
    if($userType == "sublessor"){
        $startEnd = $myInfo['Start_end'];
	    $findMatch = "SELECT * FROM (Sublessee INNER JOIN Users ON Users.ID=Sublessee.ID) WHERE Sublessee.Start_end = '$startEnd'";
    }

    else if($userType == "sublessee"){
        $startEnd = $myInfo['Start_end'];
        $findMatch = "SELECT * FROM (Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Start_end = '$startEnd'";
    }

    else {
        $startEnd = $myInfo['Start_end'];
        $findMatch = "SELECT * FROM (Roomate_matching INNER JOIN Users ON Users.ID=Roomate_matching.ID) WHERE Roomate_matching.ID <> $userID AND Roomate_matching.Start_end = '$startEnd'";
    }

    $allMatch = $mysqli->query($findMatch);
    $num_rows = $allMatch->num_rows;
    
    if ($num_rows == 0) {
        print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
        print("<h1>No matching user found!</h1>");
        $allMatch->free();
    }

    else {
        $tupleArray = array();
        
        if($userType == "sublessor"){
            while ($row = $allMatch->fetch_assoc()){

                $matchCounter = 1;
                $row['Start_end'] = $row['Start_end']." MATCH!";

                if($myInfo['Price'] <= $row['Price_Upper'] AND $row['Price_Upper'] != NULL){
                    $row['Price_Upper'] = $row['Price_Upper']." MATCH!";
                    $matchCounter++;
                }
                if($myInfo['Location'] == $row['Location'] AND $row['Location'] != NULL){
                    $row['Location'] = $row['Location']." MATCH!";
                    $matchCounter++;
                }
                if($myInfo['Floor_plan'] == $row['Sublessee.Floor_plan'] AND $row['Sublessee.Floor_plan'] != NULL){
                    $row['Floor_plan'] = $row['Floor_plan']." MATCH!";
                    $matchCounter++;
                }
                if($myInfo['Facilities'] == $row['Facilities'] AND $row['Facilities'] != NULL){
                    $row['Facilities'] = $row['Facilities']." MATCH!";
                    $matchCounter++;
                }
                if($myInfo['Address'] == $row['Address'] AND $row['Address'] != NULL){
                    $row['Address'] = $row['Address']." MATCH!";
                    $matchCounter++;
                }
                if($myInfo['Distance_to_downtown'] <= $row['prefered_distance'] AND $row['prefered_distance'] != NULL){
                    $row['prefered_distance'] = $row['prefered_distance']." MATCH!";
                    $matchCounter++;
                }
                if($myInfo['Number_of_units'] >= $row['Number_of_units_want'] AND $row['Number_of_units_want'] != NULL){
                    $row['Number_of_units_want'] = $row['Number_of_units_want']." MATCH!";
                    $matchCounter++;
                }
                if($myinfo['Additional_info'] == $row['Additional_info'] AND $row['Additional_info'] != NULL){
                    $row['Additional_info'] = $row['Additional_info'] ."MATCH!";
                    $matchCounter++;
                }

                array_unshift($row, $matchCounter);
                $arrayID = $row['ID'];
                $tupleArray[$arrayID] = $row;           
            }

            $allMatch->free();
            $mysqli->close();
        }

        else if($userType == "sublessee"){
            while ($row = $allMatch->fetch_assoc()){
                $matchCounter = 1;
                $row['Start_end'] = $row['Start_end']." MATCH!";
                
                if($row['Price'] <= $myInfo['Price_Upper'] AND $row['Price'] != NULL){
                    $row['Price'] = $row['Price']." MATCH!";
                    $matchCounter++;
                }
                if($row['Location'] == $myInfo['Location'] AND $row['Location'] != NULL){
                    $row['Location'] = $row['Location']." MATCH!";
                    $matchCounter++;
                }
                if($row['Floor_plan'] == $myInfo['Floor_plan'] AND $row['Floor_plan'] != NULL){
                    $row['Floor_plan'] = $row['Floor_plan']." MATCH!";
                    $matchCounter++;
                }
                if($row['Facilities'] == $myInfo['Facilities'] AND $row['Facilities'] != NULL){
                    $row['Facilities'] = $row['Facilities']." MATCH!";
                    $matchCounter++;
                }
                if($row['Address'] == $myInfo['Address'] AND $row['Address'] != NULL){
                    $row['Address'] = $row['Address']." MATCH!";
                    $matchCounter++;
                }
                if($row['Distance_to_downtown'] <= $myInfo['prefered_distance'] AND $row['Distance_to_downtown'] != NULL){
                    $row['Distance_to_downtown'] = $row['Distance_to_downtown']." MATCH!";
                    $matchCounter++;
                }
                if($row['Number_of_units'] >= $myInfo['Number_of_units_want'] AND $row['Number_of_units'] != NULL){
                    $row['Number_of_units'] = $row['Number_of_units']." MATCH!";
                    $matchCounter++;
                }
                if($myinfo['Additional_info'] == $row['Additional_info'] AND $row['Additional_info'] != NULL){
                    $row['Additional_info'] = $row['Additional_info'] ."MATCH!";
                    $matchCounter++;
                }

                array_unshift($row, $matchCounter);
                $arrayID = $row['ID'];
                $tupleArray[$arrayID] = $row;          
            }

            $allMatch->free();
            $mysqli->close();
        }

        else{
            while ($row = $allMatch->fetch_assoc()){
                $matchCounter = 1;
                $row['Start_end'] = $row['Start_end']." MATCH!";
                
                if($row['Price_Upper'] <= $myInfo['Price_Upper'] AND $row['Price_Upper'] != NULL){
                    $row['Price_Upper'] = $row['Price_Upper']." MATCH!";
                    $matchCounter++;
                }
                if($row['Location'] == $myInfo['Location'] AND $row['Location'] != NULL){
                    $row['Location'] = $row['Location']." MATCH!";
                    $matchCounter++;
                }
                if($row['Floor_plan'] == $myInfo['Floor_plan'] AND $row['Floor_plan'] != NULL){
                    $row['Floor_plan'] = $row['Floor_plan']." MATCH!";
                    $matchCounter++;
                }
                if($row['Smoke'] == $myInfo['Smoke'] AND $row['Smoke'] != NULL){
                    $row['Smoke'] = $row['Smoke']." MATCH!";
                    $matchCounter++;
                }
                if($row['Pet'] == $myInfo['Pet'] AND $row['Pet'] != NULL){
                    $row['Pet'] = $row['Pet']." MATCH!";
                    $matchCounter++;
                }
                if($row['Noise'] == $myInfo['Noise'] AND $row['Noise'] != NULL){
                    $row['Noise'] = $row['Noise']." MATCH!";
                    $matchCounter++;
                }
                if($row['Gender'] == $myInfo['Gender'] AND $row['Gender'] != NULL){
                    $row['Gender'] = $row['Gender']." MATCH!";
                    $matchCounter++;
                }

                array_unshift($row, $matchCounter);
                $arrayID = $row['ID'];
                $tupleArray[$arrayID] = $row;          
            }

            $allMatch->free();
            $mysqli->close();
        }
    

        rsort($tupleArray);
        
        print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
        print("<br><br>");
        print("___________________________________");
        print("<br><br>");
        print("<br><br>");
        print("Your Information:");
        print("<br><br>");
        print("<p><b> ID: {$myInfo['ID']} </b></p>");
        print("<br><br>");
        print("<p><b> Name: {$myInfo['Name']} </b></p>");
        print("<br><br>");
        print("<p><b> Gender: {$myInfo['Gender']} </b>");
        print("<br><br>");
        print("<p><b> Age: {$myInfo['Age']} </b>");
        print("<br><br>");
        print("<p><b> Occupation: {$myInfo['Occupation']} </b>");
        print("<br><br>");
        print("<p><b> Contact: {$myInfo['Contact']} </b>");
        print("<br><br>");
        
        if($userType == "sublessor"){    
            print("<p><b> Price: {$myInfo['Price']} </b>");
            print("<br><br>");
            print("<p><b> Roommates_info: {$myInfo['Roomates_info']} </b>");
            print("<br><br>");
            print("<p><b> Location: {$myInfo['Location']} </b>");
            print("<br><br>");
            print("<p><b> Floor_plan: {$myInfo['Floor_plan']} </b>");
            print("<br><br>");
            print("<p><b> Facilities: {$myInfo['Facilities']} </b>");
            print("<br><br>");
            print("<p><b> Address: {$myInfo['Address']} </b>");
            print("<br><br>");
            print("<p><b> Distance_to_downtown: {$myInfo['Distance_to_downtown']} </b>");
            print("<br><br>");
            print("<p><b> Start_end: {$myInfo['Start_end']} </b>");
            print("<br><br>");
            print("<p><b> Number_of_units: {$myInfo['Number_of_units']} </b>");
            print("<br><br>");
            print("<p><b> Additional_info: {$myInfo['Additional_info']} </b>");
            print("<br><br>");
        }
        else if($userType == "sublessee"){
            print("<p><b> Price_Lower: {$myInfo['Price_Lower']} </b>");
            print("<br><br>");
            print("<p><b> Price_Upper: {$myInfo['Price_Upper']} </b>");
            print("<br><br>");
            print("<p><b> Location: {$myInfo['Location']} </b>");
            print("<br><br>");
            print("<p><b> Floor_plan: {$myInfo['Floor_plan']} </b>");
            print("<br><br>");
            print("<p><b> Facilities: {$myInfo['Facilities']} </b>");
            print("<br><br>");
            print("<p><b> Address: {$myInfo['Address']} </b>");
            print("<br><br>");
            print("<p><b> Preferred Distance: {$myInfo['prefered_distance']} </b>");
            print("<br><br>");
            print("<p><b> Start_end: {$myInfo['Start_end']} </b>");
            print("<br><br>");
            print("<p><b> Number_of_units_want: {$myInfo['Number_of_units_want']} </b>");
            print("<br><br>");
            print("<p><b> Additional_info: {$myInfo['Additional_info']} </b>");
            print("<br><br>");
        }
        else{
            print("<p><b> Price_Lower: {$myInfo['Price_Lower']} </b>");
            print("<br><br>");
            print("<p><b> Price_Upper: {$myInfo['Price_Upper']} </b>");
            print("<br><br>");
            print("<p><b> Location: {$myInfo['Location']} </b>");
            print("<br><br>");
            print("<p><b> Floor_plan: {$myInfo['Floor_plan']} </b>");
            print("<br><br>");
            print("<p><b> Smoking: {$myInfo['Smoke']} </b>");
            print("<br><br>");
            print("<p><b> Pet: {$myInfo['Pet']} </b>");
            print("<br><br>");
            print("<p><b> Start_end: {$myInfo['Start_end']} </b>");
            print("<br><br>");
            print("<p><b> Noise: {$myInfo['Noise']} </b>");
            print("<br><br>");
        }
        
        print("<br><br>");
        $count = count($tupleArray);
        print("{$count} Total Matching Results in Descending Order:");
        print("<br><br>");
        
        foreach($tupleArray as $tuple){
            print("___________________________________");
            print("<p><b> Number of Matching Attributes: {$tuple[0]} </b></p>");
            print("<p><b> ID: {$tuple['ID']} </b></p>");
            print("<br><br>");
            print("<p><b> Name: {$tuple['Name']} </b></p>");
            print("<br><br>");
            print("<p><b> Gender: {$tuple['Gender']} </b>");
            print("<br><br>");
            print("<p><b> Age: {$tuple['Age']} </b>");
            print("<br><br>");
            print("<p><b> Occupation: {$tuple['Occupation']} </b>");
            print("<br><br>");
            print("<p><b> Contact: {$tuple['Contact']} </b>");
            print("<br><br>");
            
            if($userType == "sublessor"){
                print("<p><b> Price_Lower: {$tuple['Price_Lower']} </b>");
                print("<br><br>");
                print("<p><b> Price_Upper: {$tuple['Price_Upper']} </b>");
                print("<br><br>");
                print("<p><b> Location: {$tuple['Location']} </b>");
                print("<br><br>");
                print("<p><b> Floor_plan: {$tuple['Floor_plan']} </b>");
                print("<br><br>");
                print("<p><b> Facilities: {$tuple['Facilities']} </b>");
                print("<br><br>");
                print("<p><b> Address: {$tuple['Address']} </b>");
                print("<br><br>");
                print("<p><b> Preferred_distance: {$tuple['prefered_distance']} </b>");
                print("<br><br>");
                print("<p><b> Start_end: {$tuple['Start_end']} </b>");
                print("<br><br>");
                print("<p><b> Number_of_units_want: {$tuple['Number_of_units_want']} </b>");
                print("<br><br>");
                print("<p><b> Additional_info: {$tuple['Additional_info']} </b>");
                print("<br><br>");
            }
            else if($userType == "sublessee"){
                print("<p><b> Price: {$tuple['Price']} </b>");
                print("<br><br>");
                print("<p><b> Roommates Info: {$tuple['Rommates_info']} </b>");
                print("<br><br>");
                print("<p><b> Location: {$tuple['Location']} </b>");
                print("<br><br>");
                print("<p><b> Floor_plan: {$tuple['Floor_plan']} </b>");
                print("<br><br>");
                print("<p><b> Facilities: {$tuple['Facilities']} </b>");
                print("<br><br>");
                print("<p><b> Address: {$tuple['Address']} </b>");
                print("<br><br>");
                print("<p><b> Distance to Downtown: {$tuple['Distance_to_downtown']} </b>");
                print("<br><br>");
                print("<p><b> Start_end: {$tuple['Start_end']} </b>");
                print("<br><br>");
                print("<p><b> Number_of_units: {$tuple['Number_of_units']} </b>");
                print("<br><br>");
                print("<p><b> Additional_info: {$tuple['Additional_info']} </b>");
                print("<br><br>");
            }
            else{
                print("<p><b> Price Upper: {$tuple['Price_Upper']} </b>");
                print("<br><br>");
                print("<p><b> Price Lower: {$tuple['Price_Lower']} </b>");
                print("<br><br>");
                print("<p><b> Location: {$tuple['Location']} </b>");
                print("<br><br>");
                print("<p><b> Floor_plan: {$tuple['Floor_plan']} </b>");
                print("<br><br>");
                print("<p><b> Smoking: {$tuple['Smoke']} </b>");
                print("<br><br>");
                print("<p><b> Pet: {$tuple['Pet']} </b>");
                print("<br><br>");
                print("<p><b> Start_end: {$tuple['Start_end']} </b>");
                print("<br><br>");
                print("<p><b> Noise: {$tuple['Noise']} </b>");
                print("<br><br>");
            }
        } 
    }
}
}



?>