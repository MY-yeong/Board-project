<?php 
include('./dbinit.php');
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/sea.css" />
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
<!-- 18.10.11 검색 추가 -->
<?php
 
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>
  <h1 class="b" style="font-size: 40px"><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
  <h4 style="margin-top:30px;"><a href="./index.php">홈으로</a></h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70" class="b">번호</th>
                <th width="500" class="b">제목</th>
                <th width="120" class="b">글쓴이</th>
                <th width="100" class="b">조회수</th>
            </tr>
        </thead>
        <?php
        $m="select * from board where $catagory like '%$search_con%' order by idx desc";
          $sql2 = mysqli_query($conn, $m);
          while($board = $sql2->fetch_array()){
           
          $title=$board["title"]; 
            if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
            $mmm="select * from reply where con_num='".$board['idx']."'";
            $sql3 = mysqli_query($conn, $mmm);
            $rep_count = mysqli_num_rows($sql3);
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
            <?php 
              $lockimg = "<img src='./img/lock.png' alt='lock' title='lock' with='20' height='20' />";
              if($board['lock_post']=="1")
              { ?><a href='./ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
              }else{?>

        <!--- 추가부분 18.08.01 --->

        <!--- 추가부분 18.08.01 END -->
        <a class="b" href='./read.php?idx=<?php echo $board["idx"]; ?>'><span  class="b" style="background:yellow;"><?php echo $title; }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?> </span></a></td>
          <td  class="b" width="120"><?php echo $board['name']?></td>

        </tr>
      </tbody>

      <?php } ?>
    </table>
    <!-- 18.10.11 검색 추가 -->
    <div id="search_box2">

  </div>
</div>
</body>
</html>