<?php
function kirim_notifikasi_wa($telepon, $nama = '', $kelas = '', $absen = '', $rfid = '', $waktu_masuk = '', $waktu_pulang = '', $tipe_notifikasi = 'masuk')
{
    $curl = curl_init();

    if ($tipe_notifikasi === 'masuk') {
        $message = "🔶 Nama : *$nama*\n🔶 Kelas : *$kelas*\n🔶 Absen : *$absen*\n🔶 RFID : *$rfid*\n🔶 Waktu Masuk : *$waktu_masuk*\n\n *Berhasil Melakukan Absen Masuk*";
    } else {
        $message = "🔶 Nama : *$nama*\n🔶 Kelas : *$kelas*\n🔶 Absen : *$absen*\n🔶 RFID : *$rfid*\n🔶 Waktu Pulang : *$waktu_pulang*\n\n *Berhasil Melakukan Absen Pulang*";
    }

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $telepon,
            'message' => $message,
            'countrycode' => '62',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: a_x3btP8b3ASn3ohZ7oE'
        ),
    ));

    $response = curl_exec($curl);
    if ($response === false) {
        echo 'curl error : ' . curl_error($curl);
    } else {
        echo 'response: ' . $response;
    }
    curl_close($curl);
}
?>
