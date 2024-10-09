<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rfid = $_POST['rfid'];
    $tanggal = date('Y-m-d');

    $query_siswa = "SELECT * FROM siswa_tabel WHERE rfid = '$rfid'";
    $result_siswa = mysqli_query($conn, $query_siswa);

    if (mysqli_num_rows($result_siswa) > 0) {
        $siswa = mysqli_fetch_assoc($result_siswa);
        $id_siswa = $siswa['id'];

        $query_absen = "SELECT * FROM absensi WHERE id_siswa = '$id_siswa' AND tanggal = '$tanggal'";
        $result_absen = mysqli_query($conn, $query_absen);

        if (mysqli_num_rows($result_absen) == 0) {
            $insert_query = "INSERT INTO absensi (id_siswa, tanggal, waktu_masuk, status_masuk) VALUES ('$id_siswa', '$tanggal', '$waktu', 'Hadir')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Absensi masuk berhasil tercatat!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            $update_query = "UPDATE absensi SET waktu_pulang = '$waktu', status_pulang = 'Pulang' WHERE id_siswa = '$id_siswa' AND tanggal = '$tanggal'";
            if (mysqli_query($conn, $update_query)) {
                echo "Absensi pulang berhasil tercatat!";
?>