<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>그룹정보</title>
    <link rel="stylesheet" href="../css/그룹정보.css">
</head>
<body>
    <div class="group-info">
    <h1>그룹명단</h1>

<?php
session_start();
$conn=mysqli_connect("localhost","root","","website");


if(isset($_SESSION['g_name'])){
$query = "SELECT create_name from reg_sgroup where g_name='$_SESSION[g_name]'";
$info = mysqli_query($conn,$query);

if(!$info) die("정보를 불러올 수 없습니다.");
else{
    $groupLeader = mysqli_fetch_assoc($info);
    echo "그룹장: " . $groupLeader['create_name'] . "<br>";
}

$query2 = "SELECT ps_name from participants where pg_name='$_SESSION[g_name]'";
$info2 = mysqli_query($conn,$query2);

if(!$info2) die("정보를 불러올 수 없습니다.");
else {
    while ($participant = mysqli_fetch_assoc($info2)) {
        echo "참여자: " . $participant['ps_name'] . "<br>";
    }
}
}
?>
<p><a href="../home.php">홈으로</a></p>
</div>
</body>
</html>