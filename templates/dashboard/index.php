<?php require_once __DIR__ . '/../layout/base.php'; ?>

</html>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>PharmaFEFO Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-blue-700">PharmaFEFO</h1>
    <span class="text-gray-500">Stock Management</span>
</div>

<div class="p-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-500">
            <p class="text-gray-500">Total Lots</p>
            <h2 class="text-3xl font-bold">3</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500">
            <p class="text-gray-500">Warnings</p>
            <h2 class="text-3xl font-bold text-yellow-600">1</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-red-500">
            <p class="text-gray-500">Critical</p>
            <h2 class="text-3xl font-bold text-red-600">1</h2>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="px-6 py-4 border-b flex justify-between">
            <h2 class="font-bold text-lg">Liste des Lots (FEFO)</h2>
            <span class="text-sm text-gray-500">Expiring stock first</span>
        </div>

        <table class="w-full">

            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Médicament</th>
                    <th class="p-3 text-left">Lot</th>
                    <th class="p-3 text-left">Quantité</th>
                    <th class="p-3 text-left">Expiration</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <?php foreach($lots as $lot): ?>

                <tr class="hover:bg-gray-50 transition">

                    <td class="p-3"><?= $lot['id'] ?></td>

                    <td class="p-3 font-medium text-gray-800">
                        <?= $lot['name'] ?>
                    </td>

                    <td class="p-3"><?= $lot['batchNumero'] ?></td>

                    <td class="p-3"><?= $lot['quantity'] ?></td>

                    <td class="p-3"><?= $lot['expirationDate'] ?></td>

                    <td class="p-3">

                        <?php if($lot['status'] == 'OK'): ?>
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                OK
                            </span>

                        <?php elseif($lot['status'] == 'WARNING'): ?>
                            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                WARNING
                            </span>

                        <?php else: ?>
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                CRITICAL
                            </span>
                        <?php endif; ?>

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>