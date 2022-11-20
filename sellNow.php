<?php
$conn= mysqli_connect("localhost","root","yasir123123","CouponAdda");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  //mysqli_query($conn,"use CodeAdda;");
  $sql="select * from company;";
  $result=mysqli_query($conn,$sql);
  if(!$result){
    echo "erraaaor".mysqli_error(mysqli_query($conn, $sql));
  }
  $userid=$_POST['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Form</title>
</head>

<body>
    <h1 class="heading">Upload your coupons here</h1>
    <div class="Form">
        <form name="myform" onsubmit="return validateForm()" method="post" action="sell.php">
            <pre>Coupon Code:   <input type="text" id="code" name="code" placeholder="enter coupon code here" size="50" required></pre>
            <pre>Expiry Date:   <input type="datetime-local" id="date" name="date" required><br></pre>
            <pre>Description:</pre><textarea name="description" id="description"
                placeholder="details of the coupon including terms and conditions" required></textarea><br>
            <pre>Price:         <input type="number" name="price" id="price" placeholder="enter the price" min="1" required><br></pre>
            <pre>Select Company: <select name="company" id="company" onchange="removeOrAdd()">
                <option value="-1" selected onclick="firmShowDisplay()">others</option>
                <?php
                while($row=mysqli_fetch_array($result))
                {
                    $compname=$row['comname'];
                    
                ?>
                <option value="<?php echo $compname ?>" onclick="firmRemoveDisplay()"><?php echo $compname ?></option>
                <?php
                }
                ?>
            </select>
        </pre>
        <pre class="firmProperties">Company Name:    <input type="text" class="firmProperties" name="companyname" id="companyname"><br></pre>
            <input type="hidden" name="userid" value='<?php echo $userid?>'>
            <pre class="firmProperties">Pick company's logo:    <input type="file" class="firmProperties"name="logo" id="logo" accept="image/*"><br></pre>
            <div class="submitbutton"><input type="submit" value="Submit"></div>
        </form>
    </div>
    <script>
        function removeOrAdd()
        {
            if(document.myform.company.value==-1)
            {
                firmShowDisplay();
            }
            else
            firmRemoveDisplay();
        }
        function firmRemoveDisplay() {
            radio = document.querySelectorAll('.firmProperties');
            radio.forEach((item) => {
                item.style.display = "none";
            })
        }
        function firmShowDisplay() {
            radio = document.querySelectorAll('.firmProperties');
            radio.forEach((item) => {
                item.style.display = "block";
            })
        }
    </script>
</body>

</html>