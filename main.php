<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php

// function add(){
//     try {
//           $user='root';      //数据库连接用户名
//           $pass='123456';          //对应的密码
//           //初始化一个PDO对象
//           $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true)); 
//           $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
//           $dbh->beginTransaction();
//           $dbh->exec("insert into employee (id, name, age,salaery) values (5, 'Joe Bloggs', '35', 50000)");
//           $dbh->commit();
//           echo "添加成功<br/>";
          
//         } catch (Exception $e) {
//           $dbh->rollBack();
//           echo "Failed: " . $e->getMessage();
//         }
//       }

// function update(){
//     try {
//             $user='root';      //数据库连接用户名
//             $pass='123456';          //对应的密码
//             //初始化一个PDO对象
//             $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true));
//             echo "连接成功<br/>";
        
//             $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
//             $dbh->beginTransaction();
//             $dbh->exec("update employee set name = 'jack' where id = 5");
//             $dbh->commit();
//             echo "修改成功<br/>";
            
//           } catch (Exception $e) {
//             $dbh->rollBack();
//             echo "Failed: " . $e->getMessage();
//           }
//         }
// function delete(){
//     try {
//               //初始化一个PDO对象
//               $user='root';      //数据库连接用户名
//               $pass='123456';          //对应的密码
//               $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true));
//               echo "连接成功<br/>";
          
//               $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
//               $dbh->beginTransaction();
//               $dbh->exec("delete from employee where id = 5");
//               $dbh->commit();
//               echo "删除成功<br/>";
              
//             } catch (Exception $e) {
//               $dbh->rollBack();
//               echo "Failed: " . $e->getMessage();
//             }
//           }

function main(){
    try {
    $user='root';      //数据库连接用户名
    $pass='123456';          //对应的密码
     //初始化一个PDO对象
    $dbh = new PDO('mysql:host=localhost;dbname=mybox', $user, $pass,array(PDO::ATTR_PERSISTENT => true));
    #echo "连接成功<br/>";
    #$dbh = null;
    }catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
    }
    try { 
        $sql = "SELECT * FROM employee";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

    //开始循环输出结果array(':id' => 8)

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<pre>';
            print_r($row);
            echo '</pre>';
        }
    }catch (Exception $e) {
        $dbh->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}
main();

?>


<form method="post" action="add.php">
id: <input type="text" name="id">
名字: <input type="text" name="name">
年龄: <input type="text" name="age">
工资: <input type="text" name="salaery">
<input type="submit" value="添加">
</form>

<form method="post" action="update.php">
id: <input type="text" name="id">
名字: <input type="text" name="name">
<!-- 年龄: <input type="text" name="age">
工资: <input type="text" name="salaery"> -->
<input type="submit" value="修改">
</form>

<form method="post" action="delete.php">
id: <input type="text" name="id">
<input type="submit" value="删除">
</form>



</body>
</html>

