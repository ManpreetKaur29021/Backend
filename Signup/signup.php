<?php
   session_start();
  include("function.php");
  include("smtp_mailer.php");
  require("server.php");
  date_default_timezone_set("Asia/Kolkata");
  
    $btype="";
      $email="";
      $otp="";
  if (!isset($_SESSION['first_run'])){
    $_SESSION['first_run']=1;
  }

    $password="";
    $name="";
    $cno="";
    if(isset($_POST['btn'])){
      $_SESSION["email"] = get_safe_real($_POST['email']);
      $email=$_SESSION["email"];

      $sql = "SELECT * FROM signup WHERE email='$email' and status=1 ";
      $result = mysqli_query($con, $sql);
     
      if(mysqli_num_rows($result)==0){
        $pwd=get_safe_real($_POST['pwd']);
        $_SESSION["pwd"]=$pwd;
        $_SESSION["otp"]=rand(11111,99999);
        $otp=$_SESSION["otp"];
        $_SESSION["added_on"]=date('Y-m-d h:i:s');
        unset($_SESSION['first_run']);
        $mail_status=smtp_mailer($email,$otp,$pwd);
        if($mail_status==1){
            $hide=1;
        }else{
          echo "no data inserted";
          }
      }else{
        echo'<script>alert("Email id already exist!! Please try with some other id. ")</script>';
      }
    }



    if(isset($_POST['submit']))
    { unset($_SESSION['first_run']);
    if(isset($_POST['name']) && isset($_POST['cno'])and isset($_POST['Myradio'])&&!empty($_POST['Myradio']))
      { 
        $name = get_safe_real($_POST['name']);
        $cno =get_safe_real($_POST['cno']);
        $btype =get_safe_real ($_POST['Myradio']);
        $email=$_SESSION["email"];
        $added_on=$_SESSION["added_on"];
        $otp=$_SESSION["otp"];
       $password = $_SESSION["pwd"];
       $password = crypt(get_safe_real($_SESSION["pwd"]),PASSWORD_DEFAULT);
       mysqli_query($con,"insert into signup(name,cno,email,btype,pwd,status,otp,added_on) values('$name','$cno','$email','$btype','$password',0,'$otp','$added_on')");
        $second=1;
        $hide=1;
      }
    else
      {
        $name=null;
        $cno=null;
      }
    }



    if(isset($_POST['verify'])){
      $_SESSION['first_run']=1;
      $email= $_SESSION["email"];
      $otp=  $_SESSION["otp"];
      $time= date('Y-m-d h:i:s');

      $time = date("H:i:s",strtotime($time));
      $added_on=date("H:i:s",strtotime($_SESSION["added_on"])+(15 * 60));
      if($time<$added_on){
              if(isset($_POST['vcode']) )
              {
              $vcode = get_safe_real($_POST['vcode']);
            if($vcode==$otp){
              $sql="update signup set status=1 where otp='$otp'";
              mysqli_query($con,$sql);
              redirect("./signin.php");
            }else{
              echo'<script>alert("Please enter valid otp. ")</script>';
              $second=1;
              $hide=1;
              unset($_SESSION['first_run']);
            }
              }
              else
              {
                  $email=null;
                  $password=null;
              }
      }else{
        $second=1;
        $hide=1;
        unset($_SESSION['first_run']);
        echo'<script>alert("OTP Expired. Please Click Resend it")</script>';
        $sql="update signup set otp='null' where email='$email'";
        mysqli_query($con,$sql);
      }
     }

     if(isset($_POST['resend'])){
      unset($_SESSION['first_run']);
      $second=1;
      $hide=1;
      $email=$_SESSION["email"];
      $sql="update signup set otp='null' where email='$email'";
      mysqli_query($con,$sql);
      $pwd= $_SESSION["pwd"];
      $_SESSION["otp"]=rand(11111,99999);
      $otp=$_SESSION["otp"];
      $added_on=date('Y-m-d h:i:s');
      $_SESSION["added_on"]=$added_on;
      unset($_SESSION['first_run']);
      $mail_status=smtp_mailer($email,$otp,$pwd);
      if($mail_status==1){
        $sql="update signup set otp='$otp'and added_on='$added_on' where email='$email'";
        mysqli_query($con,$sql);
        $hide=1;
      }else{
        echo "no data inserted";

        }
      


     }


    if(isset($_SESSION['first_run'])){
      
    require_once 'vendor/autoload.php';

      $clientID = '728789696058-8jaq1q3ofcm9hn8cl04r9428pnp5h7tg.apps.googleusercontent.com';//line 127,128->change clientID and clientSecret according to console.developers.google.com 
      $clientSecret = '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';
      $redirectURL = 'http://localhost/new_project/signup/signup.php';

      $client = new Google_Client();
     
      $client->setClientId($clientID);
      $client->setClientSecret($clientSecret);

      $client->setRedirectUri($redirectURL);
     
      $client->addScope('profile');
      $client->addScope('email');

      if(isset($_GET['code'])){
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
          $client->setAccessToken($token);
          $gauth = new Google_Service_Oauth2($client);
          $google_info = $gauth->userinfo->get();
          global $name, $pwd, $email;
          $pwd = $google_info->id;
          $email = $google_info->email;
          $name = $google_info->name;
    }

  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>sign up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./signup.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>*{
        margin: 0;
        padding: 0;
    }
    body{
        background-color: #e6e6e6;
    }
    .nav-item {
        font-family: 'DM Sans', sans-serif;
        margin: 0px 10px;
        font-weight: 900;
    }
    .nav-link {
        color: white !important;
    }
    .nav-link:hover{
        text-decoration: underline;
        background-color: white !important;
        color:black !important;
        cursor: pointer;
        border-radius: 1.5rem;
        text-decoration: underline;
    }
    .navbar-brand{
        font-family: 'Montserrat', sans-serif;
        font-weight: bolder;
        color: white !important;
    }
    
    
    .bg-light {
        background-color: #e6e6e6 !important;
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="../index.html" class="navbar-brand">B-Pay</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="../home/payment/PayPage.html" class="nav-link">Payments</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Industries</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Resources</a>
            </li>
            <li class="nav-item">
              <a href="../home/contact/contact.php" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="./signup.php" class="nav-link">Sign up</a>
            </li>
          </ul>
        </div>
    
      </nav>
    <div class="box">
      <div class="left">
        <h4 class="content"> <img class="img-left" src="./images/1.png" height="300px"alt=""> <p>Quick and easy Actication</p> </h4>
        <h4 class="content"> <img class="img-left" src="./images/2.png" height="30px" alt=""> <p>Secured & encrypted transactions</p></h4>
        <h4 class="content"> <img class="img-left" src="./images/3.png" height="30px" alt=""> <p>Saftest Way to grow online</p></h4>
        <hr class="hr-text">
        <hr class="left-hr">
        <h6 style="text-align: center;">Need Help? We are Just a click Away <a href="../home/contact/contact.php">contact us</a></h6>
      </div>
<?php if(!isset($hide)) {?>      
      <div class="right">
        <h1 class="right-heading">Welcome to B-Pay</h1>
        <div class="container ">
          <div class="row ">
            <div class="col border border-dark business yellow">
              <h4>Business</h4>
            </div>
            <div class="col border border-dark consumer">
              <h4>Merchant</h4>
            </div>
          </div>
        </div>

        <form method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="email"id="EMAIL" value="<?php if(!empty($email)){echo $email;}?>" aria-describedby="emailHelp" placeholder="Email Adress" required>
            <span class="required EMAIL">This Field is required</span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="PASSWORD" value="<?php if(!empty($pwd)){echo $pwd;}?>" name="pwd" placeholder="Password" required>
            
            <span class="required PASSWORD">This Field is required</span>
          </div>
        <button type="submit" name="btn" class="btn btn-primary change">Sign up with Business</button>
        <h6>Already Registered? <a href="./signin.php"> Log in</a></h6>
        <h6 style="padding-left: 45px; padding-right: 48px;">By signing in you agree to our  <a href="#">Terms & Conditions</a>.</h6>
        <hr class="hr-right">
        <a href="<?php echo $client->createAuthUrl();?>"><button type="button" name="google" class=" btn btn-light "> <img class="img-right" src="./images/Google.png" alt="">      Sign up with Google</button></a>
      </form>
      </div>
      <?php } ?>
<?php if(isset($hide)and !isset($second)) {?>  

      <div class="right-2 invisible">
        <h2 class="right-heading">What is Your Business type?</h2>
        <form method="post">
        <div>
          <div class="form-group" style="    margin-bottom: 32px;">
            <div class="unregister">Unregistered Business</div>
              <label class="unregister-checkbox" id="1">
                <div class="checkbox-text">
                  Unregistered Business
                </div>
                <input type="radio" name="Myradio" class="radio " value="Unregistered Business" checked>
                <span class="1 checkbox-icon check"  >
                  <i class="fas fa-check"></i>
                </span>
              </label>
            </div>
          </div>
          <hr class="hr-right">
        <div>
        <div class="form-group" >
          <div class="register">Registered Business</div>
            <div class="register-list">
              <label class="unregister-checkbox" id="2">
                <div class="checkbox-text">
                  Proprietorship
                </div>
                <input type="radio" name="Myradio" class="radio" value="Proprietorship">
                <span class="checkbox-icon">
                  <i class="fas fa-check 1"></i>
                </span>
              </label>
              <label class="unregister-checkbox" id="3">
                <div class="checkbox-text">
                  Private Limited
                </div>
                <input type="radio" name="Myradio" class="radio" value="Private Limited">
                <span class="checkbox-icon">
                  <i class="fas fa-check"></i>
                </span>
              </label>
              <label class="unregister-checkbox" id="4">
                <div class="checkbox-text">
                  Partnership
                </div>
                <input type="radio" name="Myradio" class="radio" value="Partnership">
                <span class="checkbox-icon">
                  <i class="fas fa-check"></i>
                </span>
              </label>
              <label class="unregister-checkbox" id="5"> 
                <div class="checkbox-text">
                  Public Limited
                </div>
                <input type="radio" name="Myradio" class="radio" value="Public Limited">
                <span class="checkbox-icon">
                  <i class="fas fa-check"></i>
                </span>
              </label>
              <label class="unregister-checkbox" id="6">
                <div class="checkbox-text">
                  LLP
                </div>
                <input type="radio" name="Myradio" class="radio" value="LLP">
                <span class="checkbox-icon">
                  <i class="fas fa-check"></i>
                </span>
              </label>
              <label class="unregister-checkbox" id="7">
                <div class="checkbox-text">
                  Trust
                </div>
                <input type="radio" name="Myradio" class="radio" value="Trust">
                <span class="checkbox-icon">
                  <i class="fas fa-check"></i>
                </span>
              </label>
              <label class="unregister-checkbox" id="8">
                <div class="checkbox-text">
                  Socity
                </div>
                <input type="radio" name="Myradio" class="radio" value="Socity">
                <span class="checkbox-icon ">
                  <i class="fas fa-check"></i>
                </span>
              </label>
          </div>
        </div>
        <div class="buttons">
          <button type="button" class="back-button">Back</button>
          <button type="submit" name="submit" class="next-button">Next</button>
        </div>
      </div>
    </div>

      <div class="right-3  ">
        <h1 class="right-heading">Contact Details</h1>
        <div class="space">
          <div class="mb-3">
            <input type="text" placeholder="Your Name" class="form-control" id="NAME" name="name" id="exampleInputEmail1" aria-describedby="emailHelp ">
            <span class="required NAME">This Field is required</span>
          </div>
          <div class="mb-3">
            <input type="text" placeholder="Contact Number" class="form-control" id="CNO"name="cno" id="exampleInputPassword1" >
            <span class="required CNO">This Field is required</span>
          </div>
        </div>
        <div class="btn-3">
          <button type="button" name="back" style="background-color:rgb(147, 151, 155);" class="adjust-back adjust adjustleft">Back</button>
          <button type="button" name="submit" class="adjust-next adjust adjustright yellow">Next</button>
        </div> 
        </form> 
      </div> 
<?php } ?>
<?php if(isset($hide)and isset($second)){?>      
      <div class="right-4 "> 
       <form  method="post">
       <h1 class="right-heading">Verify your Email</h1>
        <h6 class="right-heading">A verification code has been sent to the registered email id Please Check spam folder also</h6>
        <div class="space">
          <div class="mb-3">
            <input type="text" placeholder="Verification Code" name="vcode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <h7>Didn't recieve the code? <button type="submit" name="resend" class="resend"style="color: blue;background: #dedee1;border: none;">Resend It</button></h7>
          </div>
          <div class="btn-4">
              <button type="submit" name="verify" style="background-color:#e1b92f; color: black;" class="adjust-4 adjustleft">Verify Email</button>
          </div>
       </form>
        
        </div>        
<?php } ?>           
    </div>
  <script src="./signup.js"></script>
  </body>
</html>