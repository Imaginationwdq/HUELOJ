<?php
require_once('./include/cache_start.php');
require_once('./include/db_info.inc.php');
require_once('./include/const.inc.php');
require_once('./include/memcache.php');
require_once('./include/setlang.php');
?>
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
    <?php include(dirname(__FILE__)."../template/$OJ_TEMPLATE/css.php");?>
    <script src="/HUELOJ/echarts/js/echarts.min.js"></script>
    <script src="/HUELOJ/echarts/js/jquery.min.js"></script>
    <style type="text/css">
        .body{
            width:body.clientHeight;
            height: body.clientWidth;
        }
        .left{
            width:33%;
            height:100%;
            float:left;
            background: #0cdbff;
        }
        .right{
            overflow:hidden;
            height:100%;
            background: #0c673b;
        }
        .aside{
            width:33%;
            height:100%;
            float:right;
            background: #0ea432;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>
<div class="body" id="bodyall">
<div class="container" id="bodytop">
    <?php include(dirname(__FILE__)."../template/$OJ_TEMPLATE/nav.php");?>


                <p style="margin-right:10px;float: right;font-size: 16px;" >选择班级:
                    <select id="class">

                        <?php
                        $user_id = $_SESSION[$OJ_NAME.'_'.'user_id'];
                        $sql = "SELECT `tclass` FROM `users` WHERE `user_id`=?";
                        $result = pdo_query($sql,$user_id);
                        $str_arr = explode(",",$result[0][0]);
                        $i=0;

                        for ($i=0;$i<=count($str_arr);$i++){
                            if ($i!=count($str_arr)){
                            ?>
                            <option value ="<?php echo $str_arr[$i];?>"><?php echo $str_arr[$i];?></option>
                            <?php

                            }else{

                            ?>
                                <option value ="<?php echo "all";?>" selected = "selected"><?php echo "all";?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>

                </p>



</div> <!-- /container -->
<div id="bodybottom">

    <div class="left">
        <div id="Pie" style="height:45%;"></div>
        <script src="/web/echarts/js/Pie.js"></script>
        <div id="Rader" style="height:45%;"></div>
        <script src="/web/echarts/js/Rader.js"></script>
    </div>

    <div class="aside">

        <div id="Scatter" style="height:45%;"></div>
        <script src="/web/echarts/js/Scatter.js"></script>

        <div id="Finance" style="height:45%;"></div>
        <script src="/web/echarts/js/Finance.js"></script>
    </div>

    <div class="right">
        <div id="sankey" style="height:45%;width:90%;margin-left:10%;margin-right:10%;" ></div>
        <script src="/web/echarts/js/sankey.js"></script>

    </div>

  </div>
</div>


<script type="text/javascript">
    window.addEventListener("resize", () => {
        this.PieChart.resize();
        this.RaderChart.resize();
        this.ScatterChart.resize();
        this.FinChart.resize();
        this.SankChart.resize();
    });
    window.onload = bodyBottomHeight;

    function bodyBottomHeight() {
        var h = document.getElementById("bodyall");
        var h1 = document.getElementById("bodytop");

        document.getElementById("bodybottom").style.height = (h - h1) + "px";
    }

</script>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
