<?php
include 'koneksi.php';

$id_absensi = $_GET['id_absensi'];
$sql = "SELECT * FROM absensi WHERE id_absensi=$id_absensi";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_absensi = $_POST['id_absensi'];
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal'];
    $waktu_masuk = $_POST['waktu_masuk'];
    $waktu_pulang = $_POST['waktu_pulang'];
    $status_masuk = $_POST['status_masuk'];
    $status_pulang = $_POST['status_pulang'];

    $update_sql = "UPDATE absensi SET id_absensi='$id_absensi', id_siswa='$id_siswa', tanggal='$tanggal', waktu_masuk='$waktu_masuk', waktu_pulang='$waktu_pulang', status_masuk='$status_masuk', status_pulang='$status_pulang' WHERE id_absensi=$id_absensi";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header("Location: list_absensi.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="edit_style.css">
  <title>Edit Data Absen</title>
</head>
<body>

<form method="POST">
    ID Absensi: <input type="text" name="id_absensi" value="<?php echo $row['id_absensi']; ?>"><br>
    ID Siswa: <input type="text" name="id_siswa" value="<?php echo $row['id_siswa']; ?>"><br>
    Tanggal: <input type="text" name="tanggal" value="<?php echo $row['tanggal']; ?>"><br>
    Waktu Masuk: <input type="text" name="waktu_masuk" value="<?php echo $row['waktu_masuk']; ?>"><br>
    Waktu Pulang: <input type="text" name="waktu_pulang" value="<?php echo $row['waktu_pulang']; ?>"><br>
    Status Masuk: <input type="text" name="status_masuk" value="<?php echo $row['status_masuk']; ?>"><br>
    Status Pulang: <input type="text" name="status_pulang" value="<?php echo $row['status_pulang']; ?>"><br>
    <input type="submit" value="Update">
</form>