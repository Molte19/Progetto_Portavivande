<?php
$mysqli = new mysqli("localhost", "root", "", "prova");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM magazzino";
$result = $mysqli->query($query);

while($row = $result->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{



}

/* free result set */
$result->close();

/* close connection */
$mysqli->close();
?>


<html>
	<head>
		<title>Benvenuto</title>
	</head>
	<body>
		<div id="benvenuto" align="center" >
		
			<form id="form" method="POST" >
			<link href="stile.css" rel="stylesheet" type="text/css">
				<label align="center-left" > <b> BENVENUTO </b> </label> </br></br>
				<label>Stanza</label></br>
				<input type="text" name="tavoloC" id="tavoloC"  placeholder="..." required /></br></br>
				<listbox   id="s"  placeholder="..." required />
				

				
				<input type="reset" id="cancella" value="CANCELLA"  />
			</form>
			
			<form id="form" method="POST" >
			<link href="stile.css" rel="stylesheet" type="text/css">
				<label align="center-left" > <b> TAVOLO: <?php session_start();
																echo $_SESSION['tavoloC'];		?> </b> </label> </br></br>
				<label align="center-left"  > <b> BEVANDA: <?php	echo $_SESSION['bevandaC'];		?> </b> </label> </br></br>
				<label align="center-left"> Scelta bevanda: </label> </br>
				
				
				<input type="radio" name="bicchiereC" value="Piccolo"><img src="C:/wamp/www/login/coca.png" /><?php if($row['quantita']>0)
{
echo $row['nome']."</td></tr> &nbsp";
}
?> </input> 
				<input type="radio" name="bicchiereC" value="Medio">fanta </input> 
				<input type="radio" name="bicchiereC" value="Grande">acqua </input> 
				
				</br> </br>
				
				<input type="submit" id="continua" value="CONTINUA" />  
			</form>
			
			
			
					<form id="form"  method="POST" >
				
				
				<label align="center-left"> Abbellimenti:  </label> </br>
				
				<input type="checkbox" name="abb[]" value="fettalimone">fettalimone </input> 
				<input type="checkbox" name="abb[]" value="Ombrellino">Ombrellino </input> 
				<input type="checkbox" name="abb[]" value="Cannuccia">Cannuccia </input> 
				</br> </br>
				<input type="submit" id="continua" value="CONTINUA" />  
			</form>
			
		</div>
	</body>
</html>
