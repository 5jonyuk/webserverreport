<?php
$irum = $_POST['irum'];
$pwd = $_POST['pwd'];
$title = $_POST['title'];
$content = $_POST['content'];
$regdate = date("y-m-d H:i:s");
$conn = mysqli_connect("localhost","root","","website");

$query  = "insert into board(irum, pwd, title, contents, regdate, hits)values('$irum','$pwd',
'$title','$content','$regdate',0)";

$info = mysqli_query($conn, $query);

if(!$info){
    die("글 등록실패");
}
else echo "작성하신 글이 등록되었습니다.<br>";
mysqli_close($conn);
?>
<a href="자유게시판.php">글목록으로</a>