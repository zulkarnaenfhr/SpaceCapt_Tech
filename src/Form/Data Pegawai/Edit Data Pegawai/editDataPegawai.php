<?php 
    include '../../../../config.php';
    function cekIdPegawai ($keyword){
        global $koneksi;

        $queryIdPegawai = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE Id_Pegawai = '$keyword'");

        return $queryIdPegawai;
    }

    $ambilIdPegawai = $_POST['Id_Pegawai'];
    $queryAmbilDataPegawai = cekIdPegawai($ambilIdPegawai);
    $data = mysqli_fetch_assoc($queryAmbilDataPegawai);
?>
<?php 
    include '../../../../Function API/Pegawai/editDataPegawai.php';
    if (isset($_POST["editDataPegawai"])) {
        $queryEditDataPegawai = editDataPegawai($_POST);
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
    <link rel="stylesheet" href="../../../Style/Style Navbar/styleNavbar.css">

    <!-- link css tambah pegawai -->
    <link rel="stylesheet" href="../../../Style/Style Menu Pegawai/StyleTambahPegawai.css">

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
        <div class="container">
            <div class="container-fluid">
                <section id="formTambahPegawai">
                    <ul>
                        <li>
                            <h3>Silahkan Register Terlebih Dahulu</h3>
                        </li>
                        <li>
                            <form class="dataTambahPegawai" action="" method="post">
                                <input type="hidden" name="Id_PegawaiLama" value="<?php echo $data["Id_Pegawai"]?>">
                                <ul>
                                    <li class="row">
                                        <div class="col-5">
                                            <label" for="Id_Pegawai">Id Pegawai :</label>
                                        </div>
                                        <div class="col-6"> <input value="<?php echo $data["Id_Pegawai"]?>" type="text" name="Id_PegawaiBaru" id="Id_PegawaiBaru"> </div>
                                    </li>
                                    <li>
                                        <label for="">Jabatan :</label>
                                        <select name="Id_Jabatan" id="selectJabatan">
                                            <?php 
                                                $jabatan = mysqli_query($koneksi,"SELECT * FROM jabatan");
                                                while ($dataJabatan = mysqli_fetch_assoc($jabatan)) {
                                                    echo '<option value="'.$dataJabatan['id_Jabatan'].'">'.$dataJabatan['Nama_Jabatan'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </li>
                                    <li class="row">
                                        <div class="col-5">
                                            <label" for="Nama_Pegawai">Nama Pegawai :</label>
                                        </div>
                                        <div class="col-6"> <input value="<?php echo $data["Nama_Pegawai"]?>" type="text" name="Nama_Pegawai" id="Nama_Pegawai">
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-5">
                                            <label" for="Kota_Asal_Pegawai">Kota Asal Pegawai :</label>
                                        </div>
                                        <div class="col-6"> <input value="<?php echo $data["Kota_Asal_Pegawai"]?>" type="text" name="Kota_Asal_Pegawai"
                                                id="Kota_Asal_Pegawai"> </div>
                                    </li>

                                    <li>
                                        <button type="submit" name="editDataPegawai">Edit Data Pegawai</button>
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