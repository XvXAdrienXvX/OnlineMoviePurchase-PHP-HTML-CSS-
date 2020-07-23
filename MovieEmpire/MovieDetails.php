<?php

 if(isset($_GET['Movie_id']))
 {
     $ID=$_GET['Movie_id'];

 }
 else
 {
     echo "";
 }


?>
<?php
$servername="localhost";
$username = "root";
$password = "";
$database = "moviewebsitedb";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>

        <link rel="stylesheet" href="css/style.css">

      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="JS/jquery.min.js"></script>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="JS/bootstrap.min.js"></script>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/loginForm.css">
   <script src="JS/addtocart.js"></script>
   <script src="JS/index.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


        <style>
        h1 {
          font-family: "Amazon Ember Regular",Arial,sans-serif;
          font-weight: 400;
          margin: 10px 10px;
          font-size: 45px;
          color: antiquewhite;

        }
        td
{
  vertical-align: top;
    padding:0 15px 0 0;
}
.tabletitles {
  font-weight:bold;

}
            </style>
            </head>

<body onload="load()">
  <div class="w3-sidebar w3-bar-block w3-animate-left" style="color: white; background: linear-gradient(to right, rgb(31, 28, 24), rgb(142, 14, 0)); display: none; z-index: 100;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <?php


     $query2 = $conn->query("SELECT * FROM movie ");
      if($query2->num_rows > 0){
         while($row1 = $query2->fetch_assoc()){
echo "  <a onclick=\"window.location='MovieDetails.php?Movie_id='+'".$row1['ID']."'\" class='w3-bar-item w3-button'>". $row1['movie_name'] ."</a>
";
}   };


  ?>

</div>
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
<button style="position:absolute;top: 50%;background-color: rgba(255, 255, 255, 0.1)!important;color: darkred !important;" class="w3-button w3-white w3-xxlarge" onclick="w3_open()">  <i class="fas fa-chevron-right"></i>

</button>
 <div class="w3-container">

   <div class="container" style="width: 100%; padding-right: 0; padding-left: 0;">
   <div style="position: absolute; z-index: 99; width:100%">
     <nav class="navbar navbar-inverse">
     <div class="container-fluid">
       <div class="navbar-header" style="margin-right: 1%;  margin-left: 1%;">
         <a class="navbar-brand" href="index.php" style="background-color: #801A12;color: white;font-size: 30;font-weight: 500;">Movie Empire</a>
       </div>
       <ul class="nav navbar-nav">
         <li class="active"><a href="#">Home</a></li>

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="genre.php?type=Action">Action</a></li>
                  <li><a href="genre.php?type=Comedy">Comedy</a></li>
                  <li><a href="genre.php?type=Horror">Horror</a></li>
                  <li><a href="genre.php?type=Sci-Fi">Sci-Fi</a></li>
                  <li><a href="genre.php?type=Fantasy">Fantasy</a></li>

                </ul>
              </li>

            </ul>


       <ul class="nav navbar-nav navbar-right" id="result">


      </ul>
<!--for displaying shopping cart when user clicks on cart-->
   <ul class="nav navbar-nav navbar-right" id="shop_cart">
          <li><a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">Cart <span class="glyphicon glyphicon-shopping-cart"></span>
        <span class="badge"></span></a></li>

   </ul>



   <div style="margin-top: 0.5%; margin-left: 25%; cursor: auto;">
   <form class="expanding-search-form" id="searchform">
   <div class="search-dropdown">
     <button class="button dropdown-toggle tog" type="button" name="type">
       <span id="selectedGenre" class="toggle-active">All</span>
       <span class="ion-arrow-down-b"></span>
     </button>
     <ul class="dropdown-menu men" >
       <li class="menu-active"><a href="#">All</a></li>
       <li ><a href="#">Action</a></li>
       <li><a href="#">Comedy</a></li>
       <li><a href="#">Horror</a></li>
       <li><a href="#">Sci-Fi</a></li>
       <li><a href="#">Fantasy</a></li>
     </ul>
   </div>
   <input style="cursor:text" class="search-input" id="global-search" type="search" name="search" placeholder="Search">
   <label style="margin-bottom: 0;" class="search-label" for="global-search">
         <span class="sr-only">Global Search</span>
     </label>
   <button id="searchbutt" onclick="searchGen()" class="button search-button" type="button">
         <span class="icon ion-search">
             <span class="sr-only">Search</span>
         </span>
     </button>
   </form>
 </div>
</div>
  </div>
</
</nav>
 <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="checkout.php?type=Checkout" class="btn btn-primary" id="check_out_cart">
     <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
     <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
   </div>

   <div id="display_item">


   </div>
</div>
<div class="container-fluid">

<div class="row">
<?php


   $query = $conn->query("SELECT * FROM movie WHERE ID='".$ID."'");
    if($query->num_rows > 0){
       while($row = $query->fetch_assoc()){


?>

<div class="col-sm-4 col-md-4" style=" padding-top: 5%;height:100vh">
<div class="w3-container" >

  <div class="w3-card-4" >
    <img src="<?php echo $row['movie_img'] ?>" alt="Norway" style="max-height: 80vh;max-width:95%;min-width:95%; margin-left:9px">
    <div  class="w3-container w3-center">
      <p style="color:white"><?php echo $row['movie_name'] ?></p>
    </div>
  </div>
</div>
</div>

<div class="col-sm-8 col-md-8" style=" padding-top: 5%; height: 100vh;">
  <div class="w3-container" style=" height: 100%;">
    <div class="w3-card-4" style=" height: 95%; display: flex;;align-items: center;">
      <div class="w3-card-4" style=" width: 90%;height: 90%; margin:auto;";>
<h1> <?php echo $row['movie_name'] ?> </h1>
<div style="height:35%; overflow-y: auto;text-align: justify;padding-left: 5%;padding-right: 2%;color: white;font-size: 14px;"> <?php echo $row['summary'] ?>
</div>
<table style="margin-left: 5%; color: white">
  <tr>
    <td class="tabletitles">Director</td> <td> <?php echo $row['Director'] ?><td>
    </tr>
    <tr>  <td class="tabletitles">Starring</td> <td> <?php echo $row['Actors'] ?><td></tr>
      <tr>  <td class="tabletitles">Release Year</td> <td> <?php echo $row['Release date'] ?><td></tr>
        <tr>  <td class="tabletitles">Audio</td> <td> <?php echo $row['Audio'] ?><td></tr>


</table>


</div>
</div>


  </div>
</div>

</div>
<div style="padding-bottom: 1%;">
<h3 style="display: inline-block;  margin-top: 5%; padding-Left:2%; color: white">Trailer</h3>
<span style="display: inline-block; font-size:30px; top: 5px; color: white" class="glyphicon glyphicon-chevron-right" ></span>
</div>
<div class="embed-responsive embed-responsive-16by9">
    <?php echo "<iframe class=\"embed-responsive-item\" style=\"width:50%;height:50%;top:5%;left:2%;\" src='".$row['trailer']."'></iframe>" ?>
</div>

<div class="container" align="center" style="border:1px solid gray;position:relative;margin-top:-52%;margin-left:70%;width:20%;height:50%;background-color:whitesmoke;border-radius:3%;">

                    <h3><?php echo $row['movie_name'] ?> </h3>



                    <h6 class="title-price"><small>PRICE</small></h6>
                    <h3 style="margin-top:0px;" class="product-price">Rs <?php echo $row['price'] ?></h3>

                    <input type="hidden" name="hidden_name" id="name" value="<?php echo $row['movie_name'] ?>" />
                    <input type="hidden" name="hidden_price" id="price" value="<?php echo $row['price'] ?>" />

                    <div class="section">

                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">


                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Quantity</small></h6>
                       <div class="product-quantity">
                           <input type="number" id="quantity" style="width:20%;" name="quantity" value="1" min="1" onblur="updateqty($(this).val())" onchange="update($(this).val())">
                       </div>
                    </div>


                    <div class="section" style="padding-bottom:20px;">
                        <!--<button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>BUY</button>-->
                        <input type="button" name="add_to_cart" id="<?php echo $row['ID'] ?>" style="width:25%;" onclick="cart($(this).attr('id'),$('#name').val(),$('#price').val(),$('#quantity').val())" class="btn btn-success form-control add_to_cart" value='BUY' />
                    </div>
                </div>
</div>

             <script>

                 var price=<?php echo $row['price'] ?>;
                function update(quantity){

                    $('.product-price').text('Rs '+price*quantity);
                }

                function updateqty(quantity){

                    $('.product-price').text('Rs '+price*quantity);
                }

            </script>
<?php
       }}

?>
</div>
<script>
$('#cart-popover').popover({
  html : true,
        container: 'body',
        content:function(){
         return $('#popover_content_wrapper').html();
        }
});


</script>
<br>
<br>

<div id="id01" class="modal" style="z-index: 100; ">

  <form class="modal-content animate" onsubmit="return false">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none';  document.getElementById('notLogged').innerHTML='';" class="close" title="Close Modal">&times;</span>
    <h2>Login</h2>
    <p style="color: red" id="notLogged"></p>
    </div>

    <div class="formContainer">
      <label for="uname"><b>Username</b></label>
      <input  class="formInput" id="usernameLogin" type="text" placeholder="Enter Username"  required>

      <label for="psw"><b>Password</b></label>
      <input class="formInput" id="pwdLogin" type="password" placeholder="Enter Password" required>

      <button class="formButton" type="submit" onclick="ajaxLogin()">Login</button>
      <label>
        <input  type="checkbox" checked="checked"> Remember me
      </label>
    </div>

    <div class="formContainer" style="background-color:#f1f1f1">
      <button  type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn formButton">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<div id="id02" class="modal" style="z-index: 100; ">

  <form class="modal-content animate" onsubmit="return false">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    <h2>Register</h2>
    </div>

    <div class="formContainer">
      <label for="uname"><b>Username</b></label>
      <input  class="formInput" id="usernameRegister" type="text" placeholder="Enter Username"  required>

      <label for="psw"><b>Password</b></label>
      <input class="formInput" id="pwdRegister" type="password" placeholder="Enter Password"  required>

      <button class="formButton" onclick="ajaxRegistration()" type="submit">Register</button>
      <label>
        <input  type="checkbox" checked="checked"> Remember me
      </label>
    </div>

    <div class="formContainer" style="background-color:#f1f1f1">
      <button  type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn formButton">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
</div>
<script>


function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
//For login and registration, dont remove from php page!




function ajaxRegistration(){
  var http_request= new XMLHttpRequest();
var username=document.getElementById("usernameRegister").value;
var pwd=document.getElementById("pwdRegister").value;


http_request.open("GET", "Register.php?username="+username+"&password="+pwd, true);
http_request.onreadystatechange=function(){
if (http_request.readyState==4){
if (http_request.status==200) {
  if(http_request.responseText == "false"){
    alert ("Username already exist, please choose another");
  }
  else{
load(http_request.responseText);
document.getElementById('id02').style.display = "none";


}

}}
}
http_request.send(null);
}

function load(name) {
  var http_request= new XMLHttpRequest();
if (typeof name == "string")
{
  http_request.open("GET", "load.php?name="+name, true);

}else {

  http_request.open("GET", "load.php?name=", true);

}
  http_request.onreadystatechange=function(){
  if (http_request.readyState==4){
  if (http_request.status==200) {

    document.getElementById("result").innerHTML=http_request.responseText;
  }

  }
  }
  http_request.send(null);


}

function ajaxLogin(){
  var http_request= new XMLHttpRequest();
var username=document.getElementById("usernameLogin").value;
var pwd=document.getElementById("pwdLogin").value;


http_request.open("GET", "login.php?username="+username+"&password="+pwd, true);
http_request.onreadystatechange=function(){
if (http_request.readyState==4){
if (http_request.status==200) {
  if(http_request.responseText == "false"){
    alert ("Wrong Password or Username");
  }
  else{
load(http_request.responseText);
document.getElementById('id01').style.display = "none";
}

}}
}
http_request.send(null);
}

</script>

<script>
$('#cart-popover').popover(
  {
  html : true,
        container: 'body',
        content:function(){
         return $('#popover_content_wrapper').html();
        }
});


</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script  src="js/SearchJS.js"></script>
</body>
</html>
