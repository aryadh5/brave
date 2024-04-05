<?php
// Place this at the top of your "forgot-password.php" file
session_start();

require 'function.php'; // Include your functions file

// Check if the form is submitted
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    // Validate the username (you can add more validation as needed)
    if (!empty($username)) {
        // Check if the username exists in the database
        $stmt = $koneksi->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // If the username exists, proceed with sending the reset link
            // You can implement the logic for sending the reset link here
            echo "<script>
                alert('Reset link sent to your email.');
            </script>";
        } else {
            // If username does not exist, show an error message
            echo "<script>
                alert('Username not found.');
            </script>";
        }
        $stmt->close();
    } else {
        // If username field is empty, show an error message
        echo "<script>
            alert('Please enter your username.');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brave ADV Lightbox</title>
    <!-- Add your CSS and other necessary links here -->
    <link href="assets/img/brave-icon.png" rel="icon">
    <link href="assets/img/brave-icon.png" rel="apple-touch-icon">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    #forgotpasswordpage {
        background: url("assets/img/bravera-logo.jpg") center;
        background-size: center; /* Adjusted to cover the entire container */
        background-repeat: no-repeat;
        padding-top: 5%;
        padding-bottom: 10%;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    #forgotpasswordpage::before {
        content: "";
        background-color: rgba(255, 255, 255, 0.8); /* Adjust opacity as needed */
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    #forgotpasswordform {
        padding: 20px;
        border-radius: 10px;
        position: relative;
        z-index: 1;
    }

    #forgotpasswordform input {
        margin-bottom: 10px;
        background-color: #FFD98D;
        color: black;
        border: 1px solid #000;
    }

    #forgotpasswordform button {
        width: 100%;
        background-color: #BCA37F;
        color: black;
        border: 1px solid #000;
    }
</style>

</head>
<body>

<section id="topbar" class="d-flex align-items-center">
<div class="contact-info d-flex align-items-center" style="margin-right: auto;">
    <img src="assets/img/bravera-logo.jpg" alt="Your Logo" height="40" style="margin-right: 40px; margin-left: 40px;">
    <span>
      <i class="bi"></i> Brave ADV Lightbox - Gunung Kidul - DIY
    </span>
  </div>
  <!-- Add the "LOGIN ADMIN" button with additional styling -->
  <button onclick="location.href='index.php'" class="btn btn-warning btn-sm" style="margin-right: 40px;">Halaman Utama</button>

      <!--
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      -->
  </section>

<section id="forgotpasswordpage" class="container text-center">
    <div class="row justify-content-center">
        <h1>Forgot Password</h1>
        <div class="col-lg-6" id="forgotpasswordform">
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="emaol" placeholder="Enter your email" required>
                </div>
                <button class="btn btn-dark" type="submit" name="submit">Reset Password</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>
