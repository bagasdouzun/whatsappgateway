<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_reg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$nisn = $_POST['nisn'];

$nama = $conn->real_escape_string($nama);
$nisn = $conn->real_escape_string($nisn);

$sql = "SELECT * FROM siswa_tabel WHERE nama='$nama' AND nisn='$nisn'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['nama'] = $nama;
    header("Location: list_siswa.php");
    exit();
} else {
    echo "Nama Lengkap atau NISN yang Anda masukkan salah, mohon periksa kembali.";
}

$conn->close();
?>