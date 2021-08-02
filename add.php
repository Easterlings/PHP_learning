<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php

function add(){
try {
    $user='root';      //数据库连接用户名
    $pass='123456';          //对应的密码
    //初始化一个PDO对象
    $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true)); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $dbh->beginTransaction();
    $dbh->exec("insert into employee (id, name, age,salaery) values (5, 'Joe Bloggs', '35', 50000)");
    $dbh->commit();
    echo "添加成功<br/>";
    
  } catch (Exception $e) {
    $dbh->rollBack();
    echo "Failed: " . $e->getMessage();
  }
}
add();
?>
</body>
</html>

