<head>
    <title>我的借書狀況</title>
</head>
<style>
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
</style>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, #f2f2f2;
  border-collapse: collapse;
  width: 75%;
}

#customers td, #customers th {
  border: 1px solid black;
  padding: 8px;
}

#customers tr:nth-child(all){background-color: white;}

#customers tr:hover {background-color: #f2f2f2;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #005AB5;
  color: white;
}
</style>

<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: yellow;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<style>
.button {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #6A6AFF;
}

.button1:hover {
  background-color: #6A6AFF;
  color: white;
}
    
.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button2:hover {
  background-color: #4CAF50;
  color: white;
}
</style>

<style>
.Bbutton {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 2px 6px;
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
  background-color: black; 
  color: white; 
  border: 2px solid black;
}

.Bbutton4:hover {
  background-color: white;
  color: black;
  border: 2px solid black;
}
</style>

<?php
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    $cc2 = !empty($_COOKIE['c2'])?$_COOKIE['c2']:NULL;
    if($cc1!=NULL)
    {
        echo '<marquee behavior="alternate" bgcolor="ffcc00">'."歡迎 $cc1 使用本圖書系統".'</marquee>';
    }
?>
<h1><font size="7" color="red" face="Arial"><center><b>Library System</b></center><br></font></h1>

<center>
<!----------------------------------------------------------------------->
<font size="5">已借閱圖書<br>Table:<br></font>
<table id="customers" border="2">
    <tr>
        <th><center><font face="Arial">BID</font></center></th>
        <th><center><font face="Arial">Bookname</font></center></th>
        <th><center><font face="Arial">Category</font></center></th>
        <th><center>還書</center></th>
    </tr>
    <tr>

<?php
    #$name1 = !empty($_POST['name1'])?$_POST['name1']:NULL;
    
    #$pdo = new PDO('localhost','t1', 'root', '');  
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    $query="select BID,Bname,category from book,person where (book.PID=person.PID) and (book.PID=$cc2)";
    $result=$pdo->query($query);

    while($row=$result->fetch())
    {
        echo '<td><center>'.$row['BID'].'</center></td>'."\r\n";
        echo '<td><center>'.$row['Bname'].'</center></td>'."\r\n";
        echo '<td><center>'.$row['category'].'</center></td>'."\r\n";
        ############################################
        echo '<form action="borrow.php" method="post">';
        echo '<td>'."<center><a href='ret.php?returntext=".$row['BID']."'  class='Bbutton Bbutton4'>還書</a></center>".'</td>'."\r\n";
        echo '</form>';
        ############################################
        echo '</tr>';
    }
?>
</tr>
</table>  
<br><br>

<!----------------------------------------------------------------------->
<font size="5">預約<br>Table:<br></font>
<table id="customers" border="2">
    <tr>
        <th><center><font face="Arial">BID</font></center></th>
        <th><center><font face="Arial">Bookname</font></center></th>
        <th><center><font face="Arial">Category</font></center></th>
        <th><center>借閱/到期日</center></th>
    </tr>
    <tr>

<?php
    #$name1 = !empty($_POST['name1'])?$_POST['name1']:NULL;
    
    #$pdo = new PDO('localhost','t1', 'root', '');  
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
    $query1="select book.BID,Bname,category,book.PID,duedate from book,reserve where ((book.BID=reserve.BID) and (reserve.PID=$cc2))";
    $result1=$pdo->query($query1);

    while($row1=$result1->fetch())
    {
        echo '<td><center>'.$row1['BID'].'</center></td>'."\r\n";
        echo '<td><center>'.$row1['Bname'].'</center></td>'."\r\n";
        echo '<td><center>'.$row1['category'].'</center></td>'."\r\n";
        ############################################
        if($row1['PID']==NULL)
        {
            echo '<form action="borrow.php" method="post">';
            echo '<td>'."<center><a href='retborrow.php?borrowtext=".$row1['BID']."'  class='Bbutton Bbutton3'>借書</a></center>".'</td>'."\r\n";
            echo '</form>';
            
        }
        else
        {
            echo '<td><center>到期: '.$row1['duedate'].'</center></td>'."\r\n";
        }
        ############################################
        echo '</tr>';
    }
?>

</tr>
</table>
<!----------------------------------------------------------------------->
    
<a href="homepage1.php" class="button button1">返回首頁</a>
</center>
