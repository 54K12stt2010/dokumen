

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo"EDIT DATA SERP TAHUN $_GET[tahun]";?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <p></p>


        <?php
        $tahun=$_GET[tahun];
        $kks=$_GET[kks];

        // Cek apakah equipment sudah ada pada data serp 
        $cek=mysqli_query($con,"select *from serp where tahun='$tahun' and kks='$kks'  ");
        $h=mysqli_num_rows($cek);
        if($h>0){
        //edit form        

          $show=mysqlI_fetch_array(mysqlI_query($con,"select *from equipment_maximo where kks='$_GET[kks]'"));
          $sh_rep=mysqlI_fetch_array(mysqlI_query($con,"select *from serp where kks='$_GET[kks]' and tahun='$tahun'"));

          echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
            <input type=text name='tahun' size=30 value='$tahun' hidden> 
            <input type=text name='kks' size=30 value='$kks' hidden> 
            <table id='sample-table' class='table table-hover  tablesorter'>
              <tr>
                <td > <div style='float:left; width:90px;' >KKS </div></td>
                <td> $show[kks]  </td>
              </tr>
              <tr>
                <td > <div style='float:left; width:90px;' >Nama System </div></td>
                <td> $show[nama_system] </td>
              </tr>
              <tr>
                <td > <div style='float:left; width:90px;' >SF</div></td>
                <td> 
                 <input type=text name='sf' value='$sh_rep[sf]' size=30> 
               </td>
             </tr>
             <tr>
              <td > <div style='float:left; width:90px;'  >RC</div></td>
              <td> 
               <input type=text name='rc' size=30 value='$sh_rep[rc]'> 
             </td>
           </tr>
           <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>


        </div>";	

      }else{

       $show=mysqlI_fetch_array(mysqlI_query($con,"select *from equipment_maximo where kks='$_GET[kks]'"));

       echo"<div class='box-hide-me box-content'>

       <form onSubmit='return validasi(this)' method=POST >
        <input type=text name='tahun' size=30 value='$tahun' hidden> 
        <input type=text name='kks' size=30 value='$kks' hidden> 
        <table id='sample-table' class='table table-hover  tablesorter'>
          <tr>
            <td > <div style='float:left; width:90px;' >KKS </div></td>
            <td> $show[kks]  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >Nama System </div></td>
            <td> $show[nama_system] </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >SF</div></td>
            <td> 
             <input type=text name='sf' size=30> 
           </td>
         </tr>
         <tr>
          <td > <div style='float:left; width:90px;' >RC</div></td>
          <td> 
           <input type=text name='rc' size=30> 
         </td>
       </tr>
       <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='tambahdata'>
        <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
      </table></form>


    </div>";  
  }

  if(isset($_POST['editdata'])){
    $update=mysqlI_query($con,"update serp set sf='$_POST[sf]' , rc='$_POST[rc]'   where tahun='$_POST[tahun]' and kks='$_POST[kks]'");
if($update>0){
  ?>

  <script type="application/javascript">
  alert("Data SERP Berhasil Diedit! ");
    document.location='?module=serp_view&kks_data=&tahun=<?php echo"$_POST[tahun]";?>';
  </script>
  <?php 
}else{
  ?>

  <script type="application/javascript">
    alert("Data SERP Gagal Diedit! ");
    document.location='?module=serp_view&kks_data=&tahun=<?php echo"$_POST[tahun]";?>';
  </script>
  <?php
}
}elseif(isset($_POST['tambahdata'])){


  $update=mysqlI_query($con,"insert into serp  (id_serp,sf,rc,kks,tahun) values('','$_POST[sf]','$_POST[rc]','$_POST[kks]','$_POST[tahun]')");
if($update>0){
  ?>

  <script type="application/javascript">
  alert("Data SERP Berhasil Diedit! ");
    document.location='?module=serp_view&kks_data=&tahun=<?php echo"$_POST[tahun]";?>';
  </script>
  <?php 
}else{
  ?>

  <script type="application/javascript">
    alert("Data SERP Gagal Dieditxxx! ");
    document.location='?module=serp_view&kks_data=&tahun=<?php echo"$_POST[tahun]";?>';
  </script>
  <?php
}


}
?>
