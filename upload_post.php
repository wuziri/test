<?php
if ($_FILES["upfile"]["error"] > 0)
{
    echo "Error: " . $_FILES["upfile"]["error"] . "<br />";
}
else
{
    $name=$_POST["name"];
    $price=$_POST["price"];
    $address=$_POST["address"];
    $upload_dir = getcwd() . "\\images\\";
    $a=$_FILES['upfile']['name'];
    move_uploaded_file($_FILES['upfile']['tmp_name'],$upload_dir.$a);
    $x='images/'.$a;

echo "<script>
alert('上传图片成功！');
location.href='goodslist.php';

</script>";


    try{
        $dan="mysql:host=localhost;dbname=distance";
        $pdo = new PDO($dan,'root','root');
        $pdo->query('set names utf8');
        $pdo->exec("INSERT INTO shopping(name,price,address,loca) values ('$name','$price','$address','$x')");

    }catch (PDOException $e){
        echo $e->getMessage();
    }
    echo '</pre>';

}
?>