<?php
$userid=$_POST['userid'];
$conn= mysqli_connect("localhost","root","yasir123123","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  mysqli_query($conn,"use CouponAdda;");
        $code =  $_POST['code'];
        $expirydate = $_POST['date'];
        $desc =  $_POST['description'];
        $price = $_POST['price'];
        $com = $_POST['company'];
         $logo = $_POST['logo'];
         $avai='available';
        if($com=="-1" && $logo=""){
            echo "Incomplete details";
        }
        else {
         // Performing insert query execution
        // here our table name is college
       
       $sql = "INSERT INTO coupons  VALUES ('$code', '$expirydate', '$desc', '$price', '$userid', 0)";
       $sql1="select * from wallet where userid='$userid'";
       $result=mysqli_query($conn,$sql1);
       $row=mysqli_fetch_array($result);
       if($row['walletmoney']-$price>=$row['securitymoney'])
       {
        mysqli_query($conn,"update wallet set securitymoney=securitymoney+'$price' where userid='$userid'");
        if(mysqli_query($conn, $sql)){
            echo "<h1>Your coupon has been stored in our database.</h1>";
                ?>
                <script>
                    setInterval(() => {
                        ;
                    }, 5000);
                </script>
                <form name='forward' action="index.php" method="post" id="forward1">
                    <input type="hidden" name="userid" value='<?php echo $userid?>'>
                    <!-- <input sytle="display:none;" type="submit" value="submit"> -->
                    </form>
                    <script>
                        document.forward.submit();
                        </script>
                <?php
         } else{
            echo "ERROR: Hush! Sorry $sql. "
               . mysqli_error($conn);
         }
       }
       else
       {
        ?>
        <div class="invoice">
            <p>Insufficient Balance!!!</p>
            Current Balance:<?php echo $row['walletmoney'];?><br>
                Price Of Coupon:<?php echo $price;?><br>
                Remaining amount after purchase:<?php echo $row['walletmoney']-$price;?><br>
                Safety Money Minimum Balance Constraint:<?php echo $row['securitymoney'];?><br>
            <p>Please Recharge your wallet</p>
            <form action="sell.php" method="post">
            <input type="hidden" name="userid" value='<?php echo $userid?>'>
            <input type="hidden" name="code" value='<?php echo $code?>'>
            <input type="hidden" name="date" value='<?php echo $expirydate?>'>
            <input type="hidden" name="description" value='<?php echo $desc?>'>
            <input type="hidden" name="price" value='<?php echo $price?>'>
            <input type="hidden" name="company" value='<?php echo $com?>'>
            <input type="hidden" name="logo" value='<?php echo $logo?>'>
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

            <form name='forward' action="sell.php" method="post" id="forward1">
            <input type="hidden" name="userid" value='<?php echo $userid?>'>
            <input type="hidden" name="code" value='<?php echo $code?>'>
            <input type="hidden" name="date" value='<?php echo $expirydate?>'>
            <input type="hidden" name="description" value='<?php echo $desc?>'>
            <input type="hidden" name="price" value='<?php echo $price?>'>
            <input type="hidden" name="company" value='<?php echo $com?>'>
            <input type="hidden" name="logo" value='<?php echo $logo?>'>
            <!-- <input sytle="display:none;" type="submit" value="submit"> -->
            </form>
            <script>
                document.forward.submit();
            </script>
            <?php
            header("Refresh:0");
        }
       }
    }
       ?>
