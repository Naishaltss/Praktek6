<!-- index.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Contoh Form Login dengan PHP</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f8f8f8;
			color: #333;
			margin: 0;
			padding: 0;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
		}

		h1 {
			font-size: 36px;
			margin-top: 0;
			margin-bottom: 20px;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}

		input[type="text"],
		input[type="email"],
		button {
			display: block;
			margin-bottom: 15px;
			padding: 10px;
			font-size: 16px;
			border: 1px solid #ccc;
			border-radius: 4px;
			width: 100%;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		p {
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
		// Include file login.php
		include 'login.php';

		// Tampilkan informasi login jika sudah login
		if (isset($_SESSION['nama'])) {
			echo '<h1>Selamat datang, ' . $_SESSION['nama'] . '!</h1>';
			echo '<p>Email anda: ' . $_SESSION['email'] . '</p>';
			echo '<p>Waktu login: ' . $_SESSION['waktu'] . '</p>';
			echo '<p>Hari login: ' . $_SESSION['hari'] . '</p>';
			echo '<p>Tanggal login: ' . $_SESSION['tanggal'] . '</p>';
		}
		?>
		<?php

// Cek apakah form login sudah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Cek apakah nama dan email sudah diisi
	if (!empty($_POST['nama']) && !empty($_POST['email'])) {
		// Jika sudah diisi, simpan data ke session
		$_SESSION['nama'] = $_POST['nama'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['waktu'] = date('H:i:s');
		$_SESSION['hari'] = date('l');
		$_SESSION['tanggal'] = date('d F Y');

		// Redirect ke halaman welcome.php
		header('Location: login.php');
		exit;
	} else {
		// Jika tidak diisi, redirect ke halaman error.php
		header('Location: error.php');
		exit;
	}
}
?>
	</div>
</body>
</html>
