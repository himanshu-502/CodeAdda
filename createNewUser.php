<?php
$conn= mysqli_connect("localhost","root","yasir123123","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  mysqli_query($conn,"use CouponAdda;");
        $userid =  $_POST['userid'];
        $password = $_POST['password'];
        $name =  $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $isfirm=$_POST['firm'];
        $gstin=$_POST['GSTIN'];
        $logo=$_POST['LOGO'];
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO user  VALUES ('$name','$phone','$userid',
            '$password','$email','$isfirm')";
        $sql1="INSERT INTO firms VALUES ('$userid','$name','$gstin','$logo')";
        $sql2="INSERT INTO wallet VALUES ('$userid',0,0)";
        if(mysqli_query($conn, $sql)&&mysqli_query($conn, $sql2)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
            if($isfirm)
            {
                if(mysqli_query($conn,$sql1))
                echo "FIRM DATA ALSO STORED";
            }
            header("Location:sign-in-form.php");    

        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
?>