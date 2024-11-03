<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from POST data and store them as variables
    $pm25now = $_POST['pm25'];
    $pm10now = $_POST["pm10"];
    $pm1now = $_POST["pm1"];
    $temp = $_POST["temp"];
    $humid = $_POST["humid"];
    $heatindex = $_POST["hi"];
    $apikey = $_POST["apikey"];
    
}
if($apikey != "ATCU83JHSUICH6"){
    die("API error");
}
if($pm25now == 0){
    die("Sensor Error");
}
$servername = "localhost";
$username = "REDACTED";
$password = "REDACTED";
$dbname = "REDACTED";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current UNIX timestamp
$current_time = time();
$timestamp = time();

// Calculate the UNIX timestamp 24 hours ago
$twenty_four_hours_ago = $current_time - (24 * 60 * 60);

// Query to get the average and count of "pm25now" and "co24h" for the last 24 hours
$sql = "SELECT AVG(pm25now) AS pm25avg, COUNT(*) AS pm25datacount, AVG(pm10now) AS pm10avg, COUNT(*) AS pm10datacount, AVG(pm1now) AS pm1avg, COUNT(*) AS pm1datacount FROM LocationB WHERE timestamp BETWEEN $twenty_four_hours_ago AND $current_time";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Retrieve the average values and data counts
    $pm25avg = $row['pm25avg'];
    $pm25datacount = $row['pm25datacount'];
    $pm10avg = $row['pm10avg'];
    $pm10datacount = $row['pm10datacount'];
    $pm1avg = $row['pm1avg'];
    $pm1datacount = $row['pm1datacount'];
} else {
    // No data found for the last 24 hours
    $pm25avg = 0; // or any default value you prefer
    $pm25datacount = 0;
    $pm10avg = 0; // or any default value you prefer
    $pm10datacount = 0;
    $pm1avg = 0;
    $pm1datacount = 0;
}

// Close the MySQL connection
$conn->close();

$PM25AvgNew = $pm25avg + (($pm25now - $pm25avg) / ($pm25datacount + 1));
$PM10AvgNew = $pm10avg + (($pm10now - $pm10avg) / ($pm10datacount + 1));
$PM1AvgNew = $pm1avg + (($pm1now - $pm1avg) / ($pm1datacount + 1));

function calculatePM25AQI($pm25) {
    // Array of breakpoints and their corresponding AQI values
    $breakpoints = array(
        array(0.0, 12.0, 0, 50),
        array(12.1, 35.4, 51, 100),
        array(35.5, 55.4, 101, 150),
        array(55.5, 150.4, 151, 200),
        array(150.5, 250.4, 201, 300),
        array(250.5, 350.4, 301, 500)
    );

    // Ensure the PM2.5 value is within the valid range
    $pm25 = max(0, min(500.4, $pm25));

    // Find the appropriate breakpoint for the given PM2.5 concentration
    $i = 0;
    while ($i < count($breakpoints) && $pm25 >= $breakpoints[$i][1]) {
        $i++;
    }

    // Use linear interpolation to calculate the AQI
    $aqi_low = $breakpoints[$i][2];
    $aqi_high = $breakpoints[$i][3];
    $concentration_low = $breakpoints[$i][0];
    $concentration_high = $breakpoints[$i][1];

    $aqi = (($aqi_high - $aqi_low) / ($concentration_high - $concentration_low)) * ($pm25 - $concentration_low) + $aqi_low;

    return round($aqi);
}
function calculatePM10AQI($pm10) {
    // Array of breakpoints and their corresponding AQI values
    $breakpoints = array(
        array(0.0, 54.0, 0, 50),
        array(54.1, 154.0, 51, 100),
        array(154.1, 254.0, 101, 150),
        array(254.1, 354.0, 151, 200),
        array(354.1, 424.0, 201, 300),
        array(424.1, 604.0, 301, 500)
    );

    // Ensure the PM2.5 value is within the valid range
    $pm10 = max(0, min(500.4, $pm10));

    // Find the appropriate breakpoint for the given PM2.5 concentration
    $i = 0;
    while ($i < count($breakpoints) && $pm10 >= $breakpoints[$i][1]) {
        $i++;
    }

    // Use linear interpolation to calculate the AQI
    $aqi_low = $breakpoints[$i][2];
    $aqi_high = $breakpoints[$i][3];
    $concentration_low = $breakpoints[$i][0];
    $concentration_high = $breakpoints[$i][1];

    $aqi = (($aqi_high - $aqi_low) / ($concentration_high - $concentration_low)) * ($pm10 - $concentration_low) + $aqi_low;

    return round($aqi);
}


$PM25AQI = calculatePM25AQI($PM25AvgNew);
$PM10AQI = calculatePM10AQI($PM10AvgNew);
$AQINew = max($PM25AQI, $PM10AQI);

$conn2 = new mysqli($servername, $username, $password, $dbname);
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
$sql2 = "INSERT INTO LocationB (pm25now, pm2524h, pm10now, pm1024h, pm1now, pm124h, aqi, temp, humid, hi, timestamp) 
        VALUES ('$pm25now', '$PM25AvgNew', '$pm10now', '$PM10AvgNew', '$pm1now', '$PM1AvgNew', '$AQINew', '$temp', '$humid', '$heatindex', '$timestamp')";

if ($conn2->query($sql2) === true) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn2->close();
$mysqli3 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli3->connect_error) {
    die("Connection failed: " . $mysqli3->connect_error);
}

$query1 = "SELECT IFNULL(AVG(pm25now), 0) as c1 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(NOW(), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(NOW(), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm25now), 0) as c2 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:59:59');";
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

// ... (your previous code)

$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = 0;

if ($mysqli3->multi_query($query1)) {
    $counter = 1;
    do {
        if ($result = $mysqli3->store_result()) {
            while ($row = $result->fetch_assoc()) {
                ${'c' . $counter} = $row['c' . $counter];
            }
            $result->free();
        }
        $counter++;
    } while ($mysqli3->more_results() && $mysqli3->next_result());


//echo "c1: $c1, c2: $c2, c3: $c3, c4: $c4, c5: $c5, c6: $c6, c7: $c7, c8: $c8, c9: $c9, c10: $c10, c11: $c11, c12: $c12";
$values = array($c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12);
$min = min($values);
$max = max($values);
$range = $max - $min;
$weightfactor = 1 - $range / $max;
$weightfactor = max($weightfactor, 0.5);

$exponents = [];

for ($x = 1; $x <= 12; $x++) {
    $variableName = "c$x";
    if (isset($$variableName) && $$variableName != 0) {
        $exponents[] = $x - 1;
    }
}

if (!empty($exponents)) {
    $denumerator = 0;
    foreach ($exponents as $exponent) {
        $denumerator += pow($weightfactor, $exponent);
    }
    //echo "Computed result: $result";
} else {
    //echo "No variables with values found.";
}

// Assuming $c1, $c2, ..., $c12 are your values and $weightfactor is the weight factor value

$total = 0;
$numerator = 0;

for ($i = 0; $i < 12; $i++) {
    $numerator += ${"c" . ($i + 1)} * pow($weightfactor, $i);
}

$nowcastpm25 = $numerator / $denumerator;


} else {
    echo "Error: " . $mysqli3->error;
}
$mysqli3->close();
$conn4 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn4->connect_error) {
    die("Connection failed: " . $conn4->connect_error);
}

 // Replace this with your actual PHP variable

$sql = "UPDATE LocationB SET nowcastpm25 = '$nowcastpm25' ORDER BY timestamp DESC LIMIT 1";

if ($conn4->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn4->error;
}

$conn4->close();

$mysqli3 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli3->connect_error) {
    die("Connection failed: " . $mysqli3->connect_error);
}

$query1 = "SELECT IFNULL(AVG(pm10now), 0) as c1 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(NOW(), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(NOW(), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm10now), 0) as c2 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:59:59');";
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

// ... (your previous code)

$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = 0;

if ($mysqli3->multi_query($query1)) {
    $counter = 1;
    do {
        if ($result = $mysqli3->store_result()) {
            while ($row = $result->fetch_assoc()) {
                ${'c' . $counter} = $row['c' . $counter];
            }
            $result->free();
        }
        $counter++;
    } while ($mysqli3->more_results() && $mysqli3->next_result());


//echo "c1: $c1, c2: $c2, c3: $c3, c4: $c4, c5: $c5, c6: $c6, c7: $c7, c8: $c8, c9: $c9, c10: $c10, c11: $c11, c12: $c12";
$values = array($c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12);
$min = min($values);
$max = max($values);
$range = $max - $min;
$weightfactor = 1 - $range / $max;
$weightfactor = max($weightfactor, 0.5);


$exponents = [];

for ($x = 1; $x <= 12; $x++) {
    $variableName = "c$x";
    if (isset($$variableName) && $$variableName != 0) {
        $exponents[] = $x - 1;
    }
}

if (!empty($exponents)) {
    $denumerator = 0;
    foreach ($exponents as $exponent) {
        $denumerator += pow($weightfactor, $exponent);
    }
    //echo "Computed result: $result";
} else {
    //echo "No variables with values found.";
}

// Assuming $c1, $c2, ..., $c12 are your values and $weightfactor is the weight factor value

$total = 0;
$numerator = 0;

for ($i = 0; $i < 12; $i++) {
    $numerator += ${"c" . ($i + 1)} * pow($weightfactor, $i);
}

$nowcastpm10 = $numerator / $denumerator;


} else {
    echo "Error: " . $mysqli3->error;
}
$mysqli3->close();

$mysqli3 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli3->connect_error) {
    die("Connection failed: " . $mysqli3->connect_error);
}

$query1 = "SELECT IFNULL(AVG(pm1now), 0) as c1 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(NOW(), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(NOW(), '%Y-%m-%d %H:59:59');";
$query1 .= "SELECT IFNULL(AVG(pm1now), 0) as c2 FROM LocationB WHERE FROM_UNIXTIME(timestamp) BETWEEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:00:00') AND DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 HOUR), '%Y-%m-%d %H:59:59');";
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

// ... (your previous code)

$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = 0;

if ($mysqli3->multi_query($query1)) {
    $counter = 1;
    do {
        if ($result = $mysqli3->store_result()) {
            while ($row = $result->fetch_assoc()) {
                ${'c' . $counter} = $row['c' . $counter];
            }
            $result->free();
        }
        $counter++;
    } while ($mysqli3->more_results() && $mysqli3->next_result());


//echo "c1: $c1, c2: $c2, c3: $c3, c4: $c4, c5: $c5, c6: $c6, c7: $c7, c8: $c8, c9: $c9, c10: $c10, c11: $c11, c12: $c12";
$values = array($c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12);
$min = min($values);
$max = max($values);
$range = $max - $min;
$weightfactor = 1 - $range / $max;
$weightfactor = max($weightfactor, 0.5);


$exponents = [];

for ($x = 1; $x <= 12; $x++) {
    $variableName = "c$x";
    if (isset($$variableName) && $$variableName != 0) {
        $exponents[] = $x - 1;
    }
}

if (!empty($exponents)) {
    $denumerator = 0;
    foreach ($exponents as $exponent) {
        $denumerator += pow($weightfactor, $exponent);
    }
    //echo "Computed result: $result";
} else {
    //echo "No variables with values found.";
}

// Assuming $c1, $c2, ..., $c12 are your values and $weightfactor is the weight factor value

$total = 0;
$numerator = 0;

for ($i = 0; $i < 12; $i++) {
    $numerator += ${"c" . ($i + 1)} * pow($weightfactor, $i);
}

$nowcastpm1 = $numerator / $denumerator;


} else {
    echo "Error: " . $mysqli3->error;
}
$mysqli3->close();
$conn4 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn4->connect_error) {
    die("Connection failed: " . $conn4->connect_error);
}

 // Replace this with your actual PHP variable

$sql = "UPDATE LocationB SET nowcastpm10 = '$nowcastpm10' ORDER BY timestamp DESC LIMIT 1;";
$sql .= "UPDATE LocationB SET nowcastpm1 = '$nowcastpm1' ORDER BY timestamp DESC LIMIT 1;";

if ($conn4->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn4->error;
}

$conn4->close();

$pm25nowcastaqi = calculatePM25AQI($nowcastpm25);
$pm10nowcastaqi = calculatePM10AQI($nowcastpm10);
$nowcastaqi = max($pm25nowcastaqi, $pm10nowcastaqi);

$conn4 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn4->connect_error) {
    die("Connection failed: " . $conn4->connect_error);
}

 // Replace this with your actual PHP variable

$sql = "UPDATE LocationB SET nowcastaqi = '$nowcastaqi' ORDER BY timestamp DESC LIMIT 1;";


if ($conn4->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn4->error;
}

$conn4->close();

?>