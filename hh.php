<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--以下为接收数据代码-->
<?php
$tem = $_GET["tem"];
$hum = $_GET["hum"];
$lit = $_GET["lux"];
$conn = @mysql_connect('127.0.0.1', 'root', '215995');   //链接服务器
if (!$conn) {
    die("failed");
}
else print_r('success');
@mysql_query("SET NAMES UTF8");
@mysql_select_db('istation', $conn) or die("cannot find");             //选择数据库
if(empty($tem)||empty($hum)||empty($lit))
{
    $result= @mysql_query('SELECT * FROM istationdata ORDER BY did DESC LIMIT 0,1',$conn);
    $result_arr= @mysql_fetch_assoc($result);
    $tem_new=$result_arr['tem'];
    $hum_new=$result_arr['hum'];
    $lit_new=$result_arr['lit'];
    $insert="insert into istationdata(tem,hum,lit) VALUES ('$tem_new','$hum_new','$lit_new')";

}
else{
    $insert="insert into istationdata (tem,hum,lit) VALUES ('$tem','$hum','$lit')";}
@mysql_query($insert,$conn);
?>
</body>
</html>
