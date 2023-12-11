<?php
$pg_num = $_POST['pg_num'];
$pg_name = $_POST['pg_name'];
$ps_num = $_POST['ps_num'];
$ps_name = $_POST['ps_name'];
$pg_regdate = $_POST['p_regdate'];

$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"website");
mysqli_query($conn,'set names utf8');

$chk_query1 = "select * from reg_sgroup where g_num = '$pg_num'";
$info1 = mysqli_query($conn,$chk_query1);
if(mysqli_num_rows($info1) == 0){
    echo "<script> alert('그룹이 존재하지 않습니다. 그룹번호를 다시 입력해주세요.');
    history.back();</script>";
    exit;
}
else{
    $chk_query2 = "insert into participants values('$pg_num','$ps_name','$ps_num','$pg_regdate','$pg_name')";
    $info2 = mysqli_query($conn,$chk_query2);

    $chk_query3 = "select * from participants where pg_name = '$pg_name' and pg_num = '$pg_num'";
    $info3 = mysqli_query($conn,$chk_query3);

    if(!$info2){ 
        echo "<script> alert('다시 입력해주세요.'); history.back();</script>";
    }
 }
?>

<meta http-equiv="refresh" content="1; url=../home.php">
