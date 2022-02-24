<?php

session_start();
require("../../../signup/server.php");
require("../../../signup/function.php");
date_default_timezone_set("Asia/Kolkata");
//variables for donaton button
function getName() {
    $n=12;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = 'BNBTN';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

if(isset($_POST['submit'])){

    $title=get_safe_real($_POST['title']);
    $button_label=get_safe_real($_POST['button_label']);
    $button_theme=get_safe_real($_POST['button_theme']);
    $button_type=get_safe_real($_POST['b-type']);
    $amt_label=get_safe_real($_POST['amtl']);
    $amt=get_safe_real($_POST['amt']);
    $email_label=get_safe_real($_POST['email-label']);
    $phone_label=get_safe_real($_POST['phone-label']);
    $name_label=get_safe_real($_POST['name-label']);
    $address_label=get_safe_real($_POST['address-label']);
    $pincode_label=get_safe_real($_POST['pincode-label']);
    $cat=date('Y-m-d h:i:s');
    $buttonid=getName();
    // echo $buttonid;
    $id=$_SESSION['userid'];
    $descp= '&lt;script src="http://localhost/new_project/templates/buy_now.js" data-payment_button_id='."$buttonid".'&gt;&lt;/script&gt;';
    mysqli_query($con,"insert into buy_now(id,bnid,title,button_label,button_theme,amtl,emaill,phonel,namel,addressl,pincodel,amt) values('$id','$buttonid','$title','$button_label','$button_theme','$amt_label','$email_label','$phone_label','$name_label','$address_label','$pincode_label','$amt')");
    mysqli_query($con,"insert into button(id,buttonid,title,tsales,iname,usold,cat,status,actions,descp) values('$id','$buttonid','$title','0.00','$amt_label',0,'$cat','Active','Get Button Code','$descp')");
    redirect("../pay_button.php");
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./buy_now.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Quick-Pay Button</title>
</head>
<body style="background: #e6e6e6;">

    <nav class="navbar">
        <div class="title">Create New Payment Button</div>
        
        <button type="submit">
        <div class="navbar nav"style="padding-left: 50px;" >
            <ul >
                <li>
                    <div class="click">
                            <i class="fas fa-file-invoice"></i>
                            Payment Recipt 
                    </div>
                </li>
            </ul>
        </div>
       </button>
    </nav>




        <div class="box">
            <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width:25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div>
            <div class="left form1" >
                <h2 style="margin-bottom: 4rem;">Button Details</h2>
                <div class="button-div">
                    <form  method="post">
                    <div style="margin-left: 20px;">
                            <div class="form-group row">
                                <label  class="col col-md-1"style="margin-left: 44px;"><b>Title</b></label>
                                <div class="col-md-3">
                                    <input class="form-control input-sm reqtitle" name="title" value="" placeholder="not visible to customers">
                                    <span style="color:red;" id="required">This field is required</span>
                                </div>                                
                                <label class="col col-md-1"><b>Type</b></label>
                                <div class="col-md-3" style="padding-bottom: 5px;">
                                    <select name="b-type" class="form-control input-sm" onchange="location = this.value;">
                                        <option value="quick_pay.php">Quick-Pay</option>
                                        <option value="buy_now.php" selected>Buy Now Button</option>  
                                        <option value="../Donation/Donation.php">Donation Button</option>    
                                        <option value="custom.php" >Custom Button</option>   
                                    </select>
                               </div>
                               
                               <label class="col col-md-1"style="margin-left: 44px;"><b>Label</b></label>
                                <div class="col-md-3">
                                <input class="form-control input-sm" id="title" name="button_label" value="Pay Now">
                               </div>
                            
               
                                <label class="col-md-1" ><b>Theme</b></label>
                                <div class="col col-md-3">
                                    <select name="button_theme" id="theme" class="form-control input-sm">
                                        <option value="Dark" >Dark</option>
                                        <option value="Light">Light</option>
                                    </select> 
                                </div>
                                <div class="col col-md-3" style="margin-left: 75%; margin-top: 170px;">
                                <button type="button" class="btn btn-warning next" style="width:100px;"> Next </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>     
            <div class="right nform1">
                <h3>Sample</h3>
                <div class="buttonpreview" id="button"style="width: 200px;">
                    <button class="button dark"id="paybutton">
                        <input class="dark-input" type="text" id="myInput2" style="font-weight: bold;" disabled></input>
                        <div class="secure">Secure By B-pay
                        </div>
                        
                    </button>
                </div>
           </div>      
             
          </div>

          <div class="box">
            <div class="progress1">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>
          <div class="left form2">
            
            <h2 style="margin-bottom: 4rem;">Customer Details</h2>
            <div class="button-div">
                <div style="margin-left: 20px;">
                        <div class="form-group row">
                            <label class="col col-md-1"style="margin-left: 44px;"><b>Label</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm"  id="amount-label"name="amtl" value="Amount">
                            </div>                                
                            <label class="col col-md-1"><b>Value</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" name="amt" id="amt-value" value="0.00" placeholder="Enter the amount">
                            </div>

                            <div class="col col-md-3" style="margin-left: 56%; margin-top:260px;">
                                <button type="button" class="btn btn-warning back back1" style="width:100px;"> Back </a></button>
                            </div>

                            <div class="col col-md-3" style="margin-left: 75%; margin-top: -88px;">
                                <button type="button" class="btn btn-warning next1" style="width:100px;">Next</button>
                            </div>

                        </div>
                    </div>
                </div>
        </div>     
        <div class="right nform2">

            <div method="post">
                <div class="form_header">
                    <h6>Customer Details</h6>
                    <p> <?php echo $_SESSION['ADMIN_USER']  ?> </p>
                    <input id="amt-output" placeholder="₹0.00" value="₹0.00" id="amt-label1">
                </div>

            <div class="form_body">
                    <div>
                        <input type="text" style="  margin-top: 13px;" class="detail" name=""  disabled id="amount-output" >
                        <input class="input" placeholder="&#8377; 0.00" id="amt-label"> 
                    </div>                     
                </div>

                <div class="form_button">

                    <button> PAY NOW </button>
                     
                </div>

            </div>
        </div>  
        </div>  







          <div class="box">
            <div class="progress2">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>
              </div>
          <div class="left form3">
            
            <h2>Customer Details</h2>
            <div class="button-div">
                <div style="margin-left: 20px;">
                        <div class="form-group row">
                            <label class="col col-md-1"style="margin-left: 44px;"><b>Type</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" disabled value="Email">
                            </div>                                
                            <label class="col col-md-1"><b>label</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" name="email-label" id="email-label" value="Email" >
                            </div>

                            <label class="col col-md-1"style="margin-left: 44px;"><b>Type</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" value="Phone no." disabled>
                            </div>                                
                            <label class="col col-md-1"><b>label</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" value="Phone" name="phone-label" id="phone-label">
                            </div>

                            <label class="col col-md-1"style="margin-left: 44px;"><b>Type</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm"  value="Single Line Text"disabled>
                            </div>                                
                            <label class="col col-md-1"><b>label</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" value="Name" name="name-label" id="name-label">
                            </div>

                            <label class="col col-md-1"style="margin-left: 44px;"><b>Type</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" value="Large TextArea"disabled>
                            </div>                                
                            <label class="col col-md-1"><b>label</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" name="address-label" value="Address"id="address-label">
                            </div>

                            <label class="col col-md-1"style="margin-left: 44px;"><b>Type</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" value="Pincode"disabled>
                            </div>                                
                            <label class="col col-md-1"><b>label</b></label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" name="pincode-label"value="Pincode"id="pincode-label">
                            </div>

                            <div class="col col-md-3" style="margin-left: 56%; margin-top: -6px;">
                                <button type="button" class="btn btn-warning back back2" style="width:100px;"> Back </a></button>
                            </div>

                            <div class="col col-md-3" style="margin-left: 75%; margin-top: -88px;">
                                <button type="button" class="btn btn-warning next2" style="width:100px;">Next</button>
                            </div>
                    </div>
                </div>
                </div>
        </div>     
        <div class="right nform3">

            <div>
                <div class="form_header">
                    <h6>Customer Details</h6>
                    <p> <?php echo $_SESSION['ADMIN_USER']  ?> </p>
                    <input id="amt-output-1" placeholder="₹0.00">
                </div>
            <div class="form_body">
                    <div>
                    <input type="text" style=" margin-top: 13px;" class="detail"  disabled  id="email-output" >
                        <input class="input"> 
                    </div> 
                    <input type="text" style="  margin-top: 6px;" name="" class="detail"  disabled id="phone-output">
                    <input class="input"> 

                    <input type="text" style="  margin-top: 6px;" name="" class="detail" disabled id="name-output">
                    <input class="input">

                    <input type="text" name="" style="  margin-top: 6px;" class="detail" disabled id="address-output">
                    <input class="input">
                    
                    <input type="text" name="" style="  margin-top: 6px;"class="detail" disabled id="pincode-output">
                    <input class="input">
                    
                </div>

                <div class="form_button">

                    <button> PAY NOW </button>
                     
                </div>

            </div>
        </div>  
        </div>  
        
        <div class="box">
            <div class="progress3">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
              </div>
            <div class="left cform1" id="create_button" style="width:30%;">

                <div class="right" id="create_button1" style="margin-top: -73px; margin-left: -72px;">
                    <div class="buttonpreview" id="button"style="width: 200px;">
                        <button class="button dark" id="final_button">
                            <input class="dark-input" type="text" id="myInput3" style="font-weight: bold;" disabled></input>
                            <div class="secure">Secure By B-pay
                            </div>
                            
                        </button>
                    </div>
               </div>      
              
           </div> 
           <div class="center cform2" id="create_form" style="width: 22%;"  >   
           <div>
            <div class="form_header">
                <h6>Customer Details</h6>
                <p> <?php echo $_SESSION['ADMIN_USER']  ?> </p>
                <input id="amt-output-2" placeholder="₹0.00">
            </div>

        <div class="form_body" style="background-color:#f1eeee ">
                <div>
                    <input type="text" style="  margin-top: 13px; background-color:#f1eeee" class="detail" name=""  disabled id="amount-output-1" >
                    <input class="input" placeholder="&#8377; 0.00" id="amt-output-3"> 
                </div>                     
            </div>

            <div class="form_button">

                <button> PAY NOW </button>
                 
            </div>

        </div>
    </div>    
</div>
          <div class="right cform3" id="create_form" style=" background-color: none; width:25%; margin-top: -547px; margin-left:1000px; background-color:#e6e6e6;"> 
  
            <div>
                <div class="form_header">
                    <h6>Customer Details</h6>
                    <p> <?php echo $_SESSION['ADMIN_USER']  ?> </p>
                    <input id="amt-output-4" placeholder="₹0.00">
                </div>
                <div class="form_body" style="background-color:#f1eeee ">
                <div>
                    <input type="text" style="  margin-top: 13px; background-color:#f1eeee;" class="detail" name="" disabled id="email-output-1">
                    <input class="input"> 
                    </div> 

                    <input type="text" style="  margin-top: 6px; background-color:#f1eeee;" name=""class="detail"  disabled id="phone-output-1">
                    <input class="input"> 

                    <input type="text" style="  margin-top: 6px; background-color:#f1eeee;" name="" class="detail"disabled id="name-output-1">
                    <input class="input">

                    <input type="text" name="" style="  margin-top: 6px;background-color:#f1eeee;" class="detail"disabled id="address-output-1">
                    <input class="input">
                    
                    <input type="text" name="" style="  margin-top: 6px;background-color:#f1eeee;"class="detail" disabled id="pincode-output-1">
                    <input class="input">
                    
                </div>

                <div class="form_button">

                    <button> PAY NOW </button>
                     
                </div>

            </div>

               <div class="col col-md-3" style="margin-left: -4%; margin-top: 26px;">
                    <button type="button" class="btn btn-warning back back3" style="width:100px;"> Back </a></button>
               </div>

                <div class="col col-md-3" style="margin-left: 67%; margin-top: -88.5px;">
                    <button type="submit" name="submit" class="btn btn-warning " style="width:100px;">Create</button>
                </div>
                </form>
          </div>  
          </div>


          


    <script src="./buy_now.js"></script>
</body>
</html>