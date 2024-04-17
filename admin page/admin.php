<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mall Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Mall Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="mall_name">Mall Name:</label>
            <input type="text" id="mall_name" name="mall_name" required><br><br>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="0" max="5" step="0.1" required><br><br>

            <label for="image_path">Image Path:</label>
            <input type="text" id="image_path" name="image_path" required><br><br>

            <label for="google_maps_link">Google Maps Link:</label>
            <input type="text" id="google_maps_link" name="google_maps_link" required><br><br>

            <label for="contact_info_link">Contact Info Link:</label>
            <input type="text" id="contact_info_link" name="contact_info_link" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crowd_controldb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetching form data
        $mall_name = $_POST['mall_name'];
        $rating = $_POST['rating'];
        $image_path = $_POST['image_path'];
        $google_maps_link = $_POST['google_maps_link'];
        $contact_info_link = $_POST['contact_info_link'];

        // SQL query to insert mall information into the database
        $sql = "INSERT INTO malls (mall_name, rating, image_path, google_maps_link, contact_info_link)
                VALUES ('$mall_name', $rating, '$image_path', '$google_maps_link', '$contact_info_link')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Mall information added successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
