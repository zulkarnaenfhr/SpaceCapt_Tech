<?php 
    include '../Function API/Admin/InputAdmin.php';
    // include $InputAdminApi;
    
    if (isset($_POST["registerUser"])) {

        // $sumber = adminRegistration($_POST);
        $data = json_decode($sumber,true);

        echo $data;
        
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

    <!-- link css form login      -->
    <link rel="stylesheet" href="../src/Style/Style Authentication and Authorization/StyleRegisterAdmin.css">

    <!-- link css navbar -->
    <link rel="stylesheet" href="../src/Style/Style Navbar/styleNavbar.css">

    <title>LandingPage SpaceCapt University</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a id="homeBrand" class="navbar-brand" href="#">SpaceCapt University</a>
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
                    <li class="nav-item dropdown" id="navbar-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Data Mahasiswa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Seluruh Data Mahasiswa</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <p class="dropdown-item">Fasilkom</p>
                            </li>
                            <div id="isiFakultas">
                                <li>
                                    <a id="jurusan" class="dropdown-item" href="#">Informatika</a>
                                </li>
                                <li>
                                    <a id="jurusan" class="dropdown-item" href="#">Sistem Informasi</a>
                                </li>
                                <li>
                                    <a id="jurusan" class="dropdown-item" href="#">Sains Data</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a id="navbar-login" aria-current="page" class="nav-link active" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>