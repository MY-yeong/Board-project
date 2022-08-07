<?php
	include('./dbinit.php');
    session_start(); 
    $user=$_SESSION['userid'];
    $bno = $_GET['idx'];
    $userpw = $_POST['dat_pw'];
    $content= $_POST['content'];  


    if(isset($_POST['lockreply'])){
        $lo_post = '1';
    }else{
        $lo_post = '0';
    }
  
    if ($user && $content){
        $q="insert into reply(con_num,name,pw,content,lock_reply) values('".$bno."','".$user."','".$userpw."','".$_POST['content']."','$lo_post')";
        $sql = mysqli_query($conn, $q);
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='./read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
?>