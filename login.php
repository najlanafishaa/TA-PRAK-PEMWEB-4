<?php
session_start();

$error = "";

if ($_POST) {
    if ($_POST["username"] === "admin" && $_POST["password"] === "12345") {
        $_SESSION["login"] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <h1 class="text-center text-3xl font-semibold mt-10 text-blue-400">
        Sistem Manajemen Kontak
    </h1>

    <div class="max-w-sm mx-auto mt-10 bg-white p-6 rounded shadow">

        <h2 class="text-xl font-semibold mb-5">Login</h2>

        <?php if ($error): ?>
            <div class="bg-pink-100 text-pink-600 p-3 mb-4 rounded">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">

            <div>
                <label class="block mb-1">Username</label>
                <input type="text" name="username" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded">
            </div>

            <button class="bg-blue-400 text-white px-4 py-2 rounded w-full">
                Login
            </button>

        </form>

    </div>

</body>
</html>
