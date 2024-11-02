# mit-maker
Hi There! Welcme to my Maker Portfolio GitHub Repository

## Name Clarification
On some files you may see the term "bogoraqi", that is the former name of my project before it was changed to "HawaBogor"
## About My Project
I collaborated with my friend on developing an air quality monitoring system to provide real-time data in response to growing environmental concerns within my community. By utilizing an Arduino UNO for sensor data collection and a NodeMCU with WiFi capabilities, we created a system that seamlessly transmits air quality information to a server. Following the guidelines set by the US EPA, we processed this data to calculate an Air Quality Index (AQI) score, reflecting current environmental conditions.

Our platform also features a public website where users can access live AQI readings, receive activity recommendations, and explore historical trends.

## How does It Works
The air quality monitoring system I developed uses an Arduino board connected to a Winsen ZH03A sensor for particulate matter and a DHT22 sensor for temperature and humidity. The system periodically collects data and sends it to a NodeMCU microcontroller with built-in Wi-Fi. The NodeMCU then transmits this data to our server, which processes it according to the EPA air quality index formula and displays the results on our website.

## Technical Documentation
### Project Pictorial Diagram
![Project Pictorial Diagram](/images-doc/pictorial.jpeg)
#### Components Used
- Arduino UNO
- Winsen Sensor ZH03A, as particulate matter sensor
- RTC for timekeeping and to ensure only one data is sent every 15 minutes
- NodeMCU as WiFi module
- DHT22/DHT11 as temperature and humidity sensor
- Breadboard
