<?php
include "koneksi.php";
$nidn=$_POST['nidn'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$query=mysqli_query($connect,"insert into dosen(nidn,nama,alamat,email) values('$nidn','$nama','$alamat','$email')"); 
if($query){
	header('location:dosen.php');
	}else{
	echo mysqli_error($connect);
}
?>