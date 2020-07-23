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
    <script src="JS/checkout.js"></script>

 <script>
      //prevent resubmission of form

      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }

  </script>


</head>

<body onload="load()">




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

         <div style="padding-bottom: 1%;">
         <h3 style="display: inline-block; padding-Left:7%;padding-top: 5%; color: white">
           <?php
echo $Type;
            ?>
          </h3>
          <span style="display: inline-block; font-size:25px; top: 5px; color: white" class="glyphicon glyphicon-chevron-right" ></span>
         </div>
    <!-- checkout form starts here -->

<div class="container" style="margin-top:5%;">
	<div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Shipping Address</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Payment Details</p>
                </a></li>
                <li class="disabled" id="div3"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Order & Pay</p>
                </a></li>
            </ul>
        </div>
	</div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center" >
                               <div class="col-xs-9" style="margin-left:130px;">


                    <div class="form-group">
                      <label for="inputAddress1">Street address </label>
                      <input type="text" name="add1" class="form-control form-control-large" id="Address" placeholder="Enter address">
                      <div class="alert alert-danger" role="alert" id="errorAdd" style="margin-top:1%;display:none;">

                     </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-3">
                        <div class="form-group">
                          <label for="inputZip">ZIP Code</label>
                          <input name="zip" type="text" class="form-control form-control-small" id="Zip" placeholder="Enter zip">
                        <div class="alert alert-danger" role="alert" id="errorZip" style="margin-top:1%;display:none;">

                          </div>
                        </div>
                      </div>
                      <div class="col-xs-9">
                        <div class="form-group">
                          <label for="inputCity">City</label>
                          <input name="city" type="text" class="form-control" id="City" placeholder="Enter city">
                          <div class="alert alert-danger" role="alert" id="errorCity" style="margin-top:1%;display:none;">

                          </div>
                        </div>
                      </div>
                    </div>


                 <input id="activate-step-2" name="nxt" type="submit" class="btn btn-primary btn-lg" value="Next Step">

                </div>

            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well">

                <div class="container">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
          <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input name="cname" id="cname" class='form-control' size='4' type='text'>
                   <div class="alert alert-danger" role="alert" id="errorCName" style="margin-top:1%;display:none;">

                     </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input name="cno" id="cno" autocomplete='off' class='form-control card-number' size='20' type='text'>
                   <div class="alert alert-danger" role="alert" id="errorCNO" style="margin-top:1%;display:none;">

                     </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-4 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input name="cvc" id="cvc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                 <div class="alert alert-danger" role="alert" id="errorCVC" style="margin-top:1%;display:none;">

                     </div>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>Expiration</label>
                <input name="exp" id="exp" class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                 <div class="alert alert-danger" role="alert" id="errorEXP" style="margin-top:1%;display:none;">

                     </div>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'> </label>
                <input name="year" class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>

              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button id="activate-step-3" name="card" class="btn btn-primary btn-lg" onclick="step3()">Next step</button>
              </div>
            </div>


        </div>
        <div class='col-md-4'></div>
    </div>
</div>
            </div>
        </div>

    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well" style="height:400px;">
                <div class='form-control total btn btn-info' id="total"style="width:50%;margin-left:300px;">

                  <span id="sumdiv" class='amount'></span>
                </div>
            <button type="submit"  name="buy" id="Pay" class="btn btn-primary btn-lg" style="margin-top:200px;margin-left:-310px;">Pay</button>

            </div>
        </div>
    </div>
</div>

   <!-- checkout form ends here -->



<div id="id01" class="modal" style="z-index: 100; ">

   <form class="modal-content animate"  onsubmit="return false">
     <div class="imgcontainer">
       <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
     <h2>Login</h2>
     </div>

     <div class="formContainer">
       <label for="uname"><b>Username</b></label>
       <input  class="formInput" id="usernameLogin" type="text" placeholder="Enter Username"  required>

       <label for="psw"><b>Password</b></label>
       <input class="formInput" id="pwdLogin" type="password" placeholder="Enter Password" required>

       <button class="formButton" onclick="ajaxLogin()">Login</button>
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

   <form class="modal-content animate  onsubmit="return false"">
     <div class="imgcontainer">
       <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
     <h2>Register</h2>
     </div>

     <div class="formContainer">
       <label for="uname"><b>Username</b></label>
       <input  class="formInput" id="usernameRegister" type="text" placeholder="Enter Username"  required>

       <label for="psw"><b>Password</b></label>
       <input class="formInput" id="pwdRegister" type="password" placeholder="Enter Password"  required>

       <button class="formButton" onclick="ajaxRegistration()">Register</button>
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
 <script>
 //For login and registration, dont remove from php page!
 function cart(id,name,price,quantity){


 var loggedin = '<?php echo isset($_SESSION['logged_in']); ?>';
 if (loggedin== 1)
 {    var product_id = id;
     var product_name = name;
     var product_price = price;
     var product_quantity = quantity;
     var action = "add";


        $.ajax({
         url:"AddToCart.php",
         method:"POST",
         data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
         success:function(data)
         {
          load_cart_data();
          alert(product_name+" Added to cart");
         }
        });
      }
      else {
        document.getElementById('id01').style.display='block';
        document.getElementById("notLogged").innerHTML="Please log in first!";
      }


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
$('#cart-popover').popover({
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
