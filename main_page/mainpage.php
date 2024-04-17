<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <link rel="stylesheet" href="mainpage.css">
</head>
<body>
  <header>
    <div class="main-top">
      <div class="company_logo">
        <a href="cl.png"><img class="cl" src="cl-removebg-preview.png" alt=""></a>
      </div>
      <div class="top">
        <div class="home"><a href="http://127.0.0.1:5500/landing%20page/landing-page.html">home</a></div>
        <div class="help"><a href="#">help</a></div>
        <div class="about_us"><a href="#">about-us</a></div>
        <div class="profile"><a href="pfp.jpg"><img class="pfp" src="pfp.jpg" alt=""></a></div>
      </div>
    </div>
  </header>
  <main>
    <div class="left">
      <img class="imgl" src="mainleft.png" alt="">
    </div>
    
  </main>
  <footer>
    <div class="buttonl">
      <button id="liveCrowdButton" type="button" class="btnl">live crowd</button>
    </div>
  </footer>

  <script>
    document.getElementById("liveCrowdButton").addEventListener("click", function() {
      var liveCrowdLink = "http://localhost/1234-main/finale/finale.php";
      window.location.href = liveCrowdLink;
    });
  </script>

  <?php
  // PHP code to connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crowd_controldb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    // Display an error message without throwing an exception
    echo "<p>Failed to connect to the database: " . $conn->connect_error . "</p>";
  } else {
  
    // Other database operations can go here
  }

  // Close connection
  $conn->close();
  ?>
</body>
</html>
