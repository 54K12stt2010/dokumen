<?php
$tahun=date(Y);
$tahun_awal=2015;
$tahun_akhir=$tahun+5;
?>
<script language="javascript" src="form_validation.js"></script>
<div class="col-md--12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Laporan Kinerja Navitas</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="cetak/excel_navitas_log.php" >
      <input type='text' name='module' value='import_maximo' hidden>
        <fieldset>
          <div class="control-group">
            <div class="controls">
              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" name="tgl_awal" id="single_cal1" placeholder="Tanggal Awal" aria-describedby="inputSuccess2Status">
                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                <span id="inputSuccess2Status" class="sr-only">(success)</span>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <div class="control-group">
            <div class="controls">
              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="tgl_akhir" id="single_cal3" placeholder="Tanggal Akhir" aria-describedby="inputSuccess2Status3">
                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <div class="control-group">
            <div class="controls">
              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                <button type="submit" class=" btn btn-primary" >  Tampilkan</button>
                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset></fieldset>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

          </div>
        </div>

        <div class="ln_solid"></div>

      </form>
    </div>
    <div id="view_reap"></div>

  </div>
</div>