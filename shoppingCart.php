<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
    <style>
        #shoppingCart{
            width:900px;
            height:400px;
            margin:0 auto;
            padding:40px;
            margin-top: 20px;
        }
        #h{
            width: 100%;
            height: 30px;
        }
        .all_goods{
            font-size:24px;
            width: 200px;
            float: left;
        }
        .account{
            float:right;
            width: 60px;
            line-height:30px;
            text-align: center;
            background-color: #f40;
            color: #FFFFFF;
            border-radius: 2px;
            cursor: pointer;
        }
        .selected_goods{
            float:right;
            width: 300px;
            text-align: right;
            margin-right: 10px;
            line-height: 30px;
        }
        .selected_goods strong{
            color: #f40;
            width: 100px;
            font-size: 16px;
            font-family: tohoma,arial;
        }
        #th div{
            float:left;
            margin-left: 10px;
        }
        .container{
            width: 900px;
            height: 190px;
            border:1px solid #CCCCCC;
            margin-bottom: 10px;
            background-color: #FCFCFC;
        }
        .container .a{
            float: left;height: 150px;margin-left: 10px; margin-top: 20px;
        }
        .container .a .img{
            width: 150px;
            height: 150px;
            float: left;
            margin-left: 8px;
            border: 1px solid #EEE;
        }
        .container .a input[type=text]{
            width: 40px;
            height: 20px;
            text-align: center;
        }
        .footer{
            width: 900px;
            height: 50px;
            background-color: #E5E5E5;
        }
        .footer .a{
            width: 100px;
            float:left;
            margin-left: 10px;
            line-height: 50px;

        }
        .footer .b{
            float: right;
            line-height: 50px;
            text-align:right;
            padding: 0 10px;
        }
        .footer .b strong{
            color: #f40;
            font-size: 18px;
            font-family: tohoma,arial;
        }
        .footer .b span{
            color: #f40;
        font-weight: 700;
            font-size: 18px;
            font-family: tohoma,arial;
        }
        .footer .c{
            width: 120px;
            height: 50px;
            float:right;
            text-align: center;
            line-height: 50px;
            background-color: #f40;
            color: #FFFFFF;
            font-family: 'Lantinghei SC','Microsoft Yahei';
            font-size: 20px;
            cursor: pointer;
            border-radius: 2px;
        }
    </style>
    <script>


    </script>
</head>

<body>
<?php
session_start();
if(isset($_SESSION['user'])) {
    $uname=$_SESSION['user'];
    $dsn="mysql:host=localhost;dbname=distance";
    $db=new PDO($dsn,'root','root');
    $db->query('set names utf8');
//require('conn.php');
    $sql="select * from shopping_cart WHERE username=?";
    $result=$db->prepare($sql);
    $result->execute(array($uname));
    $result->setFetchMode(PDO::FETCH_ASSOC);
    if($result->rowCount()==0){
        include("header2.php");
        echo "<div style='width:550px;font-size:22px;margin: 0 auto;margin-top: 100px;'>
<a href='index.php' style='text-decoration: none;'> <img src='image/shoppingCart.png'>你的购物车是空的，赶快去添加吧！</a></div>";
    }
else {
    include("header2.php");
    ?>

    <div id="shoppingCart">
        <div id="h">
            <div class="all_goods">全部商品</div>
        </div>
        <div style="width: 100%;height: 2px;background: #000;margin-top: 5px;margin-bottom: 5px;"></div>


        <form >
            <div id="th" style="height:40px;">
                <div style="width: 180px;">选择商品</div>
                <div style="width: 230px;">商品信息</div>
                <div style="width: 110px;">单价（元）</div>
                <div style="width: 100px;">数量</div>
                <div style="width: 100px;">金额（元）</div>
                <div style="width: 100px;">操作</div>
            </div>
            <?php
            $total=0;
            while ($rows = $result->fetchAll()){
            foreach ($rows as $row){
            ?>
            <div class="container">
                <div class="a" style="width: 180px;">
                    <div  style="float: left;"></div>
                    <div class="img"><img src="images/<?= $row['productid']; ?>.jpg" style="width: 150px;height: 150px;"></div>
                </div>
                <div class="a" style="width: 230px;"><?= $row['name']; ?></div>
                <div class="a" style="width: 110px;"><strong id="price"><?= $row['price']?></strong></div>
                <div class="a" style="width: 100px;"><input type="text" id="num" value="<?= $row['num']; ?>" onblur="change()"></div>
                <div class="a" style="width: 100px;"><strong style="color: #f40;font-size: 16px;" ><span id="sum"><?= $row['sum'] ?></span></strong></div>
                <div class="a" style="width: 100px;"><span><a href="del_shopping.php?id=<?=$row['productid'];?>">删除</a></span></div>
            </div>

        <?php
                $total+= $row['price']*$row['num'];
            }
        } ?>
            <div class="footer">
            <div class="a"><a href="goodslist.php" style="text-decoration: none;">继续添加</a></div>
            <div class="c">结算</div>
            <div class="b" >合计（不含运费）<strong>¥<span id="all_sum" style="font-size: 22px;margin-left: 5px"><?=$total;?>.00</span></strong>
            </div>
        </div>
        </form>
    </div>

<?php
}
}
else
   echo "<script>
location.href='login.php';
</script>";
?>
</body>
<script>
    function change(){

         var num=document.getElementById("num").value;
         var sum=document.getElementById("sum");
        var all_sum = document.getElementById("all_sum");
         var s=parseFloat(parseInt(document.getElementById("price").innerHTML)*parseInt(num)).toFixed(2);

        sum.innerHTML=s;
        all_sum.innerHTML=s;
    }
</script>
</html>
