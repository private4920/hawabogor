#include<ESP8266WiFi.h>
#include<ESP8266HTTPClient.h>
const char* ssid = "REDACTED";
const char* password = "REDACTED";

WiFiClient myClient;

void setup() {
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
}

bool checkAndReconnectWiFi() {
    if (WiFi.status() != WL_CONNECTED) {
        Serial.println("WiFi disconnected. Reconnecting...");
        WiFi.begin(ssid, password);
        int retries = 0;
        while (WiFi.status() != WL_CONNECTED && retries < 10) {
            delay(1000);
            Serial.println("Retrying to connect...");
            retries++;
        }
        if (WiFi.status() == WL_CONNECTED) {
            Serial.println("Reconnected to WiFi");
            return true;
        } else {
            Serial.println("Failed to reconnect to WiFi");
            return false;
        }
    }
    return true;
}
void sendDataViaHTTP(float humidity, float temperature, float hi, float pm25, float pm10, float pm1) {
    if (checkAndReconnectWiFi()) {
        HTTPClient http;
        http.begin(myClient, "http://bogoraqi.my.id/aqihome.php");

        // Set the content type to application/x-www-form-urlencoded
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");

        // Create the data string to send
        String postData = "temp=" + String(temperature) + "&humid=" + String(humidity) + "&hi=" + String(hi) + "&pm25=" + String(pm25) + "&pm10=" + String(pm10) + "&pm1=" + String(pm1) + "&apikey=REDACTED";
        Serial.println(postData);
        int httpResponseCode = http.POST(postData);

        /*if (httpResponseCode > 0) {
            Serial.printf("HTTP Response code: %d\n", httpResponseCode);
            // Handle response if needed
        } else {
            Serial.println("HTTP Request failed");
        }*/
        Serial.println(httpResponseCode);
        http.end();
    }
}

void loop() {
    if (Serial.available()) {
        String data = Serial.readStringUntil('\n'); // Read data until newline
        data.trim(); // Remove leading/trailing whitespace

        // Parse the data
        int pm25Index = data.indexOf("PM25:");
        int pm1Index = data.indexOf("PM1:");
        int pm10Index = data.indexOf("PM10:");
        int tempIndex = data.indexOf("TEMP:");
        int humidIndex = data.indexOf("HUMID:");
        int hiIndex = data.indexOf("HI:");

        if (pm25Index != -1 && pm1Index != -1 && pm10Index != -1 &&
            tempIndex != -1 && humidIndex != -1 && hiIndex != -1) {

            // Extract values using substring and parseFloat
            float pm25 = data.substring(pm25Index + 5, pm1Index).toFloat();
            float pm1 = data.substring(pm1Index + 4, pm10Index).toFloat();
            float pm10 = data.substring(pm10Index + 5, tempIndex).toFloat();
            float temp = data.substring(tempIndex + 5, humidIndex).toFloat();
            float humid = data.substring(humidIndex + 6, hiIndex).toFloat();
            float hi = data.substring(hiIndex + 3).toFloat();
            sendDataViaHTTP(humid, temp, hi, pm25, pm10, pm1);
            // Now you can use the extracted values as needed
            Serial.print("PM2.5: ");
            Serial.println(pm25);
            Serial.print("PM1: ");
            Serial.println(pm1);
            Serial.print("PM10: ");
            Serial.println(pm10);
            Serial.print("Temperature: ");
            Serial.println(temp);
            Serial.print("Humidity: ");
            Serial.println(humid);
            Serial.print("Heat Index: ");
            Serial.println(hi);
        }
    }
}
