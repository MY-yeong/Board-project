<?php
	include('./dbinit.php');
	session_start(); 
	$user=$_SESSION['userid'];
	$bno = $_GET['idx'];


$bb="select * from reply where idx='".$bno."'";
$sql = mysqli_query($conn, $bb); /* 받아온 idx값을 선택 */
$reply = $sql->fetch_array();
$bpw = $reply['name'];
$num = $reply['con_num'];


	if($bpw==$user){
    $s="delete from reply where idx='$bno';";
	$sql = mysqli_query($conn, $s);
	}
	else{
		echo "<script>alert('삭제할 권한이 없습니다.'); 
		location.href='read.php?idx=$num';</script>";; 
	}
?>
<script type="text/javascript">alert('삭제되었습니다.'); 
location.replace("read.php?idx=<?php echo $num; ?>");</script>


