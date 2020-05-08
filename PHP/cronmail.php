<?php
	#header("Content-Type:text/html; charset=utf-8");

	$cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
	$re=0;
	ini_set("SMTP", "smtp.gmail.com");
	ini_set("smtp_port", "465");
	ini_set("sendmail_from", "peter0617ku@gmail.com");

	$pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
	$query="select * from book";
	$result=$pdo->query($query);
	
	$d1=new DATETIME('NOW');
    $d1->add(new DateInterval('PT6H')); #add 8 Hours
	
	while($row=$result->fetch())
	{
		if( ($row['duedate']!=NULL) && (strtotime($d1->format('Y-m-d G:i:s'))>strtotime($row['duedate'])) )
		{
			$re=1;
			
			$query1="select * from person where PID=".$row['PID'];
			$result1=$pdo->query($query1);
			$row1=$result1->fetch();
			
			$to_email = $row1['Email'];
			$subject = " (資料庫系統圖書管理系統) 未歸還圖書提醒";
			$body = "親愛的讀者 ".$row1['Pname']." 您好:\n您有一本圖書 (".$row['Bname'].") 逾期未歸還，\n請您盡速將圖書歸還，\n感謝您的配合與支持!!\n\n資料庫系統圖書管理系統 敬上";
			$headers = "From: BDS Library";

			if (mail($to_email, $subject, $body, $headers)) {
				echo "Email successfully sent to $to_email...";
			} else {
				echo "Email sending failed...";
			}
		}
	}
	if($re==0)
	{
		$to_email = "peter0617ku@gmail.com";
		$subject = 'No record';
		$body = "目前沒有讀者未歸還書而逾期紀錄";
		$headers = "From: super star";

		if (mail($to_email, $subject, $body, $headers)) {
			echo "Email successfully sent to $to_email...";
		} else {
			echo "Email sending failed...";
		}		
	}
?>