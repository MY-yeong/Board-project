<?php
    include('./dbinit.php');
   
	$bno = $_GET['idx'];
    echo "$bno";

    $query= "update board set thumbdown=board.thumbdown + 1 where idx='$bno'";

    if($result = mysqli_query($conn, $query)){
        while($row = mysqli_fetch_array ($result)){
            print_r($row);
            echo "<br>";
        }
    }
    ?>

    <script type="text/javascript">alert("반대하였습니다.");</script>
    <meta http-equiv="refresh" content="0 url=./read.php?idx=<?php echo $bno; ?>" />