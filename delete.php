<?php
	include('./dbinit.php');
	
	$bno = $_GET['idx'];
    $s="delete from board where idx='$bno';";
	$sql = mysqli_query($conn, $s);
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=./index.php" />