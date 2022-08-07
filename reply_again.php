<?php
   include('./dbinit.php');
   session_start(); 
   $user=$_SESSION['userid'];
   $bno = $_GET['idx'];
   echo $bno;
   ?>


<!doctype html>
<head>
</head>
<body>
<div class="dap_ins">
<form method="post" action="">
         <input type="text" name="dat_user" value=<?php echo $user; ?> size="15" placeholder="아이디"> <!---id, class 없앴음-->
         <input type="password" name="dat_pw" size="15" placeholder="비밀번호">
       <input type="checkbox" value="1" name="lockreply" /> 
         <div style="margin-top:10px; ">
            <textarea name="content" class="reply_content" id="re_content" ></textarea>
            <button id="rep_bt" class="re_bt">댓글</button>
         </div>
      </form>
   </div>
</body>
</html>