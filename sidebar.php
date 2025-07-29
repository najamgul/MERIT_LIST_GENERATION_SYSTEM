<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php session_start();
    ?>

<!-- Sidebar -->
<div class="container">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar mb-4 mt-5">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <!-- Add sidebar links here -->
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-10 mb-2" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-10 mb-2" href="profile.php">View Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-10 mb-2" href="seatalloc.php">seat allocation</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Header -->
            <div class="py-2 ml-5 mt-4 mb-4 border-bottom">
                <h2>Welcome to Dashboard</h2></div>
            <!-- Add dashboard content here -->
            <!-- For example, you can add charts, tables, or other widgets here -->

        </main>
        </div> 
</div>
        <footer class="footer mt-auto py-3">
    <div class="container bg-info bg-opacity-10 ">
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
        <span class="text-muted">Designed By @NaJam</span>
    </div></div>
</footer>
    
<!-- Include Bootstrap JS (jQuery is required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
