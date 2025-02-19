<?php
// MySQL database connection configuration
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "donate"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userName = $_POST['txt'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['pswd'];

    // Sanitize input to prevent SQL injection (not implemented here for simplicity)

    // Insert data into the database
    $sql = "INSERT INTO users (username, email, telephone, password)
            VALUES ('$userName', '$email', '$telephone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful');
        window.location.href = 'signup.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
