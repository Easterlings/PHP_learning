<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php

function update(){
try {
    $user='root';      //数据库连接用户名
    $pass='123456';          //对应的密码
    //初始化一个PDO对象
    $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true));
    echo "连接成功<br/>";

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $dbh->beginTransaction();
    $dbh->exec("update employee set name = 'jack' where id = 5");
    $dbh->commit();
    echo "修改成功<br/>";
    
  } catch (Exception $e) {
    $dbh->rollBack();
    echo "Failed: " . $e->getMessage();
  }
}
update();
?>
</body>
</html>


