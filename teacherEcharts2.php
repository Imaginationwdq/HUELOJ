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

$sid=$_SESSION[$OJ_NAME.'_'.'user_id'];
$t_class = $_GET['t_class'];

//获取班级选项
$sid=$_SESSION[$OJ_NAME.'_'.'user_id'];
$sql = "select tclass from users where user_id ='$sid'";
$result = mysql_query_cache($sql);
$option_class = "";
$option_class.="<li><a href='teacherEcharts.php'>ALL</a></li>&nbsp;";
$str = explode(',',$result[0][0]);
//<li><a href="teacherEcharts2.php?t_class =1001 ">Action</a></li>
for($i=0;$i<count($str);$i++){
    $option_class.="<li><a href='teacherEcharts2.php?t_class=".(int)$str[$i]."'>".$str[$i]."</a></li>&nbsp;";
}

//获取班级的数据----------------start--------------
$sql = "select user_id,nick,submit from users where bclass ='$t_class' and defunct = 'N' order by submit desc";
$result = mysql_query_cache($sql);
$student = "";
$student.="<table class='table table-bordered table-hover'>".
                    "<thead>
                        <tr class='row'>
                            <td class='col-md-1'>#</td>
                            <td class='col-md-4'>学号</td>
                            <td class='col-md-4'>姓名</td>
                            <td class='col-md-2'>提交次数</td>
                            <td class='col-md-1'>操作</td>
                        </tr>
                    </thead>
                    <tbody>";
for ($i = 0; $i<count($result);$i++)
{
    $entity = $result[$i];
    $ii = $i+1;
    $student .= "<tr class='row'>
                    <td class='col-md-1'>$ii</td>
                    <td class='col-md-4'>$entity[0]</td>
                    <td class='col-md-4'>$entity[1]</td>
                    <td class='col-md-2'>$entity[2]</td>
                    <td class='col-md-1'><a class='btn btn-default btn-sm' href='teacherEcharts3.php?user_id=".$entity[0]."' role=\"button\">查看</a></td>
                </tr>&nbsp;";
}
$student .=" </tbody>
                </table>";
//获取班级的数据----------------end--------------

//获取饼状图的 一个班级的数据----------------start--------------
//正确个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result = 4";
$result = mysql_query_cache($sql);
$s1 = array();
$s2 = array();
$d1 = array();
$d1['value'] = (int)$result[0][0];
$d1['name'] = "正确";
$s1[] = $d1;
$s2[] = $d1;
//错误个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result in (2,5,6,7,8,9,10,11,13)";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "错误";
if ($d1['value'] != 0)
$s1[] = $d1;
$data1=json_encode($s1);
//答案错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result =  6";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "答案错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//时间超限 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result =  7";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "时间超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//输出超限 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result =  9";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "输出超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//运行错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result =  10";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//编译错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result = 11";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//内存超限 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result =  8";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "内存超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//格式错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result = 5";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "格式错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//运行完成个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result = 13";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行完成";
if ($d1['value'] != 0)
    $s2[] = $d1;
//编译中个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = '$t_class' and s.result = 2";
$result = mysql_query_cache($sql);
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

