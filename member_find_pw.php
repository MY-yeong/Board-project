<?php
include('./dbinit.php');
	$userid = $_POST['userid'];

	$mm="select * from register where id='$userid'";
$sql = mysqli_query($conn, $mm);
$result = $sql->fetch_array();

if($result["id"] == $userid){
	$_SESSION['userid'] = $userid;
	echo "<script>alert('회원님의 비밀번호는 ".$result['pw']."입니다.'); 
	location.href='./myFirstWeb.php';</script>";

}else{
	echo "<script>alert('없는 계정입니다.'); 
	location.href='./myFirstWeb.php';</script>";
}
?>