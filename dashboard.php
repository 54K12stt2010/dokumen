<?php
session_start();
if (!isset($_SESSION)) session_start();
date_default_timezone_set('Asia/Bangkok');

include "config/koneksi.php";
include "config/class_paging.php";
include "config/fungsi_thumb.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses Aplikasi REAP UJTA, Anda harus login terlebih dahulu <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dokument Center | UBJOM Paiton</title>
    <link rel="shortcut icon" href="images/sasas.png" />

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>

        <!-- Custom Data Table -->

    <script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/dataTables.bootstrap.css">


    <script>
        NProgress.start();
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-sm" >
    
    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="dashboard.php?module=beranda" class="site_title">
                           <img style="width: 78%; margin-top: 8px;display: block;" src="images/icon-dok.png" alt="image" />
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <?php
                        $user=$_SESSION['username'];
                        $cek=mysqli_fetch_array(mysqli_query($con,"select *from operator where username='$user'"));
                        $nama=$cek['nama_lengkap'];
                    ?>
                    <div class="clearfix"></div>  
                    <div class="clearfix"></div>

                    <?php include("menu.php");?>

                    
                </div>
            </div>

            
                <?php include("nav.php");?>

            <!-- page content -->
            <div class="right_col" role="main">
                
               <?php include("tengah.php");?>

                

                <!-- footer content -->

                <footer>
                    <div class="">
                        <p class="pull-left">&copy;  PT PJB UBJOM PLTU PAITON &nbsp;2018. 
                        </p>
                        <p class="pull-right"> 
                            <span class="lead"> <i class="fa fa-ge"></i> Dokument Center   </span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>

   
    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <script src="js/custom.js"></script>

    <!-- echart -->
    <script src="js/echart/echarts-all.js"></script>
    <script src="js/echart/green.js"></script>

    <script>
        
        <?php
         $tampil = mysqlI_query($con,"SELECT * FROM standart    ");
         $no=1;
         while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){

        $cari1=mysqli_query($con,"select * from nilai_standart where  id_standart = '$r[id_standart]' order by tahun Desc limit 1");
        $h_cari=mysqli_fetch_array($cari1);
        if($h_cari[nilai]==""){
            $nilai_hasil=0;
        }else{
            $nilai_hasil=$h_cari[nilai];
        }


            ?> 
        

        var myChart = echarts.init(document.getElementById('echart_guage<?php echo"$no";?>'), theme);
        myChart.setOption({
            tooltip: {
                formatter: "{a} <br/>{b} : {c}"
            },
            
            series: [
                {
                    name: 'PENILAIAN',
                    type: 'gauge',
                    center: ['50%', '50%'], 
                    radius: [0, '100%'],
                    startAngle: 140,
                    endAngle: -140,
                    min: 0, 
                    max: 100, 
                    precision: 0, 
                    splitNumber: 10, 
                    axisLine: { 
                        show: true, 
                        lineStyle: { 
                            color: [[0.2, 'red'], [0.4, 'blue'], [0.6, 'orange'], [0.8, 'yellow'], [1, 'lightgreen']],
                            width:25                        }
                    },
                    axisTick: {
                        show: true, 
                        splitNumber: 5, 
                        length: 8, 
                        lineStyle: { 
                            color: '#eee',
                            width: 1,
                            type: 'solid'
                        }
                    },
                    axisLabel: { 
                        show: true,
                        formatter: function (v) {
                            switch (v + '') {
                            case '10':
                                return ' 1';
                            case '30':
                                return ' 2';
                            case '50':
                                return ' 3';
                            case '70':
                                return ' 4';
                            case '90':
                                return ' 5';
                            default:
                                return '';
                            }
                        },
                        textStyle: { 
                            color: '#333'
                        }
                    },
                    splitLine: { 
                        show: true, 
                        length: 20, 
                        lineStyle: { 
                            color: '#eee',
                            width: 2,
                            type: 'solid'
                        }
                    },
                    pointer: {
                        length: '75%',
                        width: 8,
                        color: 'auto'
                    },
                    title: {
                        show: true,
                        offsetCenter: ['-65%', -10], 
                        textStyle: { 
                            color: '#333',
                            fontSize: 15
                        }
                    },
                    detail: {
                        show: true,
                        backgroundColor: 'rgba(0,0,0,0)',
                        borderWidth: 0,
                        borderColor: '#ccc',
                        width: 100,
                        height: 40,
                        offsetCenter: ['-60%', 10], 
                        formatter: '{value} ',
                        textStyle: { 
                            color: 'auto',
                            fontSize: 30
                        }
                    },
                    data: [{
                        value: <?php echo"$nilai_hasil";?>,
                        name: 'NILAI'
                    }]
            }
        ]
        });


          <?php
            $no++;
        }

        ?>
        

       
    </script>
</body>

</html>
<?php
}
?>

