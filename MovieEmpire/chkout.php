<?php include('AddToCart.php'); ?>
<?php
 

if($_POST['action']=="next1"){
    $address=$_POST['address'];
    $zip=$_POST['zip'];
    $city=$_POST['city'];
    if($address!="")
    { 
        $_SESSION['address']=$address;
       
    }
    if($zip!="")
    { 
        $_SESSION['zip']=$zip;
      

    }
    if($city!="")
    { 
        $_SESSION['city']=$city;
      

    }
    
}
if($_POST['action']=="next2"){
    $cname=$_POST['cname'];
    $cno=$_POST['cno'];
    $cvc=$_POST['cvc'];
    $exp=$_POST['exp'];
    
    if($cname!="")
    { 
        $_SESSION['cname']=$cname;
        
    }
    if($cno!="")
    { 
        $_SESSION['cno']=$cno;
       

    }
    if($cvc!="")
    { 
        $_SESSION['cvc']=$cvc;
       

    }
    if($exp!="")
    { 
        $_SESSION['exp']=$exp;
        

    }
    
}


?>