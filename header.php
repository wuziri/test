<html>
<head>

    <style>

*{
    margin: 0;
    padding: 0;
}
        div[id="1"]{
            font-size: 100px;
        }
        div{


        }
        #header{
            width:100%;
            height:150px;
            background-color:#3C3C3C;


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
        #menu{
            width:100%;
            height:40px;
            background-color:#F30;
            margin-top: 0px;
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
    </style>

</head>

<body>
<div id="header">
    <img src="image/header_logo.jpg" width="100%" height="150px">
</div>
<div id="menu">
    <div class="a">
        <ul class="menu">
            <li><a href="index.php">首页</a></li>
            <li><a href="goodslist.php">商品</a></li>
            <li><a href="shoppingCart.php">购物车</a></li>
            <li><a href="user-xiugai.php">个人信息</a></li>
            <li><a href="about_us.php">关于我们</a></li>
        </ul>
        <ul class="log_reg">
            <?php
            session_start();
            @$username=$_SESSION["user"];
            if(isset($_SESSION["user"])){
                echo "<li><span>欢迎您！$username</span>|<a href='logout.php'>退出登录</a> </li>";
            }
            else
                echo '<li><a href="login.php">登录</a>|<a href="register.php">注册</a></li>';
            ?>
        </ul>
    </div>
</div>
</body>
</html>