<?php
////////////////////////////Common head
$cache_time=10;
$OJ_CACHE_SHARE=false;
require_once('./include/cache_start.php');
require_once('./include/db_info.inc.php');
require_once('./include/const.inc.php');
require_once('./include/memcache.php');
require_once('./include/setlang.php');
$view_title= "Welcome To Online Judge";
$result=false;
///////////////////////////MAIN
$t_class = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp班级&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
$sid=$_SESSION[$OJ_NAME.'_'.'user_id'];
//获取班级选项
$sql = "select tclass from users where user_id ='$sid'";
$result = pdo_query($sql);
$option_class = "";
$str = explode(',',$result[0][0]);
$option_class.="<li><a href='teacherEcharts.php'>ALL</a></li>&nbsp;";
for($i=0;$i<count($str);$i++){
    $option_class.="<li><a href='teacherEcharts2.php?t_class=".(int)$str[$i]."'>".$str[$i]."</a></li>&nbsp;";
}

//获取饼状图的 全校的数据----------------start--------------
//正确个数
$sql = "select count(user_id) from solution where result = 4";
$result = pdo_query($sql);
$s1 = array();
$s2 = array();
$d1 = array();
$d1['value'] = (int)$result[0][0];
$d1['name'] = "正确";
$s1[] = $d1;
$s2[] = $d1;
//错误个数
$sql = "select count(user_id) from solution where result in (2,5,6,7,8,9,10,11,13)";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "错误";
if ($d1['value'] != 0)
$s1[] = $d1;
$data1=json_encode($s1);
//答案错误 个数
$sql = "select count(user_id) from solution where result = 6";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "答案错误";
if ($d1['value'] != 0)
$s2[] = $d1;
//时间超限 个数
$sql = "select count(user_id) from solution where result = 7";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "时间超限";
if ($d1['value'] != 0)
$s2[] = $d1;
//输出超限 个数
$sql = "select count(user_id) from solution where result = 9";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "输出超限";
if ($d1['value'] != 0)
$s2[] = $d1;
//运行错误 个数
$sql = "select count(user_id) from solution where result = 10";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行错误";
if ($d1['value'] != 0)
$s2[] = $d1;
//编译错误 个数
$sql = "select count(user_id) from solution where result = 11";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译错误";
if ($d1['value'] != 0)
$s2[] = $d1;
//内存超限 个数
$sql = "select count(user_id) from solution where result = 8";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "内存超限";
if ($d1['value'] != 0)
$s2[] = $d1;
//格式错误 个数
$sql = "select count(user_id) from solution where result = 5";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "格式错误";
if ($d1['value'] != 0)
$s2[] = $d1;
//运行完成个数
$sql = "select count(user_id) from solution where result = 13";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行完成";
if ($d1['value'] != 0)
$s2[] = $d1;
//编译中个数
$sql = "select count(user_id) from solution where result = 2";
$result = pdo_query($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译中";
if ($d1['value'] != 0)
$s2[] = $d1;
$data2=json_encode($s2);
//获取饼状图的数据----------------end--------------

/////////////////////////Template
require("template/".$OJ_TEMPLATE."/teacherEcharts.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
    require_once('./include/cache_end.php');
?>

