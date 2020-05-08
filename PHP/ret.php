<head>
    <title>書籍還書中...</title>
</head>
<font size='6'><div style="text-align:center">書籍還書中...</div></font>

<?php
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    $cc2 = !empty($_COOKIE['c2'])?$_COOKIE['c2']:NULL;
?>

<?php
    $returntext = !empty($_GET['returntext'])?$_GET['returntext']:NULL;
    
    echo "borrow=$cc2, $returntext";
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 

    #$query1="insert into reserve(PID,BID,ordertime) values($cc2,$borrowtext,'".date("Y-m-d G:i:s")."')";
    #$result=$pdo->exec($query1);

    $d1=new DATETIME('NOW');
    
    $query1="update book set duedate=NULL,startdate=NULL,PID=NULL where BID=".$returntext;
    $result=$pdo->exec($query1);

    echo "||test1:".$query1;
    header("Refresh:0.5;url=mybook.php");
?>