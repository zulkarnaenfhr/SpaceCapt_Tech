<?php 
    // $koneksi = new mysqli("localhost","root","","spacecapt_tech");
    // header('Content-Type: application/json');
    

    // function cekUser($keyword){
    //     global $koneksi;

    //     $queryCekUser = mysqli_query($koneksi, "SELECT * FROM administrasi WHERE Username = '$keyword';");

    //     return $queryCekUser;
    // }

    // function adminRegistration ($data){
    //     header('Content-Type: application/json');

    //     // ambil data terlebih dahulu
    //     global $koneksi;

    //     $username = strtolower(stripslashes($data["username"]));
    //     $password = mysqli_real_escape_string($koneksi,$data["password"]);
    //     $confirmPassword = mysqli_real_escape_string($koneksi,$data["confirmPassword"]);
        
    //     // cek apakah ada username atau tidak
    //     $cekUsername = cekUser($username);
    //     if (mysqli_fetch_assoc($cekUsername)) {
    //         echo "<script>
    //         alert('Username telah ditemukan')    
    //         </script>";   
    //         return false;
    //     }
        
    //     // confirmasi password
    //     if ($password !== $confirmPassword) {
    //         echo "<script>
    //         alert('password tidak sesuai')    
    //         </script>"; 
    //         return false;                                
    //     }
        
    //     // lakukan enkripsi passwordnya
    //     $password = password_hash($password,PASSWORD_DEFAULT);
        
    //     // tambahkan user baru ke database
    //     $queryTambahUser = mysqli_query($koneksi,"INSERT INTO administrasi  VALUES ('$username','$password')");
        
    //     if ($queryTambahUser) {
    //         echo json_encode(array('status' => '1','message' => 'created!'));
    //     }else {
    //         echo json_encode(array('status' => '0','message' => 'error!'));
    //     }
    // }
    
    // yang asli
    // $koneksi = new mysqli("localhost","root","","spacecapt_tech");
    // header('Content-Type: application/json');
    

    function cekUser($keyword){
        global $koneksi;

        $queryCekUser = mysqli_query($koneksi, "SELECT * FROM administrasi WHERE Username = '$keyword';");
        
        return $queryCekUser;
    }
    
    
    // ambil data terlebih dahulu
    global $koneksi;
    
    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($koneksi,$_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($koneksi,$_POST["confirmPassword"]);
    
    // cek apakah ada username atau tidak
    $cekUsername = cekUser($username);
    if (mysqli_fetch_assoc($cekUsername)) {
        echo "<script>
        alert('Username telah ditemukan')    
        </script>";   
        return false;
    }
    
    // confirmasi password
    if ($password !== $confirmPassword) {
        echo "<script>
        alert('password tidak sesuai')    
        </script>"; 
        return false;                                
    }
    
    // lakukan enkripsi passwordnya
    $password = password_hash($password,PASSWORD_DEFAULT);
    
    // tambahkan user baru ke database
    $queryTambahUser = mysqli_query($koneksi,"INSERT INTO administrasi  VALUES ('$username','$password')");
    
    if ($queryTambahUser) {
        echo json_encode(array('status' => '1','message' => 'created!'));
    }else {
        echo json_encode(array('status' => '0','message' => 'error!'));
    }
?>