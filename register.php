<html>
<head>
    <meta charset="utf-8">
    <style>
        .rigester{
            margin-top:150px;
            margin-left:auto;
            margin-right:10%;
            padding-top: 20px;
            padding-bottom: 20px;
            float: right;
            width:480px;
            height:auto;
            background-color: #ffffff;
            box-shadow: 3px 3px 3px #666;

        }

        input{
            width:200px;
            height:30px;
        }
        input[placeholder]{
            font-size: 16px;
        }
        input[type="submit"]{
            width:250px;
            height:40px;
            border:none;
            background-color:#0067CE;
            font-size:20px;
            cursor: pointer;
            color:#ffffff;
            border-radius: 5px;
            box-shadow: 0px 2px 2px #666;
        }
        input[type="submit"]:hover{
            background-color:#3342FF;

        }
        span{
            display: block;
            width: 80px;
            height: 30px;
            float: left;
            line-height: 30px;
            font-size: 18px;
        }
        ul{
            list-style: none;
        }

    </style>

</head>

    <script type="text/javascript">
    function checkForm() {

        if (document.getElementById('1').value == "" ||
            document.getElementById('2').value == "" ||
            document.getElementById('4').value == "") {
            alert("请填写完整信息！");
            return false;
        }
    }

</script>

<script>
    function ck_username(){
        var user=document.getElementById("1").value;
        var  ck_user=document.getElementById("ck_user");
        if(user==""){
            ck_user.innerHTML="*用户名不能为空";
        }
        else
            ck_user.innerHTML="";
    }
    function ck_password(){
        var pswd=document.getElementById("2").value;
        var  ck_pwd=document.getElementById("ck_pwd");
        if(pswd.length<6){
            ck_pwd.innerHTML="*密码长度不能少于6位";
        }
        else
            ck_pwd.innerHTML="";
    }
    function ckpassword(){
        var pwd=document.getElementById("2").value;
        var surepwd=document.getElementById("3").value;
        var  ck_repwd=document.getElementById("ck_repwd");
        if(pwd!=surepwd){
            ck_repwd.innerHTML="*密码输入不一致";
        }
        else
            ck_repwd.innerHTML="";
    }
    function ck_email(){
        var email=document.getElementById("4").value;
        var ck_email=document.getElementById("ck_email");
        if(email==""){
            ck_email.innerHTML="*邮箱不能为空";
        }
        else
            ck_email.innerHTML="";
    }
    function ck_number(){
        var number=document.getElementById("5").value;
        var ck_number=document.getElementById("ck_number");
        if(number==""){
            ck_number.innerHTML="*手机号码不能为空";
        }
        else
            ck_number.innerHTML="";
    }

</script>
<body background="image/bg1.jpg" >
<a href="index.php"><img src="image/logo2.jpg" width="500px" height="150px" style="margin-left: 0px;opacity: 0.9;"></a>
<div class="rigester">
    <div id="a">
        <form action="insert.php" method="post" onsubmit="return checkForm()">
            <ul>
                <p><li><span>用户名</span><input type="text" name="user" id="1" placeholder="用户名" onblur="ck_username()"><span id="ck_user" style="width:150px;color: red;float: right;font-size: 14px;"></span></li></p>
                <p><li><span>密码</span><input type="password" name="pwd" id="2" placeholder="密码" onblur="ck_password()"><span id="ck_pwd" style="width:150px;color: red;float: right;font-size: 14px;"></span></li></p>
                <p><li><span>确认密码</span><input type="password" name="surepwd" id="3" placeholder="确认密码" onblur="ckpassword()"><span id="ck_repwd" style="width:150px;color: red;float: right;font-size: 14px;"></span></li></p>
                <p><li><span>邮箱</span><input type="email" name="postbox" id="4" placeholder="邮箱" onblur="ck_email()"><span id="ck_email" style="width:150px;color: red;float: right;font-size: 14px;"></li></p>
                <p><li><span>手机号码</span><input type="tel" name="number" id="5" placeholder="手机号码" onblur="ck_number()"><span id="ck_number" style="width:150px;color: red;float: right;font-size: 14px;"></li></p>

                <p><li><span>地址</span></li></p><br>
                <p><li><textarea name="address" rows="5" cols="40" style="width: 380px;"></textarea></li></p>
                <p><li><center><input type="submit" name="register" id="6" value="注册" ></center></li></p>
            </ul>
        </form>
    </div>
</div>
</body>
</html>
