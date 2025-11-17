<?php
function cek_kontak($data) {
    $errors = [];

    if (trim($data["nama"]) === "") {
        $errors[] = "Nama tidak boleh kosong";
    }

    if (trim($data["telepon"]) === "") {
        $errors[] = "Nomor telepon tidak boleh kosong";
    } elseif (!preg_match("/^[0-9+ ]+$/", $data["telepon"])) {
        $errors[] = "Nomor telepon hanya boleh angka atau +";
    }

    if ($data["email"] !== "" && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid";
    }

    return $errors;
}
