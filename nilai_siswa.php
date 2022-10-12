<?php
    include('./config_siswa.php');
        echo "<a href='siswa_tambah.php'>Tambah Data</a>";
        echo "<hr>";
        //Menampilkan data diri database
        $no = 1 ;
        $tabledata = "" ;
        $data = mysqli_query($mysqli, " SELECT * FROM siswa_nilai ");
        while($row = mysqli_fetch_array($data)) {
            $nilai_akhir = ($row["kehadiran"] + $row["tugas"] + $row["uts"] + $row["uas"])/4 ;
            $tabledata .= "
                <tr>
                    <td>".$row["nis"]."</td>
                    <td>".$row["namalengkap"]."</td>
                    <td>".$row["Kelas"]."</td>
                    <td>".$row["kehadiran"]."</td>
                    <td>".$row["tugas"]."</td>
                    <td>".$row["uts"]."</td>
                    <td>".$row["uas"]."</td>
                    <td>".$nilai_akhir."</td> 
                    <td>
                        <a href='siswa_edit.php?nis=".$row["nis"]."'>Edit</a>
                        &nbsp;-&nbsp;
                        <a href='siswa_hapus.php?nis=".$row["nis"]."'
                        onclick='return confirm(\"Yakin Hapus\");'>Hapus</a>
                    </td>
                </tr>    
            ";
            $no++;
        }

        echo "
            <table cellpading=5 border=1 cellspacing=0
                <tr>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Kehadiran</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Aksi</th>
                </tr>
                $tabledata
            </table>
            ";
?>