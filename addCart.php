<?php
session_start();
 //加入购物车操作
$productid=intval($_POST['productid']);
$num=intval($_POST['number']);
$name=$_POST['name'];
$price=$_POST['price'];
$sum=$num*$price;

   //接受传递过来的post参数
if(isset($_SESSION['user'])){
    $username=$_SESSION['user'];
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
$sql="select * from shopping_cart WHERE productid=? and username=?";
$stmt=$db->prepare($sql);
$stmt->execute(array($productid,$username));
$data=$stmt->fetch(PDO::FETCH_ASSOC);

if($data){
    $sql="update shopping_cart set num=num+?,sum=sum+? WHERE productid=? and username=?";
    $params=array($num,$sum,$productid,$username);
}
else{
    $sql="insert into shopping_cart(username,productid,picture,name,price,num,sum) VALUES (?,?,?,?,?,?,?)";
    $params=array($username,$productid,$productid,$name,$price,$num,$sum);


//准备要添加的购物车数据
}
$stmt=$db->prepare($sql);
$stmt->execute($params);
$row=$stmt->rowCount();
    if($row){
        print("<script>
        alert('添加购物车成功！');
        location.href='shoppingCart.php';
</script>");


    }
    else{
        print("
    <script>
        alert('添加购物车失败！');
        location.href='shopping_informations.php';
</script>
    ");
    }

}
else{
    echo "<script>alert('你还没有登录，请登录后添加！');
location.href='login.php';
</script>";
}

?>