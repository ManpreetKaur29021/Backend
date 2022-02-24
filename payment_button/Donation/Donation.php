<?php
    session_start();
    require("../../../signup/server.php");
    require("../../../signup/function.php");
    date_default_timezone_set("Asia/Kolkata");
    //variables for donaton button
    function getName() {
        $n=12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = 'DONBTN';
      
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
      
        return $randomString;
    }

    if(isset($_POST['create'])){
        $title=get_safe_real($_POST['title']);
        $button_label=get_safe_real($_POST['button_label']);
        $button_theme=get_safe_real($_POST['button_theme']);
        $button_type=get_safe_real($_POST['b_type']);
        $form2_label=get_safe_real($_POST['form2_label']);
        $max_amt=get_safe_real($_POST['max_amt']);
        $min_amt=get_safe_real($_POST['min_amt']);
        $email_label=get_safe_real($_POST['email-label']);
        $phone_label=get_safe_real($_POST['phone_label']);
        $name_label=get_safe_real($_POST['name_label']);
        $address_label=get_safe_real($_POST['address_label']);
        $pincode_label=get_safe_real($_POST['pincode_label']);
        $cat=date('Y-m-d h:i:s');
        $buttonid=getName();
        echo $buttonid;
        $id=$_SESSION['userid'];
        $descp= '&lt;script src="http://localhost/new_project/templates/demo.js" data-payment_button_id='."$buttonid".'&gt;&lt;/script&gt;';
        mysqli_query($con,"insert into donation_button(id,buttonid,title,button_label,button_theme,form2_label,max_amt,min_amt,emaill,phonel,namel,addressl,pincodel) values('$id','$buttonid','$title','$button_label','$button_theme','$form2_label','$max_amt','$min_amt','$email_label','$phone_label','$name_label','$address_label','$pincode_label')");
        mysqli_query($con,"insert into button(id,buttonid,title,tsales,iname,usold,cat,status,actions,descp) values('$id','$buttonid','$title','0.00','$form2_label',0,'$cat','Active','Get Button Code','$descp')");
        redirect("../pay_button.php");
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./payment.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>payment button</title>
</head>
<body style="background: #e6e6e6;">

    <nav class="navbar">
        <div class="title">Create New Payment Button</div>
        
        <button type="submit" style="position: absolute;right: 46px;">
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
        <a href="" style="margin-right: 5px; color: black;text-decoration: none;"><span>X</span></a> 
    </nav>

        <div class="first box form-1">
            <!-- <img src="./task.jpeg" alt=""> -->
            <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div>
              <!-- <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                       <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            <div class="left">
                <h2>Button Details</h2>
                <div class="button-div">
        <form action="" method="post">
                    <div style="margin-left: 20px;"  method="post">
                            <div class="form-group row">
                                <label class="col col-md-1"style="margin-left: 44px;"><b>Title</b></label>
                                <div class="col-md-3">
                                    <input class="button_title form-control input-sm" name="title"  value="" placeholder="not visible to customers">
                                    <span class="required PASSWORD">This Field is required</span>
                                </div>                                
                                <label class="col col-md-1"><b>Type</b></label>
                                <div class="col-md-3" style="padding-bottom: 5px;">
                                    <!-- <select name="b_type" class="form-control input-sm">
                                         <option value="Retrieval" >Donation</option>
                                         <option value="Chargeback">Quick-Pay</option>
                                         <option value="Pre Arbitration">Buy Now</option>
                                         <option value="Arbitration">Custom</option>
                                     </select>  -->
                                     <select name="b_type" class="form-control input-sm" onchange="location = this.value;">
                                        <option value="../button_page/quick_pay.php" >Quick-Pay</option>
                                         <option value="../button_page/buy_now.php">Buy Now Button</option>  
                                        <option value="./Donation.php" selected>Donation Button</option>    
                                         <option value="../button_page/custom.php">Custom Button</option>   
                                     </select> 
                               </div>
                               
                               <label class="col col-md-1"style="margin-left: 58px;"><b>Label</b></label>
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
                                <div class="col col-md-3 " style="margin-left: 75%; ">
                                <button type="button" class="next-1 btn btn-lg" style="width:100px;background:#ffde50;">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>     
            <div class="right">
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

<!-- form-2 -->
        <div class="second box form-2 invisible">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>
            <!-- <img src="./task.jpeg" alt=""> -->
            <div class="left">
                <h2>Donation Amount</h2>
                <div class="button-div-2">
                    <div style="margin-left: 20px;">
                            <div class="form-group row">
                                <label class="col-2 col-md-1"style="margin-left: 44px;margin-top: 100px;"><b>Label</b></label>
                                <div class="col-md-4" style="margin-top: 91px;">
                                    <input class="form-control input-sm" name="form2_label" value="Donate an Amount of your Choice" id="form-2-label" >
                                </div>                                
                                <label class="col-2 col-md-2"><b>Max Amount</b></label>
                                <div class="col-md-3" style="padding-bottom: 5px;">
                                    <input class="form-control input-sm" name="max_amt"  value="" placeholder="No Limit">
                               </div>
                                <label class="col-md-2" style="margin-left: 54.7%;"><b>Min Amount</b></label>
                                <div class="col-2 col-md-3">
                                    <input class="form-control input-sm" name="min_amt" value="1">
                                </div>
                                <div class="col-2 col-md-3" style="margin-left: 60%;  display:contents;">
                                <button type="button" class="back-2 btn-2 btn  btn-lg" style="margin-right: 700px; margin-left: 70px;background: #b8b8bb;">back</button>
                                <button type="button" class="next-2 btn-2 btn  btn-lg" style="background: #ffde50;" >Next</button>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>     
            <div class="right">
                <div class="right-form">
                    <nav class="navbar-2" >
                        <div style="display: grid;margin-left: 17px;">
                            <span>Custom Details</span>
                            <span><?php echo $_SESSION['ADMIN_USER']?></span>
                            <span><i class="fas fa-rupee-sign"></i> 0.00</span>
                        </div>
                        <span style="margin-right: 6px;margin-bottom: 69px;">X</span>
                    </nav>
                    <div style="margin-left: 18px;margin-top: 38px;">
                        <input type="text"  id="donation-label" disabled>
                        <input type="number" class="donation" >
                    </div>
                    <div class="navbar-button" >
                        <div style="display: grid;margin-left: 17px;margin-left: 169px;">
                            <span>Next</span>
                        </div>
                    </div>
                </div>
           </div>  
      
          </div>



<!-- form-3 -->
<div class="third box form-2 invisible">
    <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>
      </div>
    <!-- <img src="./task.jpeg" alt=""> -->
    <div class="left">
        <h2>Donation Amount</h2>
        <div class="button-div-2">
            <div style="margin-left: 20px;"  method="post">
                    <div class="form-group row">
                        <label class="col-3 col-md-1"style="margin-left:91px;"><b>Type</b></label>
                        <div class="col-md-3">
                            <input class="form-control input-sm" disabled value="Email" >
                        </div>                                
                        <label class="col-3 col-md-1"><b>Label</b></label>
                        <div class="col-md-3" style="padding-bottom: 5px;">
                        <input class="form-control input-sm" name="email-label" value="Email" id="email-label">
                       </div>
                       
                       <label class="col-3 col-md-1"style="margin-left: 91px;"><b>Type</b></label>
                        <div class="col-md-3">
                        <input class="form-control input-sm"value="Phone no." disabled>
                       </div>
                        <label class="col-md-1" ><b>Label</b></label>
                        <div class="col-3 col-md-3">
                            <input class="form-control input-sm" name="phone_label"  value="Phone" id="phone-label">
                        </div>
                                               
                       <label class="col-3 col-md-1"style="margin-left: 91px;"><b>Type</b></label>
                       <div class="col-md-3">
                       <input class="form-control input-sm"value="Single Line Text"disabled>
                      </div>
                       <label class="col-md-1" ><b>Label</b></label>
                       <div class="col-3 col-md-3">
                           <input class="form-control input-sm" name="name_label" value="Name" id="name-label">
                       </div>
                                              
                       <label class="col-3 col-md-1"style="margin-left: 91px;"><b>Type</b></label>
                        <div class="col-md-3">
                        <input class="form-control input-sm"value="Large TextArea"disabled>
                       </div>
                        <label class="col-md-1" ><b>Label</b></label>
                        <div class="col-3 col-md-3">
                            <input class="form-control input-sm" name="address_label" value="Address"id="adress-label">
                        </div>
                                               
                       <label class="col-3 col-md-1"style="margin-left: 91px;"><b>Type</b></label>
                       <div class="col-md-3">
                       <input class="form-control input-sm"value="Pincode"disabled>
                      </div>
                       <label class="col-md-1" ><b>Label</b></label>
                       <div class="col-3 col-md-3">
                           <input class="form-control input-sm" name="pincode_label"  value="Pincode"id="pincode-label">
                       </div>
                        <div class="col-2 col-md-3" style="margin-left: 60%; display:contents; ">
                        <button type="button" class="back-3 btn-2 btn  btn-lg" style="margin-right: 680px; margin-left: 70px;background: #b8b8bb;margin-top: 6px;">back</button>
                        <button type="button" class="next-3 btn-2 btn  btn-lg" style="background: #ffde50;margin-top: 6px;" >Next</button>
                    </div>
                    </div>
                </div>
            </div>
        
    </div>     
    <div class="right">
        <div class="right-form">
            <nav class="navbar-2" >
                <div style="display: grid;margin-left: 17px;">
                    <span>Custom Details</span>
                    <span><?php echo $_SESSION['ADMIN_USER']?></span>
                    <span><i class="fas fa-rupee-sign"></i> 0.00</span>
                </div>
                <span style="margin-right: 6px;margin-bottom: 69px;">X</span>
            </nav>
            <div class="scrollbar">
            <div style="margin-left: 18px;">
                <input type="text "style=" margin-top: 13px;" class="detail"   id="email-output" disabled>
                <input type="email" class="donation" >
            </div>
            <div style="margin-left: 18px;">
                <input type="text" style="  margin-top: 6px;"  class="detail"  disabled id="phone-output">
                <input type="tel" class="donation"pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
            </div>
            <div style="margin-left: 18px;">
                <input type="text" style="  margin-top: 6px;"   class="detail"disabled id="name-output">
                <input type="text" size="30" class="donation" >
            </div>
            <div style="margin-left: 18px;">
                <input type="text"   style="  margin-top: 6px;" class="detail"disabled id="adress-output">
                <input type="text" class="donation" >
            </div>
            <div style="margin-left: 18px;">
                <input type="text"   style="  margin-top: 6px;"class="detail" disabled id="pincode-output">
                <input type="number" max="6" class="donation" >
            </div>
        </div>
            <button class="navbar-button" >
                <div style="display: grid;margin-left: 17px;margin-left: 169px;">
                    <span>Pay</span>
                </div>
            </button>
        </div>
   </div>        
  </div>
<!-- Form-4 -->
<div class="forth box form-2 invisible">
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    <!-- <img src="./task.jpeg" alt=""> -->
        <div class="right" style="margin-top: 38px;width:  460px;">
            <h3>Sample</h3>
            <div class="buttonpreview" id="button"style="width: 200px;margin-top: 0;">
                <button class="button dark"id="paybutton1">
                    <input class="dark-input" type="text" id="myInput2-1" style="font-weight: bold;" disabled></input>
                    <div class="secure">Secure By B-pay
                    </div>
                    
                </button>
            </div>
       </div>    


        <div class="right" style="margin-top: 38px;width: 536px;">
        <div class="right-form" style="width: 375px;margin-top: 0;">
            <nav class="navbar-2" >
                <div style="display: grid;margin-left: 17px;">
                    <span>Custom Details</span>
                    <span><?php echo $_SESSION['ADMIN_USER']?></span>
                    <span><i class="fas fa-rupee-sign"></i> 0.00</span>
                </div>
                <span style="margin-right: 6px;margin-bottom: 69px;">X</span>
            </nav>
            <div style="margin-left: 18px;margin-top: 38px;">
                <input type="text"   id="donation-label-1" disabled>
                <input type="number" class="donation" >
            </div>
            <div class="navbar-button"style="bottom: 100px;" >
                <div style="display: grid;margin-left: 17px;margin-left: 169px;">
                    <span>Next</span>
                </div>
            </div>
        </div>
   </div>


   <div class="right" style="    margin-top: 38px;    width:  564px;">
    <div class="right-form" style="width: 375px;margin-top: 0;">
        <nav class="navbar-2" >
            <div style="display: grid;margin-left: 17px;">
                <span>Custom Details</span>
                <span><?php echo $_SESSION['ADMIN_USER']?></span>
                <span><i class="fas fa-rupee-sign"></i> 0.00</span>
            </div>
            <span style="margin-right: 6px;margin-bottom: 69px;">X</span>
        </nav>
        <div class="scrollbar">
        <div style="margin-left: 18px;">
            <input type="text"style="  margin-top: 13px;" class="detail"   id="email-output-1" disabled>
            <input type="email" class="donation" >
        </div>
        <div style="margin-left: 18px;">
            <input type="text" style="  margin-top: 6px;"  class="detail"  disabled id="phone-output-1">
            <input type="tel" class="donation"pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        </div>
        <div style="margin-left: 18px;">
            <input type="text" style="  margin-top: 6px;"   class="detail"disabled id="name-output-1">
            <input type="text" size="30" class="donation" >
        </div>
        <div style="margin-left: 18px;">
            <input type="text"   style="  margin-top: 6px;" class="detail"disabled id="adress-output-1">
            <input type="text" class="donation" >
        </div>
        <div style="margin-left: 18px;">
            <input type="text"   style="  margin-top: 6px;"class="detail" disabled id="pincode-output-1">
            <input type="number" max="6" class="donation" >
        </div>
    </div>
        <button class="navbar-button" style="bottom: 100px;" >
            <div style="display: grid;margin-left: 17px;margin-left: 169px;">
                <span>Pay</span>
            </div>
        </button>
    </div>
    <div class="col col-md-3" style="display: contents;">
        <button type="button" class="back-4  " style="border-radius: 8px;background: #b8b8bb; width: 113px;height: 47px;margin-top: 27px;">Back</button>
        <button type="submit" name="create" class="create" style="border-radius: 8px;background: #ffde50; width: 113px;height: 47px;margin-top: 27px;margin-left: 55px;">Create</button>
    </div>
    </form>  
</div>    
    
  </div>
          

    
    <script src="./payment.js">

    
    
    </script>
</nav>
</body>
</html>