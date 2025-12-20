<?php
require_once '../src/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $stmt->bind_result($id, $email_db, $password_db);

    if ($stmt->fetch()) {

        if ($password == $password_db) {

            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email_db;

            if($_SESSION['user_id'] == 1){
                header("Location: ../index.php");
                exit;
            }else{
                header("Location: ../mainUsers.php");
                exit;
            }

        } else {
            echo "le Mot de pass incorrect";
        }

    } else {
        echo "email ne trouve pas";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
      Connexion
    </h2>

    <form class="space-y-5" method="post">
      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Email
        </label>
        <input
          type="email"
          name="email"
          placeholder="exemple@email.com"
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          required
        />
      </div>

      <!-- Mot de passe -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Mot de passe
        </label>
        <input
          type="password"
          name="password"
          placeholder="••••••••"
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          required
        />
      </div>

      <!-- Options -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center gap-2">
          <input type="checkbox" class="rounded border-gray-300 text-blue-600">
          Se souvenir de moi
        </label>
        <a href="#" class="text-blue-600 hover:underline">
          Mot de passe oublié ?
        </a>
      </div>

      <!-- Bouton -->
      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition"
      >
        Se connecter
      </button>
    </form>

    <!-- Lien inscription -->
    <p class="text-center text-sm text-gray-600 mt-6">
      Pas de compte ?
      <a href="#" class="text-blue-600 font-medium hover:underline">
        Créer un compte
      </a>
    </p>
  </div>

</body>
</html>
