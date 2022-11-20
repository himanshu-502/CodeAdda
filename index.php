<?php
$conn= mysqli_connect("localhost","root","yasir123123","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";
  $userid=$_POST['userid'];
  mysqli_query($conn,"use CouponAdda;");
  $tables=mysqli_query($conn,"select code,description,price,soldby from coupons;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="./css/sidenav.css">
    <link rel="stylesheet" href="./css/searchBar.css">
    <link rel="stylesheet" href="./css/card.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/button.css">
</head>
<body>

    <!-- Side Navigation Bar -->
    <div id="mySidenav" style="z-index:11;" class="sidenav">
        <a href="javascript:void(0)"  class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
        
      </div>
      


          <!-- NAVBAR -->
    <nav class="navbar">
        <h2 class="navbar-logo"><a href="#">CouponAdda</a></h2>
        <div class="navbar-menu">
            <a href="#jobs">Companies</a>
            <a href="#companies">Partners</a>
            <a href="#blog">About Us</a>
            <a href="#">Contact Us</a>
            <form action="sellNow.php" method="post">
                <input type="hidden" name="userid" value='<?php echo $userid;?>'>
                <input type="submit" class="button1" value="Sell Now">
              </form>
            <span style="position:relative;top:-5px;font-size:20px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <br>

    <!-- Header -->
    <header>
        <h1 class="header-title">
            FIND YOUR<br><span>PERFECT COUPON</span><br>HERE
        </h1>
    </header>


          <!-- search -->
    <div class="search-wrapper">
        <div class="search-box">
            
                <form id="search-bar-form" action="#" class="search-card">
                    <input class="search-input" type="text" placeholder="Job title or keywords">
                    <input  type="submit" class="search-button" value="Search">
                </form>
        </div>
    </div>

    <div class="flexContainer">
      <?php
        while($row=mysqli_fetch_array($tables,MYSQLI_ASSOC))
        {

      ?>
          <div class="card">
              <img src="./img/KFC.png" alt="Avatar" style="width:100%">
              <div class="container">
                <h4><b><?php echo $row['soldby'];?></b></h4> 
                <p><?php echo $row['description'];?></p> 
                <p>Price:<?php echo $row['price'];?></p>
              </div>
              <!-- <button class="button2">Buy Now</button> -->
              <form action="buynow.php" method="post">
                <input type="hidden" name="userid" value='<?php echo $userid;?>'>
                <input type="hidden" name="coupon" value='<?php echo $row['code']?>'>
                <input type="submit" class="button2" value="Buy Now">
              </form>

          </div>
      <?php
        }
      ?>
    
    </div>
    </div>
    

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>