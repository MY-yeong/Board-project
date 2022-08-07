<?php
// $idx = $_GET["idx"]

session_start();
$ID=$_SESSION['userid'];
echo $ID;

/*  DB 접속 */
include('./dbinit.php');


/* 쿼리 작성 */
$sql = "delete from register where id='$ID';";


mysqli_query($conn, $sql);


/* 세션 삭제 */
unset($_SESSION['userid']);

mysqli_close($conn);


echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"./myFirstWeb.php\";
    </script>
";
?>