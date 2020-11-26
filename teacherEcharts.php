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
//$echarts = "";

$sql = "select problem_id,count(problem_id)num from solution where problem_id <>'0' group by problem_id  order by problem_id asc";
$result = pdo_query($sql);
$row = $result[0];

$dataX = array();
$dataY = array();
foreach($result as $row) {
    $dataX[] = intval($row['num']);
    $dataY[] = $row['problem_id'];
}
$strX=json_encode($dataX);
$strY=json_encode($dataY);
//$echarts .="<div id=\"main\" style=\"width: 600px;height:400px;\">"."</div>";
/////////////////////////Template
require("template/".$OJ_TEMPLATE."/teacherEcharts.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
    require_once('./include/cache_end.php');
?>

