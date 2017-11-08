<?php
// セッションの開始
session_start();

// 削除データの主キーを取得
if(!isset($_GET["m_id"])){
  exit;
}else{
  $m_id = $_GET["m_id"];
  $_SESSION["m_id"]= $m_id;   // 主キーをセッションに格納する
}

// 接続設定
$dbtype = "mysql";
$sv = "localhost";
$dbname = "hiraishi";
$user="root";
$pass = "0000";
// データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv";
$conn = new PDO($dsn,$user,$pass);



// 削除するデータの取得
$sql = "SELECT * FROM message WHERE (m_id = :m_id);";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":m_id",$m_id);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>ゲストブック</title>
  </head>
  <body>
    <p>削除確認画面</p>
    <!-- 削除データの確認表示 -->
    <form method="POST" action="5delete-submit.php">
      <table border="1">
        <tr>
          <td>名前</td>
          <td><?php echo $row["m_name"]; ?></td>
        </tr>
        <tr>
          <td>メールアドレス</td>
          <td><?php echo $row["m_mail"]; ?></td>
        </tr>
        <tr>
          <td>メッセージ</td>
          <td><?php echo nl2br($row["m_message"]); ?></td>
        </tr>
        <tr>
          <td colsapn="2">
            <input type="submit" value="削除する">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
