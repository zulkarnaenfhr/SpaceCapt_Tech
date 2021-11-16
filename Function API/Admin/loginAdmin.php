<?php 
    $koneksi = new mysqli("localhost","root","","spacecapt_tech");

    function loginAdmin ($username,$password){
        global $koneksi;
        $queryCekAdmin = mysqli_query($koneksi,"SELECT * FROM administrasi WHERE Username = '$username'");

        if (mysqli_num_rows($queryCekAdmin)) {
            $data = mysqli_fetch_assoc($queryCekAdmin);
            if (password_verify($password,$data['Password'])) {
                return 1;
            }else {
                return 0;
            }
        }else {
            return 2;
        }
    }
?>
