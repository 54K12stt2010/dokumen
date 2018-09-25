<?php
                        $user=$_SESSION['username'];
                        $cek=mysqli_fetch_array(mysqli_query($con,"select *from operator where username='$user'"));
                        $nama=$cek['nama_lengkap'];
                    ?>
                    <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id=""><i class="fa"><span > <b>MANAJEMEN DOKUMENT TERINTEGRASI (MADUTIGA)</b> </span></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="profil/<?php echo"sedang_$cek[profil]";?>" alt=""><?php echo"$nama";?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="?module=profil">  Profile</a>
                                    </li>
                                    <li>
                                        <a  href="?module=ganti_password">
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="javascript:;">Help</a>
                                    </li> -->
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                           

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->