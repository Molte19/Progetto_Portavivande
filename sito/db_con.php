<?php     //connessione al nostro database
$connessione_al_server=mysql_connect("localhost","root","");  // ip locale, login e password
if(!$connessione_al_server){
die ('Non riesco a connettermi: errore '.mysql_error()); // questo apparir� solo se ci sar� un errore
}

$db_selected=mysql_select_db("prova",$connessione_al_server); 
if(!$db_selected){
die ('Errore nella selezione del database: errore '.mysql_error()); // se la connessione non andr� a buon fine apparir� questo messaggio
}

?>