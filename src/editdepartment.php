<?php
require_once "config.php";
require_once "main.php";



if ($_GET['id']) {
    $id = $_GET['id'];
    $sqlValueDepartment = "SELECT * FROM departments WHERE id_department = $id";
    $resultValueDepartment = $conn->query($sqlValueDepartment);
    if ($resultValueDepartment) {
        $rowDepartment = $resultValueDepartment->fetch_assoc();
        $name = $rowDepartment['department_name'];
        $Localisation = $rowDepartment['location'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['id'];
    $name = $_POST['name'];
    $Localisation = $_POST['localisation'];

    $sqlupdate = "UPDATE `departments` 
        SET `department_name`='$name',`location`='$Localisation' 
        WHERE id_department = " . $id;

    if ($conn->query($sqlupdate)) {
        $_SESSION['EditSeccuss'] = "la department est modifier avec seccuss ";
    } else {
        $_SESSION['EditError'] = "la department n'est modifier pas avec seccuss ";
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
                    Name :
                </label>
                <input type="text" name="name" value="<?= $name ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="First name">
            </div>

            <!-- Localisation -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Localisation :
                </label>
                <input type="text" name="localisation" value="<?= $Localisation ?? '' ?>"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Last name">
            </div>

        
            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">
                <a href="pages/departments.php" class="text-gray-600 hover:text-gray-800">
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