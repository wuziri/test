<?php
include ("header.php");
?>
<html>
<head>
    <meta charset="utf8">
    <style>
        h3 {
            font-size: 30px;
            font-family: inherit;
            color: #0066ff;
        }
        .b{

            margin-top: 20px;
            padding: 40px;
        }
        }
        input{
            float: left;
            width:200px;
            height:30px;
        }
        input[placeholder]{
            font-size: 20px;
        }
        input[id="1"]{
            padding-left: 0px;
            width: 300px;
            height: 40px;
            border-radius: 8px;
        }
        input[id="2"]{
            margin-top: 20px;
            width: 300px;
            height: 45px;
            border-radius: 8px;
        }
        input[id="3"]{;
            width: 300px;
            height: 45px;
            margin-top: 20px;
            border-radius: 8px;
        }
        input[id="4"]{
            width: 300px;
            height: 45px;
            margin-top: 20px;
            border-radius: 8px;
        }
        input[type="submit"]{
            margin-top: 20px;
            width:120px;
            height:30px;
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
        input[type="reset"]{
            margin-top: 20px;
            width:120px;
            height:30px;
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
</head>

<body>
<?php
if(@$_SESSION['user']){
    $name=$_SESSION['user'];
    $dsn="mysql:host=localhost;dbname=distance";
    $db=new PDO($dsn,'root','root');
    $db->query('set names utf8');
    $result=$db->query("select * from user WHERE username=$name");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row=$result->fetch();
?>
    <center><h3>修改个人信息</h3></center>

   <center><div class="b" id="2" style="margin: auto;">
           <form method="post" action="check-xiugai.php">
       <ul type="none">
       <p><li><input type="text" name="nphone" id="1" placeholder="<?=$row['tel']?>"/></li></p>
           <p><li><input type="text" name="nemail" id="2" placeholder="<?=$row['email']?>"/></li></p>
           <p><li><input type="password" name="npassword" id="3" placeholder="<?=$row['password']?>"/></li></p>
           <p><li><input type="text" name="naddress" id="4" placeholder="<?=$row['address']?>"/></li></p>
           <p><li><input type="submit" name="sub" value="修改" />&nbsp;<input type="reset" value="重置" /></li></p>
           </ul>
       </form> </div></center>
<?php
}
else{
    echo "<div style='width: 400px;margin: 0 auto;color: red;margin-top: 20px'>您还没有登录！<a href='login.php'>请先登录后再修改信息</a> </div>";
}
?>
</body>
</html>
