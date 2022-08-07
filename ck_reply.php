<?php
include('./dbinit.php');

$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$bb="select * from reply where idx='".$bno."'";
$sql = mysqli_query($conn, $bb); /* 받아온 idx값을 선택 */
$reply = $sql->fetch_array();

?>
<div id='writepass'>
	<form action="" method="post">
 		<p>비밀번호<input type="password" name="pw_chk" /> <input type="submit" value="확인" /></p>
 	</form>
</div>
	 <?php
	 	$bpw = $reply['pw'];
      
	 	if(isset($_POST['pw_chk'])) //만약 pw_chk POST값이 있다면
	 	{
	 		$pwk = $_POST['pw_chk']; // $pwk변수에 POST값으로 받은 pw_chk를 넣습니다.
			if($pwk==$bpw) //다시 if문으로 DB의 pw와 입력하여 받아온 bpw와 값이 같은지 비교를 하고
			{
				$pwk == $bpw;
			?>
				<script type="text/javascript">location.replace("./modify_reply.php?idx=<?php echo $reply["idx"]; ?>");</script><!-- pwk와 bpw값이 같으면 read.php로 보내고 -->
			<?php 
			}else{ ?>
				<script type="text/javascript">alert('비밀번호가 틀립니다');</script><!--- 아니면 비밀번호가 틀리다는 메시지를 보여줍니다 -->
			<?php } } ?>