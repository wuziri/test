<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style>
*{
	margin:0;
	padding:0;
}
body{
    width: 100%;
	background-color:#3C3C3C;
    margin: 0;
    padding: 0;
	
}
div{
	margin-bottom:1px;
	
}
#header{
	width:100%;
	height:150px;
	
	}
#header .a{
	margin:0 auto;
	width:100%;
	height:100%;
}
#header .a img{
	width:100%;
	height:150px;
}
#header .b{
	margin-top:-18px;
	width:50%;
	height:200px;
	float:right;
}
#menu{
	width:100%;
	height:40px;
	background-color:#F30;
    margin-top: 0px;;
}
#menu .a{
	margin:0 auto;
	width:70%;
	height:40px;
	background-color:#F30;
    opacity: 1;
	
}
#menu .a ul{
	list-style:none;
}
#menu .a ul li{
	line-height:40px;
	text-align:center;
	
	
}
#menu .a .menu li a{ text-decoration:none; color:#000; display:block;width:120px;float:left; }
#menu .a .menu li a:hover{ color:#FFFFFF; background-color:#B50000; font-size:20px;}
.log_reg{
	width:auto;
	float:right;
}
.log_reg li a{
	text-decoration:none;
}
		
#imgs{
	width:100%;
	height:400px;
}
#imgs .a{
	margin:0 auto;
	width:100%;
	height:100%;
}
#imgs .a img{
	width:100%;
	height:400px;
}
#main{
	width:100%;
	height:665px;
	margin-top:10px;
	
}
#main .goods{
	margin:0 auto;
	border:1px solid #D7D7D7;
	width:70%;
	height:100%;
	background-color:#FFF;
}
#main .goods .a{
	margin-top:20px;
	margin-left:30px;
	width:20%;
	height:220px;
	border:1px solid #D7D7D7;
	float:left;
}
#main .goods .a img{
	width:100%;
	height:220px;
}
 .goods .a .b{
	display:none;
	width:100%;
	height:50px;
	background-color:#C6C6C6;
	margin-top:-52px;
	opacity:0.8;
}
 .goods .a a:hover .b{
	display:block;
	
}
	
#main_2{
	width:100%;
	height:250px;
	margin-top:20px;
	
}
#main_2 .goods{
	margin:0 auto;
	border:1px solid #D7D7D7;
	width:70%;
	height:200px;
	background-color:#FFF;
}
#main_2 .goods .a{
	margin-top:10px;
	margin-left:5px;
	width:19%;
	height:180px;
	border:1px solid #D7D7D7;
	float:left;
}
#main_2 .goods .a img{
	width:100%;
	height:180px;
}
#footer{
	width:100%;
	height:60px;
	margin-top:10px;
}
#footer .a{
	margin:0 auto;
	width:70%;
	height:60px;
	background-color:#1C1C1C;
	font-style:normal;
	text-align:center;
	color:#E8E8E8;
	line-height:60px;	
}
#to_top{
	width:30px;
	height:40px;
	padding:20px;
	font:14px/20px arial;
	text-align:center;
	background:#06c;
	position:absolute;
	cursor:pointer;
	color:#fff;
}
</style>
<script>
window.onload = function(){
  var oTop = document.getElementById("to_top");
  var screenw = document.documentElement.clientWidth || document.body.clientWidth;
  var screenh = document.documentElement.clientHeight || document.body.clientHeight;
  oTop.style.left = screenw - oTop.offsetWidth +"px";
  oTop.style.top = screenh - oTop.offsetHeight + "px";
  window.onscroll = function(){
    var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
    oTop.style.top = screenh - oTop.offsetHeight + scrolltop +"px";
  }
  oTop.onclick = function(){
    document.documentElement.scrollTop = document.body.scrollTop =0;
  }
}  

</script>
<script language="javascript">
    setInterval(test,3000);
    var array=new Array();
    var index=0;
    var array=new Array("image/a.jpg","image/b.jpg");
    function test()
    {
        var mying=document.getElementById("move_img");
        if(index==array.length-1)
        {
            index=0;
        }
        else
        {
            index++;
        }
        mying.src=array[index];
    }
</script>

</head>

<body>
<?php
session_start();
@$username=$_SESSION["user"];
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
//$a=$_GET["id"];
if(isset($_SESSION["user"])){
 echo "<script>document.getElementById('logined').innerHTML='$username';</script>";
}



?>
<div id="header">
	<div class="a"><img src="image/header_logo.jpg" class="img"></div>
</div>
<div id="menu">
	<div class="a">
    	<ul class="menu">
          <li><a href="index.php">首页</a></li>
          <li><a href="goodslist.php">所有商品</a></li>
          <li><a href="shoppingCart.php">购物车</a></li>
          <li><a href="user-xiugai.php">个人信息</a></li>
          <li><a href="about_us.php">关于我们</a></li>
        </ul>
        <ul class="log_reg">
            <?php
            if(isset($_SESSION["user"])){
                echo "<li><span>欢迎您！$username</span>|<a href='logout.php'>退出登录</a> </li>";
            }
         else
          echo '<li><a href="login.php">登录</a>|<a href="register.php">注册</a></li>';
            ?>
        </ul>
    </div>
   
</div>

<div id="imgs">
	<div class="a">
      <img id="move_img" src="image/a.jpg">
    </div>
</div>
<div id="main">
	<div class="goods">
      <div><img src="image/mrbt.gif" style="width:100%"></div>
        <?php
        $result=$db->query("select * from shopping WHERE id BETWEEN 1 and 8");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while($row=$result->fetch()) {

            ?>
            <div class="a"><a href="shopping_informations.php?id=<?= $row['id'] ?>"><img src="images/<?= $row['id'] ?>.jpg">

                    <div class="b">￥<?= $row['price'] ?><?= $row['name'] ?></div>
                </a></div>
        <?php
        }
        ?>


    </div>
</div>
<div id="main_2">
   <div style="width:70%; height:40px; background-color:#680001; text-align:left;
   margin:0 auto; line-height:40px; border:1px solid #680001;"><h4 style="color: #FFFFFF;margin-left: 10px;float: left;">宝贝推荐</h4><a href="goodslist.php"><h4 style="color: #FFFFFF;margin-right: 10px;float: right;"> 更多宝贝》</h4></a></div>
   <div class="goods">
       <?php
       $result1=$db->query("select * from shopping WHERE id BETWEEN 9 and 13");
       $result1->setFetchMode(PDO::FETCH_ASSOC);
       while($row=$result1->fetch()) {
           ?>
           <div class="a"><a href="shopping_informations.php?id=<?= $row["id"]?>"><img src="images/<?= $row["id"] ?>.jpg">

                   <div class="b">￥<?= $row['price'] ?><?= $row['name'] ?></div>
               </a></div>
       <?php
       }
       ?>
   </div>
</div>
<div id="footer">
	<div class="a">CopyRight@2016</div>
</div>
<div id="to_top">返回顶部</div>
</body>
<script>
</script>
</html>
