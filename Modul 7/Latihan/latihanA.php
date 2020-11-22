<!DOCTYPE html>
<html>
    <head>
        <title>Koneksi Database MySQLi</title>
    </head>
    <body>
        <h1>Demo Koneksi Database</h1>
        <?php
            
            $connection = mysqli_connect('localhost', 'root', '', 'mahasiswa');

            if(mysqli_connect_errno()) {
                echo 'Koneksi database gagal: ' . mysqli_connect_error();
            } else {
                echo 'Koneksi database sukses';
            }
        ?>
    </body>
</html>