<?php
session_start();

$file_no = $_POST['file_no'];

// 세션에서 사용자 이름 가져오기
if (isset($_SESSION['student_name'])) {
    $comment_irum = $_SESSION['student_name'];
} else {
    echo "<script>alert('오류발생');history.back();</script>";
    exit();
}

$comment_content = $_POST['comment_content'];
$comment_regdate = date("y-m-d H:i:s");

$conn = mysqli_connect("localhost", "root", "", "website");

$query = "INSERT INTO comment2(post_id, irum, content, regdate) 
VALUES ('$file_no', '$comment_irum', '$comment_content', '$comment_regdate')";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("댓글 등록 실패");
}
header("Location: 자료실상세보기.php?file_no=$file_no");
exit();
?>