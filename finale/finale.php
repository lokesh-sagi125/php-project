<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mall Information</title>
<link rel="stylesheet" href="finale.css">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">

<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; padding: 20px;">

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crowd_controldb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch mall information from the database
    $sql = "SELECT * FROM malls";
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result && $result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div style="border: 2px solid #ddd; border-radius: 10px; overflow: hidden;">';
            echo '<div style="position: relative; overflow: hidden;">';
            echo '<img src="' . $row["image_path"] . '" alt="' . $row["mall_name"] . '" style="max-width: 100%; height: auto; display: block; transition: transform 0.3s ease;">';
            echo '</div>';
            echo '<div style="padding: 20px;">';
            echo '<h2 style="margin-top: 0;">' . $row["mall_name"] . '</h2>';
            echo '<p style="margin: 5px 0;">Rating: ' . $row["rating"] . '/5</p>';
            echo '<p style="margin: 5px 0;"><a href="' . $row["google_maps_link"] . '" style="text-decoration: none; color: #ffffff;">Google Maps</a></p>';
            echo '<p style="margin: 5px 0;"><a href="' . $row["contact_info_link"] . '" style="text-decoration: none; color: rgb(247, 247, 250);">Contact Info</a></p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    
    // Close connection
    $conn->close();
    ?>

</div>

</body>
</html>
