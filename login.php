<html>
<head>
    <meta charset="utf-8">
    <style>

        .login{
            margin-top: 150px;
            margin-right: 100px;
            width: 400px;
            height: auto;
            float: right;
            background-color: #ffffff;
            opacity: 0.9;
            border: 1px solid #cccccc;
        }
        .form{
            padding: 40px;
        }
        input[placeholder]{
            padding-left: 60px;
            font-size: 20px;

        }
        input[id=code]{
            padding-left: 0px;
            font-size: 20px;
            background-color: #bdbdbd;
            width: 200px;
            height: 40px;
        }
        input[id=user]{
            background:url("image/login_user.png") 0 0 #bdbdbd no-repeat ;
            width: 300px;
            height: 45px;
        }
        input[type=password]{
            background:url("image/login_pas.png") 0 0 #bdbdbd no-repeat ;
            width: 300px;
            height: 45px;
        }
        input[type="submit"]{
            background-color: #3366FF;
            font-size: 20px;
            border: none;
            color: #ffffff;
            cursor: pointer;
            width: 300px;
            height: 45px;
            box-shadow: 0px 2px 2px #666;
        }
        input[type="submit"]:hover{
            background-color: mediumblue;
        }
        span{
            float: left;
            display: block;
            font-size: 25px;
            width: 100px;
            height: 40px;
            line-height: 40px;
        }

        a{
            margin-left: 10px;
        }

    </style>
<script>
    function check(){
        var ck_user=document.getElementById("ck_user");
        if(document.getElementById("user").value==""){
            ck_user.innerHTML="*用户名不能为空";
        }
        else
        ck_user.innerHTML="";
    }

</script>
</head>
<body>
<img src="image/login_bg.jpg" width="100%" height="100%" style="position: absolute;z-index: -999;top: 0;margin-top: 100px;">
<div id="bg">
<a href="index.php"><img src="image/logo2.jpg" width="500px" height="150px" style="margin-left: 0px;opacity: 0.9;"></a>
<div class="login">
    <div class="form">
        <form action="fetch.php" method="post">
            <span id="ck_user" style="width: 200px;height:30px;float: right;font-size: 16px;margin-top: -40px;color: red"></span>
            <p><input type="text" name="user" id="user"  placeholder="账号" onblur="check()"></p>
            <p><input type="password" name="pwd" id="pwd" placeholder="密码"></p>
            <p><span>验证码：</span><input type="text" name="code" id="code"></p>
            <p><img id="changepic" onclick="changing();" src='image/code.php' /><a href="javascript:changing()" >看不清？换一张</a></p>
            <input type="submit" name="sub" value="登录">
        </form>
        <p><a href="register.php">没有账号？马上去注册</a> </p>
    </div>

</div>
</div>
</body>
<script>

    function changing(){
        document.getElementById('changepic').src="image/code.php?"+Math.random();
    }

</script>

</html>

