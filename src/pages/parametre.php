<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen flex flex-col items-center py-12">

  <h1 class="text-3xl font-bold mb-10">Paramètres</h1>

  <div class="w-full max-w-lg space-y-6">

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 flex flex-col">
      <h2 class="text-xl font-semibold mb-4">Langue</h2>
      <select id="language" class="p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
        <option value="en">English</option>
        <option value="ar">العربية</option>
      </select>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 flex items-center justify-between">
      <span class="text-lg font-medium">Mode Sombre</span>
      <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" id="darkModeToggle" class="sr-only peer">
        <div class="w-12 h-6 bg-gray-300 dark:bg-gray-600 rounded-full peer peer-checked:bg-indigo-600 transition-colors"></div>
        <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full shadow-md transition-transform peer-checked:translate-x-6"></div>
      </label>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
      <button class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
        Sauvegarder
      </button>
    </div>

  </div>
</body>
</html>
