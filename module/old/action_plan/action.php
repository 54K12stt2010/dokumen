<?php
$act_data=$_GET['act'];
if($act_data=="editstatus"){
	$sh_act="EDIT DATA STATUS";
	}elseif($act_data=="tambahstatus"){
	$sh_act="TAMBAH DATA STATUS";
	}else{
	$sh_act=" DATA STATUS";
	}
$kks=$_GET[kks];
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
// cek data equipment
$cek_max=mysqlI_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$kks'"));
// CEk action Plan
$find=mysqli_num_rows(mysqli_query($con,"select *from action_plan where kks='$kks' and bulan='$bulan' and tahun='$tahun'"));
if($find>0){
$cek_act=mysqlI_fetch_array(mysqli_query($con,"select *from action_plan where kks='$kks' and bulan='$bulan' and tahun='$tahun'"))

// JIka Data ditemukan maka update

?>
<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo"ACTION PLAN RISIKO";?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>


      <?php     

      echo"<div class='box-hide-me box-content'>
      <form onSubmit='return validasiedit(this)' method=POST >

          <input type=hidden name='id_act' size=30 value='$cek_act[id_act]' >
          <input type=hidden name='tahun' size=30 value='$tahun' >
          <input type=hidden name='bulan' size=30 value='$bulan' >
          <input type=hidden name='kks' size=30 value='$kks' >

        <table id='sample-table' class='table table-hover  tablesorter'>
          <input type=hidden name='id' size=30 value='$show[kode_status]' >
          <tr><td><div style='float:left; width:90px;' > Bulan</div></td>     <td>  $nama_bulan</td></tr>
          <tr><td><div style='float:left; width:90px;' > Tahun </div></td>     <td>  $tahun</td></tr>
          <tr><td><div style='float:left; width:90px;' > Asset </div></td>     <td>  $cek_max[nama_system] </td></tr>
          <tr><td><div style='float:left; width:90px;' > Action Plan </div></td> <td> <textarea name='action_plan'  >$cek_act[action_plan]</textarea> </td></tr>
          <tr><td><div style='float:left; width:90px;' > Biaya </div></td>     <td>  <input type=text name='biaya' value='$cek_act[biaya]' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Residual LOSS </div></td>     <td>  <input type=text value='$cek_act[residual_loss]'  name='residual_loos' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Residual FT </div></td>     <td>  <input type=text  value='$cek_act[residual_ft]'   name='residual_ft' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Residual Risk </div></td>     <td>  <input type=text  value='$cek_act[residual_risk]'  name='residual_risk' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Benefit</div></td>     <td>  <input type=text name='benefit'  value='$cek_act[benefit]'  size=30 ></td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>

      </div>";  
}else{

// Jika tidak ditemukan maka insert
?>

<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo"ACTION PLAN RISIKO";?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>


      <?php     
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from status_kinerja where kode_status='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
      <form onSubmit='return validasiedit(this)' method=POST >
        <table id='sample-table' class='table table-hover  tablesorter'>
          <input type=hidden name='tahun' size=30 value='$tahun' >
          <input type=hidden name='bulan' size=30 value='$bulan' >
          <input type=hidden name='kks' size=30 value='$kks' >
          <tr><td><div style='float:left; width:90px;' > Bulan</div></td>     <td>  $nama_bulan</td></tr>
          <tr><td><div style='float:left; width:90px;' > Tahun </div></td>     <td>  $tahun</td></tr>
          <tr><td><div style='float:left; width:90px;' > Asset </div></td>     <td>  $cek_max[nama_system] </td></tr>
          <tr><td><div style='float:left; width:90px;' > Action Plan </div></td> <td> <textarea name='action_plan'  ></textarea> </td></tr>
          <tr><td><div style='float:left; width:90px;' > Biaya </div></td>     <td>  <input type=text name='biaya' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Residual LOSS </div></td>     <td>  <input type=text name='residual_loos' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Residual FT </div></td>     <td>  <input type=text name='residual_ft' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Residual Risk </div></td>     <td>  <input type=text name='residual_risk' size=30 ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Benefit</div></td>     <td>  <input type=text name='benefit' size=30 ></td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Simpan' name='tambahdata'>
            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>

        </div>";	

  }


if(isset($_POST[tambahdata])){

  $tambah=mysqli_query($con,"INSERT INTO action_plan (id_act,
                                    bulan,
                                    tahun,
                                    action_plan,
                                    kks,
                                    biaya,
                                    residual_loss,
                                    residual_ft,
                                    residual_risk,
                                    benefit)
                            Values('',
                                    '$_POST[bulan]',
                                    '$_POST[tahun]',
                                    '$_POST[action_plan]',
                                    '$_POST[kks]',
                                    '$_POST[biaya]',
                                    '$_POST[residual_loos]',
                                    '$_POST[residual_ft]',
                                    '$_POST[residual_risk]',
                                    '$_POST[benefit]')
                                ");

  if($tambah>0){
   ?>

   <script type="application/javascript">
    alert("Action Plan Berhasil Ditambah! ");
    document.location='<?php echo"?module=tampil_reap&kks_data=$_POST[kks]&bulan=$_POST[bulan]&tahun=$_POST[tahun]";?>';
  </script>
  <?php 
}else{
  ?>

  <script type="application/javascript">
    alert("Action Plan Gagal Ditambah! ");
    document.location='<?php echo"?module=action_plan&act=edit_actionplan&bulan=$_POST[bulan]&tahun=$_POST[tahun]&kks=$_POST[kks]";?>';
  </script>
  <?php
}}elseif(isset($_POST[editdata])){

  $update=mysqli_query($con,"UPDATE action_plan SET 
                                    bulan='$_POST[bulan]',
                                    tahun='$_POST[tahun]',
                                    action_plan='$_POST[action_plan]',
                                    kks='$_POST[kks]',
                                    biaya='$_POST[biaya]',
                                    residual_loss='$_POST[residual_loos]',
                                    residual_ft='$_POST[residual_ft]',
                                    residual_risk='$_POST[residual_risk]',
                                    benefit='$_POST[benefit]'
                                    WHERE  id_act     = '$_POST[id_act]'");

  if($update>0){
   ?>

   <script type="application/javascript">
    alert("Action Plan Berhasil Diupdate! ");
    document.location='<?php echo"?module=tampil_reap&kks_data=$_POST[kks]&bulan=$_POST[bulan]&tahun=$_POST[tahun]";?>';
  </script>
  <?php 
}else{
  ?>

  <script type="application/javascript">
    alert("Action Plan Gagal Diupdate! ");
    document.location='<?php echo"?module=action_plan&act=edit_actionplan&bulan=$_POST[bulan]&tahun=$_POST[tahun]&kks=$_POST[kks]";?>';
  </script>
  <?php
}}


?>
