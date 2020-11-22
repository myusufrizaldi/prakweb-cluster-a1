<?php
    $connection = mysqli_connect('localhost', 'root', '', 'mahasiswa') or die('Koneksi database gagal');

    echo '<h2>Fetch Array</h2>';
    $result = mysqli_query($connection, 'SELECT * FROM informatika');
    while($row = mysqli_fetch_array($result)) {
        print_r($row);
        echo '<br>';
    }

    echo '<p>Indeks dari array berupa angka dan nama kolom pada tabel.</p>';

    echo '<h2>Fetch Row</h2>';
    $result = mysqli_query($connection, 'SELECT * FROM informatika');
    while($row = mysqli_fetch_row($result)) {
        print_r($row);
        echo '<br>';
    }

    echo '<p>Indeks dari array berupa angka.</p>';

    echo '<h2>Fetch Assoc</h2>';
    $result = mysqli_query($connection, 'SELECT * FROM informatika');
    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
        echo '<br>';
    }

    echo '<p>Indeks dari array berupa nama kolom pada tabel.</p>';
?>