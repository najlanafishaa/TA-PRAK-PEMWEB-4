<?php
session_start();
require "session.php";

$kontak = $_SESSION["kontak"] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kontak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-semibold mb-6">Daftar Kontak</h1>

    <a href="add.php" 
       class="inline-block mb-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Tambah Kontak
    </a>

    <?php if (empty($kontak)): ?>

        <p class="text-gray-600 mb-6">Belum ada kontak yang tersimpan.</p>

    <?php else: ?>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Telepon</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($kontak as $id => $k): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border"><?= htmlspecialchars($k["nama"]) ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($k["telepon"]) ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($k["email"]) ?></td>
                        <td class="p-2 border">
                            <a href="edit.php?id=<?= $id ?>" class="text-blue-500 hover:underline">Edit</a> |
                            <a href="delete.php?id=<?= $id ?>" 
                               class="text-pink-500 hover:underline"
                               onclick="return confirm('Hapus kontak ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    <?php endif; ?>

    <!-- Tombol Logout pindah ke paling bawah -->
    <div class="flex justify-end">
        <a href="logout.php" class="text-pink-500 hover:text-pink-600 font-medium">
            Logout
        </a>
    </div>

</div>

</body>
</html>
