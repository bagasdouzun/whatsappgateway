<?php
include 'koneksi.php';

$id_absensi = $_GET['id_absensi'];

$sql = "DELETE FROM absensi WHERE id_absensi=$id_absensi";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
    header("Location: list_absensi.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
