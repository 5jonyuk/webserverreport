<?php
$g_name = $_POST['g_name'];
$g_num = $_POST['g_num'];
$conn=mysqli_connect("localhost","root","","website");

$sqlrec = "select * from reg_sgroup where g_name= '$g_name' and g_num= '$g_num'"; 
$info = mysqli_query($conn,$sqlrec);
if(mysqli_num_rows($info) == 0){
    echo "<script> alert('그룹이 존재하지 않습니다.');
    history.back();</script>";
    exit;
}
while ($i = mysqli_fetch_array($info)){
    $b = $i['g_name'];
}

session_start();

$_SESSION['g_name']= $b;

?>

<meta http-equiv="refresh" content="1; url=../home.php">
