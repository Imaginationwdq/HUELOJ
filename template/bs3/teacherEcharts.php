<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $OJ_NAME?></title>
    <?php include("template/$OJ_TEMPLATE/css.php");?>

<!--    <script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>-->
    <script src="/HUELOJ/echarts/js/echarts.min.js"></script>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="<?php echo $OJ_CDN_URL.$path_fix."template/$OJ_TEMPLATE/"?>jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="<?php echo $OJ_CDN_URL.$path_fix."template/$OJ_TEMPLATE/"?>bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php");?>
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="dropdown col-md-1">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php echo $t_class ?>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php echo $option_class ?>
                </ul>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-2" style="height: 300px" id="main1"></div>
            <div class="col-md-7" style="height: 300px">
                <div style="height: 320px;" id="main2"></div>
                <div class="row" style="">
                    <div class="col-md-3" style="padding-left: 75px;"><?php echo $datetest1?></div>
                    <div class="col-md-3" style="padding-left: 75px;"><?php echo $datetest2?></div>
                    <div class="col-md-3" style="padding-left: 75px;"><?php echo $datetest3?></div>
                    <div class="col-md-3" style="padding-left: 75px;"><?php echo $datetest4?></div>
                </div>
            </div>
            <div class="col-md-3" style="height: 300px" id="Scatter">3</div>
        </div>
        <div class="row">
            <div class="col-md-3" style="height: 300px" id="Rader">4</div>
            <div class="col-md-5" style="height: 300px;">
               <div style="overflow-y: auto;overflow-x:auto;margin-top: 50px;height: 250px" > <?php echo $student ?> </div>
            </div>
            <div class="col-md-4" style="height: 300px" id="Finance">
            <div class="col-md-4" style="height: 400px">
<!--                ----------------------------------------------------测试数据------------------------------------------------------------->
<!--                --><?php
//                    echo $userId."<br/>";
//                    echo $studentC."<br/>";
//                    echo $studentD."<br/>";
//                    echo $levelENum."<br/>";
//                ?>
            </div>

        </div>
    </div>
</div> <!-- /container -->
</body>
</html>
<script type="text/javascript">
    // 基桑图
    var myChart2 = echarts.init(document.getElementById('main2'));
    // 指定图表的配置项和数据
    var option = {

        tooltip: {
            trigger: "item"
        },
        series: {
            type: 'sankey',
            left: 'center',
            width:'80%',
            layout: 'none',
                lineStyle: {
                color: "source",
                curveness: 0.5
            },
            data: [
                {name: 'A1', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'B1', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'C1', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'D1', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'E1', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}},
                {name: 'A2', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'B2', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'C2', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'D2', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'E2', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}},
                {name: 'A3', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'B3', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'C3', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'D3', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'E3', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}},
                {name: 'A4', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'B4', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'C4', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'D4', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'E4', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}}
                ],
            links: <?php echo $studentLinks ?>
        }
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart2.setOption(option);

    // 饼状图
    var myChart1 = echarts.init(document.getElementById('main1'));
    // 指定图表的配置项和数据
    option = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        series: [
            {
                color: ['#339900','#CC0033'],
                name: '正确情况',
                type: 'pie',
                selectedMode: 'single',
                radius: [0, '60%'],
                label: {
                    position: 'inner'
                },
                labelLine: {
                    show: false
                },
                data: <?php echo $data1 ?>
            },
            {
                color: ['#CC9900','#3366CC','#9900CC','#66CC66','#CC6600','#963620','#FF3366','#66CCFF','#CC00CC'],
                name: '详细状况',
                type: 'pie',
                radius: ['75%', '100%'],
                label: {
                    show: false,
                    formatter: '{b|{b}}',
                    rich: {
                        b: {
                            // 配置b的样式
                            fontSize: 10
                        }
                    }
                },
                data: <?php echo $data2 ?>
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart1.setOption(option);

    window.onresize = function () {
        myChart1.resize();
        myChart2.resize();
        ScatterChart.resize();
        // myChart2.resize();
        RaderChart.resize();
        FinChart.resize();
    }

    // function clickClick(){
    //     console.log($('#t_class').find('option:selected').text());
    // }
</script>
<script>

    var d1 = <?php echo json_encode($chart_data_all)?>;
    var d2 = <?php echo json_encode($chart_data_all1)?>;
    var ScatterChart = echarts.init(document.getElementById('Scatter'));
    var hours = ['12a', '1a', '2a', '3a', '4a', '5a', '6a',
        '7a', '8a', '9a','10a','11a',
        '12p', '1p', '2p', '3p', '4p', '5p',
        '6p', '7p', '8p', '9p', '10p', '11p'];
    var days = [d1[0][0]+" :", d1[1][0]+" :", d1[2][0]+" :",
        d1[3][0]+" :", d1[4][0]+" :", d1[5][0]+" :", d1[6][0]+" :"];


    var data =  <?php echo json_encode($data)?>

    option = {
        tooltip: {
            position: 'top'
        },
        title: [],
        singleAxis: [],
        series: []
    };

    echarts.util.each(days, function (day, idx) {
        option.title.push({
            textStyle:{
                fontSize:10,
                fontStyle:'oblique'
            },

            top: (idx + 0.2) * 100 / 7 + '%',
            text: day,

        });
        option.singleAxis.push({
            left: 80,
            type: 'category',
            boundaryGap: false,
            data: hours,
            top: (idx * 100 / 7 + 5) + '%',
            height: (100 / 7 - 15) + '%',
            axisLabel: {
                interval: 2
            }
        });
        option.series.push({
            singleAxisIndex: idx,
            coordinateSystem: 'singleAxis',
            type: 'scatter',
            left:'100',
            data: [],
            symbolSize: function (dataItem) {
                return dataItem[1] * 2;
            }
        });
    });

    echarts.util.each(data, function (dataItem) {

        option.series[dataItem[0]].data.push([dataItem[1], dataItem[2]]);
    });

    ScatterChart.setOption(option);

</script>
<script>
    var RaderChart = echarts.init(document.getElementById('Rader'));

    option = {
        tooltip: {},
        legend: {

        },
        radar: {
            // shape: 'circle',
            name: {
                textStyle: {
                    color: '#fff',
                    backgroundColor: '#999',
                    borderRadius: 3,
                    padding: [3, 5]
                }
            },
            indicator: [
                { name: '100.00-80.00+', max: <?php echo $max?>},
                { name: '80.00-70.00+', max: <?php echo $max?>},
                { name: '70.00-60.00+', max: <?php echo $max?>},
                { name: '60.00-50.00+', max: <?php echo $max?>},
                { name: '50.00-0.00+', max: <?php echo $max?>}
            ],
            radius: '50%',

        },
        series: [{
            name: '分数分布',
            type: 'radar',
            areaStyle: {normal: {}},
            symbolSize: 5, // 拐点的大小
            data: [
                {

                    value: [<?php echo $BArray1?>, <?php echo $BArray2?>, <?php echo $BArray3?>, <?php echo $BArray4?>, <?php echo $BArray5?>],
                    name: '<?php echo $name2?>',
                    label: {
                        normal: {
                            show: true,

                        },
                    },


                },{
                    value: [<?php echo $Array1?>, <?php echo $Array2?>, <?php echo $Array3?>, <?php echo $Array4?>, <?php echo $Array5?>],
                    name: '<?php echo $name?>',
                    label: {
                        normal: {
                            show: true,

                        },
                    },
                },
            ]
        }]
    };

    RaderChart.setOption(option);

</script>
<script>

    var FinChart = echarts.init(document.getElementById('Finance'));
    var names = <?php echo json_encode(array_keys($TArray)) ?>;
    console.log(names);

    option = {



        baseOption: {
            timeline: {
                show:false
            },
            tooltip: {
                show:false
            },
            legend: {
                left: 'center',
                show:false,
                itemGap:5
            },
            calculable : true,
            grid: {
                left: 80,
                top:80,
                bottom:20,
                tooltip: {
                    show:false,
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow',

                        label: {
                            show: true,
                            formatter: function (params) {
                                return params.value.replace('\n', '');
                            }
                        }
                    }
                }
            },
            xAxis: [
                {
                    'type':'category',
                    'axisLabel':{'interval':0,'fontSize':10},
                    'data':[
                        '正确','格式错误','答案错误','时间超限','输出超限','运行错误','编译错误','内存超限'
                    ],
                    splitLine: {show: false},
                }
            ],
            yAxis: [
                {
                    type: 'value',
                    name: '数量'
                }
            ],
            series: [
                {name: '数量', type: 'bar'},
                {
                    name: '问题类型占比',
                    type: 'pie',
                    center: ['75%', '35%'],
                    radius: '28%',
                    z: 100
                }
            ]
        },



        options: [
            {

                series: [
                    {data: [<?php echo $sums ?>,<?php echo $sums5 ?>,<?php echo $sums1 ?>,<?php echo $sums2 ?>,<?php echo $sums3 ?>,<?php echo $sums4 ?>,<?php echo $sums5 ?>,<?php echo $sums6 ?>]},
                    {data: [
                            <?php
                            for ($i=0;$i<count($TArray);$i++){
                            $strs = array_keys($TArray)[$i];
                            $num = $TArray[$strs];
                            ?>
                            {name: '<?php echo $strs ?>', value: <?php echo $num ?>},
                            <?php } ?>

                        ]}
                ]
            },

        ],


    };

    FinChart.on('click',function(params){  //点击事件
        var name = params.name;
        var seriesType = params.seriesType;

        console.log(name);
        console.log(seriesType);
        for (var i=0;i<names.length;i++){
            if (names[i]==name&&seriesType=='pie'){
                window.location.href="/HUELOJ/teacherEcharts.php?data="+name;

                option = {
                    baseOption: {
                        timeline: {
                            show:false
                        },
                        tooltip: {
                            show:false
                        },
                        legend: {
                            left: 'center',
                            show:false,
                            itemGap:5
                        },
                        calculable : true,
                        grid: {
                            left: 80,
                            top:80,
                            bottom:20,
                            tooltip: {
                                show:false,
                                trigger: 'axis',
                                axisPointer: {
                                    type: 'shadow',

                                    label: {
                                        show: true,
                                        formatter: function (params) {
                                            return params.value.replace('\n', '');
                                        }
                                    }
                                }
                            }
                        },
                        xAxis: [
                            {
                                'type':'category',
                                'axisLabel':{'interval':0,'fontSize':10},
                                'data':[
                                    '正确','格式错误','答案错误','时间超限','输出超限','运行错误','编译错误','内存超限'
                                ],
                                splitLine: {show: false},
                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '数量'
                            }
                        ],
                        series: [
                            {name: '数量', type: 'bar'},
                            {
                                name: '问题类型占比',
                                type: 'pie',
                                center: ['75%', '35%'],
                                radius: '28%',
                                z: 100
                            }
                        ]
                    },



                    options: [
                        {

                            series: [
                                {data: [<?php echo $sums ?>,<?php echo $sums5 ?>,<?php echo $sums1 ?>,<?php echo $sums2 ?>,<?php echo $sums3 ?>,<?php echo $sums4 ?>,<?php echo $sums5 ?>,<?php echo $sums6 ?>]},
                                {data: [
                                        <?php
                                        for ($i=0;$i<count($TArray);$i++){
                                        $strs = array_keys($TArray)[$i];
                                        $num = $TArray[$strs];
                                        ?>
                                        {name: '<?php echo $strs ?>', value: <?php echo $num ?>},
                                        <?php } ?>

                                    ]}
                            ]
                        },

                    ],


                };
            }else {
                option = {



                    baseOption: {
                        timeline: {
                            show:false
                        },
                        tooltip: {
                            show:false
                        },
                        legend: {
                            left: 'center',
                            show:false,
                            itemGap:5
                        },
                        calculable : true,
                        grid: {
                            left: 80,
                            top:80,
                            bottom:20,
                            tooltip: {
                                show:false,
                                trigger: 'axis',
                                axisPointer: {
                                    type: 'shadow',

                                    label: {
                                        show: true,
                                        formatter: function (params) {
                                            return params.value.replace('\n', '');
                                        }
                                    }
                                }
                            }
                        },
                        xAxis: [
                            {
                                'type':'category',
                                'axisLabel':{'interval':0,'fontSize':10},
                                'data':[
                                    '正确','格式错误','答案错误','时间超限','输出超限','运行错误','编译错误','内存超限'
                                ],
                                splitLine: {show: false},
                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '数量'
                            }
                        ],
                        series: [
                            {name: '数量', type: 'bar'},
                            {
                                name: '问题类型占比',
                                type: 'pie',
                                center: ['75%', '35%'],
                                radius: '28%',
                                z: 100
                            }
                        ]
                    },



                    options: [
                        {

                            series: [
                                {data: [<?php echo $sums ?>,<?php echo $sums5 ?>,<?php echo $sums1 ?>,<?php echo $sums2 ?>,<?php echo $sums3 ?>,<?php echo $sums4 ?>,<?php echo $sums5 ?>,<?php echo $sums6 ?>]},
                                {data: [
                                        <?php
                                        for ($i=0;$i<count($TArray);$i++){
                                        $strs = array_keys($TArray)[$i];
                                        $num = $TArray[$strs];
                                        ?>
                                        {name: '<?php echo $strs ?>', value: <?php echo $num ?>},
                                        <?php } ?>

                                    ]}
                            ]
                        },

                    ],


                };
            }
        }

    });




    FinChart.setOption(option);



</script>