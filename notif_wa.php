  <?php
  function kirim_notifikasi_wa($telepon, $name, $nisn, $email, $kelas, $absen, $alamat, $rfid)
  {
    $curl = curl_init();
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
            'message' => "🔶 Nama : *$name*\n🔶 NISN : *$nisn*\n🔶 Kelas : *$absen*\n🔶 Absen : *$kelas*\n🔶 Email : *$email*\n🔶 Telepon : *$telepon*\n🔶 Alamat : *$alamat*\n🔶 RFID : *$rfid*\n\n *Sudah Mengisi Formulir*",
            'countrycode' => '62',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: a_x3btP8b3ASn3ohZ7oE'
        ),
    ));
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'curl error : ' . curl_error ($curl);
    } else {
        echo 'response: ' . $response;
    }
    curl_close ($curl);
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $nisn = htmlspecialchars($_POST['nisn']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $absen = htmlspecialchars($_POST['absen']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $rfid = htmlspecialchars($_POST['rfid']);
    //$whatsapp = htmlspecialchars($_POST['whatsapp']);

    echo "<h2>Data Pendaftaran</h2>";
    echo "<p><strong>Nama : </strong> $name</p>";
    echo "<p><strong>NISN : </strong> $nisn</p>";
    echo "<p><strong>Kelas : </strong> $kelas</p>";
    echo "<p><strong>Absen : </strong> $absen</p>";
    echo "<p><strong>Email :</strong> $email</p>";
    echo "<p><strong>Nomor Telepon :</strong> $telepon</p>";
    echo "<p><strong>Alamat :</strong> $alamat</p>";
    echo "<p><strong>RFID :</strong> $rfid</p>";

    kirim_notifikasi_wa($telepon, $name, $nisn, $email, $absen, $kelas, $alamat, $rfid);
} else {
    header("location: register.html");
    exit();
}

  ?>