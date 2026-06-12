<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Login PharmaFEFO</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-96">

    <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">
        PharmaFEFO
    </h2>

    <?php if(!empty($error)): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <input
            type="email"
            name="email"
            placeholder="Email"
            class="w-full border p-3 rounded mb-4"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Mot de passe"
            class="w-full border p-3 rounded mb-4"
            required
        >

        <button
            type="submit"
            class="w-full bg-blue-600 text-white p-3 rounded"
        >
            Connexion
        </button>

    </form>

</div>

</body>
</html>