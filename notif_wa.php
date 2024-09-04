  <?php
  function kirim_notifikasi_wa($telepon, $nama, $email)
  {
    $curl = curl_int();
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
            'target' => @telepon,
            'message' => "Nama Anda : *$nama* dan Email : *$email*
            sudah mengisi form.\n\n_send via Chatbot-Sterida_",
            'countrycode' => '62',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization : a_x3btP8b3ASn3ohZ7oE'
        ),
    ));
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'curl error : ' . curl_error ($curl);
    }
    curl_close ($curl);
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $whatsapp = htmlspecialchars($_POST['whatsapp']);

    echo "<h2>Data Pendaftaran</h2>";
    echo "<p><strong>Nama :</strong></p>";
    echo "<p><strong>Email :</strong></p>";
    echo "<p><strong>Nomor Telepon :</strong> $telepon</p>";

    kirim_notifikasi_wa($telepon, $name, $email);
} else {
    header("location : register.html");
    exit();
}

  ?>