<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");
    
    $keyword = $_GET["keyword"];

    $queryAmbilSeluruhDataPegawai = mysqli_query($koneksi,"SELECT * FROM pegawai INNER JOIN jabatan on pegawai.Id_Jabatan = jabatan.id_Jabatan WHERE pegawai.Id_Pegawai = '$keyword'");


    if ($queryAmbilSeluruhDataPegawai) {
        header('Content-Type: application/json');
        $hasilData = array();
        while ($data = mysqli_fetch_array($queryAmbilSeluruhDataPegawai)) {
            array_push($hasilData,array(
                'Id_Pegawai' =>$data['Id_Pegawai'],
                'Id_Jabatan' =>$data['Id_Jabatan'],
                'Nama_Jabatan' =>$data['Nama_Jabatan'],
                'Nama_Pegawai' =>$data['Nama_Pegawai'],
                'Kota_Asal_Pegawai' =>$data['Kota_Asal_Pegawai']
            ));
        }
        echo json_encode($hasilData);
    }else {
        echo json_encode("salah");
    }
?>