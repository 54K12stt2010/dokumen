<?php
$tahun=date(Y);
$tahun_awal=2015;
$tahun_akhir=$tahun+5;
?>
<script language="javascript" src="form_validation.js"></script>
<div class="col-md--12">
    <div class="x_panel">
      <div class="x_title">
        <h2> SETTING HPP  </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >

          <input type='text' name='module' value='tampil_reap' hidden> 
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> BULAN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="bulan"  name="bulan" class="form-control" required>
                <option value="01">JANUARI</option>
                <option value="02">FEBRUARI</option>
                <option value="03">MARET</option>
                <option value="04">APRIL</option>
                <option value="05">MEI</option>
                <option value="06">JUNI</option>
                <option value="07">JULI</option>
                <option value="08">AGUSTUS</option>
                <option value="09">SEPTEMBER</option>
                <option value="10">OKTOBER</option>
                <option value="11">NOVEMBER</option>
                <option value="12">DESEMBER</option>
              </select>
            </div>

            
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> TAHUN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="tahun"  name="tahun" class="form-control" required>
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
              <button type="button" class=" btn btn-primary" onclick="cari_hpp(bulan,tahun)" >  Tampilkan</button>
            </div>
          </div>

          <div class="ln_solid"></div>

        </form>
      </div>
    <div id="view_hpp"></div>

  </div>
</div>