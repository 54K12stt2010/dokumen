<?php
$act_data=$_GET['act'];
if($act_data=="editequipment_maximo"){
	$sh_act="EDIT EQUIPMENT MAXIMO";
	}elseif($act_data=="tambahequipment_maximo"){
	$sh_act="TAMBAH EQUIPMENT MAXIMO";
	}else{
	$sh_act=" MAPPING DOKUMENT IMS";
	}
?>

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
                             
                               
                               
                                   
                                <div style="border: 1px solid rgb(204, 204, 204); padding: 5px; overflow: auto; width: 100%; height:500px; background-color: rgb(255, 255, 255);">

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>BAB IMS</th>
                                            <th>ISO9001</th>
                                            <th>SMP</th>
                                            <th>SMK3</th>
                                            <th>ISO933</th>
                                            <th>ISOKIMIA</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM equipment_maximo  ORDER BY   unit asc limit 25 ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>BAB IMS SK</td>
                          <td><a href='' class='btn btn-success btn-xs'><i class='fa fa-folder-open-o'> Document </i></a></td>
                          <td><a href='' class='btn btn-success btn-xs'><i class='fa fa-folder-open-o'> Document </i></a></td>
                          <td><a href='' class='btn btn-success btn-xs'><i class='fa fa-folder-open-o'> Document </i></a></td>
                          <td><a href='' class='btn btn-success btn-xs'><i class='fa fa-folder-open-o'> Document </i></a></td>
                          <td><a href='' class='btn btn-success btn-xs'><i class='fa fa-folder-open-o'> Document </i></a></td>
                          </tr>";
      									$no++;
    									}
									   ?>  
                                        </tbody>
                                    </table>
                                    <!-- end project list -->
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
					   

    				
    				break;
								
						
							}





