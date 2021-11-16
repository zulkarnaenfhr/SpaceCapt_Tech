<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");

    function editDataPegawai($data){
        global $koneksi;

        $Id_PegawaiLama = $data["Id_PegawaiLama"];
        $Id_PegawaiBaru = $data["Id_PegawaiBaru"];
        $Id_Jabatan = $data["Id_Jabatan"];
        $Nama_Pegawai = $data["Nama_Pegawai"];
        $Kota_Asal_Pegawai = $data["Kota_Asal_Pegawai"];

        $queryEditDataPegawai = mysqli_query($koneksi,"UPDATE pegawai SET Id_Pegawai='$Id_PegawaiLama',Id_Jabatan='$Id_Jabatan',Nama_Pegawai='$Nama_Pegawai',Kota_Asal_Pegawai='$Kota_Asal_Pegawai'");

        if ($queryEditDataPegawai) {
            echo json_encode(array('status' => '1','message' => 'Data Pegawai Berhasil Di Edit!'));
            return 1;
        }else {
            echo json_encode(array('status' => '0','message' => 'Data Pegawai Gagal Di Edit!'));
            return 0;
        }
;    }
?>