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


$sqlnomberdepartement = "SELECT d.department_name as demaprtmentName, count(p.id_department) AS totale_dpatient FROM patients p JOIN departments d ON d.id_department = p.id_department  GROUP BY p.id_department";
$sqlNomberNepartementResult = $conn->query($sqlnomberdepartement);

$sqlNombergender = "SELECT gender as sexe , COUNT(gender) AS numberGender FROM `patients` GROUP BY gender ORDER BY gender ASC";
$sqlNombergenderResult = $conn->query($sqlNombergender);
?>