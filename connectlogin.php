<?php
require 'koneksi.php';
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM tb_user 
            WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
?>

<script type="text/javascript">
alert("Login Berhasil");
window.location='beranda.php';
</script>

<?php   
} else {
?>
<script type="text/javascript">
alert("Username atau Password Salah");
window.location='index.php';
</script>
<?php
}
?>