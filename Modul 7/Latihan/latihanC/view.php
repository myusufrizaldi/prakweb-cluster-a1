<?php
    $connection = mysqli_connect('localhost', 'root', '', 'tamu') or die('Koneksi database gagal.');

    $result = mysqli_query($connection, 'SELECT * FROM bukutamu');
    $total  = mysqli_num_rows($result);

    echo "<center>Daftar Pengunjung</center>";
    echo "<center>Jumlah pengunjung: $total</center>";

    $num = 1;

    while($row = mysqli_fetch_assoc($result)) {
        echo '<br>';
        echo $num . '<br>';
        echo 'Nama: ' . $row['nama'] . '<br>';
        echo 'Email: ' . $row['email'] . '<br>';
        echo 'Komentar: ' . $row['komentar'] . '<br>';
        echo '<br>';

        $num++;
    }

?>