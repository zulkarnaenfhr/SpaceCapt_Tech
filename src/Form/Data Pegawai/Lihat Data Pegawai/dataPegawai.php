<?php 
    session_start();

    if (!isset($_SESSION["loginPass"])) {
        echo "<script>
                document.location.href = '../../../../Authentification and Authorization/formLoginAdmin.php'
            </script>";
    }
?>

<?php 
    // code dibawah dimasukin if not set

    if (isset($_POST["tombolCari"])) {
        $keyword = $_POST["idPegawai"];

        $apiCariPegawai = 'http://localhost/phpDasar/6.%20Tugas%20Rest%20Api/Function%20API/Pegawai/cariDataPegawai.php?keyword='.$keyword;
        $konten = file_get_contents($apiCariPegawai);
        $data = json_decode($konten);
    }

    if (isset($_POST["tombolTampilkanSemua"])) {
        $apiReadPegawai = 'http://localhost/phpDasar/6.%20Tugas%20Rest%20Api/Function%20API/Pegawai/readPegawai.php';
        $konten = file_get_contents($apiReadPegawai);
        $data = json_decode($konten);
    }

    if (!isset($_POST["tombolCari"])) {
        $apiReadPegawai = 'http://localhost/phpDasar/6.%20Tugas%20Rest%20Api/Function%20API/Pegawai/readPegawai.php';
        $konten = file_get_contents($apiReadPegawai);
        $data = json_decode($konten);
    }
?>
<?php 
    include '../../../../Function API/pegawai/hapusPegawai.php';

    if (isset($_POST["hapusData"])) {
        $Id_Pegawai = $_POST["Id_Pegawai"];

        // echo "$Id_Pegawai";
        $queryHapusDataPegawai = hapusDataPegawai($Id_Pegawai);

        if ($queryHapusDataPegawai == 0) {
            echo "<script>
                    alert('Gagal Menghapus Data')
                </script>";
            echo "<script>
                    document.location.href = 'dataPegawai.php'
                </script>";  
        }elseif ($queryHapusDataPegawai == 1) {
            echo "<script>
                    alert('Berhasil Menghapus Data')
                </script>";
            echo "<script>
                    document.location.href = 'dataPegawai.php'
                </script>";  
        }else {
            echo "<script>
                    alert('Error Code Tidak Diketahui')
                </script>";
            echo "<script>
                    document.location.href = 'dataPegawai.php'
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

    <!-- link css form login      -->
    <link rel="stylesheet" href="../../../Style/Style Menu Pegawai/StyleMenuPegawai.css">

    <!-- link css navbar -->
    <link rel="stylesheet" href="../../../Style/Style Navbar/styleNavbar.css">

    <title>Data Pegawai</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a id="homeBrand" class="navbar-brand" href="../../../../index.php">SpaceCapt Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a id="navbar-menu" class="nav-link active" aria-current="page" href="../../../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="navbar-menu" class="nav-link active" aria-current="page" href="#">CRUD Data Pegawai</a>
                    </li>
                    <li class="nav-item">
                            <a id="navbar-menu" class="nav-link active" aria-current="page" href="../../../../Authentification and Authorization/logout.php">Log Out</a>
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
                        <h3 class="judulSection">Menampilkan Data Pegawai</h3>
                    </div>
                    <div class="row">
                        <div class="col-4  option-left">
                            <form action="" method="POST">
                                <input type="text" name="idPegawai" autocomplete="off">
                                <button type="submit" name="tombolCari">Cari Id Pegawai</button>
                            </form>
                        </div>
                        <div class="col-4 buttonTampilkanSemua">
                            <form action="" method="post">
                                <button type="submit" name="tombolTampilkanSemua">Tampilkan Semua Pegawai</button>
                            </form>
                        </div>
                        <div class="col-4 option-right">
                            <a href="../Tambah Data Pegawai/tambahDataPegawai.php">
                                <button>Masukkan Data Baru</button>
                            </a>
                        </div>
                    </div>
                </div>
                <section id="table-content">
                    <div class="container">
                        <table class="tabelOutput">
                            <tr class="judulTabel">
                                <th class="tableNoUrut">Nomor</th>
                                <th class="tableIdPegawai">Id_Pegawai</th>
                                <th class="tableIdJabatan">Id_Jabatan</th>
                                <th class="tableNamaJabatan">Nama_Jabatan</th>
                                <th class="tableNamaPegawai">Nama_Pegawai</th>
                                <th class="tableKotaAsalPegawai">Kota_Asal_Pegawai</th>
                                <th class="tableOption">Option</th>
                            </tr>
                            <?php
                                $id = 1;
                                foreach ($data as $row) {
                            ?>
                            <tr>
                                <th>
                                    <?php echo $id++ ?>
                                </th>
                                <th>
                                    <?php echo $row->Id_Pegawai ?>
                                </th>
                                <th>
                                    <?php echo $row->Id_Jabatan ?>
                                </th>
                                <th>
                                    <?php echo $row->Nama_Jabatan ?>
                                </th>
                                <th>
                                    <?php echo $row->Nama_Pegawai ?>
                                </th>
                                <th>
                                    <?php echo $row->Kota_Asal_Pegawai ?>
                                </th>
                                <th class="isi-tableOption">
                                    <ul>
                                        <li>
                                            <form action="" method="post">
                                                <input type="hidden" name="Id_Pegawai"
                                                    value="<?php echo $row->Id_Pegawai;?>">
                                                <button type="submit" name="hapusData">Hapus</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="../Edit Data Pegawai/editDataPegawai.php" method="POST">
                                                <input type="hidden" name="Id_Pegawai"
                                                    value="<?php echo $row->Id_Pegawai;?>">
                                                <button type="submit" name="editData">Edit</button>
                                            </form>
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                            <?php }
                            ?>
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