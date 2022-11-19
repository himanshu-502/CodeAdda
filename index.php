<?php
$conn= mysqli_connect("localhost","root","yasir123123","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  mysqli_query($conn,"use employee;");
  $tables=mysqli_query($conn,"select * from dept;");

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="/css/sidenav.css">
    <link rel="stylesheet" href="/css/searchBar.css">
    <link rel="stylesheet" href="/css/card.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <!-- Side Navigation Bar -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


          <!-- NAVBAR -->
    <nav class="navbar">
        <h2 class="navbar-logo"><a href="#">CodeAdda</a></h2>
        <div class="navbar-menu">
            <a href="#jobs">Companies</a>
            <a href="#companies">Partners</a>
            <a href="#blog">About Us</a>
            <a href="#">Contact Us</a>

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
    <div class="card-container">

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <!-- <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div>

        <div class="card">
            <img src="/img/KFC.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Jane Doe</b></h4> 
              <p>Interior Designer</p> 
            </div>
        </div> -->
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