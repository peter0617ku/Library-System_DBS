<head>
    <title>增加書籍中...</title>
</head>
<font size='6'><div style="text-align:center">增加圖書中...</div></font>

<?php
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    $cc2 = !empty($_COOKIE['c2'])?$_COOKIE['c2']:NULL;
?>

<?php
    $name1 = !empty($_POST['name1'])?$_POST['name1']:NULL;
    $name2 = !empty($_POST['name2'])?$_POST['name2']:NULL;
    

    $query="select BID from book order by BID DESC LIMIT 1";
    $result=$pdo->query($query);
    $row=$result->fetch();
    $nextid=$row['BID'];
    $nextid=$nextid+1;


    echo "borrow=$cc2, $borrowtext";
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    
    $query1="insert into book(BID,Bname,category) values($nextid,'$name1','$name2')";
    $result=$pdo->exec($query1);

    echo "||test1:".$query1;
?>

<!--------------寄E-mail-------------->

<?php
$query="select * from person";
$result=$pdo->query($query);

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "465");
ini_set("sendmail_from", "peter0617ku@gmail.com");

while($row=$result->fetch())
{
    $to_email = $row['Email'];
    $subject = "【NEW!新書報報】資料庫系統圖書館";
    $body = "敬愛的讀者 ".$row['Pname']." 您好:\n\n新書好康報報\n本圖書系統新增書本--書名: $name1 (分類: $name2)\n敬請多加利用閱讀!!\n\n快樂閱讀，享受人生~~";
    $headers = "From: BDS Library";

    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
}
header("Refresh:0.5;url=bookmanage.php");
?>