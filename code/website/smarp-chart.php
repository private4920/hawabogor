<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postValue = $_POST["where-do-you-live"]; // Replace "your_input_name" with the actual name of your input field
    if ($postValue == "polutan") { // Replace "desired_value" with the value you want to check
        header("Location: https://bogoraqi.my.id/smarp-chart-polutan.php"); // Replace with your desired URL
        exit;
    } else if ($postValue == "aqi"){
        header("Location: https://bogoraqi.my.id/smarp-chart-aqi.php"); // Replace with your desired URL
        exit;
    }
}