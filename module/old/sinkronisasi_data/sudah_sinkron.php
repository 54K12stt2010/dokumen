 <!-- start project list -->
 <table class="table table-striped responsive-utilities jambo_table data">
  <thead>
    <tr>
      <th>NO</th>
      <th>KKS</th>
      <th>NAMA SYSTEM</th>
      <th>CAUSE CODE</th>
      <th>CAUSE CODE DESCRIPTION</th>
      <th>UNIT</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $tampil = mysqlI_query($con,"SELECT * FROM sinkronisasi_data  ORDER BY   kks  ");
    $no=1;
    while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){

      $show_m=mysqli_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$r[kks]'"));
      $show_n=mysqli_fetch_array(mysqli_query($con,"select *from equipment_navitas where cause_code='$r[cause_code]'"));
    

     echo "<tr><td>$no</td>
     <td>$show_m[kks]</td>
     <td>$show_m[nama_system]</td>
     <td>$show_n[cause_code]</td>
     <td>$show_n[nama_system]</td>
     <td>$show_m[unit]</td>";
     ?>
     <td class="td-actions">
      <a href="?module=edit_sudah_sinkronisasi&act=editsinkronisasi&id=<?php echo"$r[kks]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
    </td>
    <?php
    echo"</tr>";
    $no++;
    
  }
  ?>  
</tbody>
</table>
<!-- end project list -->


