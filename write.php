<?php
session_start();
$conn=mysql_connect("localhost","root","root");
mysql_query('set names "utf8"');
mysql_select_db("distance") ;
if(isset($_POST['sub'])){
if(isset($_SESSION['user'])){
    $name=$_SESSION['user'];
    $a=$_SESSION['productid'];
    $content=$_POST['content'];


// 留言写入数据库表
    $sql = "INSERT INTO message( username,create_date,productid,content) VALUES ( '".$name."','".date("y-m-d h:i:s")."','".$a."', '".$content."')";
    $result = mysql_query($sql);
    if($result) {

        print("
                <script type='text/javascript'>
			alert('评论发表成功');
			location.href='shopping_informations.php?id=$a';
		</script>
                ");
    }
    else {
        print("
                <script type='text/javascript'>
			alert('评论发表失败');
			location.href='shopping_informations.php';
		</script>
                ");
    }
}else{
    echo "<div style='width: 400px;margin: 0 auto;color: red;margin-top: 50px'>你还没有登录，不能发表评论，请先<a href='login.php'> 登录</a></div>";
}

}
// 关闭连接
mysql_close($conn);

?>