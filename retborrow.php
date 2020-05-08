<head>
    <title>圖書借閱中...</title>
</head>
<font size='6'><div style="text-align:center">書籍借閱中...</div></font>

<?php
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    $cc2 = !empty($_COOKIE['c2'])?$_COOKIE['c2']:NULL;
?>

<?php
    $borrowtext = !empty($_GET['borrowtext'])?$_GET['borrowtext']:NULL;
    
    echo "borrow=$cc2, $borrowtext";
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 

    #$query1="insert into reserve(PID,BID,ordertime) values($cc2,$borrowtext,'".date("Y-m-d G:i:s")."')";
    #$result=$pdo->exec($query1);

    $d1=new DATETIME('NOW');
    $d2=new DATETIME($d1->format('Y-m-d G:i:s'));
    $d2->add(new DateInterval('P10D')); #add 10 days
    $query1="update book set startdate='".$d1->format('Y-m-d G:i:s')."',duedate='".$d2->format('Y-m-d')." 17:00:00.000000', PID=".$cc2." where BID=".$borrowtext;
    $result=$pdo->exec($query1);

    $query1="delete from reserve where BID=".$borrowtext." and PID=".$cc2;
    $result=$pdo->exec($query1);

    echo "||test1:".$query1;
    header("Refresh:1;url=mybook.php");  date("Y/m/d G:i:s");
?>