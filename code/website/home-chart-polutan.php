<?php
$servername = "localhost";
$username = "REDACTED";
$password = "REDACTED";
$dbname = "REDACTED";
$mysqli3 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli3->connect_error) {
    die("Connection failed: " . $mysqli3->connect_error);
}


$query1 = "SELECT IFNULL(AVG(pm25now), 0) as c2 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c3 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c4 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c5 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c6 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c7 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c8 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c9 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c10 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c11 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c12 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c13 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 12 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 12 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c14 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 13 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 13 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c15 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 14 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 14 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c16 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 15 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 15 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c17 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 16 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 16 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c18 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 17 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 17 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c19 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 18 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 18 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c20 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 19 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 19 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c21 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 20 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 20 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c22 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 21 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 21 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c23 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 22 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 22 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c24 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 23 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 23 HOUR), '%Y-%m-%d %H:59:59');";


// ... (your previous code)

$c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = $c13 = $c14 = $c15 = $c16 = $c17 = $c18 = $c19 = $c20 = $c21 = $c22 = $c23 = $c24 = 0;

if ($mysqli3->multi_query($query1)) {
    $counter = 2;
    do {
        if ($result = $mysqli3->store_result()) {
            while ($row = $result->fetch_assoc()) {
                ${'c' . $counter} = $row['c' . $counter];
            }
            $result->free();
        }
        $counter++;
    } while ($mysqli3->more_results() && $mysqli3->next_result());
    $mysqli3->close();
}
    // Assuming you have your variables $c2, $c3, $c4, ..., $c12 defined

// Create an array to store the data values
$dataArray = [$c24, $c23, $c22, $c21, $c20, $c19, $c18, $c17, $c16, $c15, $c14, $c13, $c12, $c11, $c10, $c9, $c8, $c7, $c6, $c5, $c4, $c3, $c2];


// Replace 0 values with 'NaN'
$dataArray = array_map(function ($value) {
    return $value == 0 ? 'NaN' : $value;
}, $dataArray);
$dataPM25 = '[' . implode(', ', $dataArray) . ']';
//echo $dataPM25;
// Get the current time in UTC+7
$currentHour = intval(gmdate('H')) + 7;
$currentHour = $currentHour > 23 ? $currentHour - 24 : $currentHour;

// Create an array to store the time values
$timeArray = [];
for ($i = 23; $i >= 1; $i--) {
    $hour = $currentHour - $i;
    $hour = $hour < 0 ? $hour + 24 : $hour;
    $timeArray[] = sprintf("'%02d:00'", $hour);
}
$timeString = '[' . implode(', ', $timeArray) . ']';
//echo $timeString;

$mysqli3 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli3->connect_error) {
    die("Connection failed: " . $mysqli3->connect_error);
}
$query1 = "SELECT IFNULL(AVG(pm10now), 0) as c2 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c3 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c4 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c5 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c6 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c7 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c8 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c9 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c10 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c11 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c12 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c13 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 12 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 12 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c14 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 13 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 13 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c15 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 14 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 14 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c16 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 15 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 15 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c17 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 16 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 16 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c18 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 17 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 17 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c19 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 18 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 18 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c20 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 19 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 19 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c21 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 20 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 20 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c22 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 21 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 21 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c23 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 22 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 22 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c24 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 23 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 23 HOUR), '%Y-%m-%d %H:59:59');";
$c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = $c13 = $c14 = $c15 = $c16 = $c17 = $c18 = $c19 = $c20 = $c21 = $c22 = $c23 = $c24 = 0;

if ($mysqli3->multi_query($query1)) {
    $counter = 2;
    do {
        if ($result = $mysqli3->store_result()) {
            while ($row = $result->fetch_assoc()) {
                ${'c' . $counter} = $row['c' . $counter];
            }
            $result->free();
        }
        $counter++;
    } while ($mysqli3->more_results() && $mysqli3->next_result());
    $mysqli3->close();
    
    // Assuming you have your variables $c2, $c3, $c4, ..., $c12 defined

// Create an array to store the data values
$dataArray = [$c24, $c23, $c22, $c21, $c20, $c19, $c18, $c17, $c16, $c15, $c14, $c13, $c12, $c11, $c10, $c9, $c8, $c7, $c6, $c5, $c4, $c3, $c2];


// Replace 0 values with 'NaN'
$dataArray = array_map(function ($value) {
    return $value == 0 ? 'NaN' : $value;
}, $dataArray);

// Convert arrays to strings
$dataPM10 = '[' . implode(', ', $dataArray) . ']';



// Echo the strings
//echo $dataString . '<br>';
//echo $timeString;
}
$mysqli3 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli3->connect_error) {
    die("Connection failed: " . $mysqli3->connect_error);
}
$query1 = "SELECT IFNULL(AVG(pm1now), 0) as c2 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c3 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c4 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c5 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c6 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c7 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c8 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c9 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c10 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c11 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c12 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c13 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 12 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 12 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c14 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 13 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 13 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c15 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 14 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 14 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c16 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 15 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 15 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c17 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 16 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 16 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c18 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 17 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 17 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c19 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 18 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 18 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c20 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 19 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 19 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c21 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 20 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 20 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c22 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 21 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 21 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c23 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 22 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 22 HOUR), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c24 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 23 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 23 HOUR), '%Y-%m-%d %H:59:59');";
$c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = $c13 = $c14 = $c15 = $c16 = $c17 = $c18 = $c19 = $c20 = $c21 = $c22 = $c23 = $c24 = 0;

if ($mysqli3->multi_query($query1)) {
    $counter = 2;
    do {
        if ($result = $mysqli3->store_result()) {
            while ($row = $result->fetch_assoc()) {
                ${'c' . $counter} = $row['c' . $counter];
            }
            $result->free();
        }
        $counter++;
    } while ($mysqli3->more_results() && $mysqli3->next_result());
    $mysqli3->close();
}
$dataArray = [$c24, $c23, $c22, $c21, $c20, $c19, $c18, $c17, $c16, $c15, $c14, $c13, $c12, $c11, $c10, $c9, $c8, $c7, $c6, $c5, $c4, $c3, $c2];



// Replace 0 values with 'NaN'
$dataArray = array_map(function ($value) {
    return $value == 0 ? 'NaN' : $value;
}, $dataArray);

// Convert arrays to strings
$dataPM1 = '[' . implode(', ', $dataArray) . ']';
$output = <<<EOT
<DOCTYPE html>
<html lang="en" class="govuk-template app-html-class">

<head>
  <meta charset="utf-8">
  <title>Grafik Polutan - Kec. Tanah Sareal - HawaBogor - Air Quality Index</title>
<meta name="description" content="Sistem pemantauan kualitas udara Kota Bogor. Ketahui kualitas udara terkini sekarang juga dan dapatkan saran untuk meminimalisir dampak polusi.">
<meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="theme-color" content="blue">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" sizes="16x16 32x32 48x48" href="/assets/images/favicon.ico" type="image/x-icon">
  <link rel="mask-icon" href="/assets/images/govuk-mask-icon.svg" color="blue">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/govuk-apple-touch-icon-180x180.png">
  <link rel="apple-touch-icon" sizes="167x167" href="/assets/images/govuk-apple-touch-icon-167x167.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/govuk-apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" href="/assets/images/govuk-apple-touch-icon.png">
  <link href="govuk-frontend-4.7.0.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HH683K2QE7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HH683K2QE7');
</script>
  <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
  window.OneSignalDeferred = window.OneSignalDeferred || [];
  OneSignalDeferred.push(function(OneSignal) {
    OneSignal.init({
      appId: "c3658492-3a59-4300-8e2c-d05096240f8e",
    });
  });
</script>

</head>
<style>
    .container {
  width: 100%;
  display: flex;
  font-family: Arial;
}
.largebox{
  width: 100%;
  display: box;
  
  font-family: Arial;
}
.paddingleft{
  
}
.insidebox {
  width: 33.3333%;
  float: left;
  height: inherit !important;
}

.titlebox{
  text-align: center;
  font-size: 25px;
}
.titlebox-large{
  text-align: center;
  font-size: 40px;
}
.parametervalue-large{
  text-align: center;
  font-size: 75px;
}
.parametervalue{
  text-align: center;
  font-size: 35px;
}
.parameterunit{
  text-align: center;
  font-size: 20px;
}
.aqi-description{
  text-align: center;
  font-size: 25px;
}
</style>
<body class="govuk-template__body app-body-class" data-test="My value" data-other="report:details">
  <script>
    document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');
  </script>
  
  <a href="#main-content" class="govuk-skip-link" data-module="govuk-skip-link">Skip to main content</a>
  <header class="govuk-header " role="banner" data-module="govuk-header">
    <div class="govuk-header__container app-width-container">
      <div class="govuk-header__logo">
        <a href="#" class="govuk-header__link govuk-header__link--homepage">
          <span class="govuk-header__logotype" style="float: left !important;">
            <img src="/assets/images/bogoraqi-logo.svg" height="100px" style="float: left;"/>
            <span class="govuk-header__logotype-text" style="padding-left:20px !important; padding-right: 20px !important;">
              HawaBogor
            </span>
          </span>
        </a>
      </div>
      <div class="govuk-header__content">
        <a href="#" class="govuk-header__link govuk-header__service-name" style="padding-left: 20px !important; padding-right: 20px !important;">
          Lokasi: Kec. Tanah Sareal, Kota Bogor
        </a>
        <nav aria-label="Menu" class="govuk-header__navigation " style="padding-left: 20px !important; padding-right: 20px !important;">
          <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide menu" hidden>Menu</button>
          <ul id="navigation" class="govuk-header__navigation-list">
            <li class="govuk-header__navigation-item">
              <a class="govuk-header__link" href="https://hawabogor.my.id">
                Ganti Lokasi Sensor
              </a>
            </li>
            <li class="govuk-header__navigation-item ">
              <a class="govuk-header__link" href="https://hawabogor.my.id/home.php">
                NowCast
              </a>
            </li>
            <li class="govuk-header__navigation-item">
              <a class="govuk-header__link" href="https://hawabogor.my.id/home-24h.php">
                Rata-rata 24 Jam
              </a>
            </li>
            <li class="govuk-header__navigation-item govuk-header__navigation-item--active">
              <a class="govuk-header__link" href="https://hawabogor.my.id/home-chart.html">
                Grafik Histori
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <div class="govuk-width-container app-width-container">
    <div class="govuk-phase-banner">
      <p class="govuk-phase-banner__content">
        <strong class="govuk-tag govuk-phase-banner__content__tag">
          Alpha
        </strong>
        <span class="govuk-phase-banner__text">
          Ini adalah layanan baru — beberapa fungsi mungkin belum maksimal 
        </span>
      </p>
    </div>
    <a onclick="history.back()" class="govuk-back-link">Back</a>
    <main class="govuk-main-wrapper app-main-class" id="main-content" role="main">
      <h1 class="govuk-heading-xl">Grafik Polutan (24 Jam Terakhir)</h1>
      <span class="govuk-caption-l">Rata-rata Polutan Setiap Jam (µg/m³):</span>
              <div style="height: 40vh !important; width: 80vw !important; position: relative !important; display: flex !important; justify-content: center !important;">
  <canvas id="myChart"></canvas>
</div>
    </main>
  </div>
 
  <footer class="govuk-footer " role="contentinfo">
    <div class="govuk-width-container ">
      <div class="govuk-footer__meta">
        <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
          <h2 class="govuk-visually-hidden">Support links</h2>
          <ul class="govuk-footer__inline-list">
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="#">
                About
              </a>
            </li>
            <li class="govuk-footer__inline-list-item">
              <a class="govuk-footer__link" href="mailto:team@bogoraqi.my.id?cc=0065015415@students.reginapacis.sch.id,0075827146@students.reginapacis.sch.id">
                Contact
              </a>
            </li>

          </ul>
         
          <span class="govuk-footer__licence-description">
            All content is available under the
            <a
              class="govuk-footer__link"
              href="https://creativecommons.org/licenses/by/4.0/"
              rel="license">Creative Commons Attribution 4.0 International</a>, except where otherwise stated
          </span>
        </div>
        <div class="govuk-footer__meta-item">
          <span
            class="govuk-footer__copyright-logo">© 2023 Gabriel Seto Pribadi, Yosef Emanuel Adhi Hutomo</span>
        </div>
      </div>
    </div>
  </footer>
  <script src="govuk-frontend-4.7.0.min.js"></script>
</body>


    <script>
    
  const ctx = document.getElementById('myChart');
const skipped = (ctx, value) => ctx.p0.skip || ctx.p1.skip ? value : undefined;
const genericOptions = {
  fill: false,
  responsive: true,
  maintainAspectRatio: false,
  tension: 0.25,
  scales: {
            xAxis: {
                ticks: {
                    maxTicksLimit: 5 // Adjust this value as needed
                }
            },
            
        },
  interaction: {
    intersect: false
  },
  radius: 0,
};
  new Chart(ctx, {
    type: 'line',
  data: {
    labels: $timeString,
    datasets: [{
      label: 'PM 1.0',
      data: $dataPM1,
      borderColor: 'rgb(187, 230, 0)',
      segment: {
        borderColor: ctx => skipped(ctx, 'rgb(0,0,0,0.2)'),
        borderDash: ctx => skipped(ctx, [6, 6]),
      },
      spanGaps: true
    },
   {
      label: 'PM 2.5',
      data: $dataPM25,
      borderColor: 'rgb(0, 0, 230)',
      segment: {
        borderColor: ctx => skipped(ctx, 'rgb(0,0,0,0.2)'),
        borderDash: ctx => skipped(ctx, [6, 6]),
      },
      spanGaps: true
    },
    {
      label: 'PM 10',
      data: $dataPM10,
      borderColor: 'rgb(187, 0, 130)',
      segment: {
        borderColor: ctx => skipped(ctx, 'rgb(0,0,0,0.2)'),
        borderDash: ctx => skipped(ctx, [6, 6]),
      },
      spanGaps: true
    }]
  },
  options: genericOptions
  });
</script>
</html>
EOT;
echo $output;
?>