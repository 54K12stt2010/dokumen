<?php session_start();
include "config/koneksi.php";

$username = $_POST['username'];
$pass     = md5($_POST['password']);


$login=mysqli_query($con,"SELECT * FROM operator WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  

  $_SESSION['username']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  $_SESSION['jenis']    = "operator";

	  ?>
  <script type="application/javascript">
  document.location='dashboard.php?module=beranda';
  </script>
  <?php 
}
else{
?>
<script language="javascript">
			alert("Nama User atau Password Salah...!");
			document.location='index.php'
		</script>
	<?php
	}
?>
