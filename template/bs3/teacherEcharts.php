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

    <script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>
    <script src="../template/bs3/jquery.min.js"></script>
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
        <center><h3>老师界面</h3></center>
<!--        --><?php //echo $echarts ?>
        <div id="main" style="width: 600px;height:400px;"></div>
    </div>

</div> <!-- /container -->
</body>
</html>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    var option = {
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
                data: [
                    {value: 144, name: '正确'},
                    {value: 601, name: '错误'}
                ]
            },
            {
                color: ['#CC9900','#3366CC','#9900CC','#66CC66','#CC6600'],
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
                data: [
                    {value: 144, name: '正确'},
                    {value: 389, name: '答案错误'},
                    {value: 94, name: '时间超限'},
                    {value: 1, name: '输出超限'},
                    {value: 54, name: '运行错误'},
                    {value: 62, name: '编译错误'}
                ]
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
