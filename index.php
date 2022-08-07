<?php 
include('./dbinit.php');

session_start(); 
if(!isset($_SESSION['userid'])){
  ?>  <script> alert('로그인 해주세요!');
    location.href = "myFirstWeb.php";
    </script>  <?php
}

 ?>


<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./css/style.css?after"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
<style>
      .a {
        background-color: #BBDEFB;
        font-family: 'Gowun Dodum', sans-serif;
      }
      .b {
        font-family: 'Gowun Dodum', sans-serif;
        font-size: 20px
      }


      

</style>


</head>
<body>
<div id="board_area"> 
  <h1 class="a" style="font-size: 40px"> 자유게시판</h1>
  <li><a href="./logout.php" > <span class="b" style="font-size: 20px;"> 로그아웃</span> </a></li>
  <li><a href="./update.php"> <span class="b"style="font-size: 20px;">  회원정보 수정 </span> </a></li>

  <div id="search_box">
    <form action="./search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>

    </form>
    </div>

    <table class="list-table">
          <tr>
      
              <th width="70" class="b">번호</th>
                <th width="500" class="b">제목</th>
                <th width="120" class="b">글쓴이</th>
                <th width="100" class="b">조회수</th> 
            </tr>
            <?php
                        $mmm="select * from reply where con_num='".$board['idx']."'";
                        $sql3 = mysqli_query($conn, $mmm);
                        $rep_count = mysqli_num_rows($sql3);

         if(isset($_GET['page'])){
          $page = $_GET['page'];
            }else{
              $page = 1;
            }
              $mmm="select * from board";
              $sql = mysqli_query($conn, $mmm);
              $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
              $list = 10; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

              $mqq="select * from board order by idx desc, thread asc limit $start_num, $list";
              $sql2 = mysqli_query($conn, $mqq);  
              while($board = $sql2->fetch_array()){
              $title=$board["title"]; 
                if(strlen($title)>30)
                { 
                  $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                }
                $mi="select * from reply where con_num='".$board['idx']."'";
                $sql3 = mysqli_query($conn, $mi);
                $rep_count = mysqli_num_rows($sql3);
              ?>
        <tr>
          <td class="b"  style="font-size: 20px;" width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
          <?php 
        $lockimg = "<img src='./img/lock.png' alt='lock' title='lock' with='20' height='20' />";
        if($board['lock_post']=="1")
          { ?><a  class="b" style="font-size: 20px;" href='./ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
            }else{  ?>  
          
          <a  class="b" href="./read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;}?>[<?php echo $rep_count;?>]</a></td>
          <td width="120"  class="b" style="font-size: 20px;" ><?php echo $board['name']?></td>
          <td width="100"  class="b" style="font-size: 20px;"><?php echo $board['hit']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <div id="page_num">
      <ul>
        <?php

        
          if($page <= 1)
          {
            echo "<li class='fo_re'>처음</li>"; 
          }else{
            echo "<li><a href='?page=1'>처음</a></li>"; 
          }
          if($page <= 1)
          { 
            
          }else{
          $pre = $page-1; 
            echo "<li><a href='?page=$pre'>이전</a></li>"; 
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            if($page == $i){ 
              echo "<li class='fo_re'>[$i]</li>"; 
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; 
            }
          }
          if($block_num >= $total_block){ 
          }else{
            $next = $page + 1; 
            echo "<li><a href='?page=$next'>다음</a></li>";
          }
          if($page >= $total_page){ 
            echo "<li class='fo_re'>마지막</li>"; 
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>"; 
          }
        ?>
      </ul>
    </div>

    <div id="write_btn">
      <a href="./write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>