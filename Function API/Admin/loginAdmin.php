<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");

    function loginAdmin ($username,$password){
        global $koneksi;
        $queryCekAdmin = mysqli_query($koneksi,"SELECT * FROM administrasi WHERE Username = '$username'");

        if (mysqli_num_rows($queryCekAdmin)) {
            $data = mysqli_fetch_assoc($queryCekAdmin);
            if (password_verify($password,$data['Password'])) {
                echo json_encode(array('status' => '1','message' => 'Berhasil Login!'));
                return 1;
            }else {
                echo json_encode(array('status' => '0','message' => 'Password Salah!'));
                return 0;
            }
        }else {
            echo json_encode(array('status' => '2','message' => 'Username Tidak Ditemukan!'));
            return 2;
        }
    }
?>
