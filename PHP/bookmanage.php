<head>
    <title>管理圖書</title>
</head>
<style>
body {
  background-color: white;
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

#customers tr:nth-child(even){background-color: white;}

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
  padding: 2px 20px;
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

<style>
input[type=submit] {
  transition-duration: 0.4s;
}
input[type=reset] {
  transition-duration: 0.4s;
}
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
    background-color: #005AB5;
    color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid #005AB5;  
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: white;
  color: black;
}
    
input[type=reset] {
  width: 50%;
  background-color: #005AB5;
    color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid #005AB5;  
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset]:hover {
background-color: white;
  color: black;
}
</style>

<!---------------------------------------------------------->
<?php
    $cc1 = !empty($_COOKIE['c1'])?$_COOKIE['c1']:NULL;
    if($cc1!=NULL)
    {
        echo '<marquee behavior="alternate" bgcolor="ffcc00"><font size="4">'."歡迎 $cc1 使用本圖書系統".'</font></marquee>';
    }
?>
<h1><font size="7" color="red" face="Arial"><center><b>Library System</b></center></font></h1>
<div style="text-align:right"><a href="homepage1.php" class="button button1">退出管理模式</a></div>

<form action="bookadd.php" method="post">
<center>請輸入欲新增的書籍:<br>
<input type ="text" name="name1" placeholder="請輸入書本名"><br>
    請輸入欲新增書籍的分類:<br>
<input type ="text" name="name2" placeholder="請輸入書籍分類">
<input type ="submit" value="新增書本">
<input type ="reset" value="清除, 重寫">
</center>
</form>

<center>
<font size="5">書本<br>Table:<br></font>
<table id="customers" border="2">
    <tr>
        <th><center><font face="Arial">BID</font></center></th>
        <th><center><font face="Arial">Bookname</font></center></th>
        <th><center><font face="Arial">Category</font></center></th>
        <th><center>刪除</center></th>
        <th><center>借書人</center></th>
        <th><center>到期日</center></th>
    </tr>
    
<?php
    $name1 = !empty($_POST['name1'])?$_POST['name1']:NULL;
    
    #$pdo = new PDO('localhost','t1', 'root', '');  
    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', ''); 
        
    $query="select * from book";
    $result=$pdo->query($query);

    while($row=$result->fetch())
    {
        echo '<tr>';
        echo '<td><center>'.$row['BID'].'</center></td>'."\r\n";
        echo '<td><center>'.$row['Bname'].'</center></td>'."\r\n";
        echo '<td><center>'.$row['category'].'</center></td>'."\r\n";
        
        echo '<form action="borrow.php" method="post">';
        if($row['PID']==NULL)
        {
            echo '<td>'."<center><a href='bookdelete.php?deletetext=".$row['BID']."' class='Bbutton Bbutton3'>刪除</a></center>".'</td>'."\r\n";
        }
        else
        {
           echo "<td><center><a class='Bbutton Bbutton3'>待還</a></center>".'</td>'."\r\n";
        }
        
        echo '</form>';
        echo '<td><center>'.$row['PID'].'</center></td>'."\r\n";
        if($row['PID']==NULL)
        {
            echo '<td><center>可借閱</center></td>'."\r\n";
        }
        else
        {
           echo '<td><center>到期: '.$row['duedate'].'</center></td>'."\r\n";
        }
    }
?>
    
    </table>
</center>