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
            <div class="col-md-3" style="height: 400px" id="main1"></div>
            <div class="col-md-6" style="height: 400px">
                <div style="height: 360px" id="main2"></div>
                <div class="row">
                    <div class="col-md-3"><?php echo "（".$datetest2." 到 ".$datetest1."）"?></div>
                    <div class="col-md-3"><?php echo "（".$datetest2." 到 ".$datetest1."）"?></div>
                    <div class="col-md-3"><?php echo "（".$datetest2." 到 ".$datetest1."）"?></div>
                    <div class="col-md-3"><?php echo "（".$datetest2." 到 ".$datetest1."）"?></div>
                </div>
            </div>
            <div class="col-md-3" style="background: #1f7471;height: 400px">3</div>
        </div>
        <div class="row">
            <div class="col-md-4" style="background: #e7cf44;height: 400px">4</div>
            <div class="col-md-4" style="height: 400px ;overflow-y: auto;">
                <?php echo $student ?>
            </div>
            <div class="col-md-4" style="height: 400px">
<!--                ----------------------------------------------------测试数据------------------------------------------------------------->
<!--                --><?php
//                    echo $levelANum."<br/>";
//                    echo $levelBNum."<br/>";
//                    echo $levelCNum."<br/>";
//                    echo $levelDNum."<br/>";
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
            layout: 'none',
            lineStyle: {
                color: "source",
                curveness: 0.5
            },
            data: [
                {name: 'a1', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'b1', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'c1', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'd1', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'e1', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}},
                {name: 'a2', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'b2', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'c2', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'd2', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'e2', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}},
                {name: 'a3', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'b3', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'c3', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'd3', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'e3', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}},
                {name: 'a4', "itemStyle": {"normal": {"color": "#18B3AD", "borderColor": "#18B3AD"}}},
                {name: 'b4', "itemStyle": {"normal": {"color": "#19AB46", "borderColor": "#19AB46"}}},
                {name: 'c4', "itemStyle": {"normal": {"color": "#E4D518", "borderColor": "#EAD518"}}},
                {name: 'd4', "itemStyle": {"normal": {"color": "#E79D18", "borderColor": "#E79D18"}}},
                {name: 'e4', "itemStyle": {"normal": {"color": "#DD331A", "borderColor": "#DD331A"}}}
                ],
            links:
            [
                {source: 'a1', target: 'a2', value: 0},
                {source: 'b1', target: 'b2', value: 0},
                {source: 'c1', target: 'c2', value: 0},
                {source: 'd1', target: 'd2', value: 0},
                {source: 'e1', target: 'e2', value: 0},

                {source: 'a2', target: 'a3', value: 0},
                {source: 'b2', target: 'b3', value: 0},
                {source: 'c2', target: 'c3', value: 0},
                {source: 'd2', target: 'd3', value: 0},
                {source: 'e2', target: 'e3', value: 0},

                {source: 'a3', target: 'a4', value: 0},
                {source: 'b3', target: 'b4', value: 0},
                {source: 'c3', target: 'c4', value: 0},
                {source: 'd3', target: 'd4', value: 0},
                {source: 'e3', target: 'e4', value: 0},

                {source: 'a1', target: 'a2', value: 5},
                {source: 'b1', target: 'a2', value: 5},
                {source: 'c1', target: 'b2', value: 5},
                {source: 'd1', target: 'b2', value: 5},
                {source: 'e1', target: 'e2', value: 5},

                {source: 'a2', target: 'b3', value: 5},
                {source: 'b2', target: 'e3', value: 5},
                {source: 'c2', target: 'd3', value: 5},
                {source: 'd2', target: 'a3', value: 5},
                {source: 'e2', target: 'a3', value: 5},

                {source: 'a3', target: 'b4', value: 5},
                {source: 'b3', target: 'd4', value: 5},
                {source: 'c3', target: 'd4', value: 5},
                {source: 'd3', target: 'e4', value: 5},
                {source: 'e3', target: 'e4', value: 5}
            ]
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
                radius: [0, '30%'],
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
                radius: ['40%', '55%'],
                label: {
                    formatter: '{b|{b}}',
                    rich: {
                        b: {
                            // 配置b的样式
                            fontSize: 14
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
        // myChart2.resize();
    }

    // function clickClick(){
    //     console.log($('#t_class').find('option:selected').text());
    // }
</script>
