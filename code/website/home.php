<?php
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

// Retrieve the latest data
$sql = "SELECT timestamp, nowcastpm25, nowcastpm10, nowcastpm1, nowcastaqi, temp, humid, hi
        FROM LocationB
        ORDER BY timestamp DESC
        LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Store data as variables
    $timestamp = $row["timestamp"];
    $timestampjakarta = $timestamp + (7 * 3600);
    $datejakarta = date('Y-m-d H:i:s', $timestampjakarta);
    $nowcastpm25 = $row["nowcastpm25"];
    $nowcastpm10 = $row["nowcastpm10"];
    $nowcastpm1 = $row["nowcastpm1"];
    $nowcastaqi = $row["nowcastaqi"];
    $temp = $row["temp"];
    $humid = $row["humid"];
    $hi = $row["hi"];

    // Print the data

} else {
    echo "No data found.";
}
if($nowcastaqi > 300){
    $aqicolor = "#7d0000";
    $aqitextcolor = "white";
    $descriptor = "Berbahaya";
    $saran = '<div class="govuk-inset-text govuk-width-container app-width-container">
  Semua orang disarankan untuk menghindari semua aktivitas fisik di luar ruangan; orang dengan penyakit jantung atau paru-paru, lansia, anak-anak, dan orang dengan status sosioekonomi rendah disarankan untuk tinggal di dalam rumah dan menjaga tingkat aktivitas tetap rendah.
</div>';
    
} else if($nowcastaqi > 200){
    $aqicolor = "#7d1cff";
    $aqitextcolor = "white";
    $descriptor = "Sangat Tidak Sehat";
    $saran = '<div class="govuk-inset-text govuk-width-container app-width-container"> Orang dengan penyakit jantung atau paru-paru, orang lanjut usia, anak-anak, dan orang dengan status sosioekonomi rendah disarankan untuk menghindari semua aktivitas fisik di luar ruangan. Semua orang disarankan untuk menghindari aktivitas yang berkepanjangan atau berat. </div>';
} else if($nowcastaqi > 150){
    $aqicolor = "#ff0000";
    $aqitextcolor = "white";
    $descriptor = "Tidak Sehat";
    $saran = '<div class="govuk-inset-text govuk-width-container app-width-container">Orang dengan penyakit jantung atau paru-paru, lanjut usia, anak-anak, dan orang dengan status sosioekonomi rendah disarankan untuk menghindari aktivitas yang terlalu lama atau berat; setiap orang disarankan untuk mengurangi aktivitas yang berkepanjangan atau berat.</div>';
} else if($nowcastaqi > 100){
    $aqicolor = "#ff7a00";
    $aqitextcolor = "black";
    $descriptor = "Tidak Sehat untuk Kelompok Sensitif";
    $saran = '<div class="govuk-inset-text govuk-width-container app-width-container">Orang dengan penyakit jantung atau paru-paru, lanjut usia, anak-anak, dan orang dengan status sosioekonomi rendah disarankan untuk mengurangi aktivitas yang berkepanjangan atau berat. </div>';
} else if($nowcastaqi > 50){
    $aqicolor = "#ffff00";
    $aqitextcolor = "black";
    $descriptor = "Sedang";
    $saran = '<div class="govuk-inset-text govuk-width-container app-width-container">Orang yang sangat sensitif disarankan untuk mengurangi aktivitas yang berkepanjangan atau berat. </div>';
} else {
    $aqicolor = "#99ff00";
    $aqitextcolor = "black";
    $descriptor = "Baik";
    $saran = "";
}

if($nowcastpm25 > 250.4){
    $pm25color = "#7d0000";
    $pm25textcolor = "white";
    
} else if($nowcastpm25 > 150.4){
    $pm25color = "#7d1cff";
    $pm25textcolor = "white";
} else if($nowcastpm25 > 55.4){
    $pm25color = "#ff0000";
    $pm25textcolor = "white";
} else if($nowcastpm25 > 35.4){
    $pm25color = "#ff7a00";
    $pm25textcolor = "black";
} else if($nowcastpm25 > 12){
    $pm25color = "#ffff00";
    $pm25textcolor = "black";
} else {
    $pm25color = "#99ff00";
    $pm25textcolor = "black";
}
if($nowcastpm10 > 424){
    $pm10color = "#7d0000";
    $pm10textcolor = "white";
    
} else if($nowcastpm10 > 354){
    $pm10color = "#7d1cff";
    $pm10textcolor = "white";
} else if($nowcastpm10 > 254){
    $pm10color = "#ff0000";
    $pm10textcolor = "white";
} else if($nowcastpm10 > 154){
    $pm10color = "#ff7a00";
    $pm10textcolor = "black";
} else if($nowcastpm10 > 54){
    $pm10color = "#ffff00";
    $pm10textcolor = "black";
} else {
    $pm10color = "#99ff00";
    $pm10textcolor = "black";
}



$output = <<<EOT
<DOCTYPE html>
<html lang="en" class="govuk-template app-html-class">

<head>
  <meta charset="utf-8">
  <title>NowCast - Kec. Bogor Selatan - BogorAQI - Air Quality Index</title>
<meta name="description" content="Kualitas Udara Bogor Selatan $nowcastaqi - $descriptor , Tanggal: $datejakarta">
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
          Lokasi: Batutulis, Bogor Selatan
        </a>
        <nav aria-label="Menu" class="govuk-header__navigation " style="padding-left: 20px !important; padding-right: 20px !important;">
          <button type="button" class="govuk-header__menu-button govuk-js-header-toggle" aria-controls="navigation" aria-label="Show or hide menu" hidden>Menu</button>
          <ul id="navigation" class="govuk-header__navigation-list">
            <li class="govuk-header__navigation-item">
              <a class="govuk-header__link" href="https://hawabogor.my.id">
                Ganti Lokasi Sensor
              </a>
            </li>
            <li class="govuk-header__navigation-item govuk-header__navigation-item--active">
              <a class="govuk-header__link" href="#">
                NowCast
              </a>
            </li>
            <li class="govuk-header__navigation-item">
              <a class="govuk-header__link" href="https://hawabogor.my.id/home-24h.php">
                Rata-rata 24 Jam
              </a>
            </li>
            <li class="govuk-header__navigation-item">
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
      <h1 class="govuk-heading-xl">NowCast</h1>
      <span class="govuk-caption-l">Terakhir diperbarui: $datejakarta</span>
    </main>
  </div>
  <div class="largebox paddingleft" style="background-color: $aqicolor; color: $aqitextcolor !important;">
  <div class="govuk-heading-l govuk-!-font-size-35 titlebox-large" style="color: $aqitextcolor !important;">
  AQI NowCast
  </div>
  <div class="govuk-body parametervalue-large" style="color: $aqitextcolor !important;">
  $nowcastaqi
  </div>
  <div class="govuk-body aqi-description" style="color: $aqitextcolor !important;">
  $descriptor 
  </div>
</div>
<div style="height: 10px !important;"></div>
<div class="container padding
eft" style="">
<div class="insidebox" style="background-color: lightgrey;">
<div class="titlebox">
PM 1.0
</div>
<div class="parametervalue">
$nowcastpm1 <span class="parameterunit">µg/m³</span>
</div>
</div>
<div class="insidebox" style="background-color:	$pm25color;">
<div class="titlebox" style="color: $pm25textcolor !important;">
PM 2.5
</div>
<div class="parametervalue" style="color: $pm25textcolor !important;">
$nowcastpm25 <span class="parameterunit">µg/m³</span>
</div>
</div>
<div class="insidebox" style="background-color:	$pm10color;">
<div class="titlebox" style="color: $pm10textcolor !important;">
PM 10
</div>
<div class="parametervalue" style="color: $pm10textcolor !important;">
$nowcastpm10 <span class="parameterunit">µg/m³</span>
</div>
</div>
</div>
$saran

<div style="height: 10px !important;"></div>
    <main class="govuk-main-wrapper app-main-class" style="padding-left: 20px !important;" id="main-content" role="main">
      <h1 class="govuk-heading-xl">Heat Index</h1>
      
    </main>
<div style="height: 10px !important;"></div>
<div class="container">
    <div class="insidebox" style="background-color: lightgrey; width: 100% !important; ">
<div class="titlebox">
Heat Index
</div>
<div class="parametervalue">
$hi <span class="parameterunit">°C</span>
</div>
</div>
</div>
<div class="container padding
eft" style="">

<div class="insidebox" style="background-color:	lightgrey; width: 100% !important;">
<div class="titlebox">
Suhu
</div>
<div class="parametervalue">
$temp <span class="parameterunit">°C</span>
</div>
</div>
<div class="insidebox" style="background-color:	lightgrey; width: 100% !important;">
<div class="titlebox">
Kelembaban Relatif
</div>
<div class="parametervalue">
$humid <span class="parameterunit">%</span>
</div>
</div>
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

</html>
EOT;
$conn->close();
echo $output;
?>
