<?php
// 获得参数
$userid = $_GET['id'];
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
// 构造sql语句删除帖子
$sql = $db->query("delete from shopping where id='$userid' limit 1");
// 删除完成，重定向到管理留言页面
//header("Location:admin_user_mng.php?page=$page");
print("
           <script type='text/javascript'>
			alert('删除商品成功');
			location.href='houtai-shop.php'
		</script>
                ");


mysql_close();

?>