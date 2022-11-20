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
    <title>Payment Successful</title>
</head>
<body>
        <?php
        $userid=$_POST['userid'];
        $coupon=$_POST['coupon'];
        $sql="select * from coupons where code='$coupon'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $sql1="select walletmoney,securitymoney from wallet where userid='$userid'";
        $result=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($result);
        $newWalletMoney=$row1['walletmoney']-$row['price'];
        $sql2="update wallet set walletmoney='$newWalletMoney' where userid='$userid'";
        if(mysqli_query($conn,$sql2))
        {
            echo "<h1 class='heading' style='text-align:center;'>Payment has been successfully Completed</h1>";
            ?>
            <script>
            setTime(()=>{
             ;   
            },5000);
            </script>
            <form name='forward' action="index.php" method="post" id="forward1">
            <input type="hidden" name="userid" value='<?php echo $userid?>'>
            <!-- <input sytle="display:none;" type="submit" value="submit"> -->
            </form>
            <script>
                document.forward.submit();
            </script>
            <?php
        }
        else
        {
            echo "ERROR!!!";
        }
        ?>
</body>
</html>