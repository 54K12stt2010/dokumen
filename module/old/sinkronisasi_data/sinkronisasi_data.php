<?php
$act_data=$_GET['act'];
if($act_data=="editequipment_maximo"){
	$sh_act="EDIT EQUIPMENT MAXIMO";
}elseif($act_data=="tambahequipment_maximo"){
	$sh_act="TAMBAH EQUIPMENT MAXIMO";
}else{
	$sh_act=" SINKRONISASI DATA EQUIPMENT MAXIMO DAN NAVITAS";
}

$d_maximo=mysqli_fetch_array(mysqli_query($con,"select count(*) as total_data from equipment_maximo"));
$total_maximo=$d_maximo[total_data];

$d_navitas=mysqli_fetch_array(mysqli_query($con,"select count(*) as total_data_nav from equipment_navitas"));
$total_navitas=$d_navitas[total_data_nav];


$data_sinkron=mysqli_fetch_array(mysqli_query($con,"select count(*) as total_data_sinkron from sinkronisasi_data"));
$total_sinkron=$data_sinkron[total_data_sinkron];

$belum=$total_maximo-$total_sinkron;
?>

<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-database"></i>
      </div>
      <div class="count"><?php echo"$total_maximo";?></div>

      <h3>Maximo</h3>
      <p>Total Data Equipment Maximo.</p>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-database"></i>
      </div>
      <div class="count"><?php echo"$total_navitas";?></div>

      <h3>Navitas</h3>
      <p>Total Data Equipment Maximo.</p>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-puzzle-piece"></i>
      </div>
      <div class="count"><?php echo"$total_sinkron";?></div>

      <h3>Sudah Sinkron</h3>
      <p>Jumlah Data sudah Sinkron.</p>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-times-circle"></i>
      </div>
      <div class="count"><?php echo"$belum";?></div>

      <h3>Belum Sinkron</h3>
      <p>Jumlah Data Belum Sinkron.</p>
    </div>
  </div>
</div>

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

          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data Equipment Sudah Sinkron</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Data Equipment Belum Sinkron</a>
              </li>

            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <?php
                include('sudah_sinkron.php');
                ?>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <?php
                include('belum_sinkron.php');
                ?>
              </div>

            </div>
          </div>




          <?php

          break;




          	
               
              }





              if(isset($_POST['simpan'])){

               $cek=mysqli_query($con,"select *from equipment_maximo  where kks='$_POST[kks]'");
               $h=mysqli_num_rows($cek);
               if($h>0){

                 ?>
                 <script type="application/javascript">
                  alert("KKS Sudah ada , Silahkan Gunakan KKS Yang Lain ! ");
                  document.location='?module=equipment_maximo&act=tambahequipment_maximo';
                </script>
                <?php 

              }else{


               $pass=md5($_POST['password']);
               mysqli_query($con,"INSERT INTO equipment_maximo(kks,
                 nama_system,
                 deskripsi,
                 unit,
                 lingkup_equipment) 
                 VALUES(
                 '$_POST[kks]',
                 '$_POST[nama_system]',
                 '$_POST[deskripsi]',
                 '$_POST[unit]',
                 '$_POST[lingkup]')");
                 ?>
                 <script type="application/javascript">

                  alert("Data Equipment Maximo Berhasil Ditambah ! ");
                  document.location='?module=equipment_maximo';
                </script>
                <?php 

              }

            }

            elseif(isset($_POST[editdata])){

              $update=mysqli_query($con,"UPDATE equipment_maximo SET nama_system  = '$_POST[nama_system]',
                deskripsi  = '$_POST[deskripsi]', unit  = '$_POST[unit]',   lingkup_equipment  = '$_POST[lingkup]'
                WHERE  kks  = '$_POST[kks]' ");

              if($update>0){
               ?>

               <script type="application/javascript">
                alert("Data Equipment Maximo Berhasil Diedit! ");
                document.location='?module=equipment_maximo';
              </script>
              <?php 
            }else{
             ?>

             <script type="application/javascript">
              alert("Data Equipment Maximo Gagal Diedit! ");
              document.location='?module=equipment_maximo';
            </script>
            <?php
          }

        }


        $module=$_GET['module'];
        $submenu=$_GET['submenu'];
        $act=$_GET['act'];
        if ($module=='equipment_maximo'  AND $act=='hapus'){
          mysqli_query($con,"DELETE FROM equipment_maximo WHERE kks='$_GET[id]'");
          ?>
          <script type="application/javascript">
            alert("Data Bagian Berhasil Dihapus ! ");
            document.location='?module=equipment_maximo';
          </script>
          <?php 
        }

        ?>
