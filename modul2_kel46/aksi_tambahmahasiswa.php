<?php
include "koneksi.php";
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jk=$_POST['jk'];
$doswal=$_POST['doswal'];
$query=mysqli_query($connect,"insert into mahasiswa(nim,nama,alamat,jeniskelamin,id_dosen) values('$nim','$nama','$alamat','$jk','$doswal')"); 
if($query){
	header('location:mahasiswa.php');
	}else{
	echo mysqli_error($connect);
}
?>