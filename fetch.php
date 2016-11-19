
<?php
session_start();
if($_POST['sub']){
//判断验证码是否相同
    if($_POST['code']==$_SESSION["verification"]){
        $user=$_POST["user"];
        $pwd=$_POST["pwd"];
      $conn=mysql_connect("localhost","root","root");
      mysql_query("set names 'utf8'");
     mysql_select_db("distance",$conn);

    $sql1=mysql_query("select * from user where username='$user' AND password=$pwd",$conn);
        $sql2=mysql_query("select * from user where username='$user' and role='1'");
        $sql3=mysql_query("select * from user where username='$user' and role='^'");
        $cz1=mysql_fetch_assoc($sql1);
        $cz2=mysql_fetch_assoc($sql2);
        $cz3=mysql_fetch_assoc($sql3);
        if($cz1 && $cz2)
       {
           $_SESSION["user"]=$user;
         echo "<script>alert('登录成功！');
        location.href='index.php';</script>";
       }
      else if($cz1 && $cz3)
     {
         $_SESSION["admin"]=$user;
         echo "<script>alert('管理员登录成功！');
        location.href='houtai-shop.php';</script>";
      }
        else{
            echo "<script>alert('登录失败！');
        location.href='login.php';</script>";
        }

    }else{
        echo "<script> alert('验证码错误！')
         location.href='login.php';</script>";
    }


}
?>