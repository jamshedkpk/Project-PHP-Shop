<?php
try
{
$connect=new PDO("mysql:host=localhost;dbname=khanstore","root","");
}
catch(PDOException $e)
{
die("<h3>Database Connection Error</h3>"." ".$e->getmessage());
}
?>