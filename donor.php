<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NAWALOKA Blood Bank</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="https://img.icons8.com/emoji/48/drop-of-blood-emoji.png" type="image/png">


 

<style>
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(./img/banner1.jpg);
            background-size: cover;
            background-position: center;
        }

    .blood-donation-form {
        padding: 20px;
    }

    .blood-donation-form .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .blood-donation-form h5 {
        text-align: center;
        margin-bottom: 20px;
    }

    .blood-donation-form form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
</head>


<body>
<section class="blood-donation-form py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="login px-4 mx-auto mw-100">
            
            <form action="#" method="post" name="bloodDonationForm" onsubmit="return validateForm();">
            <h5 class="text-center mb-4">Blood Donation Registration</h5>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Age" required="">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Blood Group</label>
                    <select name="bloodgroup" class="form-control" required>
                        <option value="">Select</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" required="true" placeholder="Address">
                </div>
                <div class="form-group">

                <button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>
                
            </form>
        </div>
    </div>
</section>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "donate";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Form data retrieval
    $fullname = $_POST['fullname'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bloodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];


    // SQL query to insert data into the database
    $sql = "INSERT INTO donation (fullname, mobileno, email, age, gender, bloodgroup, address) VALUES ('$fullname', '$mobileno', '$email', '$age', '$gender', '$bloodgroup', '$address')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Registration successful');
	  window.location.href = 'index.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  ?>

<script>
    function validateForm() {
        // You can add custom validation logic here if needed
        return true; // Returning true for now, you can change it according to your validation logic
    }
</script>

</body>
</html>












  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>