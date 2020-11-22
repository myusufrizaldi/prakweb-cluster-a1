<!DOCTYPE html>
<html>
    <head>
        <title>Simpan Buku Tamu</title>
    </head>
    <body>
        <h1>Simpan Buku Tamu MySQLi</h1>
        <?php

            if(isset($_POST['submit'])) {
                $connection = mysqli_connect('localhost', 'root', '', 'tamu') or die('Koneksi database gagal.');
                $nama = mysqli_real_escape_string($connection, $_POST['nama']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $komentar = mysqli_real_escape_string($connection, $_POST['komentar']);

                $result = mysqli_query($connection, "INSERT INTO bukutamu (nama, email, komentar) VALUES ('$nama', '$email', '$komentar');");
                if($result) {
                    echo 'Simpan buku tamu berhasil dilakukan! <br>';
                    echo 'Nama: ' . $nama . '<br>';
                    echo 'Email: ' . $email . '<br>';
                    echo 'Komentar: ' . $komentar . '<br>';
                } else {
                    echo 'Simpan buku tamu gagal. <br>';
                }
            }
        ?>
    </body>
</html>