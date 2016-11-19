<?php
 session_start();
$conn=mysql_connect("localhost","root","root");
mysql_query("set name 'utf8'");
mysql_select_db("distance",$conn);
$user=$_POST["user"];
$pwd=$_POST["pwd"];
$postbox=$_POST["postbox"];
$number=$_POST["number"];
$address=$_POST["address"];

    $s= mysql_query("select * from user where username='".$user."'",$conn);
    $row = mysql_num_rows($s);
    if($row != 0){
        echo "<script>alert('该用户已存在,请注册另一新用户');
        location.href='register.php';</script>";
    }else{
        $sql ="insert into user(role,username,password,email,tel,address)
values('1','$user','$pwd','$postbox','$number','$address')";
        $result = mysql_query($sql);
        if($result){
            //$_SESSION['user']=$user;
            print("
            <script type ='text/javascript'>
            alert('注册成功');
            location.href='login.php';
            </script>
                    ");

        }
    }


?>
