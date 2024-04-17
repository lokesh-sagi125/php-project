
<?php
// Initialize variables to store user input
$username = $password = "";
// Initialize variable to store error messages
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Add your database connection code here
    // Replace the following placeholders with your actual database credentials
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "crowd_controldb";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if the username and password exist in the database
    $sql = "SELECT * FROM credentials WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect user to the main page if authentication is successful
        header("http://127.0.0.1:5500/main_page/mainpage.html");
        exit(); // Stop further execution
    } else {
        // Display error message if authentication fails
        $error = "Invalid username or password";
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="loginpage.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <header>
    <div class="main-top">
      <div class="company_logo"> <a href="cl.png"><img src="cl-removebg-preview.png" alt=""></a></div>
      <div class="top">
        <div class="home"><a href="http://127.0.0.1:5500/landing%20page/landing-page.html">home</a></div>
        <div class="help"><a href="@">help</a></div>
        <div class="about_us"><a href="@">about-us</a></div>
        <div class="profile"><a href="pfp.jpg"> <img  class ="pfp" src="pfp.jpg" alt=""></a></div>
      </div>
    </div>
  </header>
  <hr>
  <div class="wrapper">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <!-- Display error message if authentication fails -->
      <p><?php echo $error; ?></p>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="http://localhost/1234-main/register%20page/register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>


