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
            <div class="col-md-3" style="height: 300px">4</div>
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
                return dataItem[1] * 3;
            }
        });
    });

    echarts.util.each(data, function (dataItem) {
        console.log(dataItem);
        console.log(dataItem[0]);console.log(dataItem[1]);console.log(dataItem[2]);
        option.series[dataItem[0]].data.push([dataItem[1], dataItem[2]]);
    });

    ScatterChart.setOption(option);

</script>
<script>

</script>