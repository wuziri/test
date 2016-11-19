<?php
include("admin_header.php");
//session_start();
if(@$_SESSION['admin']){

$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
if(isset($_GET['page'])&& (int)$_GET['page']>0)
    $Page=$_GET['page'];
else $Page=1;
$pagesize=15;
$result=$db->query("select * from shopping");
$recordcount=$result->rowCount();
$pagecount=ceil($recordcount/$pagesize);
$sql=$db->query("select * from shopping limit ".($Page-1)*$pagesize.",".$pagesize."");
$sql->setFetchMode(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <style>
        div[id="1"]{
            width: 600px;
            border-style: solid;
            border-radius: 8px;
            font-size: 20px;
            margin-top: 30px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td,th{
            border: none;
        }
        th{
            line-height: 30px;
            background-color: #111111;
            color: #fff;
        }
        tr:nth-of-type(even){
            background-color: #f3f3f3;
        }
        tr:nth-of-type(odd){
            background-color: #ddd;
        }
        td:nth-child(n+2)
        {
            text-align:left;
        }
        tr:hover
        { background-color: #3F0;
            color:#fa0000}
        td:focus{background-color: #3F0;
            color: #df0000;}
    </style>
</head>
<body>
<center><div id="1">
        <center><table>
                <tr>
                    <th width="512">商品图片</th>
                    <th width="512" align="left" >ID</th>
                    <th width="512" align="left" >商品名</th>
                    <th width="512" align="left" >价格</th>
                    <th width="167" > 操作 </th>
                </tr>
                <?php
                while($row=$sql->fetch()){

                    ?>
                    <tr>
                        <td><img src="<?= $row['loca']?>" height="50" width="50"></td>
                        <td><?= $row['id']?></td><td><?= $row['name']?></td><td><?= $row['price']?></td>
                        <td><a href="delete-shop.php?id=<?=$row['id'];?>">删除</a> </td>
                    </tr>
                <?php };?>
            </table></center>
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
        ?></div>
   </center>
<?php
}else
echo "<div style='margin: 0 auto;color: red;width: 400px'>你没有访问权限！<a href='login.php'>请登录管理员账号</a> </div>"

?>
</body>

</html>