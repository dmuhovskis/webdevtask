<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Andrejs Dmuhovskis Web Developer Test</title>
</head>

<body> 

<div class="header"> 
  <img src="images/logo.png" class="logo" alt="logo">
  <img src="images/company.png" class="company" alt="pineapple."> 
  <ul>
    <li><a href="#">About</a></li>
    <li><a href="#">How it works</a></li>
    <li><a href="#">Contact</a></li>
  </ul>       
</div>

<div class="background-img"></div>

<div class="content">
<?php
$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "status=success")==true):?>

  <img src="images/win.png" class="win" alt="win">
  <h2>Thanks for subscribing!</h2>
  <h4>You have successfully subscribed to our email listing. Check your email for the discount code.</h4>
  <br/>
  
  <?php else: ?>
  <h2>Subscribe to newsletter</h2> 
  <h4>Subscribe to our newsletter and get 10% discount on pineapple glasses.</h4>

  <form id="email-validation" action="PHP/subscription.php" method="post">

    <div class="inputwrapper" id="inputwrapper">
    <input type="text" placeholder="Type your email address here…" name="email">
    <button type="submit" name="submit"><i class="fa fa-long-arrow-right"></i></button>
    </div>

    <span id="alertbox" class="alertbox"></span>

    <?php if (strpos($fullUrl, "status=noemail")==true) : ?>
    <p id="alertbox">Email address is required</p>
    <?php elseif (strpos($fullUrl, "status=noterms")==true) : ?>
    <p id="alertbox">You must accept the terms and conditions</p>
    <?php elseif (strpos($fullUrl, "status=colombia")==true) : ?>
    <p id="alertbox">We are not accepting subscriptions from Colombia emails</p>
    <?php elseif (strpos($fullUrl, "status=invalidemail")==true) : ?>
    <p id="alertbox">Please provide a valid e-mail address</p>
    <?php endif; ?> 
 
    <br/>  

    <label class="checkbox">
    <input type="checkbox" id="checkbox" name="checkbox" value="set">
    <span>I agree to <a href="#">terms of service</a></span>
    </label>
    
  </form>

  <?php endif; ?>
  
  <hr class="solid">

  <div class="social">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-youtube"></a>
  </div>
</div>

<script src="JS/email-validation.js"></script>   
  
</body>
</html>