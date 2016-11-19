<?php
include("admin_header.php");
//session_start();
if(@$_SESSION['admin']){

$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');

$db->query('set names utf8');
if (isset($_GET['page']) && (int)$_GET['page'] > 0)
    $Page = $_GET['page'];
else $Page = 1;
$pagesize = 5;

$result = $db->query("select * from shopping_cart");

$recordcount = $result->rowCount();
$pagecount = ceil($recordcount / $pagesize);
$sql = $db->query("select * from shoping_cart limit " . ($Page - 1) * $pagesize . "," . $pagesize . "");
$result->setFetchMode(PDO::FETCH_ASSOC);
?>
<html>
<head>
<style>
    table{
        border-collapse: collapse;
    }
    #tab{
        width: 600px;
        border-style: solid;
        border-radius: 8px;
        margin: 0 auto;
        margin-top: 10px;
    }
    td{
        border: none;
        width: 200px;
        line-height: 30px;
    }
td:nth-child(n+1){
    background-color: #f3f3f3;
}
    tr:hover
    { background-color: #3F0;
        color:#3CF}
    td:focus{background-color: #3F0;
        color:#3CF;}
</style>
</head>
<body>
<?php
while($row = $result->fetch()) {
?>
<div id="tab">

        <table border="0">
            <tr>
                <td rowspan="3" width="200"><img src="images/<?=$row['productid']?>.jpg" width="150px" height="150px"></td>
                <td colspan="3">鞋名：<?=$row['name']?></td>
            </tr>
            <tr>
                <td>单价：<?=$row['price']?></td>
                <td colspan="2">数量：<?=$row['num']?></td>
            </tr>
            <tr>
                <td>用户：<?=$row['username']?></td>
                <td colspan="3">总价：<?=$row['sum']?></td>
            </tr>
        </table>

</div>
<?php
}
?>
<div style="width: 600px;height: 40px;margin: 0 auto;line-height: 40px;text-align: center">
<?php
if($Page==1)
    echo "第一页  上一页";
else echo "<a href='?page=1'>第一页</a> <a href='?page=". ($Page-1) ."'>上一页</a>";
for($i=1;$i<=$pagecount;$i++){
    if($i==$Page) echo "$i ";
    else echo "<a href='?page=$i'>$i</a>";
}
if($Page==$pagecount)
    echo "下一页 末页";
else echo "<a href='?page=". ($Page+1) . "'>下一页</a>
    <a href='?page=". $pagecount ."'>末页</a>";
echo "&nbsp共" .$pagecount . "条记录&nbsp";
echo "$Page / $pagecount 页";
?>
</div>
<?php
}else
    echo "<div style='margin: 0 auto;color: red;width: 400px'>你没有访问权限！<a href='login.php'>请登录管理员账号</a> </div>"

?>
</body>
</html>