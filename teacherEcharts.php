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
$sql = "select user_id,nick,solved from users where defunct = 'N' and bclass in ($t_class2) order by solved desc ";
$result = mysql_query_cache($sql);
$classAllstudent = $result;
$student = "";
//班级总人数
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

$studentArray=array("","A","B","C","D","E");
$studentTest1 = array();
for ($i=1;$i<=5;$i++){
    for ($j=1;$j<=5;$j++) {
        $indexStudent ="student".$studentArray[$i]."1"."to".$studentArray[$j] . "2";
        $studentTest1[$indexStudent]=0;
    }
}
$studentTest2 = array();
for ($i=1;$i<=5;$i++){
    for ($j=1;$j<=5;$j++) {
        $indexStudent ="student".$studentArray[$i]."2"."to".$studentArray[$j] . "3";
        $studentTest2[$indexStudent]=0;
    }
}
$studentTest3 = array();
for ($i=1;$i<=5;$i++){
    for ($j=1;$j<=5;$j++) {
        $indexStudent ="student".$studentArray[$i]."3"."to".$studentArray[$j] . "4";
        $studentTest3[$indexStudent]=0;
    }
}
//AtoB
for($i=0;$i<count($student1);$i++){
    $studentName1=$student1[$i][0];
    $studentResultNum1=$student1[$i][1];
    $leveli = getLevel($i,$classTotal,"1");
    for($j=0;$j<count($student2);$j++){
        $studentName2=$student2[$j][0];
        $studentResultNum2=$student2[$j][1];
        if (strcmp($studentName1,$studentName2)==0){
            $levelj = getLevel($j,$classTotal,"2");
            $levelItoJ = "student".$leveli."to".$levelj;
            $studentTest1[$levelItoJ]+=1;
            break;
        }
    }
}

//BtoC
for($i=0;$i<count($student2);$i++){
    $studentName1=$student2[$i][0];
    $studentResultNum1=$student2[$i][1];
    $leveli = getLevel($i,$classTotal,"2");
    for($j=0;$j<count($student3);$j++){
        $studentName2=$student3[$j][0];
        $studentResultNum2=$student3[$j][1];
        if (strcmp($studentName1,$studentName2)==0){
            $levelj = getLevel($j,$classTotal,"3");
            $levelItoJ = "student".$leveli."to".$levelj;
            $studentTest2[$levelItoJ]+=1;
            break;
        }
    }
}

//CtoD
for($i=0;$i<count($student3);$i++){
    $studentName1=$student3[$i][0];
    $studentResultNum1=$student3[$i][1];
    $leveli = getLevel($i,$classTotal,"3");
    for($j=0;$j<count($student4);$j++){
        $studentName2=$student4[$j][0];
        $studentResultNum2=$student4[$j][1];
        if (strcmp($studentName1,$studentName2)==0){
            $levelj = getLevel($j,$classTotal,"4");
            $levelItoJ = "student".$leveli."to".$levelj;
            $studentTest3[$levelItoJ]+=1;
            break;
        }
    }
}

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
//AtoB
for ($i=1;$i<=5;$i++){
    for ($j=1;$j<=5;$j++) {
        $student_source = $studentArray[$i]."1";
        $student_target = $studentArray[$j]."2";
        $indexStudent = "student" .$student_source."to".$student_target;
        if ($studentTest1[$indexStudent]!=0)
            $studentLinks .= "{source: '$student_source', target: '$student_target', value: $studentTest1[$indexStudent] },";
    }
}
//BtoC
for ($i=1;$i<=5;$i++){
    for ($j=1;$j<=5;$j++) {
        $student_source = $studentArray[$i]."2";
        $student_target = $studentArray[$j]."3";
        $indexStudent = "student" .$student_source."to".$student_target;
        if ($studentTest2[$indexStudent]!=0)
            $studentLinks .= "{source: '$student_source', target: '$student_target', value: $studentTest2[$indexStudent] },";
    }
}
//CtoD
for ($i=1;$i<=5;$i++){
    for ($j=1;$j<=5;$j++) {
        $student_source = $studentArray[$i]."3";
        $student_target = $studentArray[$j]."4";
        $indexStudent = "student" .$student_source."to".$student_target;
        if ($studentTest3[$indexStudent]!=0){
            $studentLinks .= "{source: '$student_source', target: '$student_target', value: $studentTest3[$indexStudent] }";
            if (!($i==5 && $j==5)){
                $studentLinks .=",";
            }
        }
    }
}
$studentLinks .= "]";

// 获取基桑图的数据-----------end------------------

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

//第四个图-------------start-----------
//统计班级 = all里面每个人的Y的个数(不重复)
$sql = "SELECT user_id ,count(user_id) as c from (select DISTINCT `problem`.problem_id, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =4 and users.defunct = 'N' and bclass in ($t_class2)) as datas GROUP BY user_id";
$result =  mysql_query_cache( $sql );
$Ynum = array();

foreach ( $result as $row ) {
    array_push( $Ynum, array( $row[ 'user_id' ],$row['c']) );
}


//统计班级 = all里面每个人的提交次数(不重复)
$sql = "SELECT user_id ,count(user_id) as c from (select DISTINCT `problem`.problem_id, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result <13 and users.defunct = 'N' and bclass in ($t_class2)) as datas GROUP BY user_id";
$result =  mysql_query_cache( $sql );
$Znum = array();

foreach ( $result as $row ) {
    array_push( $Znum, array( $row[ 'user_id' ], $row[ 'c' ] ) );
}

//统计班级 = all里面每个人的N次数(不重复)
$sql = "SELECT user_id ,count(user_id) as c from (select DISTINCT `problem`.problem_id, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result !=4 and users.defunct = 'N' and bclass in ($t_class2)) as datas GROUP BY user_id";
$result =  mysql_query_cache( $sql );
$Nnum = array();

foreach ( $result as $row ) {
    array_push( $Nnum, array( $row[ 'user_id' ], $row[ 'c' ] ) );
}

//统计班级 = all里面每个人的提交次数(重复)
$sql = "SELECT user_id ,count(user_id) as c from (select `problem`.problem_id, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result <13 and users.defunct = 'N' and bclass in ($t_class2)) as datas GROUP BY user_id";
$result =  mysql_query_cache( $sql );
$Znum1 = array();
foreach ( $result as $row ) {
    array_push( $Znum1, array( $row[ 'user_id' ], $row[ 'c' ] ) );
}

//统计班级 = all里面每个人的Y的个数(重复)
$sql = "SELECT user_id ,count(user_id) as c from (select `problem`.problem_id, `solution`.user_id,bclass,result from `problem`,`solution`,`users` WHERE users.user_id = solution.user_id and problem.problem_id = solution.problem_id and result =4 and users.defunct = 'N' and bclass in ($t_class2)) as datas GROUP BY user_id";
$result =  mysql_query_cache( $sql );
$Ynum1 = array();

foreach ( $result as $row ) {
    array_push( $Ynum1, array( $row[ 'user_id' ],$row['c']) );
}

$Enum = array();  //非重复 Y/Y+N
$Knum = array();  //重复 Y/Y+N

$Array1 = 0;
$Array2 = 0;
$Array3 = 0;
$Array4 = 0;
$Array5 = 0;

for ($i = 0 ; $i<count($Ynum);$i++){
    //echo $Ynum[$i][1]."<br>";
    $Enum[$i][1] = $Ynum[$i][1] / $Znum[$i][1];
    //echo $Enum[$i][1]."<br>";
    $Knum[$i][1] = $Ynum1[$i][1] / $Znum1[$i][1];
    if (($Enum[$i][1]*60+$Knum[$i][1]*40)>80.00){
        //echo $Enum[$i][1]*60+$Knum[$i][1]*40   . "<br>";
        $Array1++;
    }else if (($Enum[$i][1]*60+$Knum[$i][1]*40)<=80.00&&($Enum[$i][1]*60+$Knum[$i][1]*40)>70.00){
        // echo $Enum[$i][1]*60+$Knum[$i][1]*40   . "<br>";
        $Array2++;
    }else if (($Enum[$i][1]*60+$Knum[$i][1]*40)<=70.00&&($Enum[$i][1]*60+$Knum[$i][1]*40)>60.00){
        //echo $Enum[$i][1]*60+$Knum[$i][1]*40   . "<br>";
        $Array3++;
    }else if (($Enum[$i][1]*60+$Knum[$i][1]*40)<=60.00&&($Enum[$i][1]*60+$Knum[$i][1]*40)>50.00){
        //echo $Enum[$i][1]*60+$Knum[$i][1]*40   . "<br>" ;
        $Array4++;
    }else{
        //echo $Enum[$i][1]*60+$Knum[$i][1]*40   . "<br>" ;
        $Array5++;
    }
}

$classStr = array();

$name = '所有人分数分布';

$Max = array();$Max[0] = $Array1;$Max[1] = $Array2;$Max[2] = $Array3;$Max[3] = $Array4;$Max[4] = $Array5;
$max = max($Max);

$name2 = '';
$BArray1 = 0;$BArray2 = 0;$BArray3 = 0;$BArray4 = 0;$BArray5 = 0;


//第四个图-------------end-------------

/////////////////////////Template
require("template/".$OJ_TEMPLATE."/teacherEcharts.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
    require_once('./include/cache_end.php');
?>

