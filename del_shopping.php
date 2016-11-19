<?php
session_start();
$id=$_GET['id'];
$username=$_SESSION["user"];
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
$affected=$db->exec("delete from shopping_cart where productid='$id' and username='$username'");
if($affected>0){
    print("
                <script type='text/javascript'>
			alert('删除购物车成功');
			location.href='shoppingCart.php';
		</script>
                ");
}else{
    print("
                <script type='text/javascript'>
			alert('删除购物车失败');
			location.href='shoppingCart.php';
		</script>
                ");
}
?>