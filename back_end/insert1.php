<?php

$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$ID = $_GET["ID"];
$sql="SELECT * FROM Users WHERE ID = '$ID'";
$result = $mysqli->query($sql);
$Passwords = $_GET["Passwords"];
$num_rows=$result->num_rows;

if ($num_rows>0) {
    
print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("This user ID is already used.");
}
else if(strlen($ID)!=4){
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("ID must have 4 digits.");
}
else if($Passwords==""){
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("Password can't be empty.");
}
else{
$Passwords = $_GET["Passwords"];
$Name = $_GET["Name"];
$Gender = $_GET["Gender"];
$Age = $_GET["Age"];
$Occupation = $_GET["Occupation"];
$Contact = $_GET["Contact"];
$insertUsers = "INSERT INTO Users VALUES('$ID', '$Passwords', '$Name', '$Gender', '$Age', '$Occupation', '$Contact')";

    $Price_Lower=$_GET["Price_Lower"];
    $Price_Upper=$_GET["Price_Upper"];
    $Location= $_GET["Location"];
    $Floor_plan= $_GET["Floor_plan"];
    $Facilities= $_GET["Facilities"];
    $Address= $_GET["Address"];
    $prefered_distance= $_GET["prefered_distance"];
    $Start_end= $_GET["Start_end"];
    $Number_of_units_want= $_GET["Number_of_units_want"];
    $Additional_info= $_GET["Additional_info"];
        $insertSubclass = "INSERT INTO Sublessee VALUES('$ID', '$Price_Lower','$Price_Upper', '$Location', '$Floor_plan', '$Facilities', '$Address', '$prefered_distance','$Start_end','$Number_of_units_want', '$Additional_info')";

$result = $mysqli->query($insertUsers);
$result = $mysqli->query($insertSubclass);


print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
     if($result==true){
        print("<p>Successfully signed up!</p>");}
       else{
        print("<p>Unsuccessfully signed up :(</p>");}
}
     
$mysqli->close();

?>
