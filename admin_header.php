
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
        #menu .a .menu li a{ text-decoration:none; color:#000; display:block;width:180px;float:left; }
        #menu .a .menu li a:hover{ color:#FFFFFF; background-color:#B50000; font-size:20px;}
    </style>

</head>

<body>
<div id="menu">
    <div class="a">
        <ul class="menu">
            <li><a href="houtai-shop.php">商品信息列表</a></li>
            <li><a href="messagelist.php">用户评论列表</a></li>
            <li><a href="user-information.php">用户列表</a></li>
            <li><a href="query_shoppingCart.php">查看用户的购物车</a> </li>

        </ul>
        <ul class="log_reg">
            <?php
            session_start();
            @$username=$_SESSION["admin"];
            if(isset($_SESSION["admin"])){
                echo "<li><span>欢迎您！管理员</span>|<a href='logout.php'>退出登录</a> </li>";
            }
            else
                echo '<li><a href="login.php">登录</a>|<a href="register.php">注册</a></li>';
            ?>
        </ul>
    </div>
</div>
</body>
</html>