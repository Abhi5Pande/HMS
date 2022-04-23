<?php
require('./lib_of_functions.php');


if(isset($_POST['doc_entry']))
{
    
    $dname = $_POST["wname"];
    $dage = $_POST["age"];
    $dgender = $_POST["gender"];
    $dphno = $_POST["phno"];
    $sql = "INSERT INTO `Doctors` (`Doctor_id`, `Doctor_name`, `Doctor_age`, `Doctor_phno`, `Doctor_gender`) VALUES (NULL, '".$dname."', ".$dage.", '".$dphno."', '".$dgender."');";
    echo $sql;
    mysqli_query($conn,$sql);
   
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hospital Management System</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="./index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="./add_appt.php">Add Appointment</a>
                <a class="nav-item nav-link" href="./patients.php">Patients</a>
                <a class="nav-item nav-link" href="./doctors.php">Doctors</a>
            </div>
        </div>
    </nav>
    <br><br><br>

    <!-- form -->
    <form action="add_doc.php" method="post" class="needs-validation" novalidate>
        <div class="container">
        <div class="form-group">
            <label for="wname"> Name</label>
            <input type="text"  id="wname" name="wname" placeholder="Jane Doe">
        </div>
        <div class="form-group">
            <label for="age"> Age</label>
            <input type="number"  id="age" name="age">
        </div>
        <div class="form-group">
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        </div>
        <div class="form-group">
            <label for="phno">Phone Number</label>
            <input type="tel" name="phno">
        </div>
       <input type="submit" name="doc_entry">
       </div>
    </form>
    <!-- form end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>