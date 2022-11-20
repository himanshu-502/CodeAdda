<?php
$conn= mysqli_connect("localhost","root","yasir123123","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";
  mysqli_query($conn,"use CouponAdda;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buyNowStyle.css">
    <title>Buy Now</title>
</head>
<body>
        <?php
        $userid=$_POST['userid'];
        $coupon=$_POST['coupon'];
        $sql="select * from coupons where code='$coupon'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        ?>
        <div class="columnFlexContainer">
            <h3>Billing Section</h3>
        <div class="details">
            <h4>Details of the coupon</h4>
            <p>Sold By:<?php echo $row['soldby']?></p>
            <p>Description:<?php echo $row['description']?></p>
            <p>Price:<?php echo $row['price']?></p>
            <p>Expiry Date:<?php echo $row['expirydate']?></p>
        </div>
        
        <?php
        $sql1="select walletmoney,securitymoney from wallet where userid='$userid'";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($result1);
        if($row1['walletmoney']-$row1['securitymoney']>=$row['price'])
        {
            ?>
            <div class="invoice">
                <h4>Invoice</h4>
                Current Balance:<?php echo $row1['walletmoney'];?><br>
                Price Of Coupon:<?php echo $row['price'];?><br>
                Remaining amount after purchase:<?php echo $row1['walletmoney']-$row['price'];?><br>
                Safety Money Minimum Balance Constraint:<?php echo $row1['securitymoney'];?><br>
                <form name="paymentButtonForm" action="paymentSuccessful.php" method="post">
                    <input type="hidden" name="userid" value='<?php echo $userid?>'>
                    <input type="hidden" name="coupon" value='<?php echo $coupon?>'>
                    <input type="submit" class="button2" value="Confirm And Purchase">
                </form>
                
            </div>
            </div>
        <?php
        }
        else
        {
        ?>
        <div class="invoice">
            <p>Insufficient Balance!!!</p>
            Current Balance:<?php echo $row1['walletmoney'];?><br>
                Price Of Coupon:<?php echo $row['price'];?><br>
                Remaining amount after purchase:<?php echo $row1['walletmoney']-$row['price'];?><br>
                Safety Money Minimum Balance Constraint:<?php echo $row1['securitymoney'];?><br>
            <p>Please Recharge your wallet</p>
            <form action="buynow.php" method="post">
                <input type="hidden" name="userid" value='<?php echo $userid?>'>
                <input type="hidden" name="coupon" value='<?php echo $coupon?>'>
                Add Money:<input type="number" name="walletmoney" id="WM">
                <input type="submit" name='submit' class="button2" value="Confirm And Add">
            </form>
        </div>
        <?php
        if(isset($_POST['submit']))
        {
            $value=$_POST['walletmoney'];
            $sql3="update wallet set walletmoney=walletmoney+'$value' where userid='$userid'";
            if(mysqli_query($conn,$sql3))
            echo "Money added successfully";
            else
            echo "Nothing happened";
        ?>
        
            <form name='forward' action="buynow.php" method="post" id="forward1">
            <input type="hidden" name="userid" value='<?php echo $userid?>'>
            <input type="hidden" name="coupon" value='<?php echo $coupon?>'>
            <!-- <input sytle="display:none;" type="submit" value="submit"> -->
            </form>
            <script>
                document.forward.submit();
            </script>
            <?php
            header("Refresh:0");
        }
        }
        ?>
        
</body>
</html>