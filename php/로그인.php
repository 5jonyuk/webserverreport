<?php
$s_name = $_POST['name'];
$s_pwd = $_POST['pwd'];
$s_id = $_POST['id'];
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"website");
mysqli_query($conn,'set names utf8');

$sqlrec = "select * from user where (student_id='$s_id' and student_pwd='$s_pwd') and student_name = '$s_name'";
$info = mysqli_query($conn,$sqlrec);
if(mysqli_num_rows($info) == 0){
    echo "<script> alert('아이디 또는 비밀번호가 존재하지 않습니다.');
    history.back();</script>";
    exit;
}
while ($i = mysqli_fetch_array($info)){
    $b = $i['student_name'];
}

session_start();

$_SESSION['student_name']= $b;

?>

<meta http-equiv="refresh" content="1; url=../home.php">
