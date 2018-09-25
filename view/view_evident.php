 

<?php
 include('../config/koneksi.php');
 $tujjjuan=$_POST['id'];
 $find=mysqli_query($con,"SELECT * FROM dokumentevident  where id_dokumentevident='$tujjjuan' ");
 $fi=mysqli_fetch_array($find,MYSQLI_ASSOC);
?>

<embed src="dokument/evident/<?php echo"$fi[files] ";?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="400px" /> 