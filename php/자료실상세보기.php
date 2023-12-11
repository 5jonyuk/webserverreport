<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자료실 상세보기</title>
    <link rel="stylesheet" href="../css/자료실d.css">
</head>
<body>

<?php
session_start();
$no=isset($_GET['file_no']) ? $_GET['file_no'] : ''; // 수정된 부분
$conn=mysqli_connect("localhost","root","","website");

$query="select * from file where file_no='$no'";
$info=mysqli_query($conn,$query);

if(!$info) die("조회결과 없습니다.");
else $data = mysqli_fetch_array($info);

if (!$data) {
    die("게시글이 없습니다.");
}
?>

<form>
<div>작성자<input type="text" name="irum" value="<?=$data['irum']?>"></div>
<div>글제목<input type="text" name="title" value="<?=$data['title']?>"></div>
<div>
    <img src="<?= $data['file_path'] ?>" alt="<?= $data['file_name'] ?>" width="300">
</div>
<div>설명</div>
<textarea name="contents" cols=70 rows=15><?=$data['content']?></textarea>
</form>

<?php

echo "<h3>댓글 작성</h3>";
echo "<form action='자료실댓글.php' method='post'>";
echo "<input type='hidden' name='file_no' value='{$data['file_no']}' />";

if (isset($_SESSION['student_name'])) {
    $comment_irum = $_SESSION['student_name'];
    echo "<div>작성자<input type='text' name='comment_irum' value='$comment_irum' readonly></div>";
    echo "<p>";
} else {
    echo "<div>작성자<input type='text' name='comment_irum' required></div>";
}

echo "<div id='comment'>댓글 내용<textarea name='comment_content' cols='30' required></textarea></div>";
echo "<input type='submit' value='댓글 등록' />";
echo "</form>";

$query = "SELECT * FROM comment2 WHERE post_id = {$data['file_no']} ORDER BY regdate DESC";
$result = mysqli_query($conn, $query);

echo "<h3>댓글</h3>";
echo "<form>";
while ($comment = mysqli_fetch_array($result)) {
    echo "<div>";
    echo "<p><strong>{$comment['irum']}</strong> - {$comment['regdate']}</p>";
    echo "<p>{$comment['content']}</p>";
    echo "</div>";
    echo "<hr>";
}
echo "</form>";

$uprec="update file set hits=hits+1 where file_no='{$data['file_no']}'";
$info2=mysqli_query($conn,$uprec);
?>
<p><a href="../php/자료실.php">목록으로 이동</a></p>

</body>
</html>