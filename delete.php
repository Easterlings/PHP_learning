<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php

function delete(){
try {
    //初始化一个PDO对象
    $user='root';      //数据库连接用户名
    $pass='123456';          //对应的密码
    $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true));
    echo "连接成功<br/>";

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $dbh->beginTransaction();
    $id = $_POST['id'];
    $dbh->exec("delete from employee where id = $id");
    $dbh->commit();
    echo "删除成功<br/>";
    
  } catch (Exception $e) {
    $dbh->rollBack();
    echo "Failed: " . $e->getMessage();
  }
}
delete();
?>
</body>
</html>


