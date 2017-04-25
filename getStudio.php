
<?php

$connect = new mysqli('localhost', 'root', '', 'soundspace');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connected successfully";
}

$sql = "SELECT * FROM studio ORDER BY Studio_No DESC LIMIT 3";
$result = $connect->query($sql);

echo "<div style='width: 40%;margin-left: 25%;margin-top: 25px;'>";
echo "<b>Studio Confirmation</b><br><hr>";
if ($result->num_rows > 0) {

    while ($rows = $result->fetch_assoc()) {

        echo "<br>";
        echo $rows ["Studio_ID"] . ") ";
        echo $rows ["Studio_Name"] . "</br>";
        echo $rows ["Studio_Address"] . ", ";
        echo $rows ["Studio_PCode"] . "</br>";
        echo $rows ["Studio_TelNo"] . "</br>";
        echo "<hr>";
    }
}

$sql = "SELECT * FROM studio";
$result = $connect->query($sql);
echo "<br><br><b>Complete Database</b><br><hr>";
if ($result->num_rows > 0) {

    while ($rows = $result->fetch_assoc()) {

        echo "<br>";
        echo $rows ["Studio_ID"] . ") ";
        echo $rows ["Studio_Name"] . " | ";
        echo $rows ["Studio_Address"] . ", ";
        echo $rows ["Studio_PCode"] . "  | ";
        echo $rows ["Studio_TelNo"] . "</br>";
    }
}
echo "</div>";
?>
