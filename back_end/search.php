<?php

$mysqli = new mysqli("localhost:3306", "housematch_group25", "housematch","housematch_Housematch_Database");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo "<body style='background-color:#D0D3D4'>";
echo "<font color=#2E86C1>";


$Floor_plan = $_POST["num_bedroom"];
$Location = $_POST["Location"];
$Distance_to_downtown = $_POST["Distance"];
$Price_Upper = $_POST["monthly_rent"];

if($Distance_to_downtown=="any"){
    if($Floor_plan=="any"){
        if ($Price_Upper=="any") {
$checkID = "SELECT * FROM Sublessor,Users  WHERE Sublessor.Location='$Location' and Users.ID=Sublessor.ID";
}
        else if ($Price_Upper=="500") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Location='$Location' and Sublessor.Price<500";
}
        else if ($Price_Upper=="700") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Location='$Location' and Sublessor.Price>=500 and Sublessor.Price<700";
}
        else if ($Price_Upper=="800") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Location='$Location' and Sublessor.Price>=700 and Sublessor.Price<800";
}
        else if ($Price_Upper=="1000") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Location='$Location' and Sublessor.Price>=800 and Sublessor.Price<=1000";
}
        else if ($Price_Upper=="1000+") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Location='$Location' and Sublessor.Price>1000";
    }
}
else{
if ($Price_Upper=="any") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location'";
}
else if ($Price_Upper=="500") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price<500";
}
else if ($Price_Upper=="700") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>=500 and Sublessor.Price<700";
}
else if ($Price_Upper=="800") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>=700 and Sublessor.Price<800";
}
else if ($Price_Upper=="1000") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and  Sublessor.Price>=800 and Sublessor.Price<=1000";
}
else if ($Price_Upper=="1000+") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>1000";
    }
}
}else if($Distance_to_downtown=="3+"){
        if($Floor_plan=="any"){
        if ($Price_Upper=="any") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Distance_to_downtown>3";
}
        else if ($Price_Upper=="500") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price<500 and Sublessor.Distance_to_downtown>3";
}
        else if ($Price_Upper=="700") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>=500 and Sublessor.Price<700 and Sublessor.Distance_to_downtown>3";
}
        else if ($Price_Upper=="800") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>=700 and Sublessor.Price<800 and Sublessor.Distance_to_downtown>3";
}
        else if ($Price_Upper=="1000") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>=800 and Sublessor.Price<=1000 and Sublessor.Distance_to_downtown>3";
}
        else if ($Price_Upper=="1000+") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>1000 and Sublessor.Distance_to_downtown>3";
    }
}
else{
if ($Price_Upper=="any") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Distance_to_downtown>3";
}
else if ($Price_Upper=="500") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price<500 and Sublessor.Distance_to_downtown>3";
}
else if ($Price_Upper=="700") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>=500 and Sublessor.Price<700 and Sublessor.Distance_to_downtown>3";
}
else if ($Price_Upper=="800") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>=700 and Sublessor.Price<800 and Sublessor.Distance_to_downtown>3";
}
else if ($Price_Upper=="1000") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and  Sublessor.Price>=800 and Sublessor.Price<=1000 and Sublessor.Distance_to_downtown>3";
}
else if ($Price_Upper=="1000+") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>1000 and Sublessor.Distance_to_downtown>3";
    }
}
}else{

if ($Distance_to_downtown=="1") {
    $Distance=1;
}else if($Distance_to_downtown=="2") {
    $Distance=2;
}else if($Distance_to_downtown=="3") {
    $Distance=3;
}


 if($Floor_plan=="any"){
        if ($Price_Upper=="any") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Distance_to_downtown='$Distance'";
}
        else if ($Price_Upper=="500") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price<500 and Sublessor.Distance_to_downtown='$Distance'";
}
        else if ($Price_Upper=="700") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>=500 and Sublessor.Price<700 and Sublessor.Distance_to_downtown='$Distance'";
}
        else if ($Price_Upper=="800") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>=700 and Sublessor.Price<800 and Sublessor.Distance_to_downtown='$Distance'";
}
        else if ($Price_Upper=="1000") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>=800 and Sublessor.Price<=1000 and Sublessor.Distance_to_downtown='$Distance'";
}
        else if ($Price_Upper=="1000+") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Location='$Location' and Sublessor.Price>1000 and Sublessor.Distance_to_downtown='$Distance'";
    }
}
else{
if ($Price_Upper=="any") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Distance_to_downtown='$Distance'";
}
else if ($Price_Upper=="500") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID) WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price<500 and Sublessor.Distance_to_downtown='$Distance'";
}
else if ($Price_Upper=="700") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>=500 and Sublessor.Price<700 and Sublessor.Distance_to_downtown='$Distance'";
}
else if ($Price_Upper=="800") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>=700 and Sublessor.Price<800 and Sublessor.Distance_to_downtown='$Distance'";
}
else if ($Price_Upper=="1000") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and  Sublessor.Price>=800 and Sublessor.Price<=1000 and Sublessor.Distance_to_downtown='$Distance'";
}
else if ($Price_Upper=="1000+") {
$checkID = "SELECT * FROM( Sublessor INNER JOIN Users ON Users.ID=Sublessor.ID)WHERE Sublessor.Floor_plan = '$Floor_plan' and Sublessor.Location='$Location' and Sublessor.Price>1000 and Sublessor.Distance_to_downtown='$Distance'";
    }
}}
$result = $mysqli->query($checkID);
$num_rows = $result->num_rows;
if ($num_rows == 0) {
    print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
    print("<h1>No matching sublease found!</h1>");
          $result->free();
        $mysqli->close();
}
else {
   print("<td>&nbsp;<a href=\"index.html\">Home</a> &nbsp; </td>");
   print("<br><br>");
        while ($row = $result->fetch_assoc()){
            print("___________________________________");
            print("<p><b> Name: {$row['Name']} </b></p>");
            print("<br><br>");
            print("<p><b> Contact: {$row['Contact']} </b>");
            print("<br><br>");
            print("<p><b> Price: $ {$row['Price']} </b>");
            print("<br><br>");
            print("<p><b> Location: {$row['Location']} </b>");
            print("<br><br>");
            print("<p><b> Floor_plan: {$row['Floor_plan']} </b>");
            print("<br><br>");
            print("<p><b> Address: {$row['Address']} </b>");
            print("<br><br>");
            print("<p><b> Distance_to_downtown: {$row['Distance_to_downtown']} </b>");
            print("<br><br>");
            print("<p><b> Start_end: {$row['Start_end']} </b>");
            print("<br><br>");
            print("<p><b> Additional_info: {$row['Additional_info']} </b>");
            print("<br><br>");
        }
        $result->free();
        $mysqli->close();

}
?>