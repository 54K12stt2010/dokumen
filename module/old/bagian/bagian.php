<?php
$act_data=$_GET['act'];
if($act_data=="editbagian"){
	$sh_act="EDIT DATA BAGIAN";
	}elseif($act_data=="tambahbagian"){
	$sh_act="TAMBAH DATA BAGIAN";
	}else{
	$sh_act=" DATA BAGIAN";
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
                             
                               
                               <a href="?module=bagian&act=tambahbagian" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table  id="example" class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>NAMA BAGIAN</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
									      $p      = new Paging;
    										$batas  = 30;
   											 $posisi = $p->cariPosisi($batas);
      										$tampil = mysqlI_query($con,"SELECT * FROM bagian  ORDER BY   nama_bagian   ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
             							<td>$r[nama_bagian]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=bagian&act=editbagian&id=<?php echo"$r[id_bagian]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_bagian]')\"    href=?module=bagian&act=hapus&id=$r[id_bagian]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
							case "tambahbagian":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:90px;' >Nama Bagian </div></td>     <td> <input type=text name='namabagian' size=30 >  </td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editbagian":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from bagian where id_bagian='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='idbagian' size=30 value='$show[id_bagian]' >
          <tr><td><div style='float:left; width:90px;' > Nama Bagian </div></td>     <td>  <input type=text name='namabagian' size=30 value='$show[nama_bagian]' ></td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from bagian  where nama_bagian='$_POST[namabidang]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Nama Bagian Sudah ada , Silahkan Gunakan nama Bagian Yang Lain ! ");
  document.location='?module=masterdata&submenu=bagian&act=tambahbagian';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
  mysqli_query($con,"INSERT INTO bagian(id_bagian,
                                 nama_bagian) 
	                       VALUES('',
								'$_POST[namabagian]')");
    ?>
  <script type="application/javascript">
  
  alert("Data Bagian Berhasil Ditambah ! ");
  document.location='?module=bagian';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){
		
    $update=mysqli_query($con,"UPDATE bagian SET nama_bagian  = '$_POST[namabagian]'
                           WHERE  id_bagian     = '$_POST[idbagian]'");
 
    if($update>0){
	?>
    
  <script type="application/javascript">
  alert("Data Bagian Berhasil Diedit! ");
  document.location='?module=bagian';
  </script>
  <?php 
}else{
	?>
    
  <script type="application/javascript">
  alert("Data Bagian Gagal Diedit! ");
  document.location='?module=bagian';
  </script>
    <?php
	}

		}
		
		
		$module=$_GET['module'];
		$submenu=$_GET['submenu'];
		$act=$_GET['act'];
		if ($module=='bagian'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM bagian WHERE id_bagian='$_GET[id]'");
    ?>
  <script type="application/javascript">
  alert("Data Bagian Berhasil Dihapus ! ");
  document.location='?module=bagian';
  </script>
  <?php 
}
	
				?>
