<?php require_once("admin-header.php");
  if(isset($OJ_LANG)){
    require_once("../lang/$OJ_LANG.php");
  }
?>
<html>
<head>
  <title><?php echo $MSG_ADMIN?></title>
</head>

<body>
  <br>
<table class="table">
  <tbody>

    <tr>
        <td><center><a class='btn btn-primary btn-sm' href="data1.php" target="main"><b>折线图</b></a></center></td>
        <td><p>题目解决数量</p></td>
    </tr>

  </tbody>
</table>
</body>
</html>
