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
            <li><a href="contact.php
            " data-after="Contact">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
  <body>
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
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .search-section {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .search-donor-form {
      padding: 20px;
      width: 400px;
      background-color: #f5f5f5; /* Light grey background */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h5 {
      text-align: center;
      margin-bottom: 20px;
      color: #333; /* Dark grey text */
    }

    form {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #555; /* Slightly darker grey text */
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .btn-primary {
      background-color: #007bff; /* Blue button */
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Darker blue on hover */
    }

    .search-results-box {
      margin-top: 20px;
      padding: 20px;
      width: 400px;
      background-color: #f5f5f5; /* Light grey background */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .search-results-box p {
      margin-bottom: 10px;
    }

    .donor-info {
      margin-bottom: 20px;
    }

    .clear-results button {
      margin-top: 20px;
      background-color: #dc3545; /* Red button */
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <section class="search-section">
    <div class="search-donor-form">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="searchDonorForm"
        onsubmit="return validateSearchForm();">
        <h5 class="text-center mb-4">Search Donor</h5>
        <div class="form-group">
          <label>Blood Group</label>
          <select name="search_bloodgroup" class="form-control" required>
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
          <button type="submit" class="btn btn-primary submit mb-4" name="search">Search</button>
        </div>
      </form>
    </div>
    
    <!-- Search Results Box -->
    <div class="search-results-box">
      <?php
      // Database connection
      $servername = "localhost";
      $username = "root"; // Replace with your database username
      $password = ""; // Replace with your database password
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

      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        // Retrieve blood group from form input
        $search_bloodgroup = sanitize_input($_POST['search_bloodgroup']);

        // SQL query to search for donors with matching blood group
        $search_sql = "SELECT * FROM donation WHERE bloodgroup='$search_bloodgroup'";

        // Execute the query
        $result = $conn->query($search_sql);

        if ($result->num_rows > 0) {
          echo '<div class="result-box">';
          while ($row = $result->fetch_assoc()) {
            echo "<div class='donor-info'>";
            echo "<p>Name: " . $row["fullname"] . "<br> Mobile No: " . $row["mobileno"] . "<br> Blood Group: " . $row["bloodgroup"] . "</p>";
            // Add request button/form here
            echo "<form action='request_donation.php' method='post'>";
            echo "<input type='hidden' name='donor_id' value='" . $row["id"] . "'>";
            echo "<button type='submit' class='btn btn-primary' name='request_donation'>Request Donation</button>";
            echo "</form>";
            echo "</div>";
          }
          echo '</div>';
        } else {
          echo "<p>No donors found for the selected blood group.</p>";
        }
      }

      // Close the database connection
      $conn->close();
      ?>
    </div>

    <!-- Clear search results button -->
    <div class="clear-results">
      <button onclick="clearSearchResults()">Clear Results</button>
    </div>
  </section>

  <script>
    // Function to clear search results
    function clearSearchResults() {
      // Clear the content of the search results box
      document.querySelector('.search-results-box').innerHTML = '';
    }
  </script>

</body>

</html>