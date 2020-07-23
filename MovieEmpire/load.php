<?php
session_start();
include('DBConnection.php');
$name=$_GET['name'];
if ($name != ""){

$_SESSION['name'] = $name;
}

if (!isset($_SESSION['logged_in'])){
echo


"<li><a onclick=\"document.getElementById('id02').style.display='block'\" href=\"#\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
<li><a onclick=\"document.getElementById('id01').style.display='block'\" href=\"#\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
";

}

else {
  echo "
<li><a >Welcome <strong>". $_SESSION['name']. " </strong></a></li>

  
   <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>
   ";
}

?>
