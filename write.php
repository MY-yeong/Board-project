<?php
   include('./dbinit.php');
   session_start(); 
   $user=$_SESSION['userid'];

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
            border-bottom: 10px solid #ccc;
        }

        table.table2 td {
            width: 200px;
            padding: 40px;
            vertical-align: top;
            border-bottom: 3px solid #ccc;
        }
        .a{
        font-family: 'Gowun Dodum', sans-serif;
        font-size: 15px;

      }

      .b{
        font-family: 'Gowun Dodum', sans-serif;
        border-bottom: solid 1px black;
      }

    </style>
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" /><link rel="stylesheet" type="text/css" href="./css/sty.css?after" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">

</head>
<body><center>
        <h1><a class="a" style="font-size: 35px" href="./index.php">자유게시판</a></h1>
    </center>
             <form method="post" action="write_ok.php" enctype="multipart/form-data">
                <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#BBDEFB">
                    <p a class="a" style="font-size:25px; text-align:center; color:black; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                       <tr>
                        <td a class="a" style="font-size: 20px"> 제목 <input type="text" name="title"/><br></td>
                        </tr>

                         <tr>
                        <td  a class="a" style="font-size: 20px"> 글쓴이 <input type="text" name="name" value=<?php echo $user; ?> /><br></td>
                        </tr>
   
                         <tr>
                        <td> <textarea rows="10" cols="50" name="content" placeholder='1000자 이상 입력하세요.'></textarea>
                        </tr>

                        <tr>
                    <td  a class="a" style="font-size: 20px"> 비밀번호 <input type="password" name="password"/> 
                                <input type="checkbox" value="1" name="lockpost" /> </td>
                        </tr>
                 
                        <div id="in_file">
                        <input type="file" name="b_file" a class="a" style="font-size: 20px" />
                    </div>

                </table>
                <center>
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" value="submit">
                    </center>
              </td>
          </tr>
     </table>
    </form>
    </body>
</html>