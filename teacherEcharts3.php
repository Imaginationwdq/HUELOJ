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
$userId=$_GET['user_id'];
// 获取当前学生的班级
$sql = "select bclass from users where user_id ='$userId'";
$result = mysql_query_cache($sql);
$t_class2 = $result[0][0];
$t_class = '班级';
$sql = "select user_id,nick,submit from users where defunct = 'N' order by submit desc";
if(!empty($result[0][0])){
    $t_class = $result[0][0];
    $sql = "select user_id,nick,solved from users where bclass ='$t_class' and defunct = 'N' order by solved desc";
}
//获取班级的数据----------------start--------------
$result = mysql_query_cache($sql);
$classAllstudent = $result;
$student = "";
$classTotal = 0;
$student.="<table class='table table-bordered table-hover'>".
    "<thead>
                        <tr class='row'>
                            <td class='col-md-1'>#</td>
                            <td class='col-md-4'>学号</td>
                            <td class='col-md-4'>姓名</td>
                            <td class='col-md-2'>正确</td>
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

// 获取基桑图的数据-----------start------------------
//获取七天前的日期
//$date7 = date("Y-m-d",strtotime("-7 day"));
//$date14 = date("Y-m-d",strtotime("-14 day"));
//$date21 = date("Y-m-d",strtotime("-21 day"));
//$date28 = date("Y-m-d",strtotime("-28 day"));

// 获取一周内 该老师的所有班 学生 做对题的数量
//$sql ="select user_id,solved,bclass from users where bclass in ($t_class2) order by solved desc";

// 开发时，为了测试而使用的日期
$datetest4 = "".date("Y-m-d",strtotime("-3 month"));
$datetest3 = "".date("Y-m-d",strtotime("-3 month -7day"));
$datetest2 = "".date("Y-m-d",strtotime("-3 month -14day"));
$datetest1 = "".date("Y-m-d",strtotime("-3 month -21day"));

$student1 = array();
$student2 = array();
$student3 = array();
$student4 = array();

$i=0;
//查询出班里每个学生各个阶段的做题正确数
foreach ($classAllstudent as $entity){
    $entity_userId = $entity[0];

    $sql ="select count(distinct problem_id) from solution where result =4 and user_id='$entity_userId' and in_date < '$datetest1'";
    $result = mysql_query_cache($sql);
    $s =array();
    $s[0]=$entity_userId;
    $s[1]=$result[0][0];
    $student1[$i]=$s;

    $sql ="select count(distinct problem_id) from solution where result =4 and user_id='$entity_userId' and in_date < '$datetest2'";
    $result = mysql_query_cache($sql);
    $s[0]=$entity_userId;
    $s[1]=$result[0][0];
    $student2[$i]=$s;

    $sql ="select count(distinct problem_id) from solution where result =4 and user_id='$entity_userId' and in_date < '$datetest3'";
    $result = mysql_query_cache($sql);
    $s[0]=$entity_userId;
    $s[1]=$result[0][0];
    $student3[$i]=$s;

    $sql ="select count(distinct problem_id) from solution where result =4 and user_id='$entity_userId' and in_date < '$datetest4'";
    $result = mysql_query_cache($sql);
    $s[0]=$entity_userId;
    $s[1]=$result[0][0];
    $student4[$i]=$s;

    $i+=1;
}
// 排序规则
function student_sort($a,$b) {
    return $a[1]<$b[1];
}
usort($student1,'student_sort');
usort($student2,'student_sort');
usort($student3,'student_sort');
usort($student4,'student_sort');

$studentA = 0;
$studentB = 0;
$studentC = 0;
$studentD = 0;
foreach ($student1 as $entity){
    $studentA++;
    if (strcmp($entity[0],$userId)==0){
        break;
    }
}
foreach ($student2 as $entity){
    $studentB++;
    if (strcmp($entity[0],$userId)==0){
        break;
    }
}
foreach ($student3 as $entity){
    $studentC++;
    if (strcmp($entity[0],$userId)==0){
        break;
    }
}
foreach ($student4 as $entity){
    $studentD++;
    if (strcmp($entity[0],$userId)==0){
        break;
    }
}
//----------------------------------------------------------------------------
$studentArray=array("","A","B","C","D","E");

$AA = getLevel($studentA,$classTotal,"1");
$BB = getLevel($studentB,$classTotal,"2");
$CC = getLevel($studentC,$classTotal,"3");
$DD = getLevel($studentD,$classTotal,"4");

$studentLinks = "[{source: 'A1', target: 'A2', value: 0},
{source: 'B1', target: 'B2', value: 0},
{source: 'C1', target: 'C2', value: 0},
{source: 'D1', target: 'D2', value: 0},
{source: 'E1', target: 'E2', value: 0},

{source: 'A2', target: 'A3', value: 0},
{source: 'B2', target: 'B3', value: 0},
{source: 'C2', target: 'C3', value: 0},
{source: 'D2', target: 'D3', value: 0},
{source: 'E2', target: 'E3', value: 0},

{source: 'A3', target: 'A4', value: 0},
{source: 'B3', target: 'B4', value: 0},
{source: 'C3', target: 'C4', value: 0},
{source: 'D3', target: 'D4', value: 0},
{source: 'E3', target: 'E4', value: 0},";

$studentLinks .= "{source: '$AA', target: '$BB', value: 1 },";
$studentLinks .= "{source: '$BB', target: '$CC', value: 1 },";
$studentLinks .= "{source: '$CC', target: '$DD', value: 1 }";

$studentLinks .= "]";

function getLevel($i,$classTotal,$numi){
    // 五个等级的人数
    $levelANum = intval($classTotal/5)+1;
    $levelBNum = intval($classTotal/5*2)+1;
    $levelCNum = intval($classTotal/5*3)+1;
    $levelDNum = intval($classTotal/5*4)+1;
    $levelENum = $classTotal-$levelDNum;
    if ($i<$levelANum){
        return  "A".$numi;
    }elseif ($i>=$levelANum&&$i<$levelBNum){
        return  "B".$numi;
    }elseif ($i>=$levelBNum&&$i<$levelCNum){
        return  "C".$numi;
    }elseif ($i>=$levelCNum&&$i<$levelDNum){
        return  "D".$numi;
    }else{
        return  "E".$numi;
    }
}
// 获取基桑图的数据-----------end------------------


//第三个图-------------start-------------

$sql = "SELECT date(in_date) md,count(1) c FROM (select * from solution order by solution_id desc limit 8000) solution  where result<13 group by md order by md desc limit 200";
$result = mysql_query_cache( $sql ); //mysql_escape_string($sql));
$chart_data_all = array();
//echo $sql;

foreach ( $result as $row ) {
    array_push( $chart_data_all, array( $row[ 'md' ], $row[ 'c' ] ) );
}

$sql = "select in_date md,count(1) c from (select * from solution order by solution_id desc) solution,users where users.user_id = solution.user_id and users.user_id = '$userId' and bclass ='$t_class' and defunct = 'N' and result<13 group by md order by md desc";
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


//获取饼状图的 一个班级的数据----------------start--------------
//正确个数
$sql = "select count(*) from solution where user_id = '$userId' and result = 4";
$result = mysql_query_cache($sql);
$s1 = array();
$s2 = array();
$d1 = array();
$d1['value'] = (int)$result[0][0];
$d1['name'] = "正确";
$s1[] = $d1;
$s2[] = $d1;
//错误个数
$sql = "select count(*) from solution where user_id = '$userId' and result in (2,5,6,7,8,9,10,11,13)";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "错误";
if ($d1['value'] != 0)
$s1[] = $d1;
$data1=json_encode($s1);
//答案错误 个数
$sql = "select count(*) from solution where user_id = '$userId' and result =  6";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "答案错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//时间超限 个数
$sql = "select count(*) from solution where user_id = '$userId' and result =  7";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "时间超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//输出超限 个数
$sql = "select count(*) from solution where user_id = '$userId' and result =  9";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "输出超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//运行错误 个数
$sql = "select count(*) from solution where user_id = '$userId' and result =  10";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//编译错误 个数
$sql = "select count(*) from solution where user_id = '$userId' and result = 11";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//内存超限 个数
$sql = "select count(*) from solution where user_id = '$userId' and result =  8";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "内存超限";
if ($d1['value'] != 0)
    $s2[] = $d1;
//格式错误 个数
$sql = "select count(*) from solution where user_id = '$userId' and result = 5";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "格式错误";
if ($d1['value'] != 0)
    $s2[] = $d1;
//运行完成个数
$sql = "select count(*) from solution where user_id = '$userId' and result = 13";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "运行完成";
if ($d1['value'] != 0)
    $s2[] = $d1;
//编译中个数
$sql = "select count(*) from solution where user_id = '$userId' and result = 2";
$result = mysql_query_cache($sql);
$d1['value'] = (int)$result[0][0];
$d1['name'] = "编译中";
if ($d1['value'] != 0)
    $s2[] = $d1;
$data2=json_encode($s2);
//获取饼状图的数据----------------end--------------

//第四个图-------------start-----------
//统计班级 = all里面每个人的Y的个数(不重复)
//统计一个班的人数
$sql = "SELECT count(*) as c from users where defunct='N' and bclass in ($t_class2)";
$result =  mysql_query_cache( $sql );
$stu_num =  $result[0][0];

//统计班级 = all里面所有人的Y的个数(不重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select DISTINCT `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result = 4 and users.defunct = 'N' and bclass in ($t_class)) as datas GROUP BY problem_id";
$result =  mysql_query_cache( $sql );
$Ynum = array();

foreach ( $result as $row ) {
    array_push( $Ynum, array( $row[ 'user_id' ],$row['source'],$row['c']) );
}


//统计班级 = all里面所有人的提交次数(不重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select DISTINCT `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result <13 and users.defunct = 'N' and bclass in ($t_class)) as datas GROUP BY problem_id	";
$result =  mysql_query_cache( $sql );
$Znum = array();

foreach ( $result as $row ) {
    array_push( $Znum, array( $row[ 'user_id' ],$row['source'], $row[ 'c' ] ) );
}

//统计班级 = all里面每个人的N次数(不重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select DISTINCT `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result != 4 and users.defunct = 'N' and bclass in ($t_class)) as datas GROUP BY problem_id";
$result =  mysql_query_cache( $sql );
$Nnum = array();

foreach ( $result as $row ) {
    array_push( $Nnum, array( $row[ 'user_id' ],$row['source'], $row[ 'c' ] ) );
}

//统计班级 = all里面所有人的提交次数(重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result <13 and users.defunct = 'N' and bclass in ($t_class)) as datas GROUP BY problem_id	";
$result =  mysql_query_cache( $sql );
$Znum1 = array();

foreach ( $result as $row ) {
    array_push( $Znum1, array( $row[ 'user_id' ],$row['source'], $row[ 'c' ] ) );
}

//统计班级 = all里面所有人的Y的个数(重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =4 and users.defunct = 'N' and bclass in ($t_class)) as datas GROUP BY problem_id";
$result =  mysql_query_cache( $sql );
$Ynum1 = array();

foreach ( $result as $row ) {
    array_push( $Ynum1, array( $row[ 'user_id' ],$row['source'],$row['c']) );
}

$Enum = array();  //非重复 Y/Y+N
$Knum = array();  //重复 Y/Y+N

$Arrays = array();

$Arraykey = array();
for ($i = 0 ; $i<count($Ynum);$i++){
    $strl = explode(' ', $Ynum[$i][1])[1];
    $title = array('分支','循环','数组','函数','字符串','指针');
    $Enum[$i][1] = $Ynum[$i][2] / $Znum[$i][2];

    $Knum[$i][1] = $Ynum1[$i][2] / $Znum1[$i][2];

    if (!empty($strl)){ //如果 $str不为空


        if (in_array($strl,$title)&&!isset($Arrays[$strl])){  //如果题目标签在数组中且键名不存在

            $Arrays[$strl] = 0;//初始化
            $Arraykey[$strl] = 0;
            $Arrays[$strl] = $Arrays[$strl]+($Enum[$i][1]*70+$Knum[$i][1]*30);
            $Arraykey[$strl] = $Arraykey[$strs] +1 ;
        }else if (in_array($strl,$title)&&isset($Arrays[$strl])){ //如果题目标签在数组中且键名存在

            $Arrays[$strl] = $Arrays[$strl]+($Enum[$i][1]*70+$Knum[$i][1]*30);
            $Arraykey[$strl] = $Arraykey[$strl]+1;
        }

    }
}

for ($i=0;$i<count($Arrays);$i++) {
    $strs = array_keys($Arrays)[$i];
    $Arrays[$strs] = round($Arrays[$strs] / $Arraykey[$strs],2);
}

$sql = "select nick from users where user_id = $userId";
$result = mysql_query_cache($sql);
$name = $t_class.'班所有人各单元分数';
$name2 = $result[0][0].'各单元分数';

//统计一个班的人数
$sql = "SELECT count(*) as c from users where defunct='N' and bclass in ($t_class)";
$result =  mysql_query_cache( $sql );
$stu_num1 =  $result[0][0];

//统计班级 = all里面所有人的Y的个数(不重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select DISTINCT `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result = 4 and users.defunct = 'N' and bclass in ($t_class)) as datas where user_id = $userId GROUP BY problem_id";
$result =  mysql_query_cache( $sql );
$Ynum3 = array();

foreach ( $result as $row ) {
    array_push( $Ynum3, array( $row[ 'problem_id' ],$row['source'],$row['c']) );
}


//统计班级 = all里面所有人的提交次数(不重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select DISTINCT `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result <13 and users.defunct = 'N' and bclass in ($t_class)) as datas where user_id = $userId GROUP BY problem_id	";
$result =  mysql_query_cache( $sql );
$Znum3 = array();

foreach ( $result as $row ) {
    array_push( $Znum3, array( $row[ 'problem_id' ],$row['source'], $row[ 'c' ] ) );
}

//统计班级 = all里面每个人的N次数(不重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select DISTINCT `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result != 4 and users.defunct = 'N' and bclass in ($t_class)) as datas where user_id = $userId GROUP BY problem_id";
$result =  mysql_query_cache( $sql );
$Nnum3 = array();

foreach ( $result as $row ) {
    array_push( $Nnum3, array( $row[ 'problem_id' ],$row['source'], $row[ 'c' ] ) );
}

//统计班级 = all里面所有人的提交次数(重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result <13 and users.defunct = 'N' and bclass in ($t_class)) as datas where user_id = $userId GROUP BY problem_id	";
$result =  mysql_query_cache( $sql );
$Znum4 = array();
foreach ( $result as $row ) {
    array_push( $Znum4, array( $row[ 'problem_id' ],$row['source'], $row[ 'c' ] ) );
}

//统计班级 = all里面所有人的Y的个数(重复)
$sql = "SELECT problem_id,source,count(problem_id) as c from (select `problem`.problem_id,source, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =4 and users.defunct = 'N' and bclass in ($t_class)) as datas where user_id = $userId GROUP BY problem_id	";
$result =  mysql_query_cache( $sql );
$Ynum4 = array();

foreach ( $result as $row ) {
    array_push( $Ynum4, array( $row[ 'problem_id' ],$row['source'],$row['c']) );
}

$Enum = array();  //非重复 Y/Y+N
$Knum = array();  //重复 Y/Y+N

$Arrays2 = array();

$Arraykey = array();

for ($i = 0 ; $i<count($Ynum3);$i++){
    $strl2 = explode(' ', $Ynum3[$i][1])[1];
    $title2 = array('分支','循环','数组','函数','字符串','指针');
    $Enum[$i][1] = $Ynum3[$i][2] / $Znum3[$i][2];

    $Knum[$i][1] = $Ynum4[$i][2] / $Znum4[$i][2];

    if (!empty($strl2)){ //如果 $str不为空


        if (in_array($strl2,$title2)&&!isset($Arrays2[$strl2])){  //如果题目标签在数组中且键名不存在

            $Arrays2[$strl2] = 0;//初始化
            $Arraykey[$strl2] = 0;
            $Arrays2[$strl2] = $Arrays2[$strl2]+($Enum[$i][1]*70+$Knum[$i][1]*30);
            $Arraykey[$strl2] = $Arraykey[$strl2] + 1;
        }else if (in_array($strl2,$title2)&&isset($Arrays2[$strl2])){ //如果题目标签在数组中且键名存在

            $Arrays2[$strl2] = $Arrays2[$strl2]+($Enum[$i][1]*70+$Knum[$i][1]*30);
            $Arraykey[$strl2] = $Arraykey[$strl2] + 1;
        }

    }
}

for ($i=0;$i<count($Arrays2);$i++) {
    $strs2 = array_keys($Arrays2)[$i];
    $Arrays2[$strs2] = round($Arrays2[$strs2] / $Arraykey[$strs2],2);
}



//第四个图-------------end-------------

//第五个图-------------start-----------

$Name = $_GET['data'];
//echo $Name;

if(empty($Name)) {
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =4 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray = array();
    $TArray = array();
    foreach ($result as $row) {
        array_push($SArray, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums = 0;
    for ($i = 0; $i < count($SArray); $i++) {
        $str = explode(' ', $SArray[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray[$str])) { //如果键名值不存在则初始化数组且Name一开始无值
                $TArray[$str] = 0;
                $TArray[$str] = $TArray[$str] + $SArray[$i][2];//数量相加
                $sums = $sums + $SArray[$i][2];//数量
            } else if (isset($TArray[$str])) { //如果键名存在
                $TArray[$str] = $TArray[$str] + $SArray[$i][2];  //将数量相加
                $sums = $sums + $SArray[$i][2];//正确数量
            }

        } else { //如果为空
        }
    }

//答案错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =6 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray1 = array();
    $TArray1 = array();
    foreach ($result as $row) {
        array_push($SArray1, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums1 = 0;
    for ($i = 0; $i < count($SArray1); $i++) {
        $str = explode(' ', $SArray1[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray1[$str])) { //如果键名值不存在则初始化数组
                $TArray1[$str] = 0;
                $TArray1[$str] = $TArray1[$str] + $SArray1[$i][2];//数量相加
                $sums1 = $sums1 + $SArray1[$i][2];//数量
            } else { //如果键名存在
                $TArray1[$str] = $TArray1[$str] + $SArray1[$i][2];  //将数量相加
                $sums1 = $sums1 + $SArray1[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//时间超限
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =7 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray2 = array();
    $TArray2 = array();
    foreach ($result as $row) {
        array_push($SArray2, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums2 = 0;
    for ($i = 0; $i < count($SArray2); $i++) {
        $str = explode(' ', $SArray2[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray2[$str])) { //如果键名值不存在则初始化数组
                $TArray2[$str] = 0;
                $TArray2[$str] = $TArray2[$str] + $SArray2[$i][2];//数量相加
                $sums2 = $sums2 + $SArray2[$i][2];//数量
            } else { //如果键名存在
                $TArray2[$str] = $TArray2[$str] + $SArray2[$i][2];  //将数量相加
                $sums2 = $sums2 + $SArray2[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//输出超限
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =9 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray3 = array();
    $TArray3 = array();
    foreach ($result as $row) {
        array_push($SArray3, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums3 = 0;
    for ($i = 0; $i < count($SArray3); $i++) {
        $str = explode(' ', $SArray3[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray3[$str])) { //如果键名值不存在则初始化数组
                $TArray3[$str] = 0;
                $TArray3[$str] = $TArray3[$str] + $SArray3[$i][2];//数量相加
                $sums3 = $sums3 + $SArray3[$i][2];//数量
            } else { //如果键名存在
                $TArray3[$str] = $TArray3[$str] + $SArray3[$i][2];  //将数量相加
                $sums3 = $sums3 + $SArray3[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//运行错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =10 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray4 = array();
    $TArray4 = array();
    foreach ($result as $row) {
        array_push($SArray4, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums4 = 0;
    for ($i = 0; $i < count($SArray4); $i++) {
        $str = explode(' ', $SArray4[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray4[$str])) { //如果键名值不存在则初始化数组
                $TArray4[$str] = 0;
                $TArray4[$str] = $TArray4[$str] + $SArray4[$i][2];//数量相加
                $sums4 = $sums4 + $SArray4[$i][2];//数量
            } else { //如果键名存在
                $TArray4[$str] = $TArray4[$str] + $SArray4[$i][2];  //将数量相加
                $sums4 = $sums4 + $SArray4[$i][2];//数量
            }
        } else { //如果为空
        }
    }


//编译错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =11 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray5 = array();
    $TArray5 = array();
    foreach ($result as $row) {
        array_push($SArray5, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums5 = 0;
    for ($i = 0; $i < count($SArray5); $i++) {
        $str = explode(' ', $SArray5[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray5[$str])) { //如果键名值不存在则初始化数组
                $TArray5[$str] = 0;
                $TArray5[$str] = $TArray5[$str] + $SArray5[$i][2];//数量相加
                $sums5 = $sums5 + $SArray5[$i][2];//数量
            } else { //如果键名存在
                $TArray5[$str] = $TArray5[$str] + $SArray5[$i][2];  //将数量相加
                $sums5 = $sums5 + $SArray5[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//内存超限
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =8 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray6 = array();
    $TArray6 = array();
    foreach ($result as $row) {
        array_push($SArray6, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums6 = 0;
    for ($i = 0; $i < count($SArray6); $i++) {
        $str = explode(' ', $SArray6[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray6[$str])) { //如果键名值不存在则初始化数组
                $TArray6[$str] = 0;
                $TArray6[$str] = $TArray6[$str] + $SArray6[$i][2];//数量相加
                $sums6 = $sums6 + $SArray6[$i][2];//数量
            } else { //如果键名存在
                $TArray6[$str] = $TArray6[$str] + $SArray6[$i][2];  //将数量相加
                $sums6 = $sums6 + $SArray6[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//格式错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =5 and users.defunct = 'N' and bclass in ($t_class2)) as datas where user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray7 = array();
    $TArray7 = array();
    foreach ($result as $row) {
        array_push($SArray7, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums7 = 0;
    for ($i = 0; $i < count($SArray7); $i++) {
        $str = explode(' ', $SArray5[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray7[$str])) { //如果键名值不存在则初始化数组
                $TArray7[$str] = 0;
                $TArray7[$str] = $TArray7[$str] + $SArray7[$i][2];//数量相加
                $sums7 = $sums7 + $SArray7[$i][2];//数量
            } else { //如果键名存在
                $TArray7[$str] = $TArray7[$str] + $SArray7[$i][2];  //将数量相加
                $sums7 = $sums7 + $SArray7[$i][2];//数量
            }
        } else { //如果为空
        }
    }
}else{  //如果非空则获取该值所对应的数据信息
    echo $Name;
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =4 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray = array();
    $TArray = array();
    foreach ($result as $row) {
        array_push($SArray, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums = 0;
    for ($i = 0; $i < count($SArray); $i++) {
        $str = explode(' ', $SArray[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray[$str])) { //如果键名值不存在则初始化数组且Name一开始无值
                $TArray[$str] = 0;
                $TArray[$str] = $TArray[$str] + $SArray[$i][2];//数量相加
                $sums = $sums + $SArray[$i][2];//数量
            } else if (isset($TArray[$str])) { //如果键名存在
                $TArray[$str] = $TArray[$str] + $SArray[$i][2];  //将数量相加
                $sums = $sums + $SArray[$i][2];//正确数量
            }

        } else { //如果为空
        }
    }

//答案错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =6 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray1 = array();
    $TArray1 = array();
    foreach ($result as $row) {
        array_push($SArray1, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums1 = 0;
    for ($i = 0; $i < count($SArray1); $i++) {
        $str = explode(' ', $SArray1[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray1[$str])) { //如果键名值不存在则初始化数组
                $TArray1[$str] = 0;
                $TArray1[$str] = $TArray1[$str] + $SArray1[$i][2];//数量相加
                $sums1 = $sums1 + $SArray1[$i][2];//数量
            } else { //如果键名存在
                $TArray1[$str] = $TArray1[$str] + $SArray1[$i][2];  //将数量相加
                $sums1 = $sums1 + $SArray1[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//时间超限
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =7 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray2 = array();
    $TArray2 = array();
    foreach ($result as $row) {
        array_push($SArray2, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums2 = 0;
    for ($i = 0; $i < count($SArray2); $i++) {
        $str = explode(' ', $SArray2[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray2[$str])) { //如果键名值不存在则初始化数组
                $TArray2[$str] = 0;
                $TArray2[$str] = $TArray2[$str] + $SArray2[$i][2];//数量相加
                $sums2 = $sums2 + $SArray2[$i][2];//数量
            } else { //如果键名存在
                $TArray2[$str] = $TArray2[$str] + $SArray2[$i][2];  //将数量相加
                $sums2 = $sums2 + $SArray2[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//输出超限
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =9 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray3 = array();
    $TArray3 = array();
    foreach ($result as $row) {
        array_push($SArray3, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums3 = 0;
    for ($i = 0; $i < count($SArray3); $i++) {
        $str = explode(' ', $SArray3[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray3[$str])) { //如果键名值不存在则初始化数组
                $TArray3[$str] = 0;
                $TArray3[$str] = $TArray3[$str] + $SArray3[$i][2];//数量相加
                $sums3 = $sums3 + $SArray3[$i][2];//数量
            } else { //如果键名存在
                $TArray3[$str] = $TArray3[$str] + $SArray3[$i][2];  //将数量相加
                $sums3 = $sums3 + $SArray3[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//运行错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =10 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray4 = array();
    $TArray4 = array();
    foreach ($result as $row) {
        array_push($SArray4, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums4 = 0;
    for ($i = 0; $i < count($SArray4); $i++) {
        $str = explode(' ', $SArray4[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray4[$str])) { //如果键名值不存在则初始化数组
                $TArray4[$str] = 0;
                $TArray4[$str] = $TArray4[$str] + $SArray4[$i][2];//数量相加
                $sums4 = $sums4 + $SArray4[$i][2];//数量
            } else { //如果键名存在
                $TArray4[$str] = $TArray4[$str] + $SArray4[$i][2];  //将数量相加
                $sums4 = $sums4 + $SArray4[$i][2];//数量
            }
        } else { //如果为空
        }
    }


//编译错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =11 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray5 = array();
    $TArray5 = array();
    foreach ($result as $row) {
        array_push($SArray5, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums5 = 0;
    for ($i = 0; $i < count($SArray5); $i++) {
        $str = explode(' ', $SArray5[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray5[$str])) { //如果键名值不存在则初始化数组
                $TArray5[$str] = 0;
                $TArray5[$str] = $TArray5[$str] + $SArray5[$i][2];//数量相加
                $sums5 = $sums5 + $SArray5[$i][2];//数量
            } else { //如果键名存在
                $TArray5[$str] = $TArray5[$str] + $SArray5[$i][2];  //将数量相加
                $sums5 = $sums5 + $SArray5[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//内存超限
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =8 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray6 = array();
    $TArray6 = array();
    foreach ($result as $row) {
        array_push($SArray6, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums6 = 0;
    for ($i = 0; $i < count($SArray6); $i++) {
        $str = explode(' ', $SArray6[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray6[$str])) { //如果键名值不存在则初始化数组
                $TArray6[$str] = 0;
                $TArray6[$str] = $TArray6[$str] + $SArray6[$i][2];//数量相加
                $sums6 = $sums6 + $SArray6[$i][2];//数量
            } else { //如果键名存在
                $TArray6[$str] = $TArray6[$str] + $SArray6[$i][2];  //将数量相加
                $sums6 = $sums6 + $SArray6[$i][2];//数量
            }
        } else { //如果为空
        }
    }

//格式错误
    $sql = "SELECT problem_id,source,count(problem_id)as c from (select `problem`.problem_id,`solution`.user_id,source,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =5 and users.defunct = 'N' and bclass in ($t_class2)) as datas where source like '%$Name%' and user_id = '$userId' GROUP BY problem_id";
    $result = mysql_query_cache($sql);
    $SArray7 = array();
    $TArray7 = array();
    foreach ($result as $row) {
        array_push($SArray7, array($row['problem_id'], $row['source'], $row['c']));
    }
    $sums7 = 0;
    for ($i = 0; $i < count($SArray7); $i++) {
        $str = explode(' ', $SArray5[$i][1])[1];
        //echo $SArray[$i][0].$str."<br>";
        if (!empty($str)) { //如果不为空
            if (!isset($TArray7[$str])) { //如果键名值不存在则初始化数组
                $TArray7[$str] = 0;
                $TArray7[$str] = $TArray7[$str] + $SArray7[$i][2];//数量相加
                $sums7 = $sums7 + $SArray7[$i][2];//数量
            } else { //如果键名存在
                $TArray7[$str] = $TArray7[$str] + $SArray7[$i][2];  //将数量相加
                $sums7 = $sums7 + $SArray7[$i][2];//数量
            }
        } else { //如果为空
        }
    }
}



//第五个图-------------end-------------




/////////////////////////Template
require("template/".$OJ_TEMPLATE."/teacherEcharts.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
    require_once('./include/cache_end.php');
?>

