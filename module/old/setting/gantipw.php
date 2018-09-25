<script type="text/javascript">
function validasi(form){
	var pasbar=form.passbaru.value;
	var ulang=form.passulangi.value;	
 if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  } else  if (form.passlama.value == ""){
    alert("Anda belum mengisikan password lama.");
    form.passlama.focus();
    return (false);
  }else  if (form.passbaru.value == ""){
    alert("Anda belum mengisikan password baru.");
    form.passbaru.focus();
    return (false);
  }else  if (form.passulangi.value == ""){
    alert("Anda belum mengisikan ulangi password.");
    form.passulangi.focus();
    return (false);
  }else if(form.passbaru.value != form.passulangi.value){
	    alert("Password baru tidak sama.");
    form.passbaru.focus();
    return (false);
	  }
  return (true);
}
</script>
        
         <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Ganti Password</h2>
                                    <div class="filter">
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                               

                                       
                                       <?php
		  $aksi="module/setting/aksi_ubah.php";
									        echo "
          <form onSubmit='return validasi(this)' method=POST action='$aksi?module=ubah_password&act=update' style='margin:10px;'>

          <table id='sample-table' class='table table-hover  tablesorter'>          <tr><td> <div style='float:left; width:170px;' > Username Lama  </div> </td><td> : <input type=text name='username' size=30 ></td></tr>
          <tr><td> password lama  </td><td> : <input type=text name='passlama' size=30 ></td></tr>
          <tr><td> password baru  </td><td> : <input type=text name='passbaru' size=30 ></td></tr>
          <tr><td>ulangi password baru  </td><td> : <input type=text name='passulangi' size=30 ></td></tr>
          <tr><td></td><td > <div id='paddingsaja' ><input type=submit name=submit class='btn btn-medium btn-primary'  value=Simpan>
                            <input type=button value=Batal class='btn btn-danger'  onclick=self.history.back()></div></td></tr>
          </table></form>";
									   ?>