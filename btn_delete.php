<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM siswa_tabel WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
    header("Location: list_siswa.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
