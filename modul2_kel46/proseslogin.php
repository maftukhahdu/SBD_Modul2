<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query_admin = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
$query_admin_go = mysqli_query($connect,$query_admin);
if (mysqli_num_rows($query_admin_go) > 0) {
  echo "Selamat!, Anda Berhasil Login";
  while ($row = mysqli_fetch_array($query_admin_go)) {
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    header("location:index.php");
  }
}else {
  echo "Login Gagal:(";
}
?>
