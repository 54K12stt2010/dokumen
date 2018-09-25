

<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>MAPPING DOKUMENT </h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>

                                <?php
                                $tampil = mysqlI_query($con,"SELECT * FROM standart  where nama_standart<>'-' ORDER BY   nama_standart  ");
                                $no=1;
                                while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
                                ?>
                                        <div class="col-md-55">
                                            <div class="thumbnail">
                                                <div class="image view view-first">
                                                    <a href="dashboard.php?module=detail_dokument&standart=<?php echo"$r[id_standart]&daftar_isi=1";?>"><img  style="width: 100%; display: block;" src="images/folder.jpg" alt="image" /></a>
                                                </div>
                                                <div class="caption">
                                                    <center><?php echo"$r[nama_standart]";?></center>
                                                </div>
                                            </div>
                                        </div>

                            <?php 
                            }
                            ?>

                
                    </div>                                    
                  </div>