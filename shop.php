<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color:#3C3C3C;

        }
        .login{
            margin: 0 auto;
            width: 400px;
            height: auto;
           background-color: #666666;
            margin-top: 20px;
        }
        .form{
            padding: 40px;
        }
        input[placeholder]{
            font-size: 20px;

        }
        input[id=code]{
            padding-left: 0px;
            font-size: 20px;
            width: 200px;
            height: 40px;
        }
        input[type=text]{
            width: 250px;
            height: 45px;
        }
        input[type=address]{
            width: 300px;
            height: 80px;
        }
        input[type="submit"]{
            background-color: #3366FF;
            font-size: 20px;
            border: none;
            color: #ffffff;
            cursor: pointer;
            width: 100px;
            height: 45px;
            box-shadow: 0px 2px 2px #666;
        }
        input[type="submit"]:hover{
            background-color: mediumblue;
        }


    </style>

</head>

<body>


<?php
include("header.php");
?>
<div class="login">
    <div class="form">
        <form action="upload_post.php" method="post" enctype="multipart/form-data">
            <p><input type="text" name="name"   placeholder="产品名称"></p>
            <p><input type="text" name="price" placeholder="单价"></p>
            <p><input type="address" name="address" placeholder="卖家地址"></p>

             <input type="file" name="upfile" style="width: 200px; height: 45px;">

            <input type="submit" name="upload" value="确定上架">
        </form>

    </div>

</div>


</body>
</html>






