<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "website");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $irum = $_POST['irum'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 파일 업로드 처리
    $uploadDir = "../uploads";  // 업로드된 파일을 저장할 디렉토리 경로
    $uploadFile = $uploadDir . basename($_FILES['upload_file']['name']);

    if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadFile)) {
        // 파일 업로드 성공 시 데이터베이스에 파일 정보 저장
        $file_name = $_FILES['upload_file']['name'];
        $file_path = $uploadFile;
        $file_size = $_FILES['upload_file']['size'];

        $insertQuery = "INSERT INTO file (title, irum, content, file_path, file_name, file_size, regdate, hits)
                        VALUES ('$title', '$irum', '$content', '$file_path', '$file_name', $file_size, NOW(), 0)";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo "파일이 성공적으로 업로드되었습니다.";
        } else {
            echo "파일 업로드에 실패하였습니다.";
        }
    } else {
        echo "파일 업로드에 실패하였습니다.";
    }
}
?>
<p><a href="자료실.php">글목록으로</a></p>