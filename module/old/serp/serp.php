<?php
$tahun=date(Y);
$tahun_awal=2015;
$tahun_akhir=$tahun+5;
?>
<script language="javascript" src="form_validation.js"></script>
<div class="col-md--12">
    <div class="x_panel">
      <div class="x_title">
        <h2>DATA SERP </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="GET" >

          <input type="hidden" name="module" value="serp_view">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> NAMA ASSET <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="kks_data"  name="kks_data" class="form-control" >

                <option value="">- SEMUA ASSET -</option>
                <?php
                $bid=mysqli_query($con,"select *from sinkronisasi_data   order by kks");
      while($databid=mysqli_fetch_array($bid,MYSQLI_ASSOC)){
        $cek=mysqli_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$databid[kks]' "));
       ?>
                <option value="<?php echo"$cek[kks]";?>"><?php echo"$cek[nama_system]";?></option>
                <?php
              }
      ?>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> TAHUN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="tahun"  name="tahun" class="form-control" >
                <option value="<?php echo"$tahun";?>"><?php echo"$tahun";?></option>
                <?php
                for($i=$tahun_awal;$i<=$tahun_akhir;$i++){
                  if($i!=$tahun){
                ?>
                <option value="<?php echo"$i";?>"><?php echo"$i";?></option>
                <?php
                }}
                ?>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class=" btn btn-primary" value="tampil">  Tampilkan</button>
            </div>
          </div>

          <div class="ln_solid"></div>

        </form>
      </div>
    <div id="view_serp"></div>

  </div>
</div>