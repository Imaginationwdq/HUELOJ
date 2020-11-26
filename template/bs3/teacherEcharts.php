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

    <script src="/HUELOJ/echarts/js/echarts.min.js"></script>
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
    <p style="margin-right:10px;float: right;font-size: 16px;" >选择班级:

        <select id="class">

            <?php
            $user_id = $_SESSION[$OJ_NAME.'_'.'user_id'];
            $sql = "SELECT `tclass` FROM `users` WHERE `user_id`=?";
            $result = pdo_query($sql,$user_id);
            $str_arr = explode(",",$result[0][0]);
            for ($i=0;$i<=count($str_arr);$i++){
                if($i!=count($str_arr)){
                ?>
                <option value ="<?php echo $str_arr[$i];?>"><?php echo $str_arr[$i];?></option>
                <?php
                }else{
                ?>
                <option value ="all" selected="selected"><?php echo "all"?></option>
               <?php
                }
            }
            ?>

        </select>

    </p>
    <div class="jumbotron">
        <center><h3>老师界面</h3></center>
<!--        --><?php //echo $echarts ?>

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">
                     <div id="Pie" style="width:100%;height: 400px;">
                        <script src="/web/echarts/js/Pie.js"></script>
                     </div>

                <div class="col-md-4">

                </div>

            </div>

        </div>



    </div>

</div> <!-- /container -->
</body>
</html>
<script>
    window.addEventListener("resize", () => {
        this.PieChart.resize();
        this.RaderChart.resize();
        this.ScatterChart.resize();
        this.FinChart.resize();
        this.SankChart.resize();
    });
    document.getElementById("body").style.height=document.body.clientHeight-document.getElementById("container").offsetHeight."px";
</script>


