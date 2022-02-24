<?php
// require("server.php");
session_start();
require("../../signup/server.php");
date_default_timezone_set("Asia/Kolkata");
$var=" <h1>"."hello new"."</h1> ";

$title="";
$status="";
$count="";
$id=$_SESSION['userid'];
$q = "select * from button where id='$id'";
if(isset($_POST['search']))
{
    if(!empty($_POST['status']) || !empty($_POST['title']) || !empty($_POST['count']))
    {
        $title = $_POST['title'];
        $status = $_POST['status'];
        $count = $_POST['count'];
        if($title != "") 
        {
            $q .= " and title='$title'";
        }
        if($status != "")
        {
            $q .= " and status ='$status'";
        }
    }
}
$res = mysqli_query($con,$q);
$resp = mysqli_query($con,$q);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="navv.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Payment</title>
</head>
<body style="background-color: #e6e6e6;">

 <div class="unique">
    <nav class="navbar">
        <div class="title"> B-PAY</div>
        

        <div class="navbar" style="background:#f7b750;">
            <ul >
                <li>
                    <div class="click" style="background: #f7b750;">
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
            <a href="../../logout.php" style=" text-decoration: none"><button class="button">Log Out</button></a>
           </div>
       </div>
    </div>
    <hr>
<div class="col col-sm-2">
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
</div>
</div>

    <div class="row justify-content-end"style="margin-left:-300px; margin-right:20px;">
    <div class="col col-sm-8">
        <div class="conainer" style="background-color: #b7b3b3; padding-right: 20px; align-content: center; border-bottom:3px solid grey">
            <div class="row">
                <div class="col-12 col-md-8 col-sm-8">
                    <div class="col col-md-12 col-sm-12" style="margin-left: 5px;">
                        <h3>Payment Buttons</h3>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-sm-4" style="padding-top: 5px; padding-bottom:5px;">
                  <a href="./button_page/button_flashcard.html"><button type="button" class="btn btn-warning" style="margin-left: 20px;">+Create Payment Button</button></a>  
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row justify-content-end"style="margin-left:-300px; margin-right:20px;">
    <div class=" col col-sm-8">
        <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
            <form action="pay_button.php" method="POST" style="margin-left: 20px;">
                <div class="form-group row">
                    <label class="col-md-1"><b>Title</b></label>
                    <div class="col-md-2">
                     <input name="title" class="form-control input-sm"  value="">
                    </div>
                     <label class="col-md-1"><b>Status</b></label>
                     <div class="col-md-2">
                        <select name="status" class="form-control input-sm">
                            <option value="">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <label class="col-md-1"><b>Count</b></label>
                    <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                        <input name="count" min="1" max="100" type="number" class="form-control input-sm" value="">   
                    </div>
                    <br>
                    <div class="col-md-1">
                        <button type="submit" name="search" class="btn btn-warning" style="width:100px">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
<div class="row justify-content-end"style="margin-left:-300px; margin-right:20px;">
<div class="col col-sm-8">
<div class="data-table ">
    <div class="table-responsive">
        <table class="table table-hover table-striped undefined">
            <thead style="background-color: #b7b3b3;">
                <tr>
                    <th>Title</th>
                    <th>Total sales</th>
                    <th>Items name</th>
                    <th>Units sold</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody style="background-color: #d3dbd5;">
    <?php
    if(mysqli_num_rows($res)>0)
    {
        if($count != ""){
            $b=0;
            while($row = mysqli_fetch_array($res))
            { 
               
                ?>
<div class="<?php echo $row['buttonid']; ?> popup" style="display:none;" >
<div>
  <div class="heading">
    <h3>Copy button code</h3>
    <p>Your payment button is ready!</p>
  </div>
  <div class="body">
  <div class="code">
      <div class="content">
        <div class="input-label">
            <strong>HTML code</strong>
            <div class="discription">
                Copy & Paste this HTML in your code
            </div>
            <div >
                <textarea class="clipboard" disabled>

                <?php
                    $n=$row['descp'];
                    echo $n;
                ?>

                </textarea>

            </div>
        </div>
      </div>

      <div class="bottom">
        How to use this code?
        <a href="#">See Documentation</a>
      </div>
      <a href="" class="btn-block">Back to Dashboard</a>
    </div>       
   </div>
                 </div>
                 </div>
                 <?php
            //      $sql = "select buttonid from button where primary_id='$n'";
            //    while($new_id=mysqli_fetch_assoc(mysqli_query($con,$sql))) {
            //         $button_id=$new_id[''];
            //    }
            //    echo $button_id;
                if($b<((int)$count)){
                echo "<tr>";
                echo "<td>". $row['title']."</td>";
                echo "<td>". $row['tsales']."</td>";
                echo "<td>". $row['iname']."</td>";
                echo "<td>". $row['usold']."</td>";
                echo "<td>". $row['cat']."</td>";
                echo "<td>". $row['status']."</td>";
                echo "<td  style='color:blue;cursor: pointer;' class=" .$row['primary_id']. ">". $row['actions']."</td>";
                echo "</tr>";
                $b++;
                }
            }
        
        ?>
      
         <?php
      }  else{
            while($row = mysqli_fetch_array($res))
            {
                ?>
<div class="<?php echo $row['buttonid']; ?> popup" style="display:none;" >
  <div class="heading">
    <h3>Copy button code</h3>
    <p>Your payment button is ready!</p>
  </div>
  <div class="body">
  <div class="code">
      <div class="content">
        <div class="input-label">
            <strong>HTML code</strong>
            <div class="discription">
                Copy & Paste this HTML in your code
            </div>
            <div >
                <textarea class="clipboard" disabled>

                <?php
                    $n=$row['descp'];
                    echo $n;
                ?>

                </textarea>

            </div>
        </div>
      </div>
    </div>
      <div class="bottom">
        How to use this code?
        <a href="#">See Documentation</a>
      </div>
      <a href="" class="btn-block">Back to Dashboard</a>
    </div>       
   </div>
                 <?php
                //  $sql = "select buttonid from button where primary_id='$n'";
                // $button_id=mysqli_fetch_assoc(mysqli_query($con,$sql));
                // echo $button_id;
                echo "<tr>";
                echo "<td>". $row['title']."</td>";
                echo "<td>". $row['tsales']."</td>";
                echo "<td>". $row['iname']."</td>";
                echo "<td>". $row['usold']."</td>";
                echo "<td>". $row['cat']."</td>";
                echo "<td>". $row['status']."</td>";
                echo "<td style='color:blue;cursor: pointer;' class=".$row['primary_id']. ">". $row['actions']."</td>";
                echo "</tr>";
            }
        }
   
    ?>
    
     <?php
    } else { ?>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td>
                <h5 style="padding-top: 100px; padding-bottom: 100px; text-align:center;">No Results Found!</h5>
            </td>
            <td> </td>
            <td> </td>
            <td> </td>

        </tr>
    <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div> 
    <?php echo "hello" ;?>
    
             
    <script type="text/javascript">

        $(".click").click(function(){
            $(".account").toggle();
        })
        $("body").click(function(){
            $(".account").addClass("invi");
            
        })

        </script>
            <?php while( $row = mysqli_fetch_array($resp)){?>
            <script type="text/javascript">
         
        $("<?php echo ".".$row['primary_id']?>").click(function(){
            $("<?php echo ".". $row['buttonid'];?>").toggle();
            
           
        })
              
    </script>
     <?php }  ?>
       
</body>

</html>