<?php
include('partials/_nav.php');

$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("partials/_dbconnect.php");
  $Name = $_POST["Name"];
  $Email = $_POST["Email"];
  $Passwrd = $_POST["Passwrd"];
  $CPasswrd = $_POST["CPasswrd"];

  $existSql = "SELECT * from users where Email='$Email'";
  $result = mysqli_query($conn, $existSql);
  if (mysqli_num_rows($result) > 0) {
    $showError = "This Email is already Registered.";
  } else {
    if ($Passwrd == $CPasswrd) {
      $sql = "INSERT INTO users (`Name`, `Email`, `Passwrd`, `dt`) VALUES ('$Name', '$Email', '$Passwrd', current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if ($result == true) {
        $showAlert = true;
      }
    } else {
      $showError = "Entered Passwords do not match.";
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="styles/signup.css">
</head>

<body>
  <?php
  if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Registration successful!</strong> You should be able to login now...
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>

  <?php
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

  <div class="d-flex flex-row justify-content-center">
    <div class="container1">
      <h1 class="h3 fw-normal mb-3">Sign Up</h1>
      <div class="d-flex flex-row justify-content-center">
        <form id="Form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="form-group">
            <label for="signupName">Full Name:</label>
            <input type="text" maxlength="50" id="Name" name="Name" required>
          </div>
          <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" required>
          </div>
          <div class="form-group">
            <label for="Passwrd">Password:</label>
            <input type="password" maxlength="50" id="Passwrd" name="Passwrd" required>
          </div>
          <div class="form-group">
            <label for="CPasswrd">Confirm Password:</label>
            <input type="password" maxlength="50" id="CPasswrd" name="CPasswrd" required>
          </div>
          <div class="form-group d-flex flex-row justify-content-center">
            <input class="btn btn-primary" type="submit" value="Sign Up">
          </div>
        </form>
      </div>
      <div class="d-flex flex-row justify-content-center">
        <div class="switch-link">
          <p>Already have an account? <a href="login.php">Login now!</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
