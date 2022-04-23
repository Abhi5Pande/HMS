<?php
require('./lib_of_functions.php');
$sqldoc = "SELECT `Doctor_id`, `Doctor_name` FROM `Doctors` WHERE 1";
$res = mysqli_query($conn,$sqldoc);

if(isset($_POST['appt_entry']))
{
    
    $ad = $_POST['appt'];
    $at = $_POST['appt-time'];
    $pname = $_POST['wname'];
    $dname = $_POST['doctor']; 
    $sqlf = "SELECT * FROM `Appointments` where `appointment_date`= '".$ad."' AND `appointment_time`='".$at."'";
    $resf = mysqli_query($conn,$sqlf);
    if(mysqli_num_rows($resf)!=0)
    {
        echo "Doctor not available at that time please choose another time";
    }
    else{
    $sqldoc2 = "SELECT `Doctor_id`, `Doctor_name` FROM `Doctors` WHERE `Doctor_name` = '".$dname."'";
    
    $res2 = mysqli_query($conn,$sqldoc2);
    $sqlpat = "SELECT `patient_id`, `patient_name` FROM `Patients` WHERE `patient_name` = '".$pname."'";
    $respat = mysqli_query($conn,$sqlpat);
     if(mysqli_num_rows($respat)==0)
     {
        $sqlpatins = "INSERT INTO `Patients` (`patient_name` , `patient_phno` , `patient_age`) VALUES ('".$pname."','98765432','20');";
        $respatins = mysqli_query($conn,$sqlpatins);
        $sqlpat = "SELECT `patient_id`, `patient_name` FROM `Patients` WHERE `patient_name` = '".$pname."'";
        $respat = mysqli_query($conn,$sqlpat);    
        $rowpat = mysqli_fetch_assoc($respat);
    }
    else{
        $rowpat = mysqli_fetch_assoc($respat);
    }
    $rowdoc = mysqli_fetch_assoc($res2);
    $sqlins = "INSERT INTO `Appointments` (`appointment_date`,`appointment_time`, `patient_id`, `doctor_id`) VALUES ('".$ad."','".$at."', '".$rowpat['patient_id']."', '".$rowdoc['Doctor_id']."');";
    $resins = mysqli_query($conn,$sqlins);

}
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
    <form action="add_appt.php" method="post" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="wname">Patient name</label>
            <input type="text" class="form-control" id="wname" name="wname" placeholder="Jane Doe">
        </div>
        <!-- <div class="form-group">
            <label for="date">Select Date</label>
            <input type="date" class="date-style" name="date">
        </div> -->
        <div class="form-group">
            <label for="doctor">Select Doctor</label>
            <select class="" id="doctor" name="doctor">
                <?php 
                while($row = mysqli_fetch_assoc($res))
                {
                    echo '<option>'.$row['Doctor_name'].'</option>';
                }
                ?>
            </select>
        </div>
        

        <div class="form-group">
            <label for="appt">Select Date</label>
            <input type="date" id="appt" name="appt" min="09:00" max="18:00" step="01:00" required>
        </div>
        <div class="form-group">
            <label for="appt-time">Select time</label>
            <select class="form-control" id="appt-time" name="appt-time">
                <option value=8 name="appt-time">8 AM</option> 
                <option value="10" name="appt-time">10 AM</option>
                <option value="12" name="appt-time">12 PM</option>
                <option value="14" name="appt-time">2 PM</option>
                <option value="16" name="appt-time">4 PM</option>
            </select>
        </div>
        <input type="submit" name="appt_entry">
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