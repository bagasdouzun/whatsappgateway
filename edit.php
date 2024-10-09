<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM siswa_tabel WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $absen = $_POST['absen'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $rfid = $_POST['rfid'];

    $update_sql = "UPDATE siswa_tabel SET nama='$nama', nisn='$nisn', absen='$absen', kelas='$kelas', email='$email', telepon='$telepon', alamat='$alamat', rfid='$rfid' WHERE id=$id";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header("Location: list_siswa.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="edit_style.css">
  <title>Edit Data Siswa</title>
</head>
<body>

<form method="POST">
    Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
    NISN: <input type="text" name="nisn" value="<?php echo $row['nisn']; ?>"><br>
    Absen: <input type="text" name="absen" value="<?php echo $row['absen']; ?>"><br>
    Kelas: <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    Telepon: <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
    RFID: <input type="text" name="rfid" value="<?php echo $row['rfid']; ?>"><br>
    <input type="submit" value="Update">
</form>