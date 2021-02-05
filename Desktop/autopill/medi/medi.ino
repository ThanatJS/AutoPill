#include <ESP8266WiFi.h>
#include <Servo.h>
const char* ssid     = "GRAVITECH";
const char* password = "27/14GtechRICH";
const char* host = "10.0.0.191";  
//////servo/////
int servo3Pin = 5;
int servo2Pin = 4;
int servo1Pin = 0;
Servo servo1; 
Servo servo2; 
Servo servo3; 
int servoAngle = 0; 
/////servo//////
int mmedi1,mmedi2,mmedi3,amedi1,amedi2,amedi3 = 0;
int ini;

void setup() {
  Serial.begin(115200);
  servo1.attach(servo1Pin);
  servo2.attach(servo2Pin);
  servo3.attach(servo3Pin);
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);  

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  delay(800);
  Serial.print("connecting to ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

  String url = "/intern/apimanual.php";    
  Serial.print("Requesting URL: ");
  Serial.println(url);

  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
              "Host: " + host + "\r\n" + 
              "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
 while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }


  if(client.find("")){
      client.find("mmedi1");  
      mmedi1 = client.parseFloat();
      client.find("mmedi2");  
      mmedi2 = client.parseFloat();
      client.find("mmedi3");
      mmedi3 = client.parseFloat();
      client.find("amedi1");  
      amedi1 = client.parseFloat();
      client.find("amedi2");
      amedi2 = client.parseFloat();
      client.find("amedi3");  
      amedi3 = client.parseFloat();
  
    if(mmedi1 !=0 || mmedi2 !=0 ||  mmedi3 !=0){
     if (mmedi1 != 0 && mmedi1 <= 9 ){
      for(int i=0;i<mmedi1;i++){
          Serial.println("Servo1 Start");
          servo1.write(80);
          delay(1000);
          servo1.write(servoAngle); 
          delay(1000);
          servo1.write(80);
        }
      }
    if (mmedi2 != 0 && mmedi2 <= 9){
      for(int i=0;i<mmedi2;i++){
          Serial.println("Servo2 Start");
          servo2.write(80);
          delay(1000);
          servo2.write(servoAngle); 
          delay(1000);
          servo2.write(80);
      }
    }
    if (mmedi3 != 0 && mmedi3 <= 9){
      for(int i=0;i<mmedi3;i++){
          Serial.println("Servo3 Start");
          servo3.write(80);
          delay(1000);
          servo3.write(servoAngle); 
          delay(1000);
          servo3.write(80); 
       }
      }
      Serial.println("Servo Done");   
      Serial.println("work");
    }
    if(amedi1 !=0 || amedi2 !=0 ||  amedi3 !=0){
     if (amedi1 != 0 && amedi1 <= 9 ){
      for(int i=0;i<amedi1;i++){
          Serial.println("Servo1 Start");
          servo1.write(80);
          delay(1000);
          servo1.write(servoAngle); 
          delay(1000);
          servo1.write(80);
        }
      }
    if (amedi2 != 0 && amedi2 <= 9){
      for(int i=0;i<amedi2;i++){
          Serial.println("Servo2 Start");
          servo2.write(80);
          delay(1000);
          servo2.write(servoAngle); 
          delay(1000);
          servo2.write(80);
      }
    }
    if (amedi3 != 0 && amedi3 <= 9){
      for(int i=0;i<amedi3;i++){
          Serial.println("Servo3 Start");
          servo3.write(80);
          delay(1000);
          servo3.write(servoAngle); 
          delay(1000);
          servo3.write(80); 
       }
      }
      Serial.println("Servo Done");   
      Serial.println("work");
    }
  
  Serial.print("servo 1  = ");

  Serial.println(amedi1); 

  Serial.print("servo 2  = ");

  Serial.println(amedi2); 

  Serial.print("servo 2  = ");

  Serial.println(amedi3); 

  Serial.print("Output = ");
  
  Serial.println("------------");
  
    Serial.print("servo 1  = ");

  Serial.println(mmedi1); 

  Serial.print("servo 2  = ");

  Serial.println(mmedi2);   

  Serial.print("servo 2  = ");

  Serial.println(mmedi3); 

  Serial.print("Output = ");

  Serial.println("------------");
    }
  }





