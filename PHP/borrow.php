<head>
    <title>書籍借閱中...</title>
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

    $d1=new DATETIME('NOW');
    $d1->add(new DateInterval('PT6H')); #add 8 Hours
    $d2=new DATETIME($d1->format('Y-m-d G:i:s'));
    $d2->add(new DateInterval('PT3M')); #add 10 days
    $query1="update book set startdate='".$d1->format('Y-m-d G:i:s')."',duedate='".$d2->format('Y-m-d G:i:s')."', PID=".$cc2." where BID=".$borrowtext;
    $result=$pdo->exec($query1);

    echo "||test1:".$query1;
    header("Refresh:0.5;url=bookquery1.php");  date("Y/m/d G:i:s");
?>