<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

</head>
<body>

  일자: <input type="text" id="datepicker">    
    <script>
    $(function() {

        $("#datepicker").datepicker({
          showOn:"both"
          
        });
      });
    </script>
    <button id="setTodo">Submit</button>
    <div id="Body"></div>
    <ul class = "js-toDoList">
    </ul>

    <script src="datePicker.js"></script>
 




<!-- ----------여기는 학사공지크롤링--------- -->
<div id="haksanotice">
<?php
system("python haksa.py");
$base_address = "https://computer.cnu.ac.kr/computer/notice/bachelor.do";
$filename_href = "./haksa_href_data.txt";
$fp = fopen($filename_href, "r") or die('fail');
while(!feof($fp)){
    $read_title = fgets($fp);
    $read_href = fgets($fp);
    echo '<a href='.$base_address.$read_href.'>'.$read_title.'</a><br>';
}
fclose($fp);
?>
</div>
<!-- -----------------끝----------------- -->



<!-- ----------여기는 일반공지크롤링---------- -->
<div id="normalnotice">
<?php
system("python normal.py");
$base_address = "https://computer.cnu.ac.kr/computer/notice/notice.do";
$filename_href = "./normal_href_data.txt";
$fp = fopen($filename_href, "r") or die('fail');
while(!feof($fp)){
    $read_title = fgets($fp);
    $read_href = fgets($fp);
    echo '<a href='.$base_address.$read_href.'>'.$read_title.'</a><br>';
}
fclose($fp);
?>
</div>
<!-- -----------------끝----------------- -->



<!-- -----------------여기는 사업단소식 크롤링----------------- -->
<div id="saupnotice">
<?php
system("python saup.py");
$base_address = "https://computer.cnu.ac.kr/computer/notice/project.do";
$filename_href = "./saup_href_data.txt";
$fp = fopen($filename_href, "r") or die('fail');
while(!feof($fp)){
    $read_title = fgets($fp);
    $read_href = fgets($fp);
    echo '<a href='.$base_address.$read_href.'>'.$read_title.'</a><br>';
}
fclose($fp);
?>
</div>
<!-- -----------------끝----------------- -->



<!-- -----------------여기는 새소식알림----------------- -->
<div id="alertnotice">
<?php
system("python new_notice.py");
$filename_notice = "./new_data.txt";
$fp = fopen($filename_notice, "r") or die('fail');
$trash = fgets($fp);
$trash = fgets($fp);
$trash = fgets($fp);
$read_data = fgets($fp);
echo '<p>'.$read_data.'</p>';
$read_data = fgets($fp);
echo '<p>'.$read_data.'</p>';
$read_data = fgets($fp);
echo '<p>'.$read_data.'</p>';
fclose($fp);
?>
</div>
<!-- -----------------끝----------------- -->

<script src="./calendar.js"></script>
</body>
</html>
