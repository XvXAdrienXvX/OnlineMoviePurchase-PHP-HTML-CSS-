<?php
session_start();
include('DBConnection.php');
$Uname=$_GET['username'];
$Upwd=$_GET['password'];

$query = $conn->query("SELECT * FROM users where username ='$Uname'");
 if ( $query->num_rows == 0 )
{
  $sql = "INSERT INTO users (username, password)"
          . "VALUES ('$Uname','$Upwd')";

  // Add user to the database
  if ( $conn->query($sql) ){

echo $Uname;
$_SESSION['logged_in'] = true;
  }



}

else {
    echo "false";
}


?>
