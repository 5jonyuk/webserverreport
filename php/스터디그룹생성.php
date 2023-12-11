<?php
$g_num = $_POST['g_num'];
$s_num = $_POST['s_num'];
$s_name = $_POST['s_name'];
$g_name = $_POST['g_name'];
$g_regdate = $_POST['regdate'];

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"website");

$chk_query = "select * from reg_sgroup where g_num = '$g_num'";
$info= mysqli_query($conn,$chk_query);

if(mysqli_num_rows($info)>0){
    echo "<script> alert('이미 그룹등록이 되어 있습니다.');
    history.back();</script>";
}
else {
    $chk_query2 = "insert into reg_sgroup values
    ('$s_num', '$s_name','$g_name','$g_num','$g_regdate')";
     $info2 = mysqli_query($conn,$chk_query2);

    if(!$info2){
        die ("그룹생성 실패. 다시 입력해 주세요.");
    }
    else
         echo "<script>alert('그룹생성이 완료되었습니다.');</script>";
    
}
$chk_query3 = "select * from reg_sgroup where g_name = '$g_name'";
$info3 = mysqli_query($conn,$chk_query3);

while ($i = mysqli_fetch_array($info3)){
    $c = $i['g_name'];
}
session_start();
    
$_SESSION['g_name']= $c;
?>

<meta http-equiv="refresh" content="0 url=../html/그룹로그인.html">
<!-- <a href="../home.php">처음으로 이동</a> -->