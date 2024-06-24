<?php
	include "koneksi.php";
	$id=$_GET['id_mhs'];
	$hapus= mysqli_query ($conn, "DELETE FROM tb_mahasiswa WHERE id_mhs ='$id'");
	
	
	
	if($hapus){
		echo "<script> alert('Hapus Data Berhasil') </script>";
		echo "<meta http-equiv='refresh' content='1;url=mhs.php'>";
		header ("refresh:0;mhs.php");		
	}else{
        echo "<script>alert('Simpan Data Gagal') </script>";
		echo "<meta http-equiv='refresh' content='1;url=mhs.php'>";
        header ("refresh:0;mhs.php");		
	}
	
?>