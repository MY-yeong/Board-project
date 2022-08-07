<?php
 session_start();
?>
<?php
include('./dbinit.php');
$PW=$_POST['password'];
$NAME=$_POST['name'];
$GENDER=$_POST['gender'];
$BIRTHDAY=$_POST['birthday'];
$TEXT=$_POST['text'];

$ID=$_SESSION['userid'];


$query="update register set pw='$PW', name='$NAME', gender='$GENDER', birthday='$BIRTHDAY', text='$TEXT' where id='$ID'";

/*$query = "insert into register (id, pw, name, gender, birthday, text) values ('$ID', '$PW','$NAME','$GENDER','$BIRTHDAY','$TEXT')";*/
if($result = mysqli_query($conn, $query)){
        while($row = mysqli_fetch_array ($result)){
            print_r($row);
            echo "<br>";
        }
}



?>


<html>
        <head>
                <title> HTML TAG</title>
                <center>
                <h1><a href="./index.php"> <span style="font-size: 15px; font-style: italic ; font-weight: bold; ">돌아가기 </span> </a></h1>
</center>
                <meta charset="utf-8">
                <style>
                  table {
    width: 40%; height: 50%;
        border-right:none; border-left:none;
         border-bottom: 5px solid #466093;
         border-top: 5px solid #466093;
  }

   th, td {
    border: 1px solid #444444;
padding: 5px;
  }

   tbody tr:nth-child(n+2):nth-child(-n+7) {
    background-color: #C4DEFF ;
  }
  tbody tr:nth-child(1) {
    background-color: #8EA8DB;
  }
 tbody tr:nth-child(8) {
    background-color: #8EA8DB;
  }
  tbody tr:nth-child(9) {
    background-color: #C4DEFF;
  }
  </style>

        </head>
        <body>
        <form method="post" action="">
                <center>
                <table border="2" width="700px" height="300px">

                        <tr>
                                <td colspan="2" div style="text-align:center">
                                <span style="font-size: 18px; font-style: italic ; font-weight: bold; ">
                                회원가입
                                        </span> </td>

                                    
                        <tr>
                                <td div style="text-align:center">
                                <span style="font-size: 15px; font-style: italic ; font-weight: bold; ">이름 </span> </td>
                                <td> <input type="text" name="name"/><br> </td>


                        <tr>
                                <td div style="text-align:center">
                                <span style="font-size: 15px; font-style: italic ; font-weight: bold; "> 성별 </span>    </td>
                                <td> <input type="radio" name="gender" value="남"/> 남
                                        <input type="radio" name="gender" value="여"/> 여 <br> </td>

                        <tr>
                                <td div style="text-align:center">
                                <span style="font-size: 15px; font-style: italic ; font-weight: bold; "> 회원 ID </span>         </td>
                                <td> <?= $_SESSION['userid']?> <br>  </td>

                        <tr>
                                <td div style="text-align:center">
                                <span style="font-size: 15px; font-style: italic ; font-weight: bold; "> 비밀번호 </span>        </td>
                                <td> <input type="password" name="password"/> </td>


                        <tr>
                                <td div style="text-align:center">
                                <span style="font-size: 15px; font-style: italic ; font-weight: bold; "> 생일 </span>    </td>
                                <td> <input type="date" name="birthday">
                        
                        <tr>
                                <td colspan="2" div style="text-align:center">
                                <span style=" font-size: 18px; font-style: italic ; font-weight: bold; ">
                                자기소개
                                        </span> </td>

                        <tr>
                                <td colspan="2"> <textarea rows="10" cols="50" name="text" placeholder='1000자 이상 입력하세요.'></textarea>  </td>

                        <tr>
                      
                         <td colspan="2">    <button type="button" onclick="location.href='bye.php?idx=<?php echo $ID; ?>' ">탈퇴</button>
                         <input type="submit"> </td>
</center>
                        </form>
        </body>
</html>

