#include <SoftwareSerial.h>
#include <DHT.h>
#include<RTClib.h>
#include<Wire.h>
#define DHTPIN 11
#define DHTTYPE DHT22
RTC_DS3231 rtc;
DHT dht(DHTPIN, DHTTYPE);
SoftwareSerial nodemcu (8, 9);
const int bufferSize = 24; // Size of the buffer to hold incoming serial data
byte buffer[bufferSize];


void setup(){
  Serial.begin(9600);
  nodemcu.begin(115200);
  dht.begin();
  Wire.begin();
  rtc.begin();
}

String getAQI() {
  byte startBytes[] = {0x42, 0x4D};
  byte buffer[24];
  
  while (true) {
    // Wait for start bytes
    while (Serial.available() < 2 || Serial.read() != startBytes[0]) {
      // Empty loop to wait for the first start byte (0x42)
    }
    if (Serial.read() == startBytes[1]) {
      // Found the second start byte (0x4D)
      break;
    }
  }
  
  for (int i = 0; i < 24; i++) {
    while (!Serial.available()) {
      // Wait for data to be available
    }
    buffer[i] = Serial.read();
  }

  // Access the required bytes from the buffer
  byte pm1 = buffer[3];  // Byte at index 4 is PM1
  byte pm25 = buffer[5]; // Byte at index 6 is PM2.5
  byte pm10 = buffer[7]; // Byte at index 8 is PM10

  if(String(pm25) > String(pm1)){
    
  }
  
  // Create the output string
  String outputAQI = "PM25:" + String(pm25) + " PM1:" + String(pm1) + " PM10:" + String(pm10);
  memset(buffer, 0, bufferSize);
  // Send the outputAQI string back to the sender
  return outputAQI;
  
}


String getTempHumid(){
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float hi = dht.computeHeatIndex(t, h, false);
  String outputtemp = "TEMP:" + String(t) + "HUMID:" + String(h) + "HI:" + String(hi);
  return outputtemp;
}

void loop(){
DateTime now = rtc.now(); // Get the current date and time

  int currentMinutes = now.minute(); // Get the current minute
	Serial.print(currentMinutes);
  // Check if the current time is at 00, 15, 30, or 45 minutes
  if (currentMinutes == 0 || currentMinutes == 15 ||
      currentMinutes == 30 || currentMinutes == 45) {
    // Combine data then send it to NodeMCU
	  String string1 = getAQI();
  String string2 = getTempHumid();
  String string3 = string1 + string2;
  Serial.print(string3);
  nodemcu.println(string3);

  }

  delay(60000); // Delay for 1 minute before checking again
}
