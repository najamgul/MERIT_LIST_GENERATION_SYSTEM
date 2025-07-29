<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <div class="container">
        <?php include "header_wel.php"; ?>
        <h1>REGISTRATION</h1>
        
    
    <form method="POST" action="save_data.php">
        <h2>Student Form</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input class="form-control" type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Set Password</label>
            <input class="form-control" type="password" id="pass" name="pass" required>
        </div>
        <div class="form-group">
            <label for="phnumber">phone number:</label>
            <input class="form-control" type="number" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="select" selected disabled>select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dateofbirth">D.O.B:</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="category">Choose Category</label>
            <select class="form-control form-select" id="category" name="category" required>
                <option value="">select catogory</option>"
                <option value="OM">OM</option>
                <option value="RBA">RBA</option>
                <option value="SC">SC</option>
                <option value="ST">ST</option>
            </select>
        </div>
        <h2>educational Qualification</h2>
        <div class="row">
            <div class="col-lg-3">
        <div class="form-group">
            <label for="max marks">Max Marks</label>
            <input class="form-control" type="number" id="max" name="max">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="form-group">
            <label for="marks obtained">obtained Marks</label>
            <input class="form-control" type="number" id="obtained" name="obtained">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="passing year">passing year</label>
            <input class="form-control" type="number" id="passingyear" name="passyear">
        </div>
    </div>
    <div class="col-lg-3">

        <div class="form-group">
            <label for="Percentage" class="label-control">Percentage</label>
            <input class="form-control" type="text" id="percent" name="percent" readonly>
        </div>
    </div>
</div>
<h2>Communication Address</h2>
<div class="row">
    <div class="col-12">
<div class="form-group">
    <label for="name">full Address</label>
    <input class="form-control" type="text" id="address" name="address" required>
</div>
</div>
<div class="col-6">
    <div class="form-group">
        <label for="name">Pin Code</label>
        <input class="form-control" type="text" id="name" name="pincode" required>
    </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="name">District</label>
            <input class="form-control" type="text" id="name" name="district" required>
        </div>
    </div>
</div>

<div class="col-12">
<div class="form-group">
    
    <div class="d-grid gap-2 mt-5 mb-5"> <button class="btn btn-primary border border-success" type="submit">Submit</button>
</div>
</div>
</div>
</form>
</div>
<script>
  // Get references to the input fields
  const totalMarksInput = document.getElementById('max');
  const obtainedMarksInput = document.getElementById('obtained');
  const percentageInput = document.getElementById('percent');

  // Calculate the percentage and update the input field
  function calculatePercentage() {
    const totalMarks = parseFloat(totalMarksInput.value);
    const obtainedMarks = parseFloat(obtainedMarksInput.value);

    if (isNaN(totalMarks) || isNaN(obtainedMarks)) {
        percentageInput.value = '';
        // Handle invalid input
    } else {
      const percentage = (obtainedMarks / totalMarks) * 100;
      percentageInput.value = percentage.toFixed(2);
    }
  }

  // Attach event listeners to input fields
  totalMarksInput.addEventListener('input', calculatePercentage);
  obtainedMarksInput.addEventListener('input', calculatePercentage);
</script>
</body>
</html>
