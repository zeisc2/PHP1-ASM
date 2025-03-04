<!DOCTYPE html>
<html lang="en">
  <head>
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Contact</title>
      <link rel="stylesheet" href="style.css">
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      />
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet"
      />
      <script
        src="https://kit.fontawesome.com/4dd88e3847.js"
        crossorigin="anonymous"
      ></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <a style="text-decoration: none" href="index.html"
            ><span class="bis">TB</span><span class="lite">Chuong</span></a
          >
        </div>
        <nav>
          <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li class="dropdown">
              <a href="#">SERVICES <i class="fa-solid fa-chevron-down"></i></a>
              <div class="dropdown-content1">
                <a href="#">Web design</a>
                <a href="#">Wordpress Design</a>
                <a href="#">Mobile App Development</a>
                <a href="#">Internet Marketing</a>
                <a href="#">Social Media Management</a>
              </div>
            </li>
            <li class="dropdown">
              <a href="portfolio.html">PORTFOLIO <i class="fa-solid fa-chevron-down"></i></a>
              <div class="dropdown-content">
                <a href="#">Websites</a>
                <a href="#">Wordpress</a>
                <a href="#">Mobile Apps</a>
                <a href="#">Icons</a>
                <a href="#">Logos</a>
                <a href="#">Graphics</a>
                <a href="#">Social Media Management</a>
              </div>
            </li>
            <li><a href="blog.html">BLOG</a></li>

            <li><a href="contact.php
            ">CONTACT US</a></li>
            <li><a href="register.html">ACCOUNT</a></li>
          </ul>
        </nav>
      </div>
    </header>


    <!-- main -->
    <main>
        <br> 
      <div class="parent">
        <div class="mouse">
          <p>
            <img width="30px" ; height="30px" src="img/imgEmail.jpg" alt="" />
            CONTACT US
          </p>
        </div>
      </div>
      <div class="send-email">
        <p>
          Thank you for stopping by. Please use the form below to contact us and
          will get back to you at the earliest possible
        </p>
        <p>
            For feedback or questions, please email us at: <a href="#">email@TBChuong.com</a>
        </p>
      </div>
      <br>
      <form action="">
         
            <label for="fname"><strong>Name:</strong></label><br>
            <input type="text" id="name" required><br><br>

            <label for="Email"><strong>Email:</strong></label><br>
            <input type="email" id="email" required <br><br><br>
            <p class="capslock" hidden><i class="fa-solid fa-triangle-exclamation" id="email"></i>  Caps Lock is ON</p>

            <label for="Email" required><Strong>Your site (URL):</Strong></label><br>
            <input type="url" required <br><br><br>

            <label for"Description" required><strong>Your Birthday:</strong></label><br>
            <input type="date" required <br><br><br>

            <label for"Description" required><strong>Your Problem:</strong></label><br>
            <input type="file" required <br><br><br>


            <label for"Phone" required><strong>Description:</strong></label><br>
            <textarea required></textarea> <br> 

           
            <button class="btnsubmit" type="submit">Subbmit</button>
          
      </form>  <br>
      <h2 style="text-align: center;">
        We are here
    </h2>
      <div id="map"></div>
    </div>

    <script>
        function initMap() {
            var mapOptions = {
                center: new google.maps.LatLng(12.7471, 108.3631), 
                zoom: 10
            };
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI9kPkskayYti5ttrZL_UfBlL3OkMEbvs&callback=initMap" async defer></script>
    <div class="address">
        <br>
        <h3>OFFICE ADDRESS</h3>
        <p>
            <strong>BisLite Inc.</strong><br>
            Always Street 265<br>
            Fransico - San Fransico<br><br>
            <strong>Phone</strong>: 987-6543-210<br>
            <strong>Fax</strong>: 987-6543-210<br>
        </p>
    </div>
</main>
<br>

    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h5>ABOUT US</h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
              euismod placerat dui et tincidunt. Sed sollicitudin posuere
              auctor. Phasellus at ultricies nisl. Integer at leo eros. Ut nec
              lorem id orci convallis porta. Donec pharetra neque eu velit
              dictum molestie.
            </p>
          </div>
          <div class="col-md-2">
            <h5>EXPLORE</h5>
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h5>BROWSE</h5>
            <ul class="list-unstyled">
              <li><a href="#">Careers</a></li>
              <li><a href="#">Press & Media</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Terms Of Service</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>CONTACT US</h5>
            <p>BisLite Inc.<br />Always Street 265<br />0X - 125 - Canada</p>
            <p>Phone: 987-6543-210<br />Fax: 987-6543-210</p>
          </div>
          <div class="col-md-2">
            <h5>CONNECT WITH US</h5>
            <div class="social-icons">
              <a href="#"
                ><img
                  width="25%"
                  ;
                  height="25%"
                  src="img/imageFacebook.png"
                  alt="Facebook"
                />
                Facebook</a
              ><br /><br />
              <a href="#"
                ><img
                  width="25%"
                  ;
                  height="25%"
                  src="img/imgLinkedin.avif"
                  alt="LinkedIn"
                />
                LinkedIn</a
              ><br /><br />
              <a href="#"
                ><img
                  width="25%"
                  ;
                  height="25%"
                  src="img/imgPinterest.jpg"
                  alt="Pinterest"
                />
                Pinterest</a
              ><br /><br />
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="bottom-text">
              © Copyright 2012 - BisLite Inc. All rights reserved. Some free
              icons used here are created by Brankic1979.com.<br />
              Client Logos are copyright and trademark of the respective owners
              / companies.
            </div>
          </div>
          <div class="col-md-6 text-center">
            <div class="logo">
              <a style="text-decoration: none" href="index.html">
                <span class="bis">TB</span><span class="lite">Chuong</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="scrip.js"></script>
  </body>
</html>
