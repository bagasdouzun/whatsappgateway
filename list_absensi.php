<?php
include 'koneksi.php';

$sql = "SELECT id_absensi, id_siswa, tanggal, waktu_masuk, waktu_pulang, status_masuk, status_pulang FROM absensi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr>
  <th>ID Absensi</th>
  <th>ID Siswa</th>
  <th>Tanggal</th>
  <th>Waktu Masuk</th>
  <th>Waktu Pulang</th>
  <th>Status Masuk</th>
  <th>Status Pulang</th>
  <th>Aksi</th>
  <th>Aksi</th>
  </tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id_absensi"] . "</td>";
    echo "<td>" . $row["id_siswa"] . "</td>";
    echo "<td>" . $row["tanggal"] . "</td>";
    echo "<td>" . $row["waktu_masuk"] . "</td>";
    echo "<td>" . $row["waktu_pulang"] . "</td>";
    echo "<td>" . $row["status_masuk"] . "</td>";
    echo "<td>" . $row["status_pulang"] . "</td>";
    
    echo "<td><a href='edit_absen.php?id_absensi=" . $row["id_absensi"] . "'>Edit</a></td>";
    echo "<td><a href='delete_absen.php?id_absensi=" . $row["id_absensi"] . "' onclick='return confirm(\"Apakah Anda Yakin Ingin Menghapus Data Ini?\")'>Delete</a></td>";
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
  <title>Data Absensi</title>
</head>
<body>
