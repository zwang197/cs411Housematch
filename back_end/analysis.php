<?php

$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo "<body style='background-color:#D0D3D4'>";
echo "<font color=#2980B9>";

$ID = $_GET["ID"];
$Passwords= $_GET["password"];
$sql="SELECT Users.Passwords FROM Users WHERE ID = '$ID'";
$result = $mysqli->query($sql);
$num_rows=$result->num_rows;
$row = $result->fetch_assoc();
$type="SELECT * FROM Sublessor WHERE ID = '$ID'";
$result = $mysqli->query($type);
$num_rows2=$result->num_rows;
if ($num_rows==0 || $row['Passwords']!=$Passwords) {
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("<br><br>");
    print("The user ID and Passwords don't match or the user ID doesn't exsit."); 
}
else if($num_rows2==0){
print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");
    print("<br><br>");
    print("The user ID is not for Sublessor."); 
}
else{
        print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp;
     </td> ");

    print("<h1>Current Sublease Info:</h1>"); 
    
        $data= "SELECT * FROM Sublessor WHERE Sublessor.ID = '$ID'";
    $result = $mysqli->query($data);
    $row1 = $result->fetch_assoc();
    $Distance_to_downtown=$row1['Distance_to_downtown'];
    $Floor_plan=$row1['Floor_plan'];
    $Location=$row['Location'];
    $Price=$row1['Price'];
    
         print("<p><b> Price: $ {$row1['Price']} </b>");
            print("<br><br>");
            print("<p><b> Location: {$row1['Location']} </b>");
            print("<br><br>");
            print("<p><b> Floor_plan: {$row1['Floor_plan']} </b>");
            print("<br><br>");
            print("<p><b> Distance_to_downtown: {$row1['Distance_to_downtown']} </b>");
            print("<br><br>");
   
    print("<h1>Here is the analysis of your sublease:</h1>");     
   
            
    $analysis= "SELECT COUNT(*) as a FROM Sublessee WHERE (Sublessee.Floor_plan='$Floor_plan' OR Sublessee.Location='$Location' )AND Sublessee.prefered_distance='$Distance_to_downtown' AND Price_Upper>='$Price'; ";
    $result = $mysqli->query($analysis);
    $row2 = $result->fetch_assoc(); 
    $sum= "SELECT COUNT(*) as b FROM Sublessee WHERE (Sublessee.Floor_plan='$Floor_plan' OR Sublessee.Location='$Location') AND Sublessee.prefered_distance='$Distance_to_downtown' ; ";
    $result1 = $mysqli->query($sum);
    $row3 = $result1->fetch_assoc(); 
    $value=100*$row2['a']/$row3['b'];
    $value=number_format($value, 2, '.', '');
    print("<p><b>Percent of sublessees seeking a house like yours and willing to pay the price you listed: $value%</b>");                               
    $analysis= "SELECT COUNT(*) as a FROM Sublessor WHERE (Sublessor.Floor_plan='$Floor_plan' OR Sublessor.Location='$Location' )AND Sublessor.Distance_to_downtown='$Distance_to_downtown' AND Price<'$Price'; ";
    $result = $mysqli->query($analysis);
    $row2 = $result->fetch_assoc(); 
    $sum= "SELECT COUNT(*) as b FROM Sublessor WHERE( Sublessor.Floor_plan='$Floor_plan' OR Sublessor.Location='$Location' )AND Sublessor.Distance_to_downtown='$Distance_to_downtown' ; ";
    $result1 = $mysqli->query($sum);
    $row3 = $result1->fetch_assoc(); 
    $value=100*$row2['a']/$row3['b'];
    $value=number_format($value, 2, '.', '');
    print("<p><b>
Percent of sublessors subleasing a house like yours with lower price than yours: $value%</b>");                               
    print("<br><br>");
    $average="SELECT AVG(Price) as a FROM Sublessor WHERE( Sublessor.Floor_plan='$Floor_plan' OR Sublessor.Location='$Location' )AND Sublessor.Distance_to_downtown='$Distance_to_downtown' ; ";
    $result1 = $mysqli->query($average);
    $row = $result1->fetch_assoc();
    print("<h1>Reccomand Price:</h1>");
    $value=number_format($row['a'], 2, '.', '');
    print("<p><b>The Most Popular Price: $ $value</b>");
    
    $high="SELECT MAX(Price_Upper) as a FROM Sublessee WHERE( Sublessee.Floor_plan='$Floor_plan' OR Sublessee.Location='$Location' )AND Sublessee.prefered_distance='$Distance_to_downtown' ; ";
    $result1 = $mysqli->query($high);
    $row = $result1->fetch_assoc();
    $value=number_format($row['a'], 2, '.', '');
    print("<p><b>The Most beneficial Price: $ $value</b>");
    
}
 
$mysqli->close();

?>
