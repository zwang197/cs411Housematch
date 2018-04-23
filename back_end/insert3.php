<?php

$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$ID = $_GET["ID"];
$Passwords = $_GET["Passwords"];
$sql="SELECT * FROM Users WHERE ID = '$ID'";
$result = $mysqli->query($sql);

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
$Contact = $_GET["Contact"];
$insertUsers = "INSERT INTO Users VALUES('$ID', '$Passwords', '$Name', '$Gender', NULL,NULL,'$Contact')";

    $Price_Lower=$_GET["Price_Lower"];
    $Price_Upper=$_GET["Price_Upper"];
    $Location= $_GET["Location"];
    $Floor_plan= $_GET["num_bedroom"];
    $Smoke=$_GET["Smoke"];
    $Pet=$_GET["Pet"];
    $Noise=$GET["Noise"];
    $Start_end= $_GET["Start_end"];
    $insertSubclass = "INSERT INTO Roomate_matching VALUES('$ID', '$Price_Upper', '$Price_Lower', '$Location', '$Floor_plan', '$Smoke','$Pet','$Start_end', '$Noise','$Gender' )";

$result = $mysqli->query($insertUsers);
$result = $mysqli->query($insertSubclass);


print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
     if($result==true){
        print("<p>Successfully signed up!</p>");}
       else{
        print("<p>Unsuccessfully signed up:(</p>");}
}
     
$mysqli->close();

?>
