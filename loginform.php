<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <title>Login</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2 class="mt-5 pt-5" style="text-align:center;">Login as Student</h2>
    <div class="container">
    <form class="form-group" method="POST" action="login.php">
        <label>App ID:</label>
        <input class="form-control" type="text" name="app_id" placeholder="Enter your application id" required><br><br>
        <label>Password:</label>
        <input class="form-control" type="password" name="password" placeholder="Enter your password" required><br><br>
        <input class="btn btn-primary ml-5 pl-5" style="" type="submit" value="Login">
    </form>
</div>
</body>
</html>
