<?php
session_start();
if (!isset($_SESSION['user_email']) && !isset ($_SESSION['user_name'])) {
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
    <title>home page</title>
    <link rel="shortcut icon" href="logo transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
</head>

<body>
  <div id="progress">
    <span id="progress-value">&#x1F815;</span>
  </div>

    <header>
      <h2 class="logo"><a href="home.php"><img src="logo transparent.png"></a></h2>
      <nav class="navigation">
          <a href="#about" id="active">about us</a>
          <a href="#teams">teams</a>
          <a href="#activities">activites</a>
            <button class="btnLogin-popup" onclick="window.location.href = 'index.php';">login</button>
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

    <!--articles-->
<section class="activities">
  <div class="title">
    <h1 id="activities">activities</h1>
    <div class="line"></div>
  </div>
  <div class="rowarticle">
    <div class="col">  
    <h4>activité 1</h4>
    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid033hdQCFUzVRSmDbnU9ZsrZEDtdM27AeL5LyKAeSPjqp26Rqgx4c2xbroFXVYtTV6Tl%26id%3D100076059556424&width=350&show_text=true&height=656&appId" width="350" height="656" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    <a href="https://web.facebook.com/profile.php?id=100076059556424" class="ctn">Learn more</a>
  </div>

  <div class="col">  
    <h4>activité 2</h4>
    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0L3McYgWdarpVs8d2n7YZ56nBWZ16jmGcA4aWiZbvMPh6oqyNMtkrfNznqe5hiLUTl%26id%3D100076059556424&width=350&show_text=true&height=515&appId" width="350" height="515" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
       <a href="https://web.facebook.com/profile.php?id=100076059556424" class="ctn">Learn more</a>
  </div>
  <br>
  <div class="col">  
    <h4>activité 3</h4>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0nn2hZ8MTfSgDUDntd4KWSpzbAqXiqrHLPaPcm5RM5fnYDvoPdgVNQg31PW4XK9oil%26id%3D100076059556424&width=350&show_text=true&height=495&appId" width="350" height="495" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        <a href="https://web.facebook.com/profile.php?id=100076059556424" class="ctn">Learn more</a>
  </div>
</div>
<div class="rowarticle">
  <div class="col">  
    <h4>activité 4</h4>
    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid02jrrz7yNQBua87ryndUGNf9s6jt8axGroYaaa59yWsx7KKrCwEB6A8tN2VV6hXLZQl%26id%3D100076059556424&width=350&show_text=true&height=598&appId" width="350" height="598" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>  
      <a href="https://web.facebook.com/profile.php?id=100076059556424" class="ctn">Learn more</a>

  </div>
  <div class="col">  
    <h4>activité 5</h4>
    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid027gcHjMHbGDN4gqiW5te3FN2BGRhxsDKR4GL4rT8Y4rhHRbqbqemA6j2tE2TUgRUhl%26id%3D100076059556424&width=350&show_text=true&height=534&appId" width="350" height="534" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> 
    <a href="https://web.facebook.com/profile.php?id=100076059556424" class="ctn">Learn more</a> 
  </div>
  <br>
  <div class="col">  
    <h4>activité 6</h4>
    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid03L1QD389DNPpcrJsFTYsRdYjZtuDn3QDAY2q7mDVA2LpWuGbPBfTwQT3G4uJTDj5l%26id%3D100076059556424&width=350&show_text=true&height=495&appId" width="350" height="495" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>    
    <a href="https://web.facebook.com/profile.php?id=100076059556424" class="ctn">Learn more</a>
  </div>
</div>
</section>


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
    