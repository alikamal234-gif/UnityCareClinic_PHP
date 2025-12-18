<?php

function patientsAdd()
{
    require_once "config.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['id'])) {

        $F_nameP = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $L_nameP = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $emailP = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $adressP = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $phoneP = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

        $phoneP = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);


        $dateP = filter_input(INPUT_POST, 'date_birth', FILTER_SANITIZE_SPECIAL_CHARS);
        $sexeP = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
        $d = DateTime::createFromFormat('Y-m-d', $dateP);
if (!$d || $d->format('Y-m-d') !== $dateP) {
    $_SESSION['errorP'] = "Date invalide";
    header("Refresh:0");
    exit;
}
        global $conn;
        if (!$F_nameP || !$L_nameP || !$emailP || !$phoneP || !$sexeP) {
    $_SESSION['errorP'] = "Champs invalides";
    header("Refresh:0");
    exit;
}
            $sqlADDPatient = "INSERT INTO patients
        (last_name, first_name, gender, email, date_of_birth, phone_number, address)
        VALUES
        (?,?,?,?,?,?,?)";
            $stmpat = $conn->prepare($sqlADDPatient);
            $stmpat->bind_param(
                "sssssis",
                $L_nameP,
                $F_nameP,
                $sexeP,
                $emailP,
                $dateP,
                $phoneP,
                $adressP
            );
            if ($stmpat->execute()) {
                $_SESSION['successP'] = "Patient ajouté avec succès";
            } else {
                $_SESSION['errorP'] = "Erreur lors de l'ajout";
            }
            $stmpat->close();

            header("Refresh:0");
            exit;
        


    }
}



function doctorsADD()
{
    require_once "config.php";
    // session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {

            $F_nameD = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $L_nameD = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $emailD = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $SpecializationD = filter_input(INPUT_POST, 'Specialization', FILTER_SANITIZE_SPECIAL_CHARS);
            $phoneD = $_POST['phone'];
            $departmentName = filter_input(INPUT_POST, 'departmentName', FILTER_SANITIZE_SPECIAL_CHARS);
            global $conn;
            if ($F_nameD && $L_nameD && $emailD && $SpecializationD && $phoneD && $departmentName) {
                $sqlADDdoctor = "INSERT INTO doctors(first_name,last_name,specialization,phone_number,email,id_department)
        VALUES (?,?,?,?,?,?);";
                $stmDoct = $conn->prepare($sqlADDdoctor);
                $stmDoct->bind_param(
                    "ssssss",
                    $F_nameD,
                    $L_nameD,
                    $SpecializationD,
                    $phoneD,
                    $emailD,
                    $departmentName
                );
                if ($stmDoct->execute()) {
                    $_SESSION['successD'] = "Doctor ajouté avec succès";
                } else {
                    $_SESSION['errorD'] = "Erreur lors de l'ajout";
                }
                $stmDoct->close();
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
    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nameDepartment = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);

            global $conn;
            $sqlADDdepartment = "INSERT INTO departments(department_name,location) 
        VALUES (?,?);";
            $stmdepa = $conn->prepare($sqlADDdepartment);
            $stmdepa->bind_param(
                "ss",
                $nameDepartment,
                $location
            );
            if ($stmdepa->execute()) {
                $_SESSION['successDep'] = "Doctor ajouté avec succès";
            } else {
                $_SESSION['errorDep'] = "Erreur lors de l'ajout";
            }
            $stmdepa->close();
            header("Refresh:0");
            exit;
        }
    } catch (Exception $e) {
        echo "";
    }
}












?>