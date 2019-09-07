<?php
$servername ='localhost';
$username ='root';
$password ='';
$db='ibm';
$pdu = 'mysql:host='. $servername.'; dbname='.$db;
try{
  $conn = new PDO($pdu,$username,$password);
  $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//  echo "connected sucessfully";
}
catch(PDOException $e)
{
  echo "connection failed: ".$e->getMessage();
}
?>
