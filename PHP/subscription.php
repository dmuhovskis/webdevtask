<?php

include_once 'connect.php';


//select database
$db_selected = mysqli_select_db($conn, $dbname);

//if databse was not selected, create new
if(!$db_selected){
  $sql = "CREATE DATABASE $dbname";
  if(mysqli_query($conn, $sql)){
    $db_selected = mysqli_select_db($conn, $dbname);
    } 
  else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
}

//if no table, create new
$query = "SELECT ID FROM $tblname";
$result = mysqli_query($conn, $query);

if(empty($result)) {
  $query = "CREATE TABLE $tblname (
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50)
    )";
  $result = mysqli_query($conn, $query);
}

if(isset($_POST['submit'])){ 
  $email=$_POST['email'];
  $checkbox=$_POST['checkbox'];
  $colombia=substr($email, -3);
  $co=".co";
  
  if(empty($email) && empty($checkbox) ){
    header("Location: ../index.php");
  }
  elseif(empty($email) && $checkbox=='set' ){
    header("Location: ../index.php?status=noemail");
  }
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && $checkbox=='set'){
    header("Location: ../index.php?status=invalidemail");
  }
  elseif(filter_var($email, FILTER_VALIDATE_EMAIL) && empty($checkbox) ){
    header("Location: ../index.php?status=noterms");
  }
  elseif($colombia==$co && $checkbox=='set'){
    header("Location: ../index.php?status=colombia");
  }
  
  else{
  $query = "INSERT INTO $tblname (email) VALUES ('$email')";
  $run=mysqli_query($conn,$query) or die(mysqli_error());
  header("Location: ../index.php?status=success"); 
  }

  exit();
}





?>