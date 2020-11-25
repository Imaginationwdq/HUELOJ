<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>New Problem</title>
</head>
<body leftmargin="30">
<center>
<?php require_once("../include/db_info.inc.php");?>
<?php require_once("admin-header.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php
include_once("kindeditor.php") ;
?>
<?php require_once("../include/simple_html_dom.php");
    $url=$_POST ['url'];
  if (!$url) $url=$_GET['url'];
  if (strpos($url, "http") === false){
	echo "Please Input like http://poj.org/problem?id=1000";
	exit(1);
  } 
  if (get_magic_quotes_gpc ()) {
	$url = stripslashes ( $url);
  }
  $baseurl=substr($url,0,strrpos($url,"/")+1);
//  echo $baseurl;
  $html = file_get_html($url);
  foreach($html->find('img') as $element)
        $element->src=$baseurl.$element->src;
        
  $element=$html->find('div[class=ptt]',0);
  $title=$element->plaintext;
  
  $element=$html->find('div[class=plm]',0);
  $tlimit=$element->find('td',0);//->next_sibling();
  $tlimit=substr($tlimit->plaintext,11);
  $tlimit=substr($tlimit,0,strlen($tlimit)-2);
  $mlimit=$element->find('td',2);//->nextSibling();
  $mlimit=substr($mlimit->plaintext,13);
  $mlimit=substr($mlimit,0,strlen($mlimit)-1);
  $tlimit/=1000;
  $mlimit/=1000;
  
  $element=$html->find('div[class=ptx]',0);
  $descriptionHTML=$element->outertext;
  $element=$html->find('div[class=ptx]',1);
  $inputHTML=$element->outertext;
  $element=$html->find('div[class=ptx]',2);
  $outputHTML=$element->outertext;
  
  $element=$html->find('pre[class=sio]',0);
  $sample_input=$element->innertext;
  $element=$html->find('pre[class=sio]',1);
  $sample_output=$element->innertext;
?>
<form method=POST action=problem_add.php>
<p align=center><font size=4 color=#333399>Add a Problem</font></p>
<input type=hidden name=problem_id value=New Problem>
<p align=left>Problem Id:&nbsp;&nbsp;New Problem</p>
<p align=left>Title:<input type=text name=title size=71 value="<?php echo $title?>"></p>
<p align=left>Time Limit:<input type=text name=time_limit size=20 value="<?php echo $tlimit?>">S</p>
<p align=left>Memory Limit:<input type=text name=memory_limit size=20 value="<?php echo $mlimit?>">MByte</p>
<p align=left>Description:<br>
<textarea class="kindeditor" rows=13 name=description cols=80><?php echo $descriptionHTML;?></textarea>
</p>
<p align=left>Input:<br>
<textarea class="kindeditor" rows=13 name=input cols=80><?php echo $inputHTML;?></textarea>
</p>
</p>
<p align=left>Output:<br><!--<textarea rows=13 name=output cols=80></textarea>-->
<textarea class="kindeditor" rows=13 name=output cols=80><?php echo $outputHTML;?></textarea>
</p>
<p align=left>Sample Input:<br><textarea rows=13 name=sample_input cols=80><?php echo $sample_input?></textarea></p>
<p align=left>Sample Output:<br><textarea rows=13 name=sample_output cols=80><?php echo $sample_output?></textarea></p>
<p align=left>Test Input:<br><textarea rows=13 name=test_input cols=80></textarea></p>
<p align=left>Test Output:<br><textarea rows=13 name=test_output cols=80></textarea></p>
<p align=left>Hint:<br>
<?php
$output = new FCKeditor('hint') ;
$output->BasePath = '../fckeditor/' ;
$output->Height = 300 ;
$output->Width=600;
$output->Value = '<p></p>' ;
$output->Create() ;
?>
</p>
<p>SpecialJudge: N<input type=radio name=spj value='0' checked>Y<input type=radio name=spj value='1'></p>
<p align=left>Source:<br><textarea name=source rows=1 cols=70></textarea></p>
<p align=left>contest:
	<select  name=contest_id>
<?php $sql="SELECT `contest_id`,`title` FROM `contest` WHERE `start_time`>NOW() order by `contest_id`";
$result=pdo_query($sql);
echo "<option value=''>none</option>";
if (count($result)==0){
}else{
	foreach($result as $row)
    echo "<option value=".$row['contest_id'].">".$row['contest_id']. $row['title']."</option>";
}
?>
	</select>
</p>
<div align=center>
<?php require_once("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>

</body></html>
