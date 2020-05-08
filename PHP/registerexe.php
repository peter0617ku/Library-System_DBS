<?php
    $name1 = !empty($_POST['username'])?$_POST['username']:NULL;
    $email = !empty($_POST['Email'])?$_POST['Email']:NULL;
    #$pdo = new PDO('localhost','t1', 'root', '');  
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 

    
    $query="select  PID from person order by PID DESC LIMIT 1";
    $result=$pdo->query($query);
    $row=$result->fetch();
    $nextid=$row['PID'];
    $nextid=$nextid+1;
    $query="insert into person(PID,Pname,Email) values($nextid,'$name1','$email')";
    #echo $query;
    $result=$pdo->exec($query);
    header("Refresh:1;url=homepage.php");
?>