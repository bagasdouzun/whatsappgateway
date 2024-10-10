<?php
include 'koneksi.php';
include 'notif_wa_absen.php';

date_default_timezone_set('Asia/Jakarta');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rfid = $_POST['rfid'];
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');

    $query_siswa = "SELECT * FROM siswa_tabel WHERE rfid = '$rfid'";
    $result_siswa = mysqli_query($conn, $query_siswa);

    if (mysqli_num_rows($result_siswa) > 0) {
        $siswa = mysqli_fetch_assoc($result_siswa);
        $nama = $siswa['nama'];
        $kelas = $siswa['kelas'];
        $absen = $siswa['absen'];
        $telepon = $siswa['telepon'];

        if (substr($telepon, 0, 1) === '0') {
            $telepon = '62' . substr($telepon, 1);
        }

        $query_absen = "SELECT * FROM absensi WHERE id_siswa = '$siswa[id]' AND tanggal = '$tanggal'";
        $result_absen = mysqli_query($conn, $query_absen);

        if (mysqli_num_rows($result_absen) == 0) {
            $insert_query = "INSERT INTO absensi (id_siswa, tanggal, waktu_masuk, status_masuk) VALUES ('$siswa[id]', '$tanggal', '$waktu', 'Hadir')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Absensi masuk berhasil tercatat!";
                kirim_notifikasi_wa($telepon, $nama, $kelas, $absen, $rfid, $waktu, '', 'masuk');
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            $update_query = "UPDATE absensi SET waktu_pulang = '$waktu', status_pulang = 'Pulang' WHERE id_siswa = '$siswa[id]' AND tanggal = '$tanggal'";
            if (mysqli_query($conn, $update_query)) {
                echo "Absensi pulang berhasil tercatat!";
                kirim_notifikasi_wa($telepon, $nama, $kelas, $absen, $rfid, $waktu, '', 'masuk');
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "RFID tidak ditemukan.";
    }
}
?>
