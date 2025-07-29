<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kashmir Govt Polytechnic Srg</title>
  <link rel="stylesheet" href="bootstrap.css">
  <style>
    .blur {
        background-image: url("imgs/back.jpg");
        background-size: cover;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        filter: blur(4px); /* Adjust the blur radius as needed */
        z-index: -1;
    }
  </style>
</head>
<body>
<div class="blur"></div>
  <?php include "header_wel.php"; ?>
  <div class="container mt-5 pt-5 mb-1">
    <div class="row mt-5">
        <h2 class="text-info" style="text-align: center;">Welcome to seat allocation system </h2>
    </div>
    <div class="row mt-5 pt-5">
      <div class="col-md-4">
        <a href="form.php" class="btn btn-primary btn-lg btn-block">Register as student</a>
      </div>
      <div class="col-md-4">
        <a href="loginformsession.php" class="btn btn-primary btn-lg btn-block">ALready Registered? Login Here</a>
      </div>

      <div class="col-md-4">
        <a href="adminfiles/adminlogin.php" class="btn btn-success btn-lg btn-block">Login As Admin</a>
      </div>
    </div>

<footer class="footer mb-3 fixed-bottom justify-content-center float-bottom border border-primary rounded-3 text-white bg-info bg-opacity-10">
    <div class="row align-items-end">
        <h4 style="text-align: center;">Designed by Students of KGP department of Computer Engineering</h4>
    </div>
  </footer>
</div>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
