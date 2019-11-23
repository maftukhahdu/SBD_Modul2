<?php
session_start();
include 'koneksi.php';
if ( $_SESSION['username']) {
  echo "Selamat!, Anda Berhasil Login";
  
}else {
  echo "Login Gagal:(";
       header("location:login.php");}
?>
 
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Praktikum SBD Modul 2</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type='javascript' src="assets/js/bootstrap.min.js"></script>
</head>

<body style="background-color : #fafafa;"> <br><br>
    <header class="main-header">
        <center>
            <h1 class="blog-title">CRUD Sederhana dengan PHP dan MYSQL</h1>
        </center>
        <center>
            <h4 class="blog-title">Praktikum Sistem Basis Data 2019</h4>
        </center>
    </header><br><br>
    <!-- Membuat navbar di sebelah kirihalaman -->
    <div class="col-md-2" align="left">
        <ul class="nav" id="main-menu">
            <br>
            <li>
                <a class="active-menu" href="mahasiswa.php"><i class="fa	fa-user	fa-2x"></i>Mahasiswa</a>
            </li>
            <li>
                <a href="dosen.php"><i class="fa fa-user fa-2x"></i>Dosen</a>
            </li>
            <li>
                <a href="join.php"><i class="fa fa-user fa-2x"></i>Data Perwalian</a>
            </li>
            <li>
                <p><a href='logout.php'><button type='button' class='btn btn-danger'><span class='glyphiconglyphicon-plus-sign'></span> Logout</button></a></p>
            </li>
        </ul>
    </div>
    <form action="mahasiswa.php" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <button type='submit' class='btn  btn-info'>CARI</button>
    </form>
    <div class="container col-md-10">
    <p><a href='tambah_mahasiswa.php'><button type='button' class='btn	btn-primary'><span class='glyphiconglyphicon-plus-sign'></span> Add Mahasiswa</button></a></p>
        <div class="row">
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <!-- Judul kolom -->
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Kode dosen</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  fungsi  select  padaphp taruh disini-->
                        <?php
                        include "koneksi.php";
                                                if(isset($_GET['cari'])){
                            $cari = $_GET['cari'];
                            $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%".$cari."%'";               
                        }
                        else{
                            $query = "SELECT * FROM mahasiswa";     
                        }
                        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><?php echo $row['jeniskelamin']; ?></td>
                                <td><?php echo $row['id_dosen']; ?></td>
                                <td><a href='edit_mahasiswa.php?id=<?php echo $row['id']; ?>' class='btn btn-success'>
                                        <span class='glyphicon glyphicon-edit'></span>Edit</button></a>
                                    <a href='hapus_mahasiswa.php?id=<?php echo $row['id']; ?>' class='btn btn-danger'>
                                        <span class='glyphicon glyphicon-remove-sign'>Delete</button></a></td>
                                                         
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>