<?php
    require("../signup/function.php");
    require("../signup/server.php");
    $buttonid= $_GET["id"];
    // echo  $_GET["id"];
    $buttonlabel="";
    $buttontheme="";
    $form2label="";
    $max_amt="";
    $min_amt="";
    $email_label="";
    $phone_label="";
    $name_label="";
    $address_label="";
    $pincode_label="";
    $user_name="";

    $q = "select * from donation_button where buttonid='$buttonid'";
    $res = mysqli_query($con,$q);
    while($row = mysqli_fetch_array($res)){
        $id= $row['id'];
        $buttonlabel= $row['button_label'];
        $buttontheme=$row['button_theme'];
        $form2label=$row['form2_label'];
        $max_amt=$row['max_amt'];
        $min_amt=$row['min_amt'];
        $email_label=$row['emaill'];
        $phone_label=$row['phonel'];
        $name_label=$row['namel'];
        $address_label=$row['addressl'];
        $pincode_label=$row['pincodel'];
    }
    $qon = "select * from signup where id='$id'";
    $res = mysqli_query($con,$qon);
    while($row = mysqli_fetch_array($res)){
        $user_name=$row['name'];
    }
    function getName() {
        $n=12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = 'PAYD';
      
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
      
        return $randomString;
    }

    if(isset($_POST['submit'])){
        $name=get_safe_real($_POST['uname']);
        $email=get_safe_real($_POST['uemail']);
        $phone=get_safe_real($_POST['uphone']);
        $address=get_safe_real($_POST['uaddress']);
        $pincode=get_safe_real($_POST['userpincode']);
        $amt=get_safe_real($_POST['donate_amt']);
        $payid=getName();
        $userid=$id;
        $status="inactive";
        $time=date('Y-m-d h:i:s');
        // echo $name,$email,$phone,$address,$pincode,$payid,$amt,$userid;
        mysqli_query($con,"insert into button_transaction(id,payid,name,email,phone,address,pincode,amt,createe,status,buttonid) values('$id','$payid','$name','$email','$phone','$address','$pincode','$amt','$time','$status','$buttonid')");
        mysqli_query($con,"insert into payments(id,pid,email,contact,amount,duration,st) values('$id','$payid','$email','$phone','$amt','$time','$status')");
        echo "<script>alert ('Payment Successfully Done');</script>";
        $sql = "UPDATE button SET usold = usold+1,tsales = tsales+$amt WHERE buttonid = '$buttonid'";
        mysqli_query($con,$sql);
        // $sql = "UPDATE payment_page SET tsales = total_sales+$amt WHERE pay_page_id = '$paypid'";
        // mysqli_query($con,$sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/pay.css">
        <link rel="stylesheet" href="./css/payment.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>payment button</title>
    </head>
</head>
<body>
    <div class="forth box form-2">
                <div class="buttonpreview" id="button"style="margin-top: 0;">
                    <button type="button" class="button dark"id="paybutton1">
                        <input class="dark-input" type="text" value="<?php echo $buttonlabel?>" id="myInput2-1" style="font-weight: bold;" disabled></input>
                        <div class="secure">Secure By B-pay
                        </div>
                        
                    </button>
                </div>  
    
                </div> 

            <div class="right-form invisible second" style="margin-top: 0;">
                <nav class="navbar-2" >
                    <div style="display: grid;margin-left: 17px;">
                        <span>Custom Details</span>
                        <span><?php echo $user_name?></span>
                        <span>0.00</span>
                    </div>
                    <span style="margin-right: 6px;margin-bottom: 69px;" class="cross">X</span>
                </nav>
                <form  method="post">
                <div style="margin-left: 18px;margin-top: 38px;">
                    <input type="text"value="<?php echo $form2label?>" name="" id="donation-label-1" disabled>
                    <input type="number" class="donation" name="donate_amt" >
                </div>
                <button type="button" class="navbar-button" id="next" >
                    <div style="display: grid;margin-left: 17px;margin-left: 185px;">
                        <span>Next</span>
                </button>
                </div>
            </div>

    
    

        <div class="right-form invisible third" style="margin-top: 0;">
            <nav class="navbar-2" >
                <div style="display: grid;margin-left: 17px;">
                    <span>Custom Details</span>
                    <span><?php echo $user_name?></span>
                    <span>0.00</span>
                </div>
                <span style="margin-right: 6px;margin-bottom: 69px;" class="cross">X</span>
            </nav>
            <div class="scrollbar">
            <div style="margin-left: 18px;">
                <input type="text"style="  margin-top: 13px;"value="<?php echo $email_label?>" class="detail" name="" id="email-output-1" disabled>
                <input type="email" class="donation" name="uemail" >
            </div>
            <div style="margin-left: 18px;">
                <input type="text" style="  margin-top: 6px;" name=""class="detail"value="<?php echo $phone_label?>"  disabled id="phone-output-1">
                <input type="tel" class="donation" name="uphone">
            </div>
            <div style="margin-left: 18px;">
                <input type="text" style="  margin-top: 6px;" name="" value="<?php echo $name_label?>"class="detail"disabled id="name-output-1">
                <input type="text" size="30" class="donation" name="uname">
            </div>
            <div style="margin-left: 18px;">
                <input type="text" name="" style="  margin-top: 6px;" class="detail"value="<?php echo $address_label?>"disabled id="adress-output-1">
                <input type="text" class="donation" name="uaddress">
            </div>
            <div style="margin-left: 18px;">
                <input type="text" name="" style="  margin-top: 6px;"class="detail"value="<?php echo $pincode_label?>" disabled id="pincode-output-1">
                <input type="number"  class="donation" name="userpincode">
            </div>
        </div>
            <button type="button"class="navbar-button" id="pay">
                <div style="display: grid;margin-left: 17px;margin-left: 185px;">
                    <span>Pay</span>
                </div>
            </button>
        </div>
        </div> 
    <!-- </form>   -->  
    
    <div class="container py-5 fifth invisible" style="width: 556px;">
        <!-- For demo purpose -->

        <div class="row1">
            <div class="col-lg-6 ">
                <div class="card ">
    
                    <div style="background-color: #FFDE50;">
                        <h4 style="margin-top: 10px; padding: 2px; text-align: center;" >B-PAY PAYMENT METHOD</h4>
                        <!-- <span style="margin-right: 6px;margin-bottom: 69px;" class="cross">X</span> -->
                        <br>
                        
                    </div>
                    
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-3 pl-2 pr-2 pb-1">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>  
                                <br>       
                                <li class="nav-item"> <a data-toggle="pill" href="#upi" class="nav-link  "> <i class="fas fa-credit-card mr-2"></i> UPI Payment</a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paylater" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Pay Later </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#wallet" class="nav-link "><ion-icon class=" mr-2 fab"name="wallet"></ion-icon>  Wallet </a> </li>

                        </div> <!-- End -->
                        <!-- <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#upi" class="nav-link  "> <i class="fas fa-credit-card mr-2"></i> UPI Payment</a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paylater" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Pay Later </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#wallet" class="nav-link "><ion-icon class=" mr-2 fab"name="wallet"></ion-icon>  Wallet </a> </li>
                            </ul>
                        </div>  -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <!-- <form role="form"> -->
                                    <div>
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name"   class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control "  >
                                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control"  > <input type="number" placeholder="YY" name="" class="form-control"  > </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text"   class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" name="submit" class=" btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                <!-- </form> -->
                                </div>
                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade pt-3">
                            <h6 class="pb-2">Select your paypal account type</h6>
                            <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                            <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                            <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                        </div> <!-- End -->
                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade pt-3">
                            <div class="form-group "> <label for="Select Your Bank">
                                    <h6>Select your Bank</h6>
                                </label> <select class="form-control" id="ccmonth">
                                    <option value="" selected disabled>--Please select your Bank--</option>
                                    <option>Punjab National Bank</option>
                                    <option>Bank of Baroda</option>
                                    <option>State Bank of India</option>
                                    <option>Central Bank of India</option>
                                    <option>Axis Bank</option>
                                    <option>Union Bank of India</option>
                                    <option>HDFC Bank</option>
                                    <option>IDBI Bank</option>
                                    <option>AU Small Finance Bank</option>
                                    <option>ICICI Bank</option>
                                </select> </div>
                            <div class="form-group">
                                <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                            </div>
                            <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                        </div> <!-- End -->
                        <!-- End -->

                        <div id="upi" class="tab-pane fade pt-3">
                            <p class="text-muted"> PAY USING UPI ID </p>
                            <div class="list-group">
                                <button type="button" class="list-group-item list-group-item-action">
                                    <h5>UPI ID</h5>
                                <p>Google Pay, Bhim, PhonePe & more</p>
                                <input type="text"  placeholder="Enter your UPI ID"  >
                                </button>
                            </div>

                            <div class="list-group pt-5" id="list">
                                <button type="button" class="list-group-item list-group-item-action">
                                    <h5>Show QR Code</h5>
                                    <p>Scan the QR code using your UPI app</p>
                                </button>
                            </div>
                            <!-- <div>
                                <h5>UPI ID</h5>
                                <p>Google Pay, Bhim, PhonePe & more</p>
                                <label>Enter your UPI ID</label><br>
                                <input type="text"  >
                            </div> -->
                            <!-- <div>
                                <h5>Show QR Code</h5>
                                <p>Scan the QR code using your UPI app</p>
                            </div> -->
                            <div>
                                <div class="card-footer "> 
                                    <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> <b>Pay &#8377; 0.00</b> 

                                    </button>
                                    </div>

                            </div>

                        </div>

                        <div id="paylater" class="tab-pane fade pt-3">
                            <h6 class="text-muted pt-3">SELECT AN OPTION</h6>

                            <div class="list-group">
<div class="list list-group-item" style="display: flex; justify-content: space-between;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p ><img  style="width:35px;" src="./image/epay.png"> ePayLater</p>
                                    <p>&#10003;</p>
                                </div>

<div class="list list-group-item"  style="display: flex; justify-content: space-between; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <p> <img style="width:35px;" src="./image/simpl.png">Simpl</p>
                                    <p>&#10003;</p>
                                </div>

<div class="list list-group-item"  style="display: flex; justify-content: space-between; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <p> <img style="width:28px;" src="./image/icici.png"> ICIC Bank PayLater</p>
                                    <p>&#10003;</p>
                                </div>
<div class="list list-group-item"  style="display: flex; justify-content: space-between; "data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<p> <img style="width:28px;" src="./image/kotak.png"> Mahindra Bank</p>
                                    <p>&#10003;</p>
                                </div>

<div class="list list-group-item" style="display: flex; justify-content: space-between; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <p> <img style="width:28px;"  src="./image/lazypay.jpg"> LazyPay</p>
                                    <p>&#10003;</p>
                                </div>
                            
                        </div> 
</div>

                        <div id="wallet" class="tab-pane fade pt-3">
                             <h6 class="text-muted pt-3">SELECT AN OPTION</h6>
            <div class="list-group">
                                <div class="list list-group-item" style="display: flex; justify-content: space-between;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p ><img  style="width:35px;" src="./image/mobikwik.png"> Mobikwik</p>
                                                          <p>&#10003;</p>
                                                      </div>

                                <div class="list list-group-item" style="display: flex; justify-content: space-between;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <p ><img  style="width:40px; margin-left:-10px;" src="./image/freecharge.png">Freecharge</p>
                                                          <p>&#10003;</p>
                                                      </div>
                      
                      <div class="list list-group-item"  style="display: flex; justify-content: space-between; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <p> <img style="width:25px;" src="./image/airtelmoney.png"> Airtel Money</p>
                                                          <p>&#10003;</p>
                                                      </div>
                      
                      <div class="list list-group-item"  style="display: flex; justify-content: space-between; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <p> <img style="width:28px;" src="./image/ola.png">Ola Money (Postpaid + Wallet)</p>
                                                          <p>&#10003;</p>
                                                      </div>
                      <div class="list list-group-item"  style="display: flex; justify-content: space-between; "data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <p> <img style="width:40px; margin-left: -5px;" src="./image/jiomoney.jpeg">JioMoney</p>
                                                          <p>&#10003;</p>
                                                      </div>
                      
                      <div class="list list-group-item" style="display: flex; justify-content: space-between; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <p> <img style="width:40px;"  src="./image/payzapp.png">PayZapp</p>
                                                          <p>&#10003;</p>
                                                      </div>



                                                    
                        </div>
</div>
                    </div>
                </div>
            </div>
        </div>
</form>
        <script>
            $(function() {
            $('[data-toggle="tooltip"]').tooltip()
            });
        </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script>
          var color="<?php echo $buttontheme;?>";
        if (color=="Dark"){
            $("#paybutton1").addClass("dark");
            $("#paybutton1").removeClass("light");
            $("#myInput2-1").addClass("dark-input");
            $("#myInput2-1").removeClass("light-input");
        }
        if(color=="Light"){
            $("#paybutton1").addClass("light");
            $("#paybutton1").removeClass("dark");
            $("#myInput2-1").addClass("light-input");
            $("#myInput2-1").removeClass("dark-input");
        }
          $("#paybutton1").on("click",function(){
            $(".second").removeClass("invisible");
            $(".third").addClass("invisible");
            $(".forth").addClass("invisible");
            $(".fifth").addClass("invisible");
            
          })
          $("#next").on("click",function(){
            $(".second").addClass("invisible");
            $(".third").removeClass("invisible");
            $(".forth").addClass("invisible");
            $(".fifth").addClass("invisible");

          })
          $("#pay").on("click",function(){
            $(".second").addClass("invisible");
            $(".third").addClass("invisible");
            $(".forth").addClass("invisible");
            $(".fifth").removeClass("invisible");

          })
        $(".cross").on("click",function(){
            $(".second").addClass("invisible");
            $(".third").addClass("invisible");
            $(".forth").removeClass("invisible");
            $(".fifth").addClass("invisible");

          });
        //   $(".subscribe").on("click",function(){
        //     $(".second").addClass("invisible");
        //     $(".third").addClass("invisible");
        //     $(".forth").removeClass("invisible");
        //     $(".fifth").addClass("invisible");

        //   });

      </script>
</body>
</html>
