<!DOCTYPE html>
<html>
<?php
include("header.php");
$dsn="mysql:host=localhost;dbname=distance";
$db=new PDO($dsn,'root','root');
$db->query('set names utf8');
if(isset($_GET['page'])&& (int)$_GET['page']>0)
    $Page=$_GET['page'];
else $Page=1;
$pagesize=12;
$result=$db->query("select * from shopping");
$recordcount=$result->rowCount();
$pagecount=ceil($recordcount/$pagesize);
$sql=$db->query("select * from shopping limit ".($Page-1)*$pagesize.",".$pagesize." ");
$sql->setFetchMode(PDO::FETCH_ASSOC);

?>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>

</head>
<style>

    h1{
        text-shadow: 10px 5px gray;
        font-size: 50px;
        font-family: Consolas;
        color: #00df00;
    }
    p{
        text-shadow: 10px 5px gray;
        font-size: 40px;
        font-family: fantasy;
        color: #00df00;
    }
    .goods .a  .b {
        display:none;
        width:100%;
        height:50px;
        background-color:#C6C6C6;
        margin-top:-52px;
        margin-left: 1px;
        opacity:0.8;
    }
    .goods .a a:hover .b{
        display:block;

    }
</style>

<body background="image/bg.png">

<center><div class="goods" style="width: 70%;margin: 0 auto; background-color: aliceblue">
       <center><table border="0">

               <?php
               $i=0;
               while($row=$sql->fetch()){ ?>
                <td width="200px" style="padding: 10px">
                    <div class="a" style="width:200px;margin-top: 20px;">
                        <a href="shopping_informations.php?id=<?= $row["id"]?>">
                            <img src="<?= $row['loca']?>" height="250px" width="200px" style="border: 1px solid #D7D7D7;">
                        <div class="b">
                            <?= $row['price'] ?><?= $row['name'] ?></div>
                        </a>
                    </div>
               <?php

           $i=$i+1;
          if($i==4)
          {
              $i=0;
              echo "</tr><tr>";
          }
               }
?>


       </table></center>
        <div style="width: 70%;margin: 0 auto;height: 40px"><a href="shop.php">添加商品</a> </div>
        <div class="footer" style="width: 100%;height: 40px;line-height: 40px; background-color: #680001">
            <?php
            if($Page==1)
                echo "第一页  上一页";
            else echo "<a href='?page=1'>第一页</a> <a href='?page=". ($Page-1) ."'> 上一页 </a>";
            for($i=1;$i<=$pagecount;$i++){
                if($i==$Page) echo " $i ";
                else echo "<a href='?page=$i'> $i </a>";
            }
            if($Page==$pagecount)
                echo "下一页 末页";
            else echo "<a href='?page=". ($Page+1) . "'>下一页</a>
    <a href='?page=". $pagecount ."'>末页</a>";
            echo "&nbsp共" .$pagecount . "条记录&nbsp";
            echo "$Page / $pagecount 页";
            ?>

        </div>
    </div>

   </center>
</body>
</html>
