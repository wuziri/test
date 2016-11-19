<?php
session_start();
$a=$_SESSION['user'];
$b=$_POST['nphone'];
$c=$_POST['nemail'];
$d=$_POST['npassword'];
$e=$_POST['naddress'];
if(isset($_POST['sub'])){
$conn=mysql_connect("localhost","root","root");
mysql_query("set names 'utf8'");
mysql_select_db("distance",$conn);
$sql="Update user set tel='$b',email='$c',password='$d',address='$e' WHERE username='$a'";
$result=mysql_query($sql);
    if($result){
        echo "<script>
alert('修改成功')
location.href='user-xiugai.php'
</script>";
    }
}
?>