<?php
    require_once "config.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Médecins</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 relative">

    <div style="display: none;" id="boxFormulerAjoutedoctor" class="absolute inset-0 z-40 bg-[rgba(0,5,0,0.200)] dark:bg-gray-800/80  border-b border-gray-200 dark:border-gray-700">

   <div class="absolute top-0 left-1/2 transform -translate-x-1/2 z-40 w-full max-w-2xl px-4 pt-6">

    <form id="patientForm"
          class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 grid grid-cols-1 gap-4">   <!-- Left column -->
            <div class="space-y-3 md:col-span-1">

                <div class="w-full flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Médecins File</h2>
                    <button type="submit" id="boxFormulerAjoutedoctorClose" class="font-bold ">X</button>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Prénom :</label>
                    <input name="first_name" required class="w-full p-2 rounded-md border bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Nom :</label>
                    <input name="last_name" class="w-full p-2 rounded-md border bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" class="w-full p-2 rounded-md border bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Specialization</label>
                    <input name="address" class="w-full p-2 rounded-md border bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Téléphone</label>
                    <input name="phone" class="w-full p-2 rounded-md border bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600" />
                </div>

               

                <div class="flex gap-2 mt-4">
                    <button type="submit" class="flex-1 py-2 px-3 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium">Save Médecins</button>
                    <button type="button" id="clearBtn" class="flex-1 py-2 px-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 rounded-md">Clear</button>
                </div>

            </div>
        </form>

    </div>
</div>


    <div class="flex min-h-screen relative">

        <?php include 'sidebar.php'; ?>

        <main class="flex-grow p-8">

            <header class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Gestion des Médecins</h2>
                <button type="submit" id="ajouteDoctor" class="px-4 py-2 bg-blue-600 text-white rounded">
                Ajouter Médecin
            </button>
            </header>

            <section class="bg-white rounded shadow p-6 overflow-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="p-3">ID</th>
                            <th class="p-3">first name</th>
                            <th class="p-3">last name</th>
                            <th class="p-3">Spécialité</th>
                            <th class="p-3">Téléphone</th>
                            <th class="p-3">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        while ($row = $DoctorsResult->fetch_assoc()) {
                            echo '<tr class="border-b">';
                            echo '<td class="p-3">' . $row["id_doctor"] . '</td>';
                            echo '<td class="p-3">' . $row["first_name"] . '</td>';
                            echo '<td class="p-3">' . $row["last_name"] . '</td>';
                            echo '<td class="p-3">' . $row["specialization"] . '</td>';
                            echo '<td class="p-3">' . $row["phone_number"] . '</td>';
                            echo '<td class="p-3">' . $row["email"] . '</td>';
                            echo '<td class="p-3 space-x-2">
                            <a class="text-blue-600" href="#">Éditer</a>
                            <a class="text-red-600" href="#">Supprimer</a>
                        </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </section>

        </main>
    </div>

</body>
</html>