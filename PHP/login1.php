<head>
    <title>登入</title>
</head>
<style>
body {
  background-color: #FFFEDB;
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
  background-color: #FFAF60;
  color: black; 
  border: 2px solid #FFAF60;
}

.button1:hover {
  background-color: white; 
  color: black;
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
    background-color: #FFAF60;
    color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid #FFAF60;  
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: white;
  color: black;
}
    
input[type=reset] {
  width: 50%;
  background-color: #FFAF60;
    color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid #FFAF60;  
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset]:hover {
background-color: white;
  color: black;
}
</style>

<marquee behavior="alternate" bgcolor="ffcc00"><font size="4">歡迎來到孟平大神 (M083040024) 製作的資料庫系統--實驗室圖書借用系統</font></marquee>
<h1><font size="7" color="red" face="Arial"><center><b>Login Page</b></center><br></font></h1>

<form action="login1.php" method="post">
<center>請輸入使用者名稱:<br>
    <input type ="text" name="username">
    <input type ="submit" value="登入">
    <input type ="reset" value="清除, 重寫"><br><br>
    <a href="register.php" class="button button1">新用戶註冊</a>
    <a href="homepage.php" class="button button1">返回首頁</a>
</center>
</form>

<?php
    $username = !empty($_POST['username'])?$_POST['username']:NULL;

    $pdo = new PDO("mysql:host=localhost;dbname=library", 'root', '');
    $query="select * from person where Pname='$username'";
    $result=$pdo->query($query);

    $row=$result->fetch();
    if($row){
        if($row['Pname']==$username)
        {
            echo '登入成功';
            setcookie('c1',$row['Pname']);
            setcookie('c2',$row['PID']);
            header("Location: homepage1.php");
        }
        else
        {
            echo '登入失敗';
        }
    }
    else
    {
        echo '登入失敗: 請確認您的使用者帳號';
        setcookie('c1',NULL);
    }
?>
