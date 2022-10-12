<?php
    include('./input-config.php');
    if( $_SESSION["login"] != TRUE){
        header('location:login.php');
    }
    echo "<div class='container'>";
    echo "Selamat Datang " .$_SESSION["username"] . "<br>";
    echo "Anda Sebagai : " .$_SESSION["role"];
    echo " - <a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
    echo "<hr>";
    echo "<a class='btn btn-sm btn-primary' href='input-datadiri-tambah.php'>Tambah Data</a>";
    echo " - <a class='btn btn-sm btn-warning' href='input-datadiri-pdf.php'>Cetak PDF</a>";
    echo "<hr>";
    // Menampilkan data dari database
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM nilai ");
    while ($row = mysqli_fetch_array($data)){
        $tabledata .= "
            <tr>
             <td>".$row["nis"]."</td>
             <td>".$row["nama_lengkap"]."</td>
             <td>".$row["jenis_kelamin"]."</td>
             <td>".$row["kelas"]."</td>
             <td>".$row["nilai_kehadiran"]."</td>
             <td>".$row["nilai_tugas"]."</td>
             <td>".$row["nilai_pts"]."</td>
             <td>".$row["nilai_pas"]."</td>
             <td>
                <a class='btn btn-sm btn-success' href='input-datadiri-edit.php?nis=".$row["nis"]."'>Edit</a>
                &nbsp; -&nbsp;
                <a class='btn btn-sm btn-danger' href= 'input-datadiri-hapus.php?nis=".$row["nis"]."'
                onclick='return confirm(\"Yakin Hapus ?\");'>Hapus</a>
             </td>
            </tr> 
        ";
        $no++;
    }

    echo "
          <table class='table table-dark table-bordered table-striped'>
                <tr>
                   <th>NIS</th> 
                   <th>Nama Lengkap</th> 
                   <th>jenis kelamin</th> 
                   <th>Kelas</th>
                   <th>Kehadiran</th>
                   <th>Tugas</th>
                   <th>PTS</th>
                   <th>PAS</th>
                   <th>Aksi</th>
                </tr>
                $tabledata
          </table>
    ";
    echo"</div>";
?>