<?php
include('./dbinit.php');
   
	$bno = $_GET['idx'];
    $s="select * from board where idx='$bno';";
	$sql = mysqli_query($conn, $s);
	$board = $sql->fetch_array();



$username = $_POST['name'];
$userpw = $_POST['password'];
$title = $_POST['title'];
$content = $_POST['content'];

if ($username && $userpw && title && $content){
$sss="update board set name='".$username."',pw='".$userpw."',title='".$title."',content='".$content."' where idx='".$bno."'";
$sqll = mysqli_query($conn, $sss); 
echo "<script>
alert('글쓰기 완료되었습니다.');
location.href='./index.php';</script>";
}

?>


 <!doctype html>
<head>
<meta charset="UTF-8">
<style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
    </style>
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
        <h1><a href="./index.php">자유게시판</a></h1>
                <form method="post" action="">
                <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                       <tr>
                        <td> 제목 <input type="text" name="title"/><br></td>
                        </tr>

                         <tr>
                        <td> 글쓴이 <input type="text" name="name"/><br></td>
                        </tr>
   
                         <tr>
                        <td> <textarea rows="10" cols="50" name="content" placeholder='1000자 이상 입력하세요.'></textarea>
                        </tr>

                        <tr>
                    <td> 비밀번호 <input type="password" name="password"/> </td>
                        </tr>
                </table>
                <center>
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" value="작성">
                    </center>
              </td>
          </tr>
     </table>
    </form>
    </body>
</html>