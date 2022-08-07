<?php
   include('./dbinit.php');
   session_start(); 
   $user=$_SESSION['userid'];


   if(isset($_POST['lockreply'])){
      $lo_reply = '1';
   }else{
      $lo_reply = '0';
   }


?>
<?php
$bno = $_GET['idx']; 
$is_count = false;



if (!isset($_COOKIE["board_{$bno}"])) {    
    setcookie("board_{$bno}", $bno, time() + 60*10*10);
      $b="select * from board where idx ='".$bno."'";
      $hit = mysqli_fetch_array(mysqli_query($conn, $b));
      $hit = $hit['hit'] + 1;
      $try=1;
}


      $f = "update board set hit = '".$hit."' where idx = '".$bno."'";
      $fet = mysqli_query($conn, $f);
      $sq = "select * from board where idx='".$bno."'"; 
      $sql = mysqli_query($conn, $sq);
      $board = $sql->fetch_array();
   ?>

<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./css/sty.css?after" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
<style>

      .a{
        font-family: 'Gowun Dodum', sans-serif;
        font-size: 15px;

      }

      .b{
        font-family: 'Gowun Dodum', sans-serif;
        border-bottom: solid 1px black;
      }

</style>

</head>
<body>

<div id="board_read">
   <h2  class="a" style="font-size: 35px"><?php echo $board['title']; ?></h2>
   <div id="user_info"  class="a" style="font-size: 20px">
         <?php echo $board['name']; ?> 조회:<?php echo $board['hit']; ?> 
         <div>
      파일 :  <a href="down.php?idx=<?php echo $board['idx']; ?>">
      <?php $bb="select * from board where idx='".$bno."'";
$sql = mysqli_query($conn, $bb); /* 받아온 idx값을 선택 */
$reply = $sql->fetch_array();
$bpw = $reply['file'];
echo $bpw; ?></a>
   </div>
         <div id="bo_line"></div>
      </div>
      <div id="bo_content"  class="a" style="font-size: 35px">
            <?php echo $board['content']; ?>
</div>

   <!-- 목록, 수정, 삭제 -->
   <div id="bo_ser">
      <ul><center>
         <button class="a" type="button" onclick="location.href='thumbup.php?idx=<?php echo $board['idx']; ?>' ">좋아요</button>
         <?php echo $board['thumbup'];?>
         <button class="a" type="button" onclick="location.href='thumbdown.php?idx=<?php echo $board['idx']; ?>' ">싫어요</button>
         <?php echo $board['thumbdown'];?>
         </center>
         <br><br>
         <a class="a" href="index.php">[목록으로]</a>
         <a class="a" href="dapgul.php?idx=<?php echo $board['idx']; ?>">[답글쓰기]</a> 
         <a class="a" href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a>
         <a class="a" href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a>

         
      </ul>
      </div>
</div>
<div id="reply_view">
   <br><br><br><br><br><br>
   <h3 class="a" style="font-size: 25px" >댓글목록</h3>
   
      <?php
     
     $user=$_SESSION['userid'];

     $s="select * from reply where con_num='".$bno."' order by idx desc";
     $sql3 = mysqli_query($conn, $s);
     $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/

     $rr="select * from reply where con_num='".$bno."'";
     $sqll = mysqli_query($conn, $rr); /* 받아온 idx값을 선택 */
     $reply = $sqll->fetch_array();
     $person=$reply['name'];
      
     $rrr="select * from board where idx='".$bno."'";
     $sqlll = mysqli_query($conn, $rrr); /* 받아온 idx값을 선택 */
     $reply = $sqlll->fetch_array();
     $pers=$reply['name'];

    // echo "세션아이디".$user;
    // echo "답글 아이디".$person;
    // echo "글쓴이".$pers;

$bb="select * from reply where con_num='".$bno."'";
$sql = mysqli_query($conn, $bb); /* 받아온 idx값을 선택 */
$reply = $sql->fetch_array();

$num=$reply['con_num'];
$numm=$reply['name'];
$nummm=$reply['lock_reply'];

echo $lock;
echo "lock".$lock; echo "num".$num; echo "bno".$bno; 
     while($reply = $sql3->fetch_array()){ 
      if(lock!=1){
      ?>
      <div class="a" style="font-size: 22px">
         <div><b><?php echo $reply['name'];?></b></div>
         <div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
         <div class="rep_me dap_to"></div>
       <a  class="a" style="font-size: 15px" href="ck_reply.php?idx=<?php echo $reply['idx']; ?>">[수정]</a>
       <a  class="a" style="font-size: 15px" href="reply_delete.php?idx=<?php echo $reply['idx']; ?>">[삭제]</a>
         <a  class="a" style="font-size: 15px" href="reply_again.php?idx=<?php echo $reply['idx']; ?>">[답글]</a>
         <a  class="a" style="font-size: 15px" href="777777.php?idx=<?php echo $reply['idx']; ?>">[답글]</a>


         <?php }
         else { ?>
              <div class="a" style="font-size: 22px">
         <div><b><?php echo $reply['name'];?></b></div>
         <div class="dap_to comt_edit"><?php echo "비밀댓글입니다."; ?></div>

<?php }}?>
         </div>
         
      
<br><br>
   <!--- 댓글 입력 폼 -->

   <div class="dap_ins">
      <form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
         <input type="text" name="dat_user" value=<?php echo $user; ?> size="15" placeholder="아이디"> <!---id, class 없앴음-->
         <input type="password" name="dat_pw" size="15" placeholder="비밀번호">
       <input type="checkbox"  name="lockreply" /> 
         <div style="margin-top:10px; ">
            <textarea name="content" class="reply_content" id="re_content" ></textarea>
            <button id="rep_bt" class="re_bt">댓글</button>
            </td>
         </div>
      </form>
   </div>
       
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>

</body>
</html>