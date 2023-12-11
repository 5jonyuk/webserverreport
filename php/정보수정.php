<?php
session_start();

$m_major=$_POST['m_major'];
$m_interest=$_POST['m_interest'];
$conn=mysqli_connect("localhost","root","","website");

if (isset($_SESSION['student_name'])) {
    // 전공 수정 (만약 $m_major가 비어있지 않으면 실행)
    if (!empty($m_major)) {
        $query = "UPDATE user SET student_major = '$m_major' WHERE student_name = '$_SESSION[student_name]'";
        $info = mysqli_query($conn, $query);

        if (!$info) {
            die("전공 수정 중 오류 발생: " . mysqli_error($conn));
        }
        else{
            echo "수정되었습니다."."<br>";
            echo "<a href='사용자정보.php'>돌아가기</a>";
        }
    }
    // 흥미 추가 (만약 $m_interest가 비어있지 않으면 실행)
    if (!empty($m_interest)) {
        $query2 = "UPDATE user SET student_interest = '$m_interest' WHERE student_name = '$_SESSION[student_name]'";
        $info2 = mysqli_query($conn, $query2);

        if (!$info2) {
            die("흥미 추가 중 오류 발생: " . mysqli_error($conn));
        }
        else{
            echo "수정되었습니다."."<br>";
            echo "<a href='사용자정보.php'>돌아가기</a>";
        }
    }
}
    


?>