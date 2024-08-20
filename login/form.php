<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/RCNHSLOGO.jpg">


  <title>RCNHS</title>


  <?php session_start(); ?>
  <?php
  if (isset($_SESSION["userRoleId"])) {
    header('location: ../admin/index.php');
    exit();
  }

  ?>

</head>

<body>


  <div class="half">
    <div class="contents order-2 order-md-1" style="">
      <div class="container">
        <div class="row align-items-center justify-content-center mt-5">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-4">
                <a href="../index.php">
                  <img src="../assets/images/rcs.png" alt="Logo" class="rounded-circle" width="100">
                </a>
              </div>
              <div class="text-center mb-5">
                <h3 class="text-dark font-bold">FACULTY LOGIN</h3>
              </div>
              <form action="#" method="post">

                <!-- <select name="user_type" id="user_type">
                  <option value="">Select User Type</option>
                  <option value="0">Student</option>
                  <option value="1">Teacher/Admin</option>
                </select> -->
                <div class="form-group first">
                  <h5>Username or Email</h5>
                  <input type="text" class="form-control" placeholder="Enter username or email" id="user_username"
                    name="user_username">
                </div>
                <div class="form-group last mb-3">
                  <h5>Password</h5>
                  <input type="password" class="form-control" placeholder="Enter password" id="user_password"
                    name="user_password">

                </div>
                <div class="text-center mt-3">
                  <p class="text-danger" id="countdown-timer"></p>
                </div>
              </form>
              <!-- <a class="text-muted float-right mx-1" href="password-reset.php">
                Forget Password
              </a> -->
              <button id="loginUser" class="btn btn-success mx-auto mt-5 d-block">LOGIN</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script type="module" src="authentication/auth.js"></script>
</body>

</html>