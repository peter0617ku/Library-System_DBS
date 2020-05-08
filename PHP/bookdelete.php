<head>
    <title>書籍刪除中...</title>
</head>
<font size='6'><div style="text-align:center">書籍刪除中...</div></font>

<?php
    #$pdo = new PDO("mysql:host=localhost;dbname=t1", 'root', ''); 
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    $cc2 = !empty($_COOKIE['c2'])?$_COOKIE['c2']:NULL;
?>

<?php
    $deletetext = !empty($_GET['deletetext'])?$_GET['deletetext']:NULL;
    
    echo "borrow=$cc2, $deletetext";
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 

    
    $query1="delete from book where BID=".$deletetext;
    $result=$pdo->exec($query1);

    echo "||test1:".$query1;
    header("Refresh:0.5;url=bookmanage.php");  date("Y/m/d G:i:s");
?>