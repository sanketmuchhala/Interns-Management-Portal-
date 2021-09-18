<?php
include_once('mail.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>internship Application</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/website.css">
</head>

<body>


  <div class="container mt-5 mycareer">
    <div class="row">
      <div class="col-md-8" style="margin:0 auto; float:none;">
        <h3 align="center">Application for Internship - DotMinds LLP</h3>
        <br />
        <h4 align="center">Please fill this form</h4><br />
                <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Enter Name</label>
                <input type="text" name="name" placeholder="Enter Name" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Enter Address</label>
                <textarea name="address" placeholder="Enter Address" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Enter Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required />
              </div>
              <div class="form-group">
                <label>Enter Age</label>
                <input type="text" name="age" placeholder="Enter Age" class="form-control" pattern="\d*" required />
              </div>
              <div class=form-group>
                <label for="birthday">DOB:</label><br>
                <input type="date" id="dob" name="dob" placeholder="Enter Birthdate" class="form-control" pattern="\d*" required>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Select Gender</label>
                <select name="gender" class="form-control" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <label>Enter Mobile Number</label>
                <input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" pattern="\d*" required />
              </div>
              <div class="form-group">
                <label>Select Your Resume</label>
                <input type="file" name="resume" accept=".doc,.docx,.pdf" required />
              </div>
              <div class="form-group">
                <label>College/Employment: (name of organization)</label>
                <textarea name="additional_information" placeholder="Enter Additional Information" class="form-control" required rows="7"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group" align="center">
            <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-success" />
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>