<?php
session_start();
require("../../signup/server.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Montserrat:wght@100&family=Sunflower:wght@300&display=swap"
    rel="stylesheet">
    <title>paymentbutton</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
  <body style="background-color: #e6e6e6;">
    <nav class="navbar">
      <div class="title"> B-PAY</div>
      

      <div class="navbar" style="background:#f7b750;">
          <ul >
              <li>
                  <div class="click" style="background: #f8ba57;">
                   <a href="#">   
                       <i class="fa fa-user" aria-hidden="true"></i>
                     My Account 
                   </a>  
                  </div>
              </li>
          </ul>
      </div>
  </nav>
  <div  class="account invi">
            <div class="first">
                <div class="middle">
                    <i class="fa fa-building" style="font-size: xxx-large;" aria-hidden="true"></i>
                    <div class="merchant">
                    <h2><?php echo $_SESSION['ADMIN_USER'] ?></h2>
             <h5><?php echo $_SESSION['userid'] ?></h5>
           
            </div>
           </div>
       </div>
       <div>
           <div class="second">
            <h3>Loged In as</h3>
            <div class="email">
             <i class="fas fa-user-circle"></i>
             <h5 style="display: inline;"><?php echo  $_SESSION["email"]?></h5>
                    </div>
                    <a href="../logout.php" style=" text-decoration: none"><button class="button">Log Out</button></a>
                </div>
            </div>
        </div>
    </div>
    <hr>
<div class="side">
  <nav class="sidebar">
  
       <div class="menu-bar">
           <div class="menu">
               <ul class="menu-links">
                   <li class="nav-links">
                       <a href="../dashboard.php">
                          <i class="fa fa-home icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Home
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../transaction/transaction.php">
                          <i class="fa fa-reply-all icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                          Transactions
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../settlements/settlements.php">
                          <i class="fa fa-bars icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Settlements
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="#">
                          <i class="fa fa-window-restore icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Invoices
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../Payment_Link/Payment_Link-1.php">
                          <i class="fa fa-link icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Payment Links
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../payment_page/payment_page.php">
                          <i class="fa fa-envelope-open icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Payment Pages
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../payment_button/index.php">
                          <i class="fa fa-tasks icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Payment Buttons
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../route_pages/RoutePage.php">
                          <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Route
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="#"><i class="fa fa-bell icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Subscriptions
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../qrcode/QR.php">
                          <i class="fa fa-qrcode icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              QR Codes
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../smartcollect/collect.php">
                          <i class="fa fa-upload icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Smart Collect
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../Customers/Customers.php">
                          <i class="fa fa-users icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Customers
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="#">
                          <i class="fa fa-shopping-bag icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Offers
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="#">
                          <i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Checkout Rewards
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../report/repo.php">
                          <i class="fa fa-sticky-note icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Reports
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../Account/account.php">
                          <i class="fa fa-home icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              My Account
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="../Settings/settings.php">
                          <i class="fa fa-cogs icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              Settings
                          </span>
                       </a>
                   </li>
                   <li class="nav-links">
                       <a href="#">
                          <i class="fa fa-download icon" aria-hidden="true"></i>
                          <span class="text nav-text text ">
                              App Store
                          </span>
                       </a>
                   </li>
               </ul>
           </div>
  </nav>
   
    
        <div class="container adjust"> 
            <div class="row">
              <div class="col-3"><img src="img.jpeg" height="500px" width="500px"><br></div>
              <div class="col-6" style="background-color: #dedee1;">
                <div class="inner-box">
                  <br class="hide">
                  <br>
                  <hr class="hide">
                  <hr class="line"> <h4 class="heading">B-PAY</h4>
                  <br class="hide">
                  <h2 style="font-weight: 500; font-size: 30px;"><b>Payment Buttons</b></h2>
                  <br class="hide">
                  <p style="word-spacing: 4px;font-size:large;">Create an effective, payment button easily using B-Pay features and start collecting payment on your websites.</p>
                <ul style= "list-style-type: none; margin-left:-30px">
                    <li><ion-icon name="arrow-round-forward"></ion-icon> No Coding Required</li>
                    <li><ion-icon name="arrow-round-forward"></ion-icon> Multiple Payment Modes</li>
                    <li><ion-icon name="arrow-round-forward"></ion-icon> Customized Buttons</li>
                </ul>
                <a href="./pay_button.php">
                    <button class="btn btn-warning" style="float: right; background-color: rgb(245, 215, 46); margin-top:41px;margin-right: 30px;"><strong>Explore More</strong></button>
                </a>
                
               </div>
              </div>
            </div>
        </div>   
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

        $(".click").click(function(){
            $(".account").toggle();
        })
        $("body").click(function(){
            $(".account").addClass("invi");
        })
    </script>

</body>
</html>