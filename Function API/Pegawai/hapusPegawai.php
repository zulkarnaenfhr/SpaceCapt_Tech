<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");

    function hapusDataPegawai($Id_Pegawai){
        global $koneksi;

        $queryHapusDataPegawai = mysqli_query($koneksi,"DELETE FROM pegawai WHERE Id_Pegawai = '$Id_Pegawai'");

        if ($queryHapusDataPegawai) {
            echo json_encode(array('status' => '1','message' => 'Berhasil Menghapus Data!'));
            return 1;
        }else {
            echo json_encode(array('status' => '0','message' => 'Data Gagal Dihapus!'));    
            return 0;
        }
    }
?>