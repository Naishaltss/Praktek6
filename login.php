<!-- login.php -->

<?php
session_start();

// Cek apakah form sudah disubmit
if (isset($_POST['submit'])) {
    // Simpan data login ke dalam session
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['waktu'] = date('H:i:s');
    $_SESSION['hari'] = date('l');
    $_SESSION['tanggal'] = date('d-m-Y');

    // Redirect ke halaman utama
    header('Location: index.php');
    exit;
}
?>

<form method="post">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>

    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <br><br>

    <button type="submit" name="submit">Login</button>
</form>
