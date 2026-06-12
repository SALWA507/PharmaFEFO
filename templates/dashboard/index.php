<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaFEFO Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-blue-700 shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-white">
             PharmaFEFO
        </h1>

        <span class="text-white">
            Gestion des Stocks
        </span>
    </div>
</header>

<div class="max-w-7xl mx-auto p-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-blue-500">
            <p class="text-gray-500">Total Lots</p>
            <h2 class="text-4xl font-bold text-blue-600">
                <?= $total ?>
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-500">
            <p class="text-gray-500">Warnings</p>
            <h2 class="text-4xl font-bold text-yellow-600">
                <?= $warning ?>
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-red-500">
            <p class="text-gray-500">Critical</p>
            <h2 class="text-4xl font-bold text-red-600">
                <?= $critical ?>
            </h2>
        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="px-6 py-4 border-b">
            <h2 class="text-xl font-bold">
                Liste des Lots FEFO
            </h2>
        </div>

        <table class="w-full">

            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Médicament</th>
                    <th class="p-4 text-left">Lot</th>
                    <th class="p-4 text-left">Quantité</th>
                    <th class="p-4 text-left">Expiration</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody>

            <?php if(!empty($lots)): ?>

                <?php foreach($lots as $lot): ?>

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-4">
                            <?= htmlspecialchars($lot['id']) ?>
                        </td>

                        <td class="p-4 font-semibold">
                            <?= htmlspecialchars($lot['name']) ?>
                        </td>

                        <td class="p-4">
                            <?= htmlspecialchars($lot['batchNumero']) ?>
                        </td>

                        <td class="p-4">
                            <?= htmlspecialchars($lot['quantity']) ?>
                        </td>

                        <td class="p-4">
                            <?= htmlspecialchars($lot['expirationDate']) ?>
                        </td>

                        <td class="p-4">

                            <?php if($lot['status'] === 'OK'): ?>

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                    OK
                                </span>

                            <?php elseif($lot['status'] === 'WARNING'): ?>

                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                    WARNING
                                </span>

                            <?php elseif($lot['status'] === 'CRITICAL'): ?>

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                    CRITICAL
                                </span>

                            <?php else: ?>

                                <span class="px-3 py-1 rounded-full bg-gray-200 text-gray-700 text-sm">
                                    EXPIRED
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        Aucun lot trouvé
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>