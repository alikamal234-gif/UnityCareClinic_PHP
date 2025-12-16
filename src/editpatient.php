<?php
require_once "config.php";
require_once "main.php";

session_start();


if ($_GET['id']) {
    $id = $_GET['id'];
    $sqlValuePatient = "SELECT * FROM patients WHERE id_patient = $id";
    $resultValuePatient = $conn->query($sqlValuePatient);
    if ($resultValuePatient) {
        $rowpatient = $resultValuePatient->fetch_assoc();
        $Fname = $rowpatient['first_name'];
        $Lname = $rowpatient['last_name'];
        $email = $rowpatient['email'];
        $adress = $rowpatient['address'];
        $phone = $rowpatient['phone_number'];
        $date = $rowpatient['date_of_birth'];
        $sexe = $rowpatient['gender'];

    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];
    $Fname = $_POST['first_name'];
    $Lname = $_POST['last_name'];
    $email = $_POST['email'];
    $adress = $_POST['address'];
    $phone = $_POST['phone'];
    $date = $_POST['date_birth'];
    $sexe = $_POST['gender'];
    $sqlupdate = "UPDATE `patients` 
        SET `first_name`='$Fname',`last_name`='$Lname',`gender`='$sexe',`email`='$email',`date_of_birth`='$date',`phone_number`='$phone',`address`='$adress' 
        WHERE id_patient = " . $id;

    if ($conn->query($sqlupdate)) {
        $_SESSION['EditSeccuss'] = "la patient est modifier avec seccuss ";
    } else {
        $_SESSION['EditError'] = "la patient n'est modifier pas avec seccuss ";
    }



}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-xl bg-white rounded-xl shadow-lg p-6">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Edit Patient
        </h2>

        <form method="post" class="space-y-4">

            <!-- First name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    First Name
                </label>
                <input type="text" name="first_name" value="<?= $Fname ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="First name">
            </div>

            <!-- Last name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Last Name
                </label>
                <input type="text" name="last_name" value="<?= $Lname ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Last name">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input type="email" name="email" value="<?= $email ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="email@example.com">
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Address
                </label>
                <input type="text" name="address" value="<?= $adress ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Address">
            </div>

            <!-- Phone + Birthday -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Phone Number
                    </label>
                    <input type="text" name="phone" value="<?= $phone ?? '' ?>"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="+212...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Date of Birth
                    </label>
                    <input type="date" name="date_birth" value="<?= $date ?? '' ?>"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Sexe
                </label>
                <select name="gender"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select</option>
                    <option value="male" <?= ($sexe == "male") ? "selected" : "" ?>>Male</option>
                    <option value="female" <?= ($sexe == "female") ? "selected" : "" ?>>Female</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">
                <a href="pages/patients.php" class="text-gray-600 hover:text-gray-800">
                    ← Back
                </a>

                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Update
                </button>
            </div>

        </form>

    </div>

</body>

</html>


<?php
if (isset($_SESSION['EditSeccuss'])) {

    echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: '" . $_SESSION['EditSeccuss'] . "'
        });
    </script>
    ";

    unset($_SESSION['EditSeccuss']);
}elseif (isset($_SESSION['EditError'])){
    echo "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: '" . $_SESSION['EditError'] . "'
        });
    </script>
    ";

    unset($_SESSION['EditError']);
}

?>
