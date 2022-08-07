<?php
include('./dbinit.php');
$bno = $_GET['idx'];


$m="select thread, depth from board where idx='$bno'";


$thread_result=mysqli_query($conn, $m);
$thread_fetch=mysqli_fetch_array($thread_result);

//print_r($thread_fetch);

$max_thread=$thread_fetch['thread']-100;
$dapth=$thread_fetch['depth'];
$dapth2=$dapth+1;

echo "max:".$max_thread;
echo "d:".$dapth2;

$username = $_POST['name'];
$userpw = $_POST['password'];
$title = 'ㄴ'.$bno.'번'.'답글';
$content = $_POST['content'];


$file=$_FILES['b_file'];
$f= $file['name'];
//$tmp=$file['tmp_name'];
$path="./upload/";


if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}




if($username && $title && $content){
    if(move_uploaded_file($file['tmp_name'],$path.$file['name'])){
      echo "<script>alert('글이 작성되었습니다.'); 
       location.href='./index.php';</script>";
    }
    else {
     echo "<script>alert('글이 작성되었습니다.'); 
    location.href='./index.php';</script>";
    }
}

echo $thread;
echo $depth;

echo $title;
echo $content;
echo $max_thread;

if ($username && $title && $content){

    $query = "insert into board (name, pw, title, content,hit, lock_post,file, thread, depth) values ('$username', '$userpw','$title','$content','0','$lo_post','$f', '$max_thread','$bno')"; }
    
    if($result = mysqli_query($conn, $query)){
        while($row = mysqli_fetch_array ($result)){
            print_r($row);
        
        }
    }
    
?>

