<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>청학동 게시판 홈페이지</title>
    <link rel="stylesheet" href="css/home.css" />
  </head>
  <body>
    <h1>청학동 게시판 홈페이지</h1>
    <div>
      <ul>
        <?php
        
        if(isset($_SESSION['student_name'])){
         echo "<li><a href='php/자유게시판.php'>자유게시판</a></li>";
         echo "<li><a href='php/자료실.php'>자료실</a></li>";
        }
        else {
          echo "<li><a href='#' id='loginlink'>자유게시판</a></li>";
          echo "<script>
            document.getElementById('loginlink').onclick = function() {
            showAlert();
            };
            function showAlert() {
              alert('로그인해서 사용해주세요');
            }
            </script>";
          echo "<li><a href='#' id='loginlink2'>자료실</a></li>";
          echo "<script>
            document.getElementById('loginlink2').onclick = function() {
            showAlert();
            };
            function showAlert() {
              alert('로그인해서 사용해주세요');
            }
            </script>";
        }
        ?>

        <?php
        if (isset($_SESSION['student_name']) && isset($_SESSION['g_name'])) {
          $studentName = $_SESSION['student_name'];
          $groupName = $_SESSION['g_name'];
          // 로그인 상태(스더디그룹 가입(o)) --> 그룹장
          echo "<li><a href='php/그룹정보.php'>$groupName</a></li>";
          echo "<li><a href='php/사용자정보.php'>$studentName</a></li>";
          echo "<li><a href='php/로그아웃.php'>로그아웃</a></li>";
        }
        else if (isset($_SESSION['student_name']) && isset($_SESSION['pg_name'])) {
          $studentName = $_SESSION['student_name'];
          $pgroupName = $_SESSION['pg_name'];
          // 로그인 상태(스더디그룹 가입(o)) --> 그룹원
          echo "<li><a href='php/그룹정보.php'>$pgroupName</a></li>";
          echo "<li><a href='php/사용자정보.php'>$studentName</a></li>";
          echo "<li><a href='php/로그아웃.php'>로그아웃</a></li>";
        }
        else if(isset($_SESSION['student_name'])) {
          $studentName = $_SESSION['student_name'];
          // 로그인 상태(스더디그룹 가입(x))
          echo "<li><a href='html/그룹로그인.html'>스터디그룹</a></li>";
          echo "<li><a href='php/사용자정보.php'>$studentName</a></li>";
          echo "<li><a href='php/로그아웃.php'>로그아웃</a></li>";
        }
         else {
          // 로그아웃 상태
          echo "<li><a href='html/로그인.html'>로그인</a></li>";
          echo "<li><a href='html/회원가입.html'>회원가입</a></li>";
        }
        
        ?>
      </ul>
    </div>
  </body>
</html>
