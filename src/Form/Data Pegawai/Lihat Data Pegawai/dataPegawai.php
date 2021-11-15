<?php 
    // $sumber = '../../../../Function API/Pegawai/readPegawai.php';
    // $konten = file_get_contents($sumber);
    // $data = json_decode($konten,true);
    // var_dump($data);

    $konten = file_get_contents('../../../../Function API/Pegawai/readPegawai.php');
    
    echo $konten;
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
    <link rel="stylesheet" href="../../../Style/Style Menu Pegawai/StyleMenuPegawai.css">

    <!-- link css navbar -->
    <link rel="stylesheet" href="../../../Style/Style Navbar/styleNavbar.css">

    <title>LandingPage SpaceCapt University</title>
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
        <section id="tampilDataInformatika">
            <div class="container-fluid">
                <div class="container tampilDataInformatika-content">
                    <div class="row">
                        <h3 class="judulSection">Menampilkan Data Mahasiswa Informatika</h3>
                    </div>
                    <div class="row">
                        <div class="col-6 option-left">
                            <form action="" method="POST">
                                <input type="text" name="cariNpm" autocomplete="off">
                                <button type="submit" name="tombolCari">Cari Npm</button>
                            </form>
                        </div>
                        <div class="col-6 option-right">
                            <?php 
                                    $idForm = 11;
                                    echo "<a href='../../form/form Tambah Data/formTambahDataMahasiswa.php?id=".$idForm."'><button >Masukkan Data Baru</button></a> ";
                                ?>
                        </div>
                    </div>
                </div>
                <section id="table-content">
                    <div class="container">
                        <table class="tabelOutput">
                            <tr class="judulTabel">
                                <th class="tableNoUrut">Nomor</th>
                                <th class="tableNpm">NPM</th>
                                <th class="tableNama">Nama</th>
                                <th class="tableKota">Kota</th>
                                <th class="tableFakultas">Fakultas</th>
                                <th class="tableJurusan">Jurusan</th>
                                <th class="tableOption">Option</th>
                            </tr>
                        </table>
                    </div>
                </section>

            </div>
        </section>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>