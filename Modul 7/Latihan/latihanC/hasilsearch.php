<?php
    if(isset($_POST['cari'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'tamu') or die('Koneksi database gagal.');

        $kolom = mysqli_real_escape_string($connection, $_POST['kolom']);
        $kata  = mysqli_real_escape_string($connection, $_POST['kata']);

        $result = mysqli_query($connection, "SELECT * FROM bukutamu WHERE $kolom LIKE '%$kata%';");
        $total  = mysqli_num_rows($result);

        echo '<h1>Hasil pencarian</h1>';
        echo '<p>Ditemukan: ' . $total . ' baris.<br><br>';

        while($row = mysqli_fetch_assoc($result)) {
            echo 'Nama: ' . $row['nama'] . '<br>';
            echo 'Email: ' . $row['email'] . '<br>';
            echo 'Komentar: ' . $row['komentar'] . '<br>';
            echo '<br>';
        }
    }

?>