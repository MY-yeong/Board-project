<?php

include('./dbinit.php');

$username = $_POST['name'];
$userpw = $_POST['password'];
$title = $_POST['title'];
$content = $_POST['content'];


if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}




$file=$_FILES['b_file'];
$f= $file['name'];
//$tmp=$file['tmp_name'];
$path="./upload/";


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


if ($username && $title && $content){
    $query = "insert into board (name, pw, title,content,hit, lock_post,file) values ('$username', '$userpw','$title','$content',0,'$lo_post','$f')"; }
    if($result = mysqli_query($conn, $query)){
        while($row = mysqli_fetch_array ($result)){
            print_r($row);
        
        }
    }
    
?>