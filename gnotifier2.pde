int outPin = 4;
int mail = LOW;
int msg;

void setup()
{
  pinMode(outPin, OUTPUT); //define o led como saida;
  Serial.begin(9600); //quantidade de dados que passa pela porta;
  Serial.flush();
}

void loop()
{
  //Le o valor da porta
  if(Serial.available())
  {
    msg=Serial.read();
    Serial.println(msg);
    if(msg=='M') mail = HIGH;
    else if(msg=='N') mail=LOW;
  }
  
  //define o status do led
  digitalWrite(outPin, mail);
}
