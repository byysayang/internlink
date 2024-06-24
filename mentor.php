<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Krub%3A700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lilita+One%3A400"/>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="mentor.css"/>

<style>
.li .dropdown {
  float: left;
  overflow: auto;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.menu a:hover, .dropdown:hover .dropbtn {
  background-color: blue;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>
<div class="navigasi">
  <div class="logo">
    <h2><a href="beranda.php" style="text-decoration:none; font-weight: 600; font-size:35px; color: white;">InternLink</a></h2>
  </div>
  <div class="menu">
    <ul>
      <li> <a href="beranda.php">Beranda</a></li>
      <li class="dropdown">
        <button class="dropbtn" style="font-weight: 600;">Rekapitulasi 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="mhs.php"><img src="./assets/student.png" style="width: 40px;">Mahasiswa</a>
          <a href="mentor.php"><img src="./assets/mentor.png" style="width: 40px;">Mentor</a>
        </div>
      </li>
      <li> <a href="tentang.php">Tentang</a></li>
      <li> <a href="index.php" onclick="return confirm('Yakin Ingin Logout?')">Logout</a><li>
    </ul>
  </div>
</div>
<div class="cari">
  <input style="height: 30px; width: 30%; margin: -40px 0px;" type="text" id="filter" placeholder="Cari Mentor....."></input> 
</div>
<div class="btn-tambah">
  <a href="tmbhmentor.php">
      <button type="submit" style="text-decoration: none; color: black; margin: -50px 30px; height: 30px;">Tambah Data</button>
    </a>
</div>
<div class="btn-print">
<?php
 require_once('koneksi.php');
 $query = "SELECT * FROM tb_mentor";
 $result = mysqli_query($conn,$query);
?>

<table border="1">
  <tr>
   <td>No.</td>
   <td>NIP</td>
   <td>Nama</td>
   <td>No. Telepon</td>
   <td>Jabatan</td>
   <td>Bidang</td>
   <td>Pengaturan</td>
  </tr>
  
  <?php

  $query = mysqli_query($conn, "SELECT * FROM tb_mentor
  INNER JOIN unit_kerja ON tb_mentor.id_uk = unit_kerja.id_uk");

  $no = 1;
  foreach ($query as $row) :
   ?>

   <tr>
    <td><?= $no++;['id_mentor'] ?></td>
    <td><?= $row['nip']; ?></td>
    <td><?= $row['nama_mentor']; ?></td> 
    <td><?= $row['telp_mentor']; ?></td>
    <td><?= $row['jabatan']; ?></td>
    <td><?= $row['eselon_3'].$row['eselon_4']; ?></td>
    <td align="center"><a href="editmentor.php?id_mentor=<?php echo $row['id_mentor']; ?>"><img src="./assets/edit-1.png" style="width: 40px;" onclick="return confirm('Yakin Ingin Mengedit Data?')"></a>
        <a href="hapusmentor.php?id_mentor=<?php echo $row['id_mentor']; ?>"><img src="./assets/trash-1.png" style="width: 40px;" onclick="return confirm('Yakin Ingin Menghapus Data?')"></a></td>
   </tr>

  <?php endforeach; ?>
</table>
<footer class="footer">
  <div class="footer-left">
    <p class="footer-visimisi">
      <span>Sekilas Visi Misi</span>
      “Tersedianya infrastruktur jalan provinsi aman, nyaman dan lancar dalam mendukung tercapainya kesejahteraan masyarakat Jawa Timur”
    </p>
  </div>
  <div class="footer-center">
    <div>
      <h3>Alamat Kontak</h3>
    </div>
    <div>
      <img src="./assets/home-1.png">
      <p>Jl. Gayungsari No. 167 - Surabaya</p>
    </div>
    <div>
      <img src="./assets/phone-1.png">
      <p>031-8290186, 8280433</p>
    </div>
    <div>
      <img src="./assets/telephone-1.png">
      <p>031-8380932</p>
    </div>
    <div>
      <img src="./assets/calendar-1.png">
      <p>Jam kerja : <br> 
      Senin - Kamis : 08.00 - 16.00 <br> 
      Jumat : 07.30 - 16.00 <br> 
      Sabtu - Minggu : Libur </p>
    </div>
  </div>
  <div class="footer-right">
    <div class="footer-media">
      <div>
        <img src="./assets/world-wide-web-1.png">
        <p><a href="https://binamarga.jatimprov.go.id" style="text-decoration: none;">binamarga.jatimprov.go.id</a></p>
      </div>
      <div>
        <img src="./assets/instagram-1.png">
        <p><a href="https://www.instagram.com/binamargajatim" style="text-decoration: none;">@binamargajatim</a></p>
      </div>
      <div>
        <img src="./assets/facebook-1.png">
        <p><a href="https://www.facebook.com/binamargajatimprov" style="text-decoration: none;">@binamargajatimprov</a></p>
      </div>
      <div>
        <img src="./assets/twitter-1.png">
        <p><a href="https://www.twitter.com/dbmjatim" style="text-decoration: none;">@dbmjatim</a></p>
      </div>
    </div>
  </div>
</footer>

<script src="search.js"></script>
</body>
</html>