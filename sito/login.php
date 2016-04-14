PHP
<html>
	<head>
		<title>Benvenuto</title>
	</head>
	<body>
	
			<link href="stile.css" rel="stylesheet" type="text/css">
	</body>
</html>
<?php
session_start();
include("db_con.php"); 
$_SESSION["username"]=$_POST["username"]; 
$_SESSION["password"]=$_POST["password"]; 
$query = mysql_query("SELECT * FROM users WHERE username='".$_POST["username"]."' AND password ='".$_POST["password"]."'")  
or DIE('query non riuscita'.mysql_error());


if(mysql_num_rows($query)){      
$row = mysql_fetch_assoc($query); 
$_SESSION["logged"] =true; 
header("location:prova.php"); 
}else{
echo "non ti sei registrato con successo"; 
}
?>
