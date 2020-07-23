<?php

session_start();
include('DBConnection.php');
$Type =$_GET['type'];


 ?>
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
									</head>
									<body onload="load()">
										<div style=" z-index: 99; width:100%">
											<nav class="navbar navbar-inverse" style=" background: rgba(255, 255, 255, 0.1);">
												<div class="container-fluid">
                          <div class="navbar-header" style="margin-right: 1%;  margin-left: 1%;">
														<a class="navbar-brand" href="index.php" style="background-color: #801A12;color: white;font-size: 30;font-weight: 500;">Movie Empire</a>
													</div>
													<ul class="nav navbar-nav">
														<li>
															<a href="index.php">Home</a>
														</li>
														<li  class="dropdown active" style="background-color:blue;">
															<a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre

																<span class="caret"></span>
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a href="genre.php?type=Action">Action</a>
																</li>
																<li>
																	<a href="genre.php?type=Comedy">Comedy</a>
																</li>
																<li>
																	<a href="genre.php?type=Horror">Horror</a>
																</li>
																<li>
																	<a href="genre.php?type=Sci-Fi">Sci-Fi</a>
																</li>
																<li>
																	<a href="genre.php?type=Fantasy">Fantasy</a>
																</li>
															</ul>
														</li>
													</ul>
													<ul class="nav navbar-nav navbar-right" id="result"></ul>
													<!--for displaying shopping cart when user clicks on cart-->
													<ul class="nav navbar-nav navbar-right" >
														<li>
															<a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">Cart
																<span class="glyphicon glyphicon-shopping-cart"></span>
																<span class="badge"></span>
															</a>
														</li>
													</ul>
													<div style="margin-top: 0.5%; margin-left: 25%; cursor: auto;">
														<form class="expanding-search-form" id="searchform">
															<div class="search-dropdown">
																<button class="button dropdown-toggle tog" type="button" name="type">
																	<span id="selectedGenre" class="toggle-active">All</span>
																	<span class="ion-arrow-down-b"></span>
																</button>
																<ul class="dropdown-menu men" >
																	<li class="menu-active">
																		<a href="#">All</a>
																	</li>
																	<li >
																		<a href="#">Action</a>
																	</li>
																	<li>
																		<a href="#">Comedy</a>
																	</li>
																	<li>
																		<a href="#">Horror</a>
																	</li>
																	<li>
																		<a href="#">Sci-Fi</a>
																	</li>
																	<li>
																		<a href="#">Fantasy</a>
																	</li>
																</ul>
															</div>
															<input style="cursor:text" class="search-input" id="global-search" type="search" name="search" placeholder="Search">
																<label style="margin-bottom: 0;" class="search-label" for="global-search">
																	<span class="sr-only">Global Search</span>
																</label>
																<button onclick="searchGen()" class="button search-button" type="button">
																	<span class="icon ion-search">
																		<span class="sr-only">Search</span>
																	</span>
																</button>
															</form>
														</div>
													</div>
												</div>
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
											<div id="display_item"></div>
										</div>
										<div >
											<h5 style="display: inline-block; padding-Left:7%; color: white">
												<a style="text-decoration:none; cursor:pointer;" href="index.php" >Home</a> /
												<?php
 echo $Type;
             ?>
											</h5>
										</div>
										<div style="padding-bottom: 1%;">
											<h3 style="display: inline-block; padding-Left:7%; color: white">
												<?php
echo $Type;
            ?>
											</h3>
											<span style="display: inline-block; font-size:25px; top: 5px; color: white" class="glyphicon glyphicon-chevron-right" ></span>
										</div>
										<div id="MovieList" class="row list-group" style="padding-top:1%;">
											<?php


 $query = $conn->query("SELECT * FROM movie where genre= '$Type'");
 if ($query->num_rows > 0) {
     while ($row = $query->fetch_assoc()) {


 ?>
											<div class=" col-xs-6 col-sm-4 col-lg-2">
												<div class="flip-card" id="flip-card" data-value="
													<?php echo $row["ID"]; ?>">
													<div class="flip-card-inner">
														<div class="flip-card-front">
															<?php echo "
															<img style=\"width:175px;height:200px;\" src='".$row['movie_img']."'>"; ?>
																<!-- Note: default value for quantity is 1 -->
															</div>
															<?php echo "

															<div class=\"flip-card-back\"style =\"background-color: black;\">
																<br>
																	<p>iMDB</p>
																	<p>".$row['rating_imdb']."</p>
																	<p>Rotten Tomatoes</p>
																	<p>".$row['rating_rottentomatoes']."</p>
																	<button style =\"Left:5%;\" onclick=\"cart('".$row['ID']."','".$row['movie_name']."','".$row['price']."','1')\" class=\"btns\">
																		<i class=\"fas fa-cart-plus\"></i>
																	</button>
																	<button style =\"Right:5%;\"  class=\"btns\" onclick=\"window.location='MovieDetails.php?Movie_id='+'".$row['ID']."'\" id=\"details\">
																		<i class=\"fas fa-info\"></i>
																	</button>
																</div>";
      ?>
															</div>
														</div>
													</div>
													<?php
     }
 } else {
 ?>
													<p>Product(s) not found.....</p>
													<?php
 }
 ?>
												</div>
												<div id="id01" class="modal" style="z-index: 100; ">
													<form class="modal-content animate" onsubmit="return false">
														<div class="imgcontainer">
															<span onclick="document.getElementById('id01').style.display='none';  document.getElementById('notLogged').innerHTML='';" class="close" title="Close Modal">&times;</span>
															<h2>Login</h2>
															<p style="color: red" id="notLogged"></p>
														</div>
														<div class="formContainer">
															<label for="uname">
																<b>Username</b>
															</label>
															<input  class="formInput" id="usernameLogin" type="text" placeholder="Enter Username"  required>
																<label for="psw">
																	<b>Password</b>
																</label>
																<input class="formInput" id="pwdLogin" type="password" placeholder="Enter Password" required>
																	<button class="formButton" onclick="ajaxLogin()">Login</button>
																	<label>
																		<input  type="checkbox" checked="checked"> Remember me

																		</label>
																	</div>
																	<div class="formContainer" style="background-color:#f1f1f1">
																		<button  type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn formButton">Cancel</button>
																		<span class="psw">Forgot
																			<a href="#">password?</a>
																		</span>
																	</div>
																</form>
															</div>
															<div id="id02" class="modal" style="z-index: 100; ">
																<form class="modal-content animate  onsubmit="return false"">
																	<div class="imgcontainer">
																		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
																		<h2>Register</h2>
																	</div>
																	<div class="formContainer">
																		<label for="uname">
																			<b>Username</b>
																		</label>
																		<input  class="formInput" id="usernameRegister" type="text" placeholder="Enter Username"  required>
																			<label for="psw">
																				<b>Password</b>
																			</label>
																			<input class="formInput" id="pwdRegister" type="password" placeholder="Enter Password"  required>
																				<button class="formButton" onclick="ajaxRegistration()">Register</button>
																				<label>
																					<input  type="checkbox" checked="checked"> Remember me

																					</label>
																				</div>
																				<div class="formContainer" style="background-color:#f1f1f1">
																					<button  type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn formButton">Cancel</button>
																					<span class="psw">Forgot
																						<a href="#">password?</a>
																					</span>
																				</div>
																			</form>
																		</div>
																		<script>



 //For login and registration, dont remove from php page!


 function load(name) {
   var searchTxt = location.search.split('search=')[1] ? location.search.split('search=')[1] : '';

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
document.getElementById("searchInp").value= searchTxt;
   }

   }
 };
   http_request.send(null);


 }



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
 };
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
 };
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
