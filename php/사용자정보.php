<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사용자정보</title>
    <link rel="stylesheet" href="../css/사용자정보.css">
</head>
<body>
    <div class="profile-info">
    <h1>사용자 정보</h1>
<?php
session_start();

$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"website");

if(isset($_SESSION['student_name'])){
    $query="SELECT * from user where student_name='$_SESSION[student_name]'";
    $info=mysqli_query($conn,$query);

    if(!$info){
        die("존재하지않습니다. <script>history.back();</script>");
    }
    else{
        while($i=mysqli_fetch_assoc($info)){
            echo "학번: ".$i['student_num']. "<br>";
            echo "이름: ".$i['student_name']. "<br>";
            echo "전공: ".$i['student_major']. "<br>";
            echo "흥미: ".$i['student_interest']. "<br>";
            echo "가입일: ".$i['student_regdate'];
        }
    }
}
?>
<p><a href="../html/정보수정.html">수정하기</a></p>
<p><a href="../home.php">홈으로</a></p>
</div>
</body>
</html>