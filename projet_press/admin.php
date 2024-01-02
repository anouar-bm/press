<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['type']) || $_SESSION['type'] !== 1) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IF-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>admin page</title>
    <link rel="shortcut icon" href="logo transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
</head>

<body>
  <div id="progress">
    <span id="progress-value">&#x1F815;</span>
  </div>

    <header>
      <h2 class="logo"><a href="home.html"><img src="logo transparent.png"></a></h2>
      <nav class="navigation">
          <a href="#about" id="active">about us</a>
          <a href="#teams">teams</a>
          <a href="#activities">activites</a>
            <button class="btnLogin-popup" onclick="window.location.href = 'index.html';">login</button>
        </nav>    
    </header>
    <section id="about">  

<!-- Intro with Block Image on Left-->
<div class="banner-wrap bg-white" style="padding-top: 100px;">
  <h5 id="about">About us</h5>
  <h1>Let me introduce myself.</h1>
  <div class="container">
      <div class="pmd-intro-container d-flex row justify-content-between">
          <div class="pmd-intro-img align-self-center col-md-5 col-12">
              <img src="logo transparent.png" style="width: 70px; height: 70px;">
          </div>
          <div class="align-self-center col-lg-6 col-md-7 col-12" style="padding-left: 20px; padding-top: 7px;" >
            
              <p class="lead">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis sint molestias corrupti est laborum ipsum possimus, error ipsam explicabo totam, magni esse ducimus repudiandae quisquam voluptatibus sequi eos dolore tempore.
              </p>
          </div>
      </div>
  </div>
</div>
    
<!-- /section-intro -->
<div class="title">
  <h1 id="teams" onclick="showMembers()">teams</h1>
  <div class="line"></div>
</div>
<div id="members">
      <div>
        <div class="rowarticle">
          <div class="col">  
          <img src="abdellatif.jpg" alt="abdellatif" style="width: auto; height: 200px;">
          <h4>abdellatif dbiri</h4>
          <ul class="social-icons" style="    list-style-type: none;         ">
            <li><a href="https://web.facebook.com/abdelatif.dbiri"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>     
          </ul>        </div>
        <div class="col">  
          <img src="montacir.jpg" alt="montacir"style="width: auto; height: 200px;">
          <h4>montacir razwan</h4>
          <ul class="social-icons" style="    list-style-type: none;         ">
            <li><a href="https://web.facebook.com/profile.php?id=100052255383307"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>     
          </ul>
        </div>
        <br>
        <div class="col">  
          <img src="jawad.jpg" alt="securite routiere" style="width: auto; height: 200px;">
          <h4>jawad bousta</h4>
          <ul class="social-icons" style="    list-style-type: none;         ">
            <li><a href="https://web.facebook.com/profile.php?id=100017373844366"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>     
          </ul>        </div>
        <div class="col">  
          <img src="meriem.jpg" alt="happy new year"style="width: auto; height: 200px;">
          <h4>meriem</h4>
          <ul class="social-icons" style="    list-style-type: none;         ">
            <li><a href="https://web.facebook.com/taoussi.mariem.1"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>     
          </ul>        </div>
        </div>      </div>
      
</div>

    <footer>
      <div class="row">
         <div class="column">
  
          <h4>Connect with Us</h4>
  
          <ul class="social-icons">
  
            <li><a href="https://shorturl.at/kmqEY"><i class="fa-brands fa-facebook-f"></i></a></li>

            <li><a href="https://shorturl.at/aCOXZ" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            
            <li><a href="https://wa.me/212661199130" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
  
            <li><a href="https://www.google.com/maps/search/El+Attaouia,+RM8R+R4P,+Laattaouia" target="_blank"><i class="fa-solid fa-location-dot"></i></a></li>
          </ul>
  
        </div>
  
      </div>
  
      <p class="copyright" >© 2023 All Rights Reserved</p>
  
    </footer>
    <script>
      function showMembers() {
          var membersDiv = document.getElementById("members");
          if (membersDiv.style.display === "none") {
              membersDiv.style.display = "block";
          } else {
              membersDiv.style.display = "none";
          }
      }
      let calcScrollValue = () => {
  let scrollProgress = document.getElementById("progress");
  let progressValue = document.getElementById("progress-value");
  let pos = document.documentElement.scrollTop;
  let calcHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  let scrollValue = Math.round((pos * 100) / calcHeight);
  if (pos > 100) {
    scrollProgress.style.display = "grid";
  } else {
    scrollProgress.style.display = "none";
  }
  scrollProgress.addEventListener("click", () => {
    document.documentElement.scrollTop = 0;
  });
  scrollProgress.style.background = `conic-gradient(#03cc65 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;
  </script>
      </body>
    </html>
    