<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php
// echo "Hello World!";
// phpinfo()
?>
<?php
// header("Content-Type: text/html; charset=utf-8");
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='mybox';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


try {
    //$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true));
    echo "连接成功<br/>";
    #$dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {  
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $dbh->beginTransaction();
    $dbh->exec("insert into employee (id, name, age,salaery) values (4, 'Joe Bloggs', '35', 50000)");
    $dbh->exec("update employee SET age = 30 WHERE id = 4 ");
    $dbh->commit();
    
  } catch (Exception $e) {
    $dbh->rollBack();
    echo "Failed: " . $e->getMessage();
  }

// $db = new PDO($dsn, $user, $pass);
// $stmt = $db->prepare("update employee SET icon = ? WHERE id = 4 ");// "insert into employee (id, contenttype, imagedata) values (?, ?, ?)"
// $id = get_new_id(); // 调用某个函数来分配一个新 ID

// // 假设处理一个文件上传
// // 可以在 PHP 文档中找到更多的信息

// $fp = fopen("1.png", 'rb');

// // $stmt->bindParam(1, $id);
// // $stmt->bindParam(2, $_FILES['file']['type']);
// $stmt->bindParam(3, $fp, PDO::PARAM_LOB);

// $db->beginTransaction();
// $stmt->execute();
// $db->commit();

?>
</body>
</html>

