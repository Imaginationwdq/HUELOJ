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
$result = mysql_query_cache($sql);
$option_class = "";
$t_class2=$result[0][0];
$str = explode(',',$result[0][0]);
$option_class.="<li><a href='teacherEcharts.php'>ALL</a></li>&nbsp;";
for($i=0;$i<count($str);$i++){
    $option_class.="<li><a href='teacherEcharts2.php?t_class=".(int)$str[$i]."'>".$str[$i]."</a></li>&nbsp;";
}


//获取班级的数据----------------start--------------
$sql = "select user_id,nick,submit from users where defunct = 'N' and bclass in ($t_class2) order by submit desc ";
$result = mysql_query_cache($sql);
$student = "";
//班级总人数
$classTotal = 0;
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
    $classTotal+=1;
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
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result = 4";
$result = mysql_query_cache($sql);
$s1 = array();
$s2 = array();
$d1 = array();
$d1['value'] = (int)$result[0][0];
$d1['name'] = "正确";
$s1[] = $d1;
$s2[] = $d1;
//错误个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result in (2,5,6,7,8,9,10,11,13)";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "错误";
if ($d1['value'] != 0)
    $s1[] = $d1;
$data1=json_encode($s1);
//答案错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result =  6";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "答案错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//时间超限 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result =  7";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "时间超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//输出超限 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result =  9";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "输出超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//运行错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result =  10";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//编译错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = in ($t_class2) and s.result = 11";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//内存超限 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass = in ($t_class2) and s.result =  8";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "内存超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//格式错误 个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result = 5";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "格式错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//运行完成个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result = 13";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行完成";
if ($d1['value'] != 0)
    $s2[] = $d1;
//编译中个数
$sql = "select count(*) from solution s left join users u on s.user_id = u.user_id where u.bclass in ($t_class2) and s.result = 2";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译中";
if ($d1['value'] != 0)
    $s2[] = $d1;
$data2=json_encode($s2);
//获取饼状图的数据----------------end--------------

// 获取基桑图的数据-----------start------------------
//获取七天前的日期
//$date7 = date("Y-m-d",strtotime("-7 day"));
//$date14 = date("Y-m-d",strtotime("-14 day"));
//$date21 = date("Y-m-d",strtotime("-21 day"));
//$date28 = date("Y-m-d",strtotime("-28 day"));

// 五个做题数量等级
$levelA = 15;
$levelB = 10;
$levelC = 5;
$levelD = 1;
// 五个等级的人数
$levelANum = 0;
$levelBNum = 0;
$levelCNum = 0;
$levelDNum = 0;
$levelENum = 0;

// 开发时，为了测试而使用的日期
$datetest1 = "".date("Y-m-d",strtotime("-3 month"));
$datetest2 = "".date("Y-m-d",strtotime("-3 month -7day"));
// 获取一周内 该老师的所有班 学生 做对题的数量
$sql ="select u.user_id,count(s.in_date) num from solution s left join users u on s.user_id=u.user_id where s.result = 4 and s.in_date > '$datetest2' and s.in_date < '$datetest1' and u.bclass in ($t_class2) group by u.user_id order by num desc";
$result = mysql_query_cache($sql);
//分等级
foreach ($result as $entity){
    $entity_num = $entity[1];
    if ($entity_num>=$levelA){
        $levelANum+=1;
    }elseif ($entity_num<$levelA&&$entity_num>=$levelB){
        $levelBNum+=1;
    }elseif ($entity_num<$levelB&&$entity_num>=$levelC){
        $levelCNum+=1;
    }elseif ($entity_num<$levelC&&$entity_num>=$levelD){
        $levelDNum+=1;
    }
}
$levelENum = $classTotal-$levelANum-$levelBNum-$levelCNum-$levelDNum;


// 获取基桑图的数据-----------start------------------

//第三个图-------------start-------------

$sql = "SELECT date(in_date) md,count(1) c FROM (select * from solution order by solution_id desc limit 8000) solution  where result<13 group by md order by md desc limit 200";
$result = mysql_query_cache( $sql ); //mysql_escape_string($sql));
$chart_data_all = array();
//echo $sql;

foreach ( $result as $row ) {
    array_push( $chart_data_all, array( $row[ 'md' ], $row[ 'c' ] ) );
}

$sql = "SELECT in_date md,count(1) c FROM  (select * from solution order by solution_id desc limit 8000) solution where result<13 group by md order by md desc";
$result = mysql_query_cache( $sql ); //mysql_escape_string($sql));
$chart_data_all1 = array();
//echo $sql;

foreach ( $result as $row ) {
    array_push( $chart_data_all1, array( $row[ 'md' ], $row[ 'c' ] ) );
}




$counts = array();
for ($i = 0;$i<24;$i++){
    $counts[$i] = 0;
}

$Darray = array();
for ($i = 0;$i<7;$i++){
    $Darray[$i] = $counts ;
}
//print_r($Darray);

$d = 0;

    for ($i = 0;$i <= count($chart_data_all1);$i++){
         $day1 = (int)substr($chart_data_all1[$i][0],8,2);
         $day2 = (int)substr($chart_data_all[$d][0],8,2);

        if ($day1==$day2){
            //天为该天日期


            $hour = (int)substr($chart_data_all1[$i][0],11,2);  //获取小时

            for ($h = 0;$h < 24;$h++){

                if ($hour >= $h && $hour < $h+1){   //如果获取的时间在这个时间段内，则提交量累加

                    $counts[$hour] = $counts[$hour]  + (int)$chart_data_all1[$i][1];

                }

            }



        }  else if ($day1<$day2){
            $Darray[$d] = $counts;
            $d++;
            if ($d==7)
                break;
           // echo "第".$day1."<br>";echo "第".$day2."<br>"; print_r($Darray);
            for ($j = 0;$j<24;$j++){
                $counts[$j] = 0;
            }
        }else{
            break;
        }

    }
    $data = array();
    $z = 0;

    for ($i = 0 ; $i< 7 ;$i++){
        for ($j = 0;$j < 24;$j ++ ){

                $data[$z] = [$i,$j,$Darray[$i][$j]];
                $z++;


        }

    }


//第三个图-------------end-------------
/////////////////////////Template
require("template/".$OJ_TEMPLATE."/teacherEcharts.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
    require_once('./include/cache_end.php');
?>

