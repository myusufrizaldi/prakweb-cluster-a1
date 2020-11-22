<?php

    function print_badge($name, $color) {
        echo '
            <h2 style="color: ' . $color . '">' . $name . '</h2>
            <br><br>
        ';

        $name_len = strlen($name);
        if($name_len > 0 && $name_len < 11) {
            echo 'Rp ' . (300 * $name_len);
        } elseif($name_len > 10 && $name_len < 21) {
            echo 'Rp ' . (500 * $name_len);
        } elseif($name_len > 20) {
            echo 'Rp ' . (700 * $name_len);
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pesan badge</title>
    </head>
    <body>
        <form action="" method="POST">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Nama" required>
            <br>
            <label for="warna">Warna</label>
            <select name="warna" id="warna">
                <option disabled selected>Pilih...</option>
                <option value="#000000">Hitam</option>
                <option value="#FF0000">Merah</option>
                <option value="#00FF00">Hijau</option>
                <option value="#0000FF">Biru</option>
            </select>
            <br>
            <input type="submit" name="pesan" value="Pesan">
        </form>

        <?php
            if(isset($_POST['pesan'])) {
                $warna = (!isset($_POST['warna']))? '#FF0000' : $_POST['warna'];
                print_badge($_POST['nama'], $warna);
            }
        ?> 
    </body>
</html>