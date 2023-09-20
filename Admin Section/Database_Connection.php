<?php
/*
Database_Connection.php file
This file will be used for connection with database.
*/
try
{
$hostname='localhost';
$dbname='khanstore';
$user_name='root';
$user_password='';
$connect=new PDO("mysql:host=$hostname;dbname=$dbname","$user_name","");
}
catch(PDOException $e)
{
die("Database Connection Failed". " " .$e->getmessage());
}
?>
