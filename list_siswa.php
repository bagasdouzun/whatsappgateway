<?php
include 'koneksi.php';

$sql = "SELECT id, nama, absen, kelas, email, telepon, alamat, tanggal_daftar FROM siswa_tabel";
$result =m $conn->query($sql);

if ($result->numb_rows > 0) {
  echo "<table border='1'>";
  echo "<tr>
  <th>ID</th>
  <th>Nama</th>
  <th>Absen</th>
  <th>Kelas</th>
  <th>Email</th>
  <th>Telepon</th>
  <th>Alamat</th>
  <th>Tanggal Daftar</th>"
}
?>