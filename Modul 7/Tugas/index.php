<?php
    $connection = mysqli_connect('localhost', 'root', '', 'mahasiswa');

    $jurusan = array();
    $result_jurusan = mysqli_query($connection, 'SELECT * FROM jurusan');
    while($row = mysqli_fetch_assoc($result_jurusan)) {
        $jurusan[$row['id_jur']] = $row['nama'];
    }

    if(isset($_POST['tambah'])) {
        $nrp = mysqli_real_escape_string($connection, $_POST['tambah_nrp']);
        $nama = mysqli_real_escape_string($connection, $_POST['tambah_nama']);
        $alamat = mysqli_real_escape_string($connection, $_POST['tambah_alamat']);
        $id_jur = mysqli_real_escape_string($connection, $_POST['tambah_id_jur']);

        $result = mysqli_query($connection, "INSERT INTO mahasiswa (nrp, nama, alamat, id_jur) VALUES ($nrp, '$nama', '$alamat', $id_jur);");
        if($result) {
            echo '<script>alert("Berhasil menambah mahasiswa!")</script>';
        } else {
            echo '<script>alert("Gagal menambah mahasiswa.")</script>';
        }
    } elseif(isset($_POST['hapus'])) {
        $nrp = mysqli_real_escape_string($connection, $_POST['hapus_nrp']);

        $result = mysqli_query($connection, "DELETE FROM mahasiswa WHERE nrp = $nrp;");
        if($result) {
            echo '<script>alert("Berhasil menghapus mahasiswa!")</script>';
        } else {
            echo '<script>alert("Gagal menghapus mahasiswa.")</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistem Informasi Mahasiswa</title>
    </head>
    <body>
        <h1>Sistem Informasi Mahasiswa Anu</h1>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jurusan</th>
            </tr>
            <?php
                

                $result_mhs = mysqli_query($connection, 'SELECT * FROM mahasiswa');

                $num = 1;
                while($row = mysqli_fetch_assoc($result_mhs)) {
                    $nama   = $row['nama'];
                    $nrp    = $row['nrp'];
                    $alamat = $row['alamat']; 
                    $nama_jurusan = $jurusan[$row['id_jur']];

                    echo "
                        <tr>
                            <td>$num</td>
                            <td>$nrp</td>
                            <td>$nama</td>
                            <td>$alamat</td>
                            <td>$nama_jurusan</td>
                        </tr>
                    ";

                    $num++;
                }
            ?>
        </table>

        <h2>Tambah Mahasiswa</h2>
        <form action="" method="POST">
            NRP<input type="text" name="tambah_nrp" required><br>
            Nama<input type="text" name="tambah_nama" required><br>
            Alamat<textarea name="tambah_alamat" rows="2" required></textarea><br>
            Jurusan
            <select name="tambah_id_jur" required>
                <option disabled selected>Pilih...</option>
                <?php
                    foreach($jurusan as $key=>$val) {
                        echo '<option value="' . $key . '">' . $val . '</option>';
                    }
                ?>
            </select><br>
            <input type="submit" name="tambah" value="Tambah">
        </form>

        <h2>Hapus Mahasiswa</h2>
        <form action="" method="POST">
            NRP<input type="number" name="hapus_nrp" required><br>
            <input type="submit" name="hapus" value="Hapus">
        </form>

        <h2>Cari Mahasiswa</h2>
        <form action="" method="POST">
            Nama<input type="text" name="cari_nama">
            <input type="submit" name="cari" value="Cari">
        </form>

        <?php
            if(isset($_POST['cari'])) {
                $nama = mysqli_real_escape_string($connection, $_POST['cari_nama']);

                $result = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nama LIKE '%$nama%'");
                $total  = mysqli_num_rows($result);
                $num    = 1;

                echo 'Ditemukan ' . $total . ' baris.<br>';
                echo '
                    <table border="1">
                        <tr>
                            <th>No.</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                        </tr>
                ';
                while($row = mysqli_fetch_assoc($result)) {
                    $nama   = $row['nama'];
                    $nrp    = $row['nrp'];
                    $alamat = $row['alamat']; 
                    $nama_jurusan = $jurusan[$row['id_jur']];

                    echo "
                        <tr>
                            <td>$num</td>
                            <td>$nrp</td>
                            <td>$nama</td>
                            <td>$alamat</td>
                            <td>$nama_jurusan</td>
                        </tr>
                    ";

                    $num++;
                }
                echo '
                    </table>
                ';
            }
        ?>
    </body>
</html>