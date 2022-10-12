<?php
    if ( isset($_GET["nis"]) ){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM datadiri WHERE nis = '$nis';";
        include('./input-config.php');
        $querry = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($querry);
    }
?>
<div class="container">
<h2>Edit Data</h2>
<form action="input-datadiri-edit.php" method="POST">
    <label for="nis"> Nomor Induk siswa :</label>
    <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12001142" /><br>

    <label for="nama"> Nama Lengkap :</label>
    <input class="form-control" value="<?php echo $row["namalengkap"]; ?>" type="text" name="nama" placeholder="Ex. David Lutfhi" /><br>

    <label for="tanggal_lahir"> Tanggal Lahir :</label>
    <input class="form-control" value="<?php echo $row["tanggal_lahir"]; ?>" type="date" name="tanggal_lahir" /><br>

    <label for="nilai"> Nilai :</label>
    <input class="form-control" value="<?php echo $row["nilai"]; ?>" type="number" name="nilai" placeholder="Ex. 80.56" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-datadiri.php">kembali</a>
</form>
<?php
    include ('./input-config.php');
    if ($_SESSION["role"] !="admin"){
        echo"
            <script>
                alert('Akses tidak diberikan, Kamu bukan admin');
                window.location='input-datadiri.php';
            </script>
        ";
    }
    if ( isset($_POST["simpan"])) {
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $nilai = $_POST["nilai"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE datadiri SET namalengkap = '$nama',
            tanggal_lahir = '$tanggal_lahir',
            nilai = '$nilai'
            WHERE nis = '$nis';
        ";
        include ('./input-config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='input-datadiri.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='input-datadiri-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>