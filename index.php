<?php

require_once "src/config.php";



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unity Care Clinic - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>


<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <aside class="w-64 shadow-md theme">
            <div class="p-6 border-b">
                <h1 class="text-xl font-semibold text-gray-700">Unity Care Clinic</h1>
                <p class="text-sm text-gray-500">Administration</p>
            </div>

            <nav class="mt-6">
                <ul class="space-y-2 px-4">

                    <li>
                        <a href="index.php" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="src/pages/patients.php" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">
                            Patients
                        </a>
                    </li>

                    <li>
                        <a href="src/pages/doctors.php" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">
                            Médecins
                        </a>
                    </li>

                    <li>
                        <a href="src/pages/departments.php" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">
                            Départements
                        </a>
                    </li>


                    <li>
                        <a href="src/pages/parametre.php" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">
                            Paramètres / Langue
                        </a>
                    </li>

                </ul>
            </nav>
        </aside>


        <main class="flex-grow p-8 theme">

            <header class="flex justify-between items-center mb-8 theme">
                <h2 class="text-3xl font-bold text-gray-800 ">Dashboard</h2>
            </header>
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 theme">

                <div class="bg-white p-6 rounded shadow theme">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Patients</h3>
                    <p class="text-3xl font-bold text-gray-900">
                        <?php echo $PatientsResult->num_rows; ?>
                    </p>
                </div>

                <div class="bg-white p-6 rounded shadow theme">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Médecins</h3>
                    <p class="text-3xl font-bold text-gray-900">
                        <?php echo $DoctorsResult->num_rows; ?>
                    </p>
                </div>

                <div class="bg-white p-6 rounded shadow theme">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Départements</h3>
                    <p class="text-3xl font-bold text-gray-900">
                        <?php echo $DepartmentsResult->num_rows; ?>
                    </p>
                </div>

            </section>
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 theme">

                <div class="bg-white p-6 rounded shadow theme">
                    <h3 class="text-lg font-semibold text-gray-600 mb-4">
                        Répartition par Département
                    </h3>
                    <!-- Canvas -->

                    <script>
                        <?php
                        $sql = "
SELECT d.department_name, COUNT(doc.id_doctor) AS total_doctors
FROM departments d
LEFT JOIN doctors doc ON d.id_department = doc.id_department
GROUP BY d.id_department, d.department_name
ORDER BY d.id_department
";

                        $result = $conn->query($sql);

                        $departments = [];
                        $doctorsNumber = [];

                        while ($row = $result->fetch_assoc()) {
                            $departments[] = $row['department_name'];
                            $doctorsNumber[] = (int) $row['total_doctors'];
                        }
                        ?>
                        const departments = <?= json_encode($departments) ?>;
                        const doctorsNumber = <?= json_encode($doctorsNumber) ?>;
                    </script>


                    <canvas id="myChart" width="300" height="200"></canvas>

                    <script>
                        // DATA
                        const data = {
                            labels: departments,
                            datasets: [{
                                label: 'Dataset 1',
                                data: doctorsNumber,
                                backgroundColor: [
                                    'red',
                                    'orange',
                                    'yellow',
                                    'green',
                                    'blue',
                                    'black',
                                    'purple'
                                ]
                            }]
                        };

                        // CONFIG
                        const config = {
                            type: 'doughnut',
                            data: data,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: { position: 'top' },
                                    title: {
                                        display: true,
                                        text: 'My Doughnut Chart'
                                    }
                                }
                            }
                        };

                        // CREATE CHART
                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    </script>
                    <!-- ------------------------------------------ -->

                </div>

                <div class="bg-white p-6 rounded shadow h-80 theme">
                    <h3 class="text-lg font-semibold text-gray-600 mb-4">
                        Statistiques Patients
                    </h3>

                    <!-- diagram department -->
                    <div class="w-[100%]">
                        <canvas id="chartPatients"></canvas>
                    </div>
                    <script>
                        const ctxPatients = document.getElementById('chartPatients');

                        const nomberGender = [];
                        const gender = [];


                        <?php
                        while ($row = $sqlNombergenderResult->fetch_assoc()) {
                            echo "nomberGender.push(" . $row['numberGender'] . ");";
                            echo "gender.push('" . $row['sexe'] . "');";
                        }
                        ;
                        ?>


                        console.log(gender);

                        new Chart(ctxPatients, {
                            type: 'bar',
                            data: {
                                labels: gender,
                                datasets: [{
                                    label: 'nomber de patients par sexe',
                                    data: nomberGender,
                                    backgroundColor: 'rgba(27, 189, 68, 0.32)',
                                    borderColor: 'rgba(8, 8, 8, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    <!-- ------------------------------------------ -->

                </div>

            </section>


        </main>

    </div>

</body>

</html>