<?php

$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");

if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$ID = $_GET["ID1"];
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
else{
    $sql = "DELETE FROM Users WHERE Users.ID='$ID'";
    $result = $mysqli->query($sql);
    $sql = "DELETE FROM Sublessor WHERE Sublessor.ID='$ID'";
    $mysqli->query($sql);
    $sql = "DELETE FROM Sublessee WHERE Sublessee.ID='$ID'";
    $mysqli->query($sql);
    $sql = "DELETE FROM Roomate_matching WHERE Roommate_matching.ID='$ID'";
    $mysqli->query($sql);

print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
     if($result==true){
        print("<p>Successfully deleted!</p>");}
       else{
        print("<p>Unsuccessfully deleted!</p>");}
}


$mysqli->close();

?>
