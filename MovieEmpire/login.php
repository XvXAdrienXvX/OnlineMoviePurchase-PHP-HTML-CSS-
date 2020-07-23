<?php
session_start();
include('DBConnection.php');
$Uname=$_GET['username'];
$Upwd=$_GET['password'];

$query = $conn->query("SELECT * FROM users where username ='$Uname'");
 if ( $query->num_rows == 0 )
{
  echo "false";

}

else
{
  $user = $query->fetch_assoc();

if ($Upwd == $user['password'])
{
  $_SESSION['logged_in'] = true;

  echo $user['username'];
}
else {
  echo "false";
}
}

?>
