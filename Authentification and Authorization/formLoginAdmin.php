<?php 
    session_start();
    include '../Function API/Admin/loginAdmin.php';

    if (isset($_SESSION["loginPass"])) {
        header('Location:../homepage.php');
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $loginAdmin = loginAdmin($username,$password);

        if ($loginAdmin == 0) {
            echo "<script>
                    alert ('Password Tidak Cocok')
                </script>";
            echo "<script>
                    document.location.href = 'formLoginAdmin.php'
                </script>";  
        }elseif ($loginAdmin == 1) {
            $_SESSION["loginPass"] = true;    
            echo "<script>
                alert ('Selamat Datang')
            </script>";
            echo "<script>
                    document.location.href = '../index.php'
                </script>";  
        }elseif ($loginAdmin == 2) {
            echo "<script>
                    alert ('Username Tidak Ditemukan')
                </script>";
            echo "<script>
                    document.location.href = 'formLoginAdmin.php'
                </script>";  
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link css navbar -->
    <link rel="stylesheet" href="../src/Style/Style Navbar/styleNavbar.css">

    <!-- link css login -->
    <link rel="stylesheet" href="../src/Style/Style Authentication and Authorization/StyleFormLogin.css">

    <title>Login Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a id="homeBrand" class="navbar-brand" href="#">SpaceCapt Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a id="navbar-menu" class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="navbar-menu" class="nav-link active" aria-current="page" href="#">CRUD Data Pegawai</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="container-fluid">
                <section id="formLogin">
                    <ul>
                        <li>
                            <h3>Silahkan Login Terlebih Dahulu</h3>
                        </li>
                        <li>
                            <form class="dataLogin" action="" method="post">
                                <ul>
                                    <li class="row">
                                        <div class="col-3">
                                            <label" for="username">username :</label>
                                        </div>
                                        <div class="col-6"> <input type="text" name="username" id="username"> </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-3"> <label for="password">password :</label> </div>
                                        <div class="col-6"> <input type="password" name="password" id="password"> </div>
                                    </li>
                                    <li>
                                        <button type="submit" name="login">Log In</button>
                                        <button name="registerUser">
                                            <a id="buttonRegister" href="registerAdmin.php">register Account</a>
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>