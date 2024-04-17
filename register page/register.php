<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $fullName = $_POST["fullName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";

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

    // Check if the username already exists
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
        exit(); // Stop further execution
    }

    // SQL query to insert user data into the database
    $insert_user_sql = "INSERT INTO users (fullName, username, email, phoneNumber, gender) 
            VALUES ('$fullName', '$username', '$email', '$phoneNumber', '$gender')";

    if ($conn->query($insert_user_sql) === TRUE) {
        // Insert username and password into credentials table
        $insert_credentials_sql = "INSERT INTO credentials (username, password) 
                                   VALUES ('$username', '$password')";
        if ($conn->query($insert_credentials_sql) === TRUE) {
            // Redirect user to the login page after successful registration
            header("http://localhost/1234-main/website-login-page/loginpage/loginpage.php#");
            exit(); // Stop further execution
        } else {
            echo "Error inserting credentials: " . $conn->error;
        }
    } else {
        echo "Error inserting user: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Responsive Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="register.css" />
  <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      if (password != confirmPassword) {
        alert("Passwords do not match!");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
<header>
  <div class="main-top">
    <div class="company_logo"> <a href="@"><img src="compny logo.jpg" alt=""></a></div>
    <div class="top">
      <div class="login"><a href="@">login</a></div>
      <div class="help"><a href="@">help</a></div>
      <div class="about_us"><a href="@">about-us</a></div>
      <div class="profile"><a href=""> <img  class ="pfp" src="pfp.jpg" alt=""></a></div>
    </div>
  </div>
</header>
<div class="container">
  <h1 class="form-title">Registration</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
    <div class="main-user-info">
      <div class="user-input-box">
        <label for="fullName">Full Name</label>
        <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" required />
      </div>
      <div class="user-input-box">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required />
      </div>
      <div class="user-input-box">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required />
      </div>
      <div class="user-input-box">
        <label for="phoneNumber">Phone Number</label>
        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" required />
      </div>
      <div class="user-input-box">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required />
      </div>
      <div class="user-input-box">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required />
      </div>
    </div>
    <div class="gender-details-box">
      <span class="gender-title">Gender</span>
      <div class="gender-category">
        <input type="radio" name="gender" id="male" value="Male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="Female">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="other" value="Other">
        <label for="other">Other</label>
      </div>
    </div>
    <div class="form-submit-btn">
      <input type="submit" value="Register">
    </div>
  </form>
</div>
</body>
</html>
