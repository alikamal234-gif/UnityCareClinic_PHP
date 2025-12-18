<?php
require_once "config.php";
require_once "main.php";



if ($_GET['id']) {
    $id = $_GET['id'];
    $sqlValueDoctor = "SELECT * FROM doctors WHERE id_doctor = $id";
    $resultValueDoctor = $conn->query($sqlValueDoctor);
    if ($resultValueDoctor) {
        $rowDoctor = $resultValueDoctor->fetch_assoc();
        $Fname = $rowDoctor['first_name'];
        $Lname = $rowDoctor['last_name'];
        $email = $rowDoctor['email'];
        $phone = $rowDoctor['phone_number'];
        $Specialization = $rowDoctor['specialization'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];
    $Fname = $_POST['first_name'];
    $Lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Specialization = $_POST['Specialization'];

    $sqlupdate = "UPDATE `doctors` 
        SET `first_name`='$Fname',`last_name`='$Lname',`email`='$email',`phone_number`='$phone',`specialization`='$Specialization' 
        WHERE id_doctor = " . $id;

    if ($conn->query($sqlupdate)) {
        $_SESSION['EditSeccuss'] = "la doctor est modifier avec seccuss ";
    } else {
        $_SESSION['EditError'] = "la doctor n'est modifier pas avec seccuss ";
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

            <!-- phone -->
            <div>
                <label class="block text-sm font-medium mb-1">Phone Number</label>
                <input name="phone" value="<?= $phone ?? '' ?>"
                    class="w-full p-2 rounded-md border bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" />
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Specialization
                </label>
                <input type="text" name="Specialization" value="<?= $Specialization ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Address">
            </div>


            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">
                <a href="pages/doctors.php" class="text-gray-600 hover:text-gray-800">
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
} elseif (isset($_SESSION['EditError'])) {
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