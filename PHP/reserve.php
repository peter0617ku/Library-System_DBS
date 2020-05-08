<head>
    <title>圖書預約中...</title>
</head>
<style>
.Bbutton {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 3px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.Bbutton3 {
  background-color: black; 
  color: white; 
  border: 2px solid black;
}

.Bbutton3:hover {
  background-color: white;
  color: black;
}
.Bbutton4 {
  background-color: dimgray; 
  color: white; 
  border: 2px solid dimgray;
}

.Bbutton4:hover {
  background-color: white;
  color: black;
  border: 2px solid black;
}
</style>

<font size='6'><div style="text-align:center">書籍預約中...</div></font>

<?php
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    $cc2 = !empty($_COOKIE['c2'])?$_COOKIE['c2']:NULL;
?>

<?php
    $reservetext = !empty($_GET['reservetext'])?$_GET['reservetext']:NULL;
    
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    
    $query2="select * from book where BID=".$reservetext; 
    #echo "reservetext=".$reservetext.'<br>';
    #echo "query2=".$query2.'<br>';
    $result=$pdo->query($query2);
    $row=$result->fetch();
    $bperson=$row['PID'];
    
    #echo "reserve=$cc2, $bperson";

    if($bperson!=$cc2)
    {
        $query1="insert into reserve(PID,BID,ordertime) values($cc2,$reservetext,'".date("Y-m-d G:i:s")."')";
        $result=$pdo->exec($query1);
		#####################Send Email############################
		$query3="select * from person where PID=".$bperson;
		$result1=$pdo->query($query3);
		$row1=$result1->fetch();

		$to_email = $row1['Email'];
		$subject = "【還書提醒】資料庫系統圖書館";
		$body = "敬愛的讀者 ".$row1['Pname']." 您好:\n\n您借閱的書籍 (書名: ".$row['Bname'].")已被其他使用者預約，\n若您已使用完此本書籍，\n敬請盡速歸還書籍，\n謝謝您的合作\n\n快樂閱讀，享受人生~~";
		$headers = "From: BDS Library";

		if (mail($to_email, $subject, $body, $headers)) {
			echo "Email successfully sent to $to_email...";
		} else {
			echo "Email sending failed...";
		}
		#################################################
        header("Refresh:0.5;url=bookquery1.php");
    }
    else
    {
        echo "<center><br><br><font size='6'>您已借閱此本圖書!</font><br>";
        echo "<center><font size='5'>(2秒後自動返回上一頁...)</font><br>";
        
        
        echo "<a href='bookquery1.php' class='Bbutton Bbutton3'>確定</a></center>";
        header("Refresh:2;url=bookquery1.php");
    }
    #echo "||test1:".$query1;

	

?>