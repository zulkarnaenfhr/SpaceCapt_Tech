<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");
    header('Content-Type: application/json');

    $Id_Pegawai = htmlspecialchars($_POST['Id_Pegawai']); 
    $Id_Jabatan = htmlspecialchars($_POST['Id_Jabatan']);
    $Nama_Pegawai = htmlspecialchars($_POST['Nama_Pegawai']);
    $Kota_Asal_Pegawai = htmlspecialchars($_POST['Kota_Asal_Pegawai']);
    
    $queryInsertDataPegawai = mysqli_query($koneksi,"INSERT INTO pegawai VALUES('$Id_Pegawai','$Id_Jabatan','$Nama_Pegawai','$Kota_Asal_Pegawai')");
    
    // berhasil atau tidak
    if ($queryInsertDataPegawai) {
        echo json_encode(array('message' => 'created!'));
    }else {
        echo json_encode(array('message' => 'error!'));
    }
?>