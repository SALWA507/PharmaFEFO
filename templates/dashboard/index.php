<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>PharmaFEFO</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="p-6">

    <div class="grid grid-cols-3 gap-4 mb-6">

        <div class="bg-white p-4 rounded shadow">
            Total Lots: <b><?= $total ?></b>
        </div>

        <div class="bg-white p-4 rounded shadow">
            Warnings: <b class="text-yellow-600"><?= $warning ?></b>
        </div>

        <div class="bg-white p-4 rounded shadow">
            Critical: <b class="text-red-600"><?= $critical ?></b>
        </div>

    </div>

    <table class="w-full bg-white shadow">

        <thead>
            <tr class="bg-gray-200">
                <th>ID</th>
                <th>Medicament</th>
                <th>Lot</th>
                <th>Qty</th>
                <th>Expiration</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($lots as $lot): ?>
            <tr class="border">
                <td><?= $lot['id'] ?></td>
                <td><?= $lot['name'] ?></td>
                <td><?= $lot['batchNumero'] ?></td>
                <td><?= $lot['quantity'] ?></td>
                <td><?= $lot['expirationDate'] ?></td>
                <td><?= $lot['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>

</body>
</html>