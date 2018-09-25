<?php
$bulan=$_GET[bulan];
$tahun=$_GET[tahun];
if($bulan=="01"){
  $nama_bulan="JANUARI";
}elseif($bulan=="02"){
  $nama_bulan="FEBRUARI";
}elseif($bulan=="03"){
  $nama_bulan="MARET";
}elseif($bulan=="04"){
  $nama_bulan="APRIL";
}elseif($bulan=="05"){
  $nama_bulan="MEI";
}elseif($bulan=="06"){
  $nama_bulan="JUNI";
}elseif($bulan=="07"){
  $nama_bulan="JULI";
}elseif($bulan=="08"){
  $nama_bulan="AGUSTUS";
}elseif($bulan=="09"){
  $nama_bulan="SEPTEMBER";
}elseif($bulan=="10"){
  $nama_bulan="OKTOBER";
}elseif($bulan=="11"){
  $nama_bulan="NOVEMBER";
}elseif($bulan=="12"){
  $nama_bulan="DESEMBER";
}
?>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo"EDIT DATA HPP PADA BULAN $nama_bulan $_GET[tahun]";?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <p></p>


        <?php

        // Cek apakah equipment sudah ada pada data serp 
        $cek=mysqli_query($con,"select *from setting_hpp where tahun='$tahun' and bulan='$_GET[bulan]'  ");
        $h=mysqli_num_rows($cek);
        if($h>0){
        //edit form        

          $show=mysqli_fetch_array(mysqlI_query($con,"select *from setting_hpp where tahun='$tahun' and bulan='$_GET[bulan]'"));

          echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
            <input type=text name='tahun' size=30 value='$tahun' hidden> 
            <input type=text name='kks' size=30 value='$kks' hidden> 
            <table id='sample-table' class='table table-hover  tablesorter'>
              <tr>
            <td > <div style='float:left; width:90px;' >BULAN </div></td>
            <td> $nama_bulan  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >TAHUN </div></td>
            <td> $_GET[tahun]</td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >NOMINAL</div></td>
            <td> 
             <input type=text name='nominal' value='$show[nominal]' size=30> 
           </td>
         </tr>
           <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>


        </div>";	

      }else{

       echo"<div class='box-hide-me box-content'>

       <form onSubmit='return validasi(this)' method=POST >
        <input type=text name='tahun' size=30 value='$tahun' hidden> 
        <input type=text name='kks' size=30 value='$kks' hidden> 
        <table id='sample-table' class='table table-hover  tablesorter'>
          <tr>
            <td > <div style='float:left; width:90px;' >BULAN </div></td>
            <td> $nama_bulan  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >TAHUN </div></td>
            <td> $_GET[tahun]</td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >NOMINAL</div></td>
            <td> 
             <input type=text name='nominal' size=30> 
           </td>
         </tr>
       <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='tambahdata'>
        <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
      </table></form>


    </div>";  
  }

  if(isset($_POST['editdata'])){
    $update=mysqlI_query($con,"update setting_hpp set nominal='$_POST[nominal]' where tahun='$tahun' and bulan='$_GET[bulan]' ");
if($update>0){
  ?>

  <script type="application/javascript">
  alert("Data HPP Berhasil Diedit! ");
    document.location='?module=setting_hpp';
  </script>
  <?php 
}else{
  ?>

  <script type="application/javascript">
    alert("Data SERP Gagal Diedit! ");
    document.location='?module=setting_hpp';
  </script>
  <?php
}
}elseif(isset($_POST['tambahdata'])){


  $update=mysqlI_query($con,"insert into setting_hpp  (id_setting,bulan,tahun,nominal) values('','$bulan','$tahun','$_POST[nominal]')");
if($update>0){
  ?>

  <script type="application/javascript">
  alert("Data SERP Berhasil Diedit! ");
    document.location='?module=setting_hpp';
  </script>
  <?php 
}else{
  ?>

  <script type="application/javascript">
    alert("Data SERP Gagal Dieditxxx! ");
    document.location='?module=setting_hpp';
  </script>
  <?php
}


}
?>
