<?php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["pswd"]);

    // SQL query to retrieve user data based on email and password
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, perform further actions
        while($row = $result->fetch_assoc()) {
            // You can access user data from $row["column_name"]
            echo "User found with email: " . $row["email"];

            // Display JavaScript alert for successful login with redirection
            echo "<script>
                    alert('Login successful!');
                    window.location.href = 'donor.php';
                  </script>";
        }
    } else {
        // No user found with provided credentials
        echo "Invalid email or password.";
    }
}

// Close connection
$conn->close();

?>
