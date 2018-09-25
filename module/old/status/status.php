<?php
$act_data=$_GET['act'];
if($act_data=="editstatus"){
	$sh_act="EDIT DATA STATUS";
	}elseif($act_data=="tambahstatus"){
	$sh_act="TAMBAH DATA STATUS";
	}else{
	$sh_act=" DATA STATUS";
	}
?>



<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo"$sh_act";?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>


                                    <?php
							$swap_act = isset($_GET['act']) ? $_GET['act'] : '';
							switch($swap_act){


							 default:
                             
                            ?>
                             
                               
                               <a href="?module=status&act=tambahstatus" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>KODE STATUS</th>
                                            <th>STATUS KINERJA</th>
                                            <th>BLOKIR</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM status_kinerja  ORDER BY   kode_status ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$r[kode_status]</td>
                          <td>$r[nama_status]</td>
                          <td>$r[blokir]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=status&act=editstatus&id=<?php echo"$r[kode_status]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_status]')\"    href=?module=status&act=hapus&id=$r[kode_status]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                        <?php
										echo"</tr>";
      									$no++;
    									}
									   ?>  
                                        </tbody>
                                    </table>
                                    <!-- end project list -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
					  
    				
    				break;
								
							// tambah data bidang
							case "tambahstatus":
							echo"<div class='box-hide-me box-content'>
        <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:90px;' >Kode Status </div></td>     <td> <input type=text name='kodestatus' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:90px;' >Nama Status </div></td>     <td> <input type=text name='namastatus' size=30 >  </td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editstatus":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from status_kinerja where kode_status='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
      <form onSubmit='return validasiedit(this)' method=POST >
        <table id='sample-table' class='table table-hover  tablesorter'>
          <input type=hidden name='id' size=30 value='$show[kode_status]' >
          <tr><td><div style='float:left; width:90px;' > Nama Status </div></td>     <td>  <input type=text name='kode_status' size=30 value='$show[kode_status]'  readonly></td></tr>
          <tr><td><div style='float:left; width:90px;' > Nama Status </div></td>     <td>  <input type=text name='namastatus' size=30 value='$show[nama_status]' ></td></tr>

          ";
          if ($show['blokir']=='N'){
            echo "<tr><td>Blokir</td>     <td height=30px>  <input type=radio name='blokir' value='Y'> Y   
            <input type=radio name='blokir' value='N' checked> N </td></tr>";
          }
          else{
            echo "<tr><td height=30px>Blokir</td>     <td>  <input type=radio name='blokir' value='Y' checked> Y  
            <input type=radio name='blokir' value='N'> N </td></tr>";
          } 
          echo"<tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
          <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
        </table></form>

      </div>";	
      break;
    }





    if(isset($_POST['simpan'])){

      if($_POST[kodestatus]==""){
        ?>
        <script type="application/javascript">

          alert("Kode Status Tidak Boleh Kosong  ! ");
          document.location='?module=status&act=tambahstatus';
        </script>
        <?php 

      
    }else{

     $cek=mysqli_query($con,"select *from status_kinerja  where kode_status='$_POST[kodestatus]'");
     $h=mysqli_num_rows($cek);
     if($h>0){

       ?>
       <script type="application/javascript">
        alert("Kode Status Sudah ada , Silahkan Gunakan kode status Yang Lain ! ");
        document.location='?module=status&act=tambahbidang';
      </script>
      <?php 

    }else{


     $pass=md5($_POST['password']);
     mysqli_query($con,"INSERT INTO status_kinerja(kode_status,nama_status) 
      VALUES(
      '$_POST[kodestatus]',
      '$_POST[namastatus]')");
      ?>
      <script type="application/javascript">

        alert("Data Status Kinerja Berhasil Ditambah ! ");
        document.location='?module=status&act=tambahstatus';
      </script>
      <?php 

    }

  }
}

elseif(isset($_POST[editdata])){

  $update=mysqli_query($con,"UPDATE status_kinerja SET blokir   = '$_POST[blokir]',nama_status   = '$_POST[namastatus]'
   WHERE  kode_status     = '$_POST[id]'");

  if($update>0){
   ?>

   <script type="application/javascript">
    alert("Data Status Kinerja Berhasil Diedit! ");
    document.location='?module=status';
  </script>
  <?php 
}else{
	?>

  <script type="application/javascript">
    alert("Data Status Kinerja Gagal Diedit! ");
    document.location='?module=status';
  </script>
  <?php
}

}


$module=$_GET['module'];
$submenu=$_GET['submenu'];
$act=$_GET['act'];
if ($module=='status'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM status_kinerja WHERE kode_status='$_GET[id]'");
  ?>
  <script type="application/javascript">
    alert("Data Status Kinerja Berhasil Dihapus ! ");
    document.location='?module=status';
  </script>
  <?php 
}

?>
