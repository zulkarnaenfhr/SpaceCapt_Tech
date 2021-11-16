<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");
    

    function cekUser($keyword){
        global $koneksi;

        $queryCekUser = mysqli_query($koneksi, "SELECT * FROM administrasi WHERE Username = '$keyword';");

        return $queryCekUser;
    }

    function adminRegistration ($data){

        // ambil data terlebih dahulu
        global $koneksi;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($koneksi,$data["password"]);
        $confirmPassword = mysqli_real_escape_string($koneksi,$data["confirmPassword"]);
        
        // cek apakah ada username atau tidak
        $cekUsername = cekUser($username);
        if (mysqli_fetch_assoc($cekUsername)) {
            header('Contnt-Type: application/json');
            echo json_encode(array('status' => '2','message' => 'Username Telah Ditemukan!'));
            return 2;
        }
        
        // confirmasi password
        if ($password !== $confirmPassword) {
            header('Contnt-Type: application/json');
            echo json_encode(array('status' => '3','message' => 'Password Tidak Cocok!'));
            return 3;                                
        }
        
        // lakukan enkripsi passwordnya
        $password = password_hash($password,PASSWORD_DEFAULT);
        
        // tambahkan user baru ke database
        $queryTambahUser = mysqli_query($koneksi,"INSERT INTO administrasi  VALUES ('$username','$password')");
        
        if ($queryTambahUser) {
            header('Contnt-Type: application/json');
            echo json_encode(array('status' => '1','message' => 'created!'));
            return 1;
        }else {
            header('Contnt-Type: application/json');
            echo json_encode(array('status' => '0','message' => 'error!'));
            return 0;
        }
    }
    
    // yang asli
    // $koneksi = new mysqli("localhost","root","","spacecapt_tech");    

    // function cekUser($keyword){
    //     global $koneksi;

    //     $queryCekUser = mysqli_query($koneksi, "SELECT * FROM administrasi WHERE Username = '$keyword';");
        
    //     return $queryCekUser;
    // }
    
    
    // // ambil data terlebih dahulu
    // global $koneksi;
    
    // $username = strtolower(stripslashes($_POST["username"]));
    // $password = mysqli_real_escape_string($koneksi,$_POST["password"]);
    // $confirmPassword = mysqli_real_escape_string($koneksi,$_POST["confirmPassword"]);
    
    // // cek apakah ada username atau tidak
    // $cekUsername = cekUser($username);
    // if (mysqli_fetch_assoc($cekUsername)) {
    //     echo "<script>
    //     alert('Username telah ditemukan')    
    //     </script>";   
    //     return false;
    // }
    
    // // confirmasi password
    // if ($password !== $confirmPassword) {
    //     echo "<script>
    //     alert('password tidak sesuai')    
    //     </script>"; 
    //     return false;                                
    // }
    
    // // lakukan enkripsi passwordnya
    // $password = password_hash($password,PASSWORD_DEFAULT);
    
    // // tambahkan user baru ke database
    // $queryTambahUser = mysqli_query($koneksi,"INSERT INTO administrasi  VALUES ('$username','$password')");
    
    // if ($queryTambahUser) {
    //     header('Content-Type: application/json');
    //     echo json_encode(array('status' => '1','message' => 'created!'));
    // }else {
    //     header('Content-Type: application/json');
    //     echo json_encode(array('status' => '0','message' => 'error!'));
    // }
?>