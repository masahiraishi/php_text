<?php
// 表示するっデータの主キーを取得
if (!isset($_GET["m_id"])){
  exit;
}else{
  $m_id = $_GET["m_id"];
}

// 接続設定
$dbtype = "mysql";
$sv = "localhost";
$dbname= "hiraishi";
$user = "root";
$pass= "0000";

// データベースに接続する
$dsn = "$dbtype:dbname=$dbname;host=$sv";
$conn = new PDO ($dsn,$user,$pass);

// データの取得
$sql = "SELECT * FROM message WHERE (m_id = :m_id);";
$stmt = $conn -> prepare($sql);
$stmt ->bindParam(":m_id",$m_id);
$stmt -> execute();
$row = $stmt ->fetch();
?>

<html>
  <head>
    <meta http-equiv="Contetnt-Type" content="text/html; charset=UTF-8"/>
    <title>ゲストブック</title>
  </head>
  <body>
    <p>詳細表示画面</p>
    <!-- データの表示-->
    <table border="1">
      <tr>
        <td>名前</td>
        <td><?php echo $row["m_mail"]; ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?php echo $row["m_mail"]; ?></td>
      </tr>
      <tr>
        <td>メッセージ</td>
        <td><?php echo nl2br($row["m_message"]);?>
        </td>
      </tr>
    </table>
    <a href="5index.php">トップページへ</a>
  </body>
  </html>