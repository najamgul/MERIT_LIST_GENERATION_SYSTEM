<head>
    <link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<div class="container mt-2">
<nav class="navbar navbar-expand-lg navbar-light justify-content-center bg-primary bg-opacity-25 border border-2 border-primary rounded-3">
    <div class="row">
    <div class="col-2 mt-3">
        <a href="index.php">
    <button class="btn btn-lg border border-1 border-success bg-success bg-opacity-10"><i class="bi bi-house-door"></i>HOME</button></a>
    </div>
    <div class="col-8">
    <h1 style="text-align: center;">Kashmir Govt Polytechnic College Srinagar</h1>
    </div>
    <div class="col-2 mt-3">
    <?php
session_start();

// Check if the user clicked the logout button
if (isset($_POST['logout'])) {
    // Destroy the session and unset all session variables
    session_destroy();
    session_unset();
  
    // Redirect the user to a desired page after logout
    header('Location: index.php');
    exit();
}
?>
<!-- Logout Button -->
<form action="" method="POST">
    <button class="btn btn-lg border border-danger bg-danger bg-opacity-10 " type="submit" name="logout"><i class="bi bi-box-arrow-right"></i>Logout</button>
</form>

</nav>
</div>
