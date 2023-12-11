<?php
$s_num = $_POST['num'];
$s_id = $_POST['id'];
$s_name = $_POST['name'];
$s_major = $_POST['major'];
$s_pwd = $_POST['pwd'];
$s_interest = $_POST['interest'];
$s_regdate = $_POST['regdate'];
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"website");
mysqli_query($conn,'set names utf8');


$chk_query = "select * from user where student_id = '$s_id'";
$chkid= mysqli_query($conn,$chk_query);

if(mysqli_num_rows($chkid)>0){
    echo "<script> alert('이미 존재하는 아이디입니다. 다른 아이디를 사용해주세요.');
    history.back();</script>";
}
else {
    $inrec = "insert into user values
    ('$s_num','$s_id','$s_pwd','$s_name','$s_major','$s_interest','$s_regdate')";
    
    $info = mysqli_query($conn,$inrec);
    if(!$info){
        die ("회원가입 실패. 다시 입력해 주세요.");
    }
    else echo "<script>alert('회원가입이 완료되었습니다.');</script>";
    
}

mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0 url=../home.php">
<!-- <a href="../home.php">처음으로 이동</a> -->