  <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo"EDIT SINKRONISASI DATA MAXIMO DAN NAVITAS";?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>
  <?php
  $show=mysqlI_fetch_array(mysqlI_query($con,"select *from equipment_maximo where kks='$_GET[id]'"));

  echo"<div class='box-hide-me box-content'>
  <form onSubmit='return validasi(this)' method=POST >
    <table id='sample-table' class='table table-hover  tablesorter'>
     <input type='text' name='kks' value='$show[kks]' hidden>
      <tr>
        <td  > <div style='float:left; width:90px;' >KKS </div></td>
        <td> $show[kks]  </td>
      </tr>
      <tr>
        <td > <div style='float:left; width:90px;' >Nama System </div></td>
        <td> $show[nama_system] </td>
      </tr>
      <tr>
        <td > <div style='float:left; width:90px;' >Deskripsi </div></td>
        <td> $show[deskripsi]  </td>
      </tr>
      <tr>
        <td > <div style='float:left; width:90px;' >UNIT</div></td>
        <td> 
          $show[unit] 
      </td>
    </tr>
    <tr>
      <td > <div style='float:left; width:90px;' >Lingkup Equipment </div></td>
      <td>  $show[lingkup_equipment] </td>
    </tr>
    <tr>
      <td > <div style='float:left; width:90px;' >Nama System Navitas </div></td>
      <td>  ";  
      
      echo "
      <select name='cause_code' id='cause_codecause_code'>";
      $bid=mysqli_query($con,"select *from equipment_navitas   order by cause_code");
      while($databid=mysqli_fetch_array($bid,MYSQLI_ASSOC)){
      echo"<option value=\"$databid[cause_code]\" > $databid[nama_system] | $databid[cause_code]</option>";
      }
      
      
          echo"</select> </td>
    </tr>
    <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata_sinkron'>
      <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
    </table></form>


  </div>";


  if(isset($_POST[editdata_sinkron])){

    $simpan=mysqli_query($con,"INSERT INTO sinkronisasi_data(kks,
     cause_code) 
     VALUES('$_POST[kks]',
     '$_POST[cause_code]')");
    if($simpan>0){
      ?>

      <script type="application/javascript">
        alert("Sinkronisasi Data Maximo dan Navitas Berhasil Diedit! ");
        document.location='?module=sinkronisasi_data';
      </script>
      <?php 
    }else{
      ?>

      <script type="application/javascript">
        alert("Sinkronisasi Data Maximo dan Navitas Gagal Diedit! ");
        document.location='?module=sinkronisasi_data';
      </script>
      <?php
    }

  
}

?>

