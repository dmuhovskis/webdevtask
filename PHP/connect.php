<?php
$server="localhost";
$username="root";
$password="";
$dbname="subscribers";
$tblname="list";

$conn=mysqli_connect($server, $username, $password);
if(!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>