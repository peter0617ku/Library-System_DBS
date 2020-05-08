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

<marquee behavior="alternate" bgcolor="ffcc00">歡迎來到孟平大神 (M083040024) 製作的資料庫系統--實驗室圖書借用系統</marquee>
<h1><font size="7" color="red" face="Arial"><center><b>Library System</b></center><br></font></h1>

<font size="5">書籍分類<br>Table:<br></font>
<table border="2">
    <tr>
        <th>BID</th>
        <th>Bookname</th>
        <th>Category</th>
    </tr>
    <tr>

<?php
    $name2 = !empty($_POST['name2'])?$_POST['name2']:NULL;    
        
    #$pdo = new PDO('localhost','t1', 'root', '');  
    $pdo = new PDO("mysql:host=localhost;dbname=t1", 'root', ''); 
    $query="select * from book where category like '$name2%'";
    $result=$pdo->query($query);

    while($row=$result->fetch())
    {
        echo '<td>'.$row['BID'].'</td>'."\r\n";
        echo '<td>'.$row['Bname'].'</td>'."\r\n";
        echo '<td>'.$row['category'].'</td>'."\r\n";
        echo '</tr>';
    }
?>

</tr>
</table>

<a href="test.php" class="button">返回上一頁</a>