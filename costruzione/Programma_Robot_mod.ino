// Robot beginner
// pin collegati al driver per i motori TB6612FNG
//cambiare i pin di collegamento+aggiungere quelli del sensore ultrasuoni.
#define PWMA 3
#define PWMB 9
#define AIN1 4
#define AIN2 7
#define BIN1 8
#define BIN2 12
#define STBY 2

// valore di distanza che il sensore deve rilevare per scansare l’ostacolo
#define SENSIBILITA 400

// pin analogico a cui é collegato il segnale del sensore SHARP GP2Y0A21YK
int SHIR = A5;// DICHIARAZIONE INFRAROSSI

void setup()
{
  // linee 01-07 OUTPUT per inviare segnali al driver motori
  pinMode( STBY,OUTPUT );
  pinMode( PWMA,OUTPUT );
  pinMode( PWMB,OUTPUT );
  pinMode( AIN1,OUTPUT );
  pinMode( AIN2,OUTPUT );
  pinMode( BIN1,OUTPUT );
  pinMode( BIN2,OUTPUT );

  // pin A5 INPUT a cui è collegato il sensore
  pinMode( SHIR,INPUT );

  // pin STBY portato a livello HIGH per consentire alla scheda motori di lavorare
  digitalWrite( STBY,HIGH ); // CALCOLO DISTANZA DA OSTACOLO
}

void loop()
{
  // lettura sensore 
  int dist = analogRead(SHIR);
  if ( dist > SENSIBILITA ) { gira(); } 	// ostacolo, manovra per girare
  else                      { avanti(); }	// prosegui
}

void avanti()	// faccio avanzare il robot
{
    digitalWrite( AIN1,HIGH ); //tipo di rotazione ruota
    digitalWrite( AIN2,LOW );
    digitalWrite( BIN1,HIGH );
    digitalWrite( BIN2,LOW );

    analogWrite( PWMA,100 );
    analogWrite( PWMB,90 );
}

void indietro()	// faccio indietreggiare il robot
{
    digitalWrite( AIN1,LOW );
    digitalWrite( AIN2,HIGH );
    digitalWrite( BIN1,LOW );
    digitalWrite( BIN2,HIGH );

    analogWrite( PWMA,150 );
    analogWrite( PWMB,150 );
}

void alt()	// ferma il robot
{
    analogWrite( PWMA,50 );
    analogWrite( PWMB,250 );

    digitalWrite( AIN1,LOW );
    digitalWrite( AIN2,LOW );
    digitalWrite( BIN1,LOW );
    digitalWrite( BIN2,LOW );
}

void gira()	// ferma, fa indietreggiare e cambia la direzione del robot
{
  // STOP x 1/2 sec
  alt();
  delay( 500 );

  // INDIETRO x 1/2 secondo
  indietro();
  delay( 500 );

  // STOP x 1/2 sec
  alt();
  delay( 500 );

  // Gira
  digitalWrite( AIN1,LOW );
  digitalWrite( AIN2,HIGH );
  digitalWrite( BIN1,HIGH );
  digitalWrite( BIN2,LOW );

  analogWrite( PWMA,100 );
  analogWrite( PWMB,100 );

  delay( 200 );
}
