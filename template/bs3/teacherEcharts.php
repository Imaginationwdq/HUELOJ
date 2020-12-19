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
<!--<body style="background-image: url(/HUELOJ/echarts/bg.jpg)">-->
<body>
<div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php");?>
    <!-- Main component for a primary marketing message or call to action -->
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
</div>
<section style="min-width: 1024px;max-width: 1920px;margin: 0 auto;padding: 10px 10px 0;display: flex;flex-direction: column">
    <div style="flex:3">
        <div style="padding: 10px 10px 0;display: flex;flex-direction: row">
            <div style="flex:6;height: 310px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                <div id="main2" style="height: 250px;margin-top: 18px;"></div>
                <div class="col-md-3" style="padding-left: 50px;"><?php echo $datetest1?></div>
                <div class="col-md-3" style="padding-left: 60px;"><?php echo $datetest2?></div>
                <div class="col-md-3" style="padding-left: 90px;"><?php echo $datetest3?></div>
                <div class="col-md-3" style="padding-left: 75px;"><?php echo $datetest4?></div>
                <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                    <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                    <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                </div>
            </div>
            <div style="flex:6;height: 310px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                <div id="Finance" style="height: 280px;margin-top: 18px;"></div>
                <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                    <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                    <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                </div>
            </div>
        </div>
    </div>
    <div style="flex:6">
           <div style="padding: 10px 10px 0;display: flex;flex-direction: row">
               <div style="flex: 3">
                    <div style="margin: 0 auto;padding: 10px 10px 0;display: flex;flex-direction: column">
                        <div style="flex:6;height: 310px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                            <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                            <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                            <div id="main1" style="height: 280px;margin-top: 18px;"></div>
                            <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                                <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                                <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                            </div>
                        </div>
                        <div style="flex:6;height: 310px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                            <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                            <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                            <div id="Rader" style="height: 280px;margin-top: 18px;"></div>
                            <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                                <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                                <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                            </div>
                        </div>
                    </div>
                </div>
               <div style="flex:6;height: 600px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                   <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                   <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>


                   <div style="height: 600px;margin-top: 18px;overflow-y: auto;overflow-x:auto;border: 1px solid #2ec7c9">
                       <?php echo $student ?>
                   </div>

                   <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                       <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                       <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                   </div>
               </div>
               <div style="flex: 3">
                   <div style="margin: 0 auto;padding: 10px 10px 0;display: flex;flex-direction: column">
                       <div style="flex:6;height: 310px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                           <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                           <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                           <div id="Scatter" style="height: 280px;margin-top: 18px;width: 300px"></div>
                           <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                               <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                               <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                           </div>
                       </div>
                       <div style="flex:6;height: 310px;border: 1px solid rgba(25, 186, 139, 0.17);background: rgba(255, 255, 255, 0.04) url(../../line.png);padding: 0 15px 40px;margin-bottom: 15px;position: relative" >
                           <div style="position: absolute;top: 0;left: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                           <div style="position: absolute;top: 0;right: 0; width: 10px; height: 10px; border-top: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                           <div id="main4" style="height: 280px;margin-top: 18px;"></div>
                           <div style="position: absolute;left: 0;bottom: 0;width: 100%;">
                               <div style="position: absolute;bottom: 0;left: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-left: 2px solid #02a6b5;"></div>
                               <div style="position: absolute;bottom: 0;right: 0; width: 10px; height: 10px; border-bottom: 2px solid #02a6b5; border-right: 2px solid #02a6b5;"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
    </div>
</section>
<!--<div>-->
<!--    --><?php //echo $t_class?>
<!--</div>-->
</body>
</html>

<script>
    //平行坐标系
    var myChart3 = echarts.init(document.getElementById(''));
    var option = {
        title:{
            text:'<?php echo $MyTitle ?>'+"做题正确数量走势",
            textStyle:{
                fontSize:15,
            },
            left:'center'
        },
        parallelAxis: [
            {dim: 0, name: 'Weekend1'},
            {dim: 1, name: 'Weekend2'},
            {dim: 2, name: 'Weekend3'},
            {dim: 3, name: 'Weekend4'}
            // {
            //     dim: 3,
            //     name: 'Score',
            //     type: 'category',
            //     data: ['Excellent', 'Good', 'OK', 'Bad']
            // }
        ],
        series: {
            type: 'parallel',
            lineStyle: {
                width: 2,
                color: '#fd0000'
            },
            data: <?php echo $data3 ?>
        }
    };

    myChart3.setOption(option);
</script>
<script>
    // 基桑图
    var myChart2 = echarts.init(document.getElementById('main2'),'macarons');
    // 指定图表的配置项和数据
    var option = {
        title:{
            text:'<?php echo $MyTitle ?>'+"考试成绩走势",
            textStyle:{
                fontSize:15,
            },
            left:'center'
        },
        tooltip: {
            trigger: "item"
        },
        series: {
            type: 'sankey',
            left: 'center',
            width:'90%',
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
</script>
<script>
    // 饼状图
    var myChart1 = echarts.init(document.getElementById('main1'),'macarons');
    // 指定图表的配置项和数据
    option = {
        title:{
            text:'<?php echo $MyTitle ?>'+"提交运行状况",
            textStyle:{
                fontSize:15,
            },
            left:'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        // legend: {
        //     type: 'scroll',
        //     orient: 'vertical',
        //     right: 10,
        //     top: 20,
        //     bottom: 20,
        // },
        series: [
            {
                //color: ['#339900','#CC0033'],
                name: '正确情况',
                type: 'pie',
                radius: [0, '40%'],
                left:'5',
                label: {
                    position: 'inner'
                },
                labelLine: {
                    show: false
                },
                data: <?php echo $data1 ?>
            },
            {
               // color: ['#CC9900','#3366CC','#9900CC','#66CC66','#CC6600','#963620','#FF3366','#66CCFF','#CC00CC'],
                name: '详细状况',
                type: 'pie',
                selectedMode: 'single',
                radius: ['55%', '80%'],
                left:'5',
                label: {
                    // show: false,
                    formatter: '{b|{b}}',
                    rich: {
                        b: {
                            // 配置b的样式
                            fontSize: 12
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
    var ScatterChart = echarts.init(document.getElementById('Scatter'),'macarons');
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
        title:[],
        singleAxis: [],
        series: []
    };

    echarts.util.each(days, function (day, idx) {
        option.title.push({
            textStyle:{
                fontSize:10,
                fontStyle:'oblique'
            },

            top: (idx + 0.42) * 100 / 7 + '%',
            text: day,

        });
        option.singleAxis.push({

            left: 80,
            type: 'category',
            boundaryGap: false,
            data: hours,
            top: (idx * 100 / 7 + 8) + '%',
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
    var RaderChart = echarts.init(document.getElementById('Rader'),'macarons');

    option = {
        tooltip: {

        },
        title:{
            text:'<?php echo $MyTitle ?>'+"章节分数分布",
            textStyle:{
                fontSize:15,
            },
            left:'center'
        },
        legend: {
           bottom:'5px'
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
                <?php
                for ($i=0;$i<count($Arrays);$i++){
                $strname = array_keys($Arrays)[$i];
                $num = $Arrays[$strname];
                ?>
                {name: '<?php echo $strname ?>', max: 100},
                <?php } ?>
            ],
            radius: '55%',

        },
        series: [{
            name: '分数分布',
            type: 'radar',
            areaStyle: {normal: {}},
            symbolSize: 1, // 拐点的大小
            data: [


                {

                    value: [<?php
                        for ($i=0;$i<count($Arrays);$i++){
                        $strname = array_keys($Arrays)[$i];
                        $num = $Arrays[$strname];
                        ?>
                        <?php echo $num ?>,
                        <?php } ?>],
                    name: '<?php echo $name?>',
                    label: {
                        normal: {
                            show: false,

                        },
                    },


                },{
                    value: [<?php
                        for ($i=0;$i<count($Arrays2);$i++){
                        $strname2 = array_keys($Arrays2)[$i];
                        $num2 = $Arrays2[$strname2];
                        ?>
                        <?php echo $num2 ?>,
                        <?php } ?>],
                    name: '<?php echo $name2?>',
                    label: {
                        normal: {
                            show: false,

                        },
                    },
                },
            ]
        }]
    };

    RaderChart.setOption(option);

</script>
<script>

    var FinChart = echarts.init(document.getElementById('Finance'),'macarons');
    var names = <?php echo json_encode(array_keys($TArray)) ?>;


    option = {


        baseOption: {

            title:{
                text:'<?php echo $MyTitle ?>'+"错误类型数量分布",
                textStyle:{
                    fontSize:15,
                },
                left:'center'
            },

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
                {name: '数量', type: 'bar',bottom:'50'},
                {
                    name: '问题类型占比',
                    type: 'pie',
                    center: ['75%', '35%'],
                    radius: '28%',
                    z: 100,
                    top:'20'

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
        var tclass1 = '<?php echo $t_class ?>';
        var tclass2 = [];
        <?php $sql = "select tclass from users where user_id ='$sid'";
            $result = mysql_query_cache($sql);
            $strclass = explode(',',$result[0][0]);
            for($i=0;$i<count($strclass);$i++){
                ?>
                var arr = '<?php echo $strclass[$i] ?>';
                tclass2.push(arr);
            <?php } ?>
        var uid = '<?php echo $userId ?>';
        console.log(tclass1);
        console.log(tclass2);
        console.log(tclass2.indexOf(tclass1));
        console.log(uid);
        for (var i=0;i<names.length;i++){
            if (names[i]==name&&seriesType=='pie'&&tclass2.indexOf(tclass1)==-1&&uid.length==0){  //如果name存在且是饼图上的name且此时为全部人则

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
                                label:{show:false},
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
            }else if (names[i]==name&&seriesType=='pie'&&tclass2.indexOf(tclass1)!=-1&&uid.length==0){
                window.location.href="/HUELOJ/teacherEcharts2.php?data="+name+"&t_class="+tclass1;
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
            }else if (names[i]==name&&seriesType=='pie'&&uid.length!=0){
                window.location.href="/HUELOJ/teacherEcharts3.php?data="+name+"&user_id="+uid;
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