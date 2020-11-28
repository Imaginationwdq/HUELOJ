<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header("content-type:application/javascript");

if(isset($_SERVER['HTTP_REFERER'])) $dir=basename(dirname($_SERVER['HTTP_REFERER']));
else $dir="";

if($dir=="discuss3") $path_fix="../";
else $path_fix="";

require_once("../../include/db_info.inc.php");
if(isset($_SESSION[$OJ_NAME.'_'.'echarts_csrf'])&&$_GET['echarts_csrf']!=$_SESSION[$OJ_NAME.'_'.'echarts_csrf']){
}else{
  $_SESSION[$OJ_NAME.'_'.'echarts_csrf']="";
}
if(isset($OJ_LANG)){
  require_once("../../lang/$OJ_LANG.php");
}else{
  require_once("../../lang/en.php");
}
$url = $_GET['url'];
$path_fix = $_GET['path_fix'];
$echarts='';
//$echarts.=$url;
// 如果已经登录了就显示按钮，如果没有登录就不显示
if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
    $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];
    // 如果是管理员，跳转到老师界面，否则跳转学生界面
    if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
        // 判断是否添加 ”选中“样式
        if($url =="teacherEcharts.php")
            $echarts.= "<li class='active'>";
        else
            $echarts.= "<li>";
        $echarts.="<a href=".$path_fix."teacherEcharts.php>"."<span class='glyphicon glyphicon-signal' aria-hidden='true'>"."</span> 数据图表</a></li>&nbsp;";
    }else{
        if($url =="studentEcharts.php")
            $echarts.= "<li class='active'>";
        else
            $echarts.= "<li>";
        $echarts.="<a href=".$path_fix."studentEcharts.php>"."<span class='glyphicon glyphicon-signal' aria-hidden='true'>"."</span> 数据图表</a></li>&nbsp;";
    }
}
?>
document.write("<?php echo ( $echarts );?>");
document.getElementById("echarts");
