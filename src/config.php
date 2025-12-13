<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "hospital";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    echo "" . $conn->connect_error;
}

// requet sql Global
$SqlNumPatients = "SELECT * FROM patients;";
$SqlNumDoctors = "SELECT * FROM doctors;";
$SqlNumDepartments = "SELECT * FROM departments;";
$PatientsResult = $conn->query($SqlNumPatients);
$DoctorsResult = $conn->query($SqlNumDoctors);
$DepartmentsResult = $conn->query($SqlNumDepartments);



// requet sql to add table
?>