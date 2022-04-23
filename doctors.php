<?php
require_once('./lib_of_functions.php');
if(isset($_GET["doc_id"]))
{
$id = $_GET["doc_id"];
$sql1 = "DELETE FROM Doctors WHERE `Doctors`.`Doctor_id` = ".$id."" ;
$sql2 = "DELETE FROM Appointments WHERE `Appointments`.`doctor_id` = ".$id."";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);

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
      <a class="nav-item nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="./add_appt.php">Add Appointment</a>
      <a class="nav-item nav-link" href="./patients.php">Patients</a>
      <a class="nav-item nav-link active" href="./doctors.php">Doctors</a>
    </div>
  </div>
</nav>
<br><br>
<a href="./add_doc.php" class="btn btn-primary">Add Doctor</a>
<br>
<!-- navbar end -->
   <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor ID</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
 
 $sql = "SELECT * FROM `Doctors`";
 $result = mysqli_query($conn, $sql);
 $count = 1;
  while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
      <th scope="row">'.$count.'</th>
      <td>'.$row["Doctor_id"].'</td>
      <td>'.$row["Doctor_name"].'</td>
      <td>'.$row["Doctor_phno"].'</td>
      <td>'.$row["Doctor_age"].'</td>
      <td>'.$row["Doctor_gender"].'</td>
      <td> <a href="doctors.php?doc_id='.$row["Doctor_id"].'">Delete</a></td> 
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