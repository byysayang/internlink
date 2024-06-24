<?php
	include "koneksi.php";
	$id=$_GET['id_mentor'];
	$hapus= mysqli_query ($conn, "DELETE FROM tb_mentor WHERE id_mentor ='$id'");
	
	
	
	if($hapus){
		echo "<script> alert('Hapus Data Berhasil') </script>";
		echo "<meta http-equiv='refresh' content='1;url=mentor.php'>";
		header ("refresh:0;mentor.php");		
	}else{
        echo "<script>alert('Simpan Data Gagal') </script>";
		echo "<meta http-equiv='refresh' content='1;url=mentor.php'>";
        header ("refresh:0;mentor.php");		
	}
	
?>