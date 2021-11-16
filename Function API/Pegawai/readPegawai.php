<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");

    $queryAmbilSeluruhDataPegawai = mysqli_query($koneksi,"SELECT * FROM pegawai INNER JOIN jabatan on pegawai.Id_Jabatan = jabatan.id_Jabatan");

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
    // header('Content-Type: application/json');
        echo json_encode($hasilData);
    }

?>