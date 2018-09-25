<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            

            

           
                    <div class="row">
                        
                        

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Guage</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div id="echart_guage" style="height:370px;"></div>

                                </div>
                            </div>
                        </div>

                        


                    </div>
                </div>

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
        

        

        var myChart = echarts.init(document.getElementById('echart_guage'), theme);
        myChart.setOption({
            tooltip: {
                formatter: "{a} <br/>{b} : {c}%"
            },
            toolbox: {
                show: true,
                feature: {
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            series: [
                {
                    name: 'PENILAIAN',
                    type: 'gauge',
                    center: ['50%', '50%'], 
                    radius: [0, '75%'],
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
                            width: 30
                        }
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
                        length: 30, 
                        lineStyle: { 
                            color: '#eee',
                            width: 2,
                            type: 'solid'
                        }
                    },
                    pointer: {
                        length: '80%',
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
                        value: 10,
                        name: 'PERFORMANCE'
                    }]
            }
        ]
        });


        

       
    </script>
</body>

</html>