<?php
include 'koneksi.php';

$sql = "SELECT id, nama, nisn, absen, kelas, email, telepon, alamat, tanggal_daftar, rfid FROM siswa_tabel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr>
  <th>ID</th>
  <th>Nama</th>
  <th>NISN</th>
  <th>Absen</th>
  <th>Kelas</th>
  <th>Email</th>
  <th>Telepon</th>
  <th>Alamat</th>
  <th>Tanggal Daftar</th>
  <th>RFID</th>
  <th>Aksi</th>
  <th>Aksi</th>
  </tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nama"] . "</td>";
    echo "<td>" . $row["nisn"] . "</td>";
    echo "<td>" . $row["absen"] . "</td>";
    echo "<td>" . $row["kelas"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["telepon"] . "</td>";
    echo "<td>" . $row["alamat"] . "</td>";
    echo "<td>" . $row["tanggal_daftar"] . "</td>";
    echo "<td>" . $row["rfid"] . "</td>";
    
    echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
    echo "<td><a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda Yakin Ingin Menghapus Data Ini?\")'>Delete</a></td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "Tidak Ada Data Ditemukan.";
}

echo "<a href='register.html'>Tambah Data</a>";

echo "<a href='proses_logout.php'>Logout</a>";

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style_list.css">
  <title>Data Siswa</title>
</head>
<body>
