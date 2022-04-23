<?php
require_once('./lib_of_functions.php');
if(isset($_GET['appt_id'])){
  $id = $_GET['appt_id'];
  $sql = "DELETE FROM Appointments WHERE `Appointments`.`appointment_id` = ".$id."";
  $res = mysqli_query($conn,$sql);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hospital Management System</title>
</head>

<body>
<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="./index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="./add_appt.php">Add Appointment</a>
      <a class="nav-item nav-link" href="./patients.php">Patients</a>
      <a class="nav-item nav-link" href="./doctors.php">Doctors</a>
    </div>
  </div>
</nav>
<br><br><br>
<!-- navbar end -->
   <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Appointment ID</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Doctor ID</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">TIme</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
 
 $sql = "SELECT * FROM `Appointments`";
 $result = mysqli_query($conn, $sql);
 $count = 1;
  while($row = mysqli_fetch_assoc($result)){
    $sql2 = "SELECT `patient_id`, `patient_name` FROM `Patients` WHERE `patient_id` = ".$row["patient_id"]."";
    $result2 = mysqli_query($conn, $sql2);
    $rowpat = mysqli_fetch_assoc($result2);
    
     $sqldoc = "SELECT `Doctor_id`, `Doctor_name` FROM `Doctors` WHERE `Doctor_id`=".$row["doctor_id"]."";
     $resultdoc = mysqli_query($conn, $sqldoc);
     $rowdoc = mysqli_fetch_assoc($resultdoc);
    echo '<tr>
      <th scope="row">'.$count.'</th>
      <td>'.$row["appointment_id"].'</td>
      <td>'.$row["patient_id"].'</td>
      <td>'.$rowpat["patient_name"].'</td>
      <td>'.$row["doctor_id"].'</td>
      <td>'.$rowdoc["Doctor_name"].'</td>
      <td>'.$row["appointment_date"].'</td>    
      <td>'.$row["appointment_time"].'</td> 
      <td> <a href="index.php?appt_id='.$row["appointment_id"].'">Cancel</a></td>     
      </tr>';
    $count = $count + 1;
  }
    ?>



            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
</body>

</html>