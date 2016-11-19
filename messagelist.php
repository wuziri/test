<?php
include("admin_header.php");
//session_start();
if(@$_SESSION['admin']){


$dsn = "mysql:host=localhost;dbname=distance";
$db = new PDO($dsn, 'root', 'root');
$db->query('set names utf8');
if (isset($_GET['page']) && (int)$_GET['page'] > 0)
    $Page = $_GET['page'];
else $Page = 1;
$pagesize = 10;
$result = $db->query("select * from message");
$recordcount = $result->rowCount();
$pagecount = ceil($recordcount / $pagesize);
$sql = $db->query("select * from message limit " . ($Page - 1) * $pagesize . "," . $pagesize . "");
$sql->setFetchMode(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <style>
        div[id="1"] {
            width: 600px;
            border-style: solid;
            border-radius: 8px;
            font-size: 20px;
            border: 1px solid;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            border: none;
        }

        th {
            line-height: 30px;
            background-color: #111111;
            color: #fff;
        }

        tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tr:nth-of-type(odd) {
            background-color: #ddd;
        }

        td:nth-child(n+2) {
            text-align: left;
        }

        tr:hover {
            background-color: #3F0;
            color: #fa0000
        }

        td:focus {
            background-color: #3F0;
            color: #df0000;
        }
    </style>
</head>
<body>
<div id="1" align="center" style="margin-top: 30px">
    <table border="1" align="center">
        <tr>
            <th width="512" align="left">用户</th>
            <th width="512" align="left">商品名</th>
            <th width="512" align="left">发表时间</th>
            <th width="167"> 操作</th>
        </tr>
        <?php
        while ($row = $sql->fetch()) {

            ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['productid'] ?></td>
                <td><?= $row['create_date'] ?></td>
                <td rowspan="2">
                    <a href="delete-message.php?id=<?= $row['id']; ?>">删除</a>
                </td>
            </tr>
            <tr>
                <td colspan="3" >内容：<span style="text-align: center"><?= $row['content'] ?></span></td>
            </tr>
        <?php
        }
        ?>
    </table>
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