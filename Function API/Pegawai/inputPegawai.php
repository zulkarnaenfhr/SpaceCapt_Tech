<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");
    // header('Content-Type: application/json');

    function cekIdPegawai ($keyword){
        global $koneksi;

        $queryIdPegawai = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE Id_Pegawai = '$keyword'");

        return $queryIdPegawai;
    }

    function TambahDataPegawai ($data){
        global $koneksi;

        $Id_Pegawai = $data["Id_Pegawai"];
        $Id_Jabatan = $data["Id_Jabatan"];
        $Nama_Pegawai = $data["Nama_Pegawai"];
        $Kota_Asal_Pegawai = $data["Kota_Asal_Pegawai"];

        $cekIdPegawai = cekIdPegawai($Id_Pegawai);

        if (mysqli_fetch_assoc($cekIdPegawai)) {
            // header('Content-Type: application/json');
            echo json_encode(array('status' => '2','message' => 'Id Pegawai Telah Ada!'));
            return 2;
        }

        $queryTambahPegawai = mysqli_query($koneksi,"INSERT INTO pegawai VALUES ('$Id_Pegawai','$Id_Jabatan','$Nama_Pegawai','$Kota_Asal_Pegawai')");

        if ($queryTambahPegawai) {
            // header('Content-Type: application/json');
            echo json_encode(array('status' => '1','message' => 'Data Berhasil Ditambah!'));
            return 1;
        }else {
            // header('Content-Type: application/json');
            echo json_encode(array('status' => '0','message' => 'Data Gagal Ditambah!'));
            return 0;
        }
    }
?>