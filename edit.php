<?php
session_start();
require "session.php";
require "validation.php";

$id = $_GET["id"] ?? null;

if ($id === null || !isset($_SESSION["kontak"][$id])) {
    header("Location: index.php");
    exit;
}

$errors = [];
$kontak = $_SESSION["kontak"][$id];

if ($_POST) {
    $errors = cek_kontak($_POST);

    if (empty($errors)) {
        $_SESSION["kontak"][$id] = [
            "nama" => $_POST["nama"],
            "telepon" => $_POST["telepon"],
            "email" => $_POST["email"]
        ];
        header("Location: index.php");
        exit;
    } else {
        $kontak = $_POST;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kontak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-semibold mb-5">Edit Kontak</h1>

    <?php if ($errors): ?>
        <div class="bg-pink-100 text-pink-600 p-3 mb-4 rounded">
            <?php foreach ($errors as $e): ?>
                <p><?= $e ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama"
                   class="w-full border p-2 rounded"
                   value="<?= htmlspecialchars($kontak["nama"]) ?>">
        </div>

        <div>
            <label class="block mb-1">Telepon</label>
            <input type="text" name="telepon"
                   class="w-full border p-2 rounded"
                   value="<?= htmlspecialchars($kontak["telepon"]) ?>">
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="text" name="email"
                   class="w-full border p-2 rounded"
                   value="<?= htmlspecialchars($kontak["email"]) ?>">
        </div>

        <button class="bg-blue-400 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>

    </form>

</div>

</body>
</html>
