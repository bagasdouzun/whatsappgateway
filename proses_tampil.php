<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $nisn = htmlspecialchars($_POST['nisn']);
  $absen = htmlspecialchars($_POST['absen']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $email = htmlspecialchars($_POST['email']);
  $telepon = htmlspecialchars($_POST['telepon']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $rfid = htmlspecialchars($_POST['rfid']);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "form_reg";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
  }

  $sql = "INSERT INTO siswa_tabel (nama, nisn, absen, kelas, email, telepon, alamat, rfid)
  VALUES ('$name', '$nisn', '$absen', '$kelas', '$email', '$telepon', '$alamat', '$rfid')";

  if ($conn->query($sql) === TRUE) {
  echo "Data Berhasil Disimpan.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  } else {
  header("location : register.html");
  exit();
}

include 'notif_wa.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pendaftaran</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
      }
      .container {
        max-width: 600px;
        margin: auto;
        background: #fff;
        padding-top: 30px;
        padding-bottom: 40px;
        padding-right: 50px;
        padding-left: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      h1 {
        text-align: center;
        margin-bottom: 50px;
      }
    </style>
</head>
<body>
    <div class="container">
    <h1>Data Pendaftaran</h1>
    <p><strong>Nama :</strong> <?php echo $name; ?></p>
    <p><strong>NISN :</strong> <?php echo $nisn; ?></p>
    <p><strong>Kelas :</strong> <?php echo $kelas; ?></p>
    <p><strong>Absen :</strong> <?php echo $absen; ?></p>
    <p><strong>Email :</strong> <?php echo $email; ?></p>
    <p><strong>Nomor Telepon :</strong> <?php echo $telepon; ?></p>
    <p><strong>Alamat :</strong> <?php echo $alamat; ?></p>
    <p><strong>RFID :</strong> <?php echo $rfid; ?></p>
    </div>
    <div class="list-siswa">
          <a href="list_siswa.php">List Siswa</a>
      </div>
</body>
</html>