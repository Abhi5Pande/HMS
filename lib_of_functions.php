<?php
session_start();
$dbuser = 'root';
$dbpass = '';
$dbname = 'Hospital-Management-System';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    echo"connection failure";
}

function query($sql)
{
    $res = mysqli_query($conn,$sql);
    return $res;
}

?>