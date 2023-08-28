#include <SPI.h>
char x;

void setup() {
	Serial.begin(9600);
	pinMode(3, OUTPUT);
}

void loop() {
  Serial.println("1458764e");
	if(Serial.available() > 0)
  {
    x = Serial.read();

    if(x == 'o')
    {
      digitalWrite(3, HIGH);
    }

    if(x == 'p')
    {
      digitalWrite(3, LOW);
    }
  }
  delay(200);
}