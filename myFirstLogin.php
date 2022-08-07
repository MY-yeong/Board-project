<?php
session_start();

$connect = mysqli_connect("localhost", "minyeong3", "2022Wnsldj!", "minyeong3" );

$input_id=$_POST['id'];
$input_pw=$_POST['pw'];


$_SESSION['userid'] = $input_id;


$query="select * from register where id='$input_id'";
$result=$connect ->query($query);

if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);

    if($row['pw']==$input_pw){
        $_SESSION['userid']=$input_id;
        if(isset($_SESSION['userid'])){
          ?>  <script> alert('로그인 성공!');
            location.href = "index.php";
            </script>  <?php
        } else{
            echo "<script>alert('로그인 실패!');
            location.href='./myFirstWeb.php';</script>";
        }
    } else{
        echo "<script>alert('로그인 실패!');
        location.href='./myFirstWeb.php';</script>";
    }
} else {
    echo "<script>alert('로그인 실패!');
    location.href='./myFirstWeb.php';</script>";
}


?>