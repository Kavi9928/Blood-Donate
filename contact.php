<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>NAWALOKA Blood Bank</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="https://img.icons8.com/emoji/48/drop-of-blood-emoji.png" type="image/png">
<style>
    /* General styles */
.agileits-contact {
    padding: 2rem;
    background-color: #f5f5f5;
}

.w3ls-titles {
    margin-bottom: 3rem;
}

.title {
    font-size: 2rem;
    color: #333;
}

.title span {
    display: block;
    margin: 0 auto;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 2rem;
    background-color: #007bff;
    color: #fff;
    border-radius: 50%;
}

.title p {
    color: #666;
}

/* Contact form styles */
.contact-right-w3l {
    background-color: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.title-w3 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.grid-inputs {
    flex: 1;
    margin-right: 1rem;
}

textarea.form-control {
    resize: vertical;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 0.75rem 1.5rem;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Center the form */
.py-xl-5 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Adjust according to your needs */
}

.contact-right-w3l {
    max-width: 500px; /* Adjust width as needed */
    width: 100%;
}
footer {
    background-color: #f8f9fa; /* Light grey background for the footer */
    padding: 20px; /* Padding around the footer content */
    text-align: center; /* Center-align the text */
    font-family: Arial, sans-serif; /* Font for the footer text */
    border-top: 1px solid #e7e7e7; /* Light border at the top */
}

footer a {
    color: #007bff; /* Link color */
    text-decoration: none; /* Remove underline from links */
    margin: 0 10px; /* Margin between links */
    font-size: 16px; /* Font size for links */
}

footer a:hover {
    text-decoration: underline; /* Underline on hover */
}

footer p {
    margin-top: 15px; /* Space above the paragraph */
    color: #6c757d; /* Grey color for the text */
    font-size: 14px; /* Font size for the text */
}

    </style>

</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>NAWALOKA</span>Hospital</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="index.php" data-after="Home">Home</a></li>

            <li><a href="searchdonor.php" data-after="Projects">Search Donor</a></li>
            <li><a href="about.php" data-after="About">About Us</a></li>
            <li><a href="contact.php" data-after="Contact">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
  <div class="agileits-contact py-5">
		<div class="py-xl-5 py-lg-3">
			
			<div class="d-flex">
				<div class="col-lg-5 w3_agileits-contact-left">
				</div>
				<div class="col-lg-7 contact-right-w3l">
					<h5 class="title-w3 text-center mb-5">Write To Us</h5>
					<form action="#" method="post">
						<div class="d-flex space-d-flex">
							<div class="form-group grid-inputs">
								 <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name.">
							</div>
							<div class="form-group grid-inputs">
								<input type="tel" class="form-control" id="phone" name="contactno"  placeholder="Please enter your phone number.">
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" required placeholder="Please enter your email address.">
						</div>
						

						<div class="form-group">
							<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Please enter your message" maxlength="999" style="resize:none"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" name="send">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "donate"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL query to insert form data into database
    $sql = "INSERT INTO contact (fullname, contactno, email, message) VALUES ('$fullname', '$contactno', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful');
        window.location.href = 'contact.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<footer>
    <a href="">
      Contact Us - 0112 333 333
    </a>|
    <a href="">
      Email Us - nawalokabloodbank@gmail.com
    </a>|
    <a href="">
      Location - Colombo 06
    </a>
 
    <p>NAWALOKA HospitalBlood Bank</p>
  </footer>
</body>
</html>
