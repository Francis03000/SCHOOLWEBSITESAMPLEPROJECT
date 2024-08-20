<!doctype html>
<html lang="en">

<head>



  <title>RCNHS</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/RCNHSLOGO.jpg">

  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




  <?php
  session_start();
  if (!isset($_SESSION["userRoleId"])) {
    header('location: ../login/form.php');
    exit();
  }
  ?>


  <link rel="stylesheet" href="./blog/simplemde.min.css">

</head>



<body class="dark-edition">