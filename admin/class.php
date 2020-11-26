<?php

require_once("admin-header.php");
if(isset($OJ_LANG)){
    require_once("../lang/$OJ_LANG.php");
}

?>


<?php date_default_timezone_set("PRC");?>
<?php
if(!isset($_POST['submit'])){
    echo '
			<p>请选择要上传的文件</p>
			<form action="#" method="post" enctype="multipart/form-data" style="margin: auto">
				<input type="file" name="upfile"/><br/><br/>
				<p>导入班级Excel表<font size="5" color="red">  格式要求:后缀 .xlsx / .xls</font></p> 表格格式实例:<img src="introduce.png"><br>
				
				<input type="submit" name="submit" value="上传" />
			</form>
		';
}
else{
    $upload_dir=getcwd()."\\pic\\"; //getcwd()获取当前脚本目录
    if(!is_dir($upload_dir)) //如果目录不存在,则创建
        mkdir($upload_dir);
    function makefilename(){ //根据源名称生成上传文件名
        $current=$_FILES['upfile']['name'];
        $filename=$current;
        return $filename;
    }
    $newfilname=makefilename();
    $newfile=$upload_dir.$newfilname;
    $newdir = $upload_dir;
    if(file_exists($_FILES['upfile']['tmp_name'])){
        move_uploaded_file($_FILES['upfile']['tmp_name'],$newfile);
        echo "上传的文件信息：<br/>";
        echo "客户端文件名：".$_FILES['upfile']['name']."<br/>";
        echo "文件类型：".$_FILES['upfile']['type']."<br/>";
        echo "字节大小：".$_FILES['upfile']['size']."<br/>";
        echo "上传后文件名：".$newfilname."<br/>"; //显示路径输出$newfile
        echo "文件路径".$newfile."<br/>";
        echo "文件上传成功".'<a href="JavaScript:history.back()">继续上传</a><br>';
    }

    else{
        echo "上传失败，错误类型".$_FILES['upfile']['error'];
    }

    require_once dirname(__DIR__) . '../Classes/PHPExcel/IOFactory.php';

    //加载excel文件
    $filename = $upload_dir.$newfilname;
    $objPHPExcelReader = PHPExcel_IOFactory::load($filename);  //创建一个excel读取对象 并读取一个filename文件
    $reader = $objPHPExcelReader->getWorksheetIterator();  //遍历工作表
    //循环读取sheet
    foreach($reader as $sheet) {
        //读取表内容
        $content = $sheet->getRowIterator();  //所有行
        //逐行处理
        $res_arr = array();
        foreach($content as $key => $items) {

            $rows = $items->getRowIndex();              //所有行
            $columns = $items->getCellIterator();       //所有列

            $row_arr = array();
            //确定从哪一行开始读取
            if($rows < 2){   //从表中第二行开始读，第一行是表中字段说明
                continue;
            }
            //逐列读取
            foreach($columns as $head => $cell) {
                //获取cell中数据
                $data = $cell->getValue();
                $row_arr[] = $data;
            }
            $res_arr[] = $row_arr;

        }
        for($i=0;$i<count($res_arr);$i++){//循环查看表中数据:表中第一行自动跳过

            $infoId = $res_arr[$i][0]; //账号
            $infoBclass = $res_arr[$i][1]; //所属班级
            $infoTclass = $res_arr[$i][2]; //拥有班级 ->特指管理员
            $value = count($res_arr)+1; //excel中数据总行数

            $sql="UPDATE `users` SET"
                ."`bclass`=?,"
                ."`tclass`=? ";
            $sql.="WHERE `user_id`=?";
            pdo_query($sql,$infoBclass,$infoTclass,$infoId)[0];
        }
        echo "修改信息完成";
    }

}
?>