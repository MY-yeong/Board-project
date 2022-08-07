<?php
include('./dbinit.php');
$rno = $_POST['rno'];//댓글번호
$r="select * from reply where idx='".$rno."'";
$sql = mysqli_query($conn, $r); //reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['b_no']; //게시글 번호
$s="select * from board where idx='".$bno."'";
$sql2 = mysqli_query($conn, $s);//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$sq="update reply set content='".$_POST['content']."' where idx = '".$rno."'";
$sql3 = mysqli_query($conn, $sq);//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
?> 
<script type="text/javascript">alert('수정되었습니다.'); location.replace("read.php?idx=<?php echo $bno; ?>");</script>