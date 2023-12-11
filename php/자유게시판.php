<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="../css/자유게시판p.css">
</head>
<body>
    <h1>청학동 자유 게시판 </h1>
<table>
    <tr>
  <th>NO</th><th>제목</th><th>작성자</th><th>작성일</th><th>조회</th>
  </tr>
<?php
$conn = mysqli_connect("localhost","root","","website");

if(empty($_GET['page'])){$page=1;}
else
{$page=$_GET['page'];}
$line_page=5;
$block_page=3;
$query="select * from board";
$result=mysqli_query($conn,$query);
$totrow=mysqli_num_rows($result);
$totpage=ceil($totrow/$line_page);
$totblock=ceil($totpage/$block_page);
$cblock=ceil($page/$block_page);
$frow=($page-1)*$line_page;

$selrec="select * from board order by no desc limit $frow,$line_page";
$info=mysqli_query($conn,$selrec);
while($rowinfo = mysqli_fetch_array($info))
{
    echo "<tr>";
    echo "<td>$rowinfo[no]</td>";
    echo "<td><a href='자유게시판상세보기.php?no=$rowinfo[no]'>$rowinfo[title]</a></td>";
    echo "<td>$rowinfo[irum]</td>";
    echo "<td>$rowinfo[regdate]</td>";
    echo "<td>$rowinfo[hits]</td>";
    echo "</tr>";
}
mysqli_close($conn);
?>
</table>
</body>
<?php
// 페이지 블럭 설정과 링크 작업 코드 추가
$fpage=(($cblock-1)*$block_page)+1;
$lpage=min($totpage,$cblock*$block_page);
if($cblock>1)
{
   $prvblock=($cblock-1)*$block_page;
   echo "<a href='자유게시판.php?page=$prvblock'>◀이전</a>";
}
for($i=$fpage;$i<=$lpage;$i++)
{
	if($i==$page) echo "<b>[$i]</b>";
	else  echo "<a href='자유게시판.php?page=$i'>[$i]</a>";
}
if($cblock<$totblock)
{
	$nxtblock=($cblock+1)*$block_page;
	echo "<a href='자유게시판.php?page=$nxtblock'>다음▶</a>";
}
?>
<p><a class="button" href="../html/자유게시판.html">글쓰기</a></p>
<p><a class="home" href="../home.php">홈으로</a></p>
</html>
