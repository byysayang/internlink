<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Krub%3A700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lilita+One%3A400"/>
    <link rel="stylesheet" href="editmhs.css"/>
    <title>Document</title>

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
    <h2>Beranda</h2>
  </div>
  <div class="menu">
    <ul>
      <li> <a href="beranda.php">Beranda</a></li>
      <li class="dropdown">
        <button class="dropbtn">Rekapitulasi 
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

<?php
 include "koneksi.php";
 $id = $_GET['id_mhs'];
 $ambilData = mysqli_query($conn,"SELECT * FROM tb_mahasiswa WHERE id_mhs='$id'");
 $data=mysqli_fetch_array($ambilData);
?>

<div class="posisimagang">
    <p style="text-align: center; color: black;">EDIT DATA</p>
    <p style="text-align: center; color: black;">REKAP MAGANG</p>
</div>
<div class="input">
    <form action="" method="POST" class="form-item">
      <div class="form-group">
            <label for="nim"> NIM </label>
            <span style="margin-left: 10%"> : </span>
            <input type="text" name="nim" value="<?php echo $data['nim'] ?>" placeholder="Masukkan NIM" style= "width: 74.5%;"></input>
        </div>
        <div class="form-group">
            <label for="nama_mhs"> NAMA </label>
            <span style="margin-left: 8.75%"> : </span>
            <input type="text" name="nama_mhs" value="<?php echo $data['nama_mhs']?>" placeholder="Masukkan NAMA" style= "width: 74.5%;"></input>
        </div>
        <div class="form-group">
            <label for="prodi"> PRODI </label>
            <span style="margin-left: 8.5%"> : </span>
            <input type="text" name="prodi" value="<?php echo $data['prodi']?>" placeholder="Masukkan PRODI" style= "width: 74.5%;"></input>
        </div>
        <div class="form-group">
            <label for="asal_instansi"> ASAL INSTANSI </label>
            <span style="margin-left: 3.25%"> : </span>
            <input type="text" name="asal_instansi" value="<?php echo $data['asal_instansi']?>"  placeholder="Masukkan ASAL INSTANSI" style= "width: 74.5%;"></input>
        </div>
        <div class="form-group">
            <label for="alamat"> ALAMAT </label>
            <span style="margin-left: 7.5%"> : </span>
            <input type="text" name="alamat" value="<?php echo $data['alamat']?>" placeholder="Masukkan ALAMAT" style= "width: 74.5%;"></input>
        </div>
        <div class="form-group">
            <label for="no_telepon"> NO. TELP </label>
            <span style="margin-left: 7.1%"> : </span>
            <input type="text" name="no_telepon" value="<?php echo $data['no_telepon']?>" placeholder="Masukkan NO. TELP" style= "width: 74.5%;"></input>
        </div>
        <div class="form-group">
            <label for="nama_dospem"> DOSEN PEMBIMBING </label>
            <span style="margin-left:0.4%"> : </span>
            <input type="text" name="dospem" value="<?php echo $data['dospem']?>" placeholder="Masukkan DOSEN PEMBIMBING" style= "width: 74.5%;" required></input>
        </div>
        <div class="form-group">
            <label for="mulai"> MULAI </label>
            <span style="margin-left:8.5%"> : </span>
            <input type="date" name="mulai" value="<?php echo $data['mulai'] ?>"></input>
        </div>
        <div class="form-group">
            <label for="selesai"> SELESAI </label>
            <span style="margin-left:7.5%"> : </span>
            <input type="date" name="selesai" value="<?php echo $data['selesai'] ?>"></input>
        </div>
        <div class="form-group">
            <label for="bidang"> BIDANG </label>
            <span style="margin-left:7.7%"> : </span>
            <select name="id_uk">
                <option>PILIH BIDANG</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($conn,"SELECT * FROM unit_kerja") or die (mysqli_error($conn));
                while($data = mysqli_fetch_array($query)){
                  echo "<option value=$data[id_uk]> $data[kd_uk] - $data[eselon_3] - $data[eselon_4]</option>";
                }
                ?>
            </select>
            <p style="margin-left: 13%; font-size: 10px; color: red;">*Tidak Boleh Kosong</p>
        </div>
        <div class="form-group">
            <label for="nama_mentor"> NAMA MENTOR </label>
            <span style="margin-left:3.75%"> : </span>
            <select name="id_mentor" style= "width: 74.5%;">
                <option>Pilih Mentor</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($conn,"SELECT * FROM tb_mentor") or die (mysqli_error($conn));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[id_mentor]> $data[nama_mentor]</option>";
                }
                ?>
            </select>
            <p style="margin-left: 13%; font-size: 10px; color: red;">*Tidak Boleh Kosong</p>
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <input type="submit" href="mhs.php" name="simpan" value="SIMPAN" onclick="return confirm('Yakin Ingin Mengedit Data?')" style="margin-left:13.5%;"></input>
        </div>
        <div class="form-group">
            <input type="submit" href="mhs.php" name="batal" value="BATAL" onclick="return confirm('Yakin Ingin Membatalkan Edit Data?')" style="margin-left:13.5%;"></input>
        </div>
    </form>
</div>
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
</body>
</html>

<?php
if(isset($_POST['simpan'])){

    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $prodi = $_POST['prodi'];
    $asal_instansi = $_POST['asal_instansi'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $id_uk = $_POST['id_uk'];
    $dospem = $_POST['dospem'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $id_mentor = $_POST['id_mentor'];

    mysqli_query($conn,"UPDATE tb_mahasiswa 
    SET nim='$nim', nama_mhs='$nama_mhs', prodi='$prodi', asal_instansi='$asal_instansi', alamat='$alamat', no_telepon='$no_telepon', id_uk='$id_uk', dospem='$dospem', mulai='$mulai', selesai='$selesai', id_mentor='$id_mentor'
    WHERE id_mhs='$id'
    ") OR die(mysqli_error($conn));

?>

<script type="text/javascript">
alert("Data Berhasil Diedit");
window.location='mhs.php';
</script>

<?php
}  if(isset($_POST['batal'])){
?>

<script type="text/javascript">
alert("Edit Data Gagal");
window.location='mhs.php';
</script>

<?php
}
?>