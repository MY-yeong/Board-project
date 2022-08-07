<?php

   include('./dbinit.php');
   session_start(); 
   $user=$_SESSION['userid'];
$bno = $_GET['idx'];


$bb="select * from board where idx='".$bno."'";
$sql = mysqli_query($conn, $bb); /* 받아온 idx값을 선택 */
$reply = $sql->fetch_array();
$bpw = $reply['file'];


$path = "./upload/$bpw";
$file_size = filesize($path);

header("Pragma: public");
header("expires: 0");
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$file_size);
header("Content-Disposition: attachment; filename=\"$bpw\"");

ob_clean();
flush();
readfile($path);
?>
