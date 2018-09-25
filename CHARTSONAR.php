<div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Sonar</h2>
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

                                    <div id="echart_sonar" style="height:370px;"></div>

                                </div>
                            </div>
                        </div>



                        var myChart = echarts.init(document.getElementById('echart_sonar'), theme);
        myChart.setOption({
            title: {
                text: 'Budget vs spending',
                subtext: 'subtext'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                orient: 'vertical',
                x: 'right',
                y: 'bottom',
                data: ['预算分配（Allocated Budget）', '实际开销（Actual Spending）']
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
            polar: [
                {
                    indicator: [
                        {
                            text: '销售（sales）',
                            max: 6000
                        },
                        {
                            text: '管理（Administration）',
                            max: 16000
                        },
                        {
                            text: '信息技术（Information Techology）',
                            max: 30000
                        },
                        {
                            text: '客服（Customer Support）',
                            max: 38000
                        },
                        {
                            text: '研发（Development）',
                            max: 52000
                        },
                        {
                            text: '市场（Marketing）',
                            max: 25000
                        }
                ]
            }
        ],
            calculable: true,
            series: [
                {
                    name: '预算 vs 开销（Budget vs spending）',
                    type: 'radar',
                    data: [
                        {
                            value: [4300, 10000, 28000, 35000, 50000, 19000],
                            name: '预算分配（Allocated Budget）'
                    },
                        {
                            value: [5000, 14000, 28000, 31000, 42000, 21000],
                            name: '实际开销（Actual Spending）'
                    }
                ]
            }
        ]
        });
