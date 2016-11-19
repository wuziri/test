<?php
session_start();
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
$_SESSION['productid']=@$_GET["id"];
$a=$_SESSION['productid'];

$sql=$db->query("select * from shopping WHERE id='$a'");
$row=$sql->fetch();

?>
<html>
<head>
    <style>
        div[id="div1"]{
            float:left;
            font-size: 30px;
            color: #df0000;
            border: 1px solid;
        }
        div[id="div2"]{
            float: left;
            width: 400px;
            height: 400px;
        }
        div[id="div3"]{
            width: 70%;
            height: 400px;
            margin: 0 auto;

        }
        div[id="div4"]{
            float: left;
            margin-left: 40px;
            height: 200px;
            width: 300px;;
            font-family: "Consolas", "Menlo", "Courier", monospace;
            color: #fa0000;
            font-size: 20px;

        }
        tr{
            font-size: 20px;
            color: red;
        }
        td[id="0"]{
            font-size: 20px;
        }
        div[id="div5"]{
            width: 100%;
            height: auto;
            margin-top: 60px;
        }
        div[id="div6"]{
            height: 200px;
            font-size: 50px;
            color: #df0000;
        }
        .comment{
            width: 70%;
            height: 40px;
            margin: 0 auto;
            margin-top: 10px;
            border: 1px solid;
            background-color: #680001;
            line-height:40px;
        }
        input[name="sub"]{
            width:80px;
            height:40px;
            border:none;
            background-color:#0067CE;
            font-size:20px;
            cursor: pointer;
            color:#ffffff;
            border-radius: 5px;
            box-shadow: 0px 2px 2px #666;
        }
        input[name="sub"]:hover{
            background-color:#3342FF;

        }
        input[type="reset"]{
            width:80px;
            height:40px;
            border:none;
            background-color:#0067CE;
            font-size:20px;
            cursor: pointer;
            color:#ffffff;
            border-radius: 5px;
            box-shadow: 0px 2px 2px #666;
        }
        input[type="reset"]:hover{
            background-color:#3342FF;

        }
    </style>

    <script type="text/javascript"></script>
</head>
<body>
<?php
include("header2.php");
?>
<div id="div5">
        <div id="div3">
            <form action="addCart.php" method="post">
            <div id="div2"><img src="<?= $row['loca']?>" height="400" width="400" style="border: 1px solid #EEE;" ><input type="hidden" name="productid" value="<?= $row['id']?>"></div>
            <div id="div4">
                <div id="div6">
                    <h>亲！包邮(⊙o⊙)哦！！</h>
                </div>
                <table border="0" width="400px">
                    <tr><td><?= $row['name']?><input type="hidden" name="name" value="<?= $row['name']?>"></td></tr>
                    <tr><td>单价：￥<span id="price"><?= $row['price']?></span><input type="hidden" name="price" value="<?= $row['price']?>"></td></tr>
                    <tr><td >数量：<input type="text" id="number" name="number" value="1" style="width: 50px;" onblur="add()"></td>
                        <td colspan="3" width="200px">总价格：￥<span id="sum"><?= $row['price']?></span><input type="hidden" name="price" value="<?= $row['price']?>"></td></tr>
                    <tr><td><?= $row['address']?></td><td>至</td>
                        <td><select name="select">
                                <option value="1">广东 深圳</option>
                                <option value="2">广东 广州</option>
                                <option value="3">湖北 武汉</option>
                                <option value="4">北京</option>
                                <option value="5">山东 青岛</option>
                            </select></td>
                    </tr>
                    <tr><td id="0"><input type="submit" value="+加入购物车" style="height: 35px; width: 200px;color: coral "></a> </td></tr>
                    </form>
                </table>
            </div>
        </div>

<?php
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');

$sql=$db->query("select * from message WHERE productid=$a");
$sql->setFetchMode(PDO::FETCH_ASSOC);
$num=$sql->rowCount()
?>
        <div class="comment">
            <h4 style="color: #FFFFFF;margin-left: 10px;float: left;">全部评论(<?=$num?>)</h4>
        </div>
<table border="1">
<?php
while($row=$sql->fetch()){

?>
        <div style="width: 70%;height: 120px;border: 1px solid #CCCCCC;margin: 0 auto;margin-bottom: 10px">
            <div>
                <div style="width: 9%;height: 85px;float: left"><img src="image/user_head.png" width="85px" height="85px"></div>
                <div style="width: 90%;height: 85px;border: 0px solid;float: right">
                    <div style="float:left;width: 10%;height: 85px;border: 0px solid;text-align: center;line-height: 85px">评论内容：</div>
                    <div style="float:right;width: 89%;height: 85px;border: 0px solid;text-align: left;line-height: 85px"><?= $row['content']?></div>
                </div>
            </div>
        <div>
            <div style="width: 9%;height: 35px;border: 0px solid;float: left;text-align: center;line-height: 35px;"><?= $row['username']?></div>
            <div style="width: 90%;height: 35px;border: 0px solid;float: right;line-height:35px;text-align: right;border-top:1px dashed"><span style="margin-right: 100px">发表时间：<?= $row['create_date']?></span></div>
        </div>

        </div>
<?php };?>
</table>
    </div>

<div style="width:70%;margin: 0 auto;height: auto;border: 1px solid #CCCCCC;margin-top: 10px">
    <div style="width: 100%;background-color: #680001;height: 40px;margin-bottom: 20px">
        <h4 style="color: #FFFFFF;margin-left: 10px;float: left;line-height: 40px">发表评论</h4>
    </div>
    <form name="msgform" method="post" action="write.php">
        <table width="100%" height="200px"  cellspacing="0" cellpadding="5"  align="center" border="0">
            <tr>
                <td colspan="2" align="center">
                    <textarea id="content" name="content" rows="7" cols="80" ></textarea>
                </td>
            </tr>


            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="sub" value="发 表" >
                    &nbsp;&nbsp;<input type="reset" name="Rewrite" value="重 写">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
<script>
    function add(){
        var num=document.getElementById("number").value;
        var sum=document.getElementById("sum");
        var s;
        s=parseFloat(parseInt(document.getElementById("price").innerHTML)*parseInt(num)).toFixed(2);
        sum.innerHTML=s;
    }
</script>
</html>