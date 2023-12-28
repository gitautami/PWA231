<?php
    require "config.php";
    session_start();
    $id = $_GET['id'];
    $sql = mysqli_query($db, "SELECT * FROM pendaftaran WHERE id = '$id'");

    while ($data = mysqli_fetch_array($sql)) {
        $nama           = $data['nama'];
        $alamat         = $data['alamat'];
        $jenis_kelamin  = $data['jenis_kelamin'];
        $agama          = $data['agama'];
        $asal_sekolah   = $data['asal_sekolah'];
    }

    if (isset($_POST['update'])) {
        $nama           = $_POST['nama'];
        $alamat         = $_POST['alamat'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $agama          = $_POST['agama'];
        $sekolah_asal   = $_POST['sekolah_asal'];

        $sql_update = "UPDATE 
                        pendaftaran 
                    SET
                        nama = '$nama',
                        alamat = '$alamat',
                        jenis_kelamin = '$jenis_kelamin',
                        agama = '$agama',
                        asal_sekolah = '$asal_sekolah'
                    WHERE
                        id = '$id'";

        $return = mysqli_query($db, $sql_update);
        if (!$return) {
            die("Gagal Edit Mahasiswa Baru!");
        }
        echo "<script>
                alert('Berasil Edit Mahasiswa Baru');
                document.location.href = 'list-maba.php';
            </script>";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran Mahasiswa Baru | ULBI</title>
</head>
<body>
    <header>
        <h3>Edit Pendaftaran Mahasiswa Baru | ULBI</h3>
    </header>

    <form action="" method="post">
        <fieldset>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?= $nama?>">
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat" id="alamat" cols="30" rows="10"><?= $alamat?></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <label><input type="radio" name="jenis_kelamin" value="Laki-laki" value="laki-laki" <?php if ($jenis_kelamin == 'Laki-laki') {echo "checked=checked";} ?>>Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="Perempuan" value="perempuan" <?php if ($jenis_kelamin == 'Perempuan') {echo "checked=checked";} ?>>Perempuan</label>
            </p>
            <p>
                <label for="agama">Agama: </label>
                <select name="agama" id="agama">
                    <option value="Islam" <?php if ($agama == 'Islam') {echo "selected";} ?>>Islam</option>
                    <option value="Kristen" <?php if ($agama == 'Kristen') {echo "selected";} ?>>Kristen</option>
                    <option value="Hindu" <?php if ($agama == 'Hindu') {echo "selected";} ?>>Hindu</option>
                    <option value="Budha" <?php if ($agama == 'Budha') {echo "selected";} ?>>Budha</option>
                </select>
            </p>
            <p>
                <label for="asal_sekolah">Sekolah Asal: </label>
                <input type="text" name="asal_sekolah" placeholder="Nama Sekolah" value="<?= $asal_sekolah ?>">
            </p>
            <p>
                <input type="submit" value="Update" name="update">
            </p>
        </fieldset>
    </form>
</body>
</html>