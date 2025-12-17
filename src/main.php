<?php

function patientsAdd()
{
    session_start();
    require_once "config.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['id'])) {

        $F_nameP = $_POST['first_name'];
        $L_nameP = $_POST['last_name'];
        $emailP = $_POST['email'];
        $adressP = $_POST['address'];
        $phoneP = $_POST['phone'];
        $dateP = $_POST['date_birth'];
        $sexeP = $_POST['gender'];

        global $conn;


        $sqlADDPatient = "INSERT INTO patients
        (last_name, first_name, gender, email, date_of_birth, phone_number, address)
        VALUES
        ('$L_nameP', '$F_nameP', '$sexeP', '$emailP', '$dateP', '$phoneP', '$adressP')";

        if ($conn->query($sqlADDPatient)) {
            $_SESSION['successP'] = "Patient ajouté avec succès";
        } else {
            $_SESSION['errorP'] = "Erreur lors de l'ajout";
        }


        header("Refresh:0");
        exit;
    }
}



function doctorsADD()
{
    session_start();
    require_once "config.php";
    // session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {

            $F_nameD = $_POST['first_name'];
            $L_nameD = $_POST['last_name'];
            $emailD = $_POST['email'];
            $SpecializationD = $_POST['Specialization'];
            $phoneD = $_POST['phone'];
            $departmentName = $_POST['departmentName'];
            global $conn;
            if ($F_nameD && $L_nameD && $emailD && $SpecializationD && $phoneD && $departmentName) {
                $sqlADDdoctor = "INSERT INTO doctors(first_name,last_name,specialization,phone_number,email,id_department)
        VALUES ('$F_nameD','$L_nameD','$SpecializationD','$phoneD','$emailD',$departmentName);";

                if ($conn->query($sqlADDdoctor)) {
                    $_SESSION['successD'] = "Doctor ajouté avec succès";
                } else {
                    $_SESSION['errorD'] = "Erreur lors de l'ajout";
                }

                header("Refresh:0");

                exit;
            } else {
                echo "3mer dakxi deghya";
            }

        } catch (\Throwable $th) {
            echo $th->getTraceAsString();

        }
    }
}


function departmentADD()
{
    require_once "config.php";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nameDepartment = $_POST['name'];
        $location = $_POST['location'];

        global $conn;
        $sqlADDdepartment = "INSERT INTO departments(department_name,location) 
        VALUES ('$nameDepartment','$location');";

        if ($conn->query($sqlADDdepartment)) {
            $_SESSION['successDep'] = "Doctor ajouté avec succès";
        } else {
            $_SESSION['errorDep'] = "Erreur lors de l'ajout";
        }

        header("Refresh:0");
        exit;
    }
}












?>