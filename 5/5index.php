<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>ゲストブック</title>
    </head>
    <body>
      <h1>ゲストブック</h1>
      <!-- データ入力フォーム -->
      <form method="POST" action="5confirm.php">
        <table border="1">
          <tr>
            <td>名前</td>
            <td><input type="text" name="m_name" size="30"></td>
          </tr>
          <tr>
            <td>メールアドレス</td>
            <td><input type="text" name="m_mail" size="30"></td>
          </tr>
          <tr>
            <td>メッセージ</td>
            <td>
            <textarea rows="5" cols="30" name="m_message"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" value="確認する">
            </td>
          </tr>
        </table>
      </form>

<?php
// 接続設定
$dbtype = "mysql";
$sv = "localhost";
$dbname = "hiraishi";
$user = "root";
$pass = "0000";

// データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv";
$conn = new PDO($dsn,$user,$pass);

// データの取得
$sql = "SELECT * FROM message ORDER BY m_id DESC";
$stmt = $conn ->prepare($sql);
$stmt -> execute();

// 取得したデータを一覧表示
while($row = $stmt -> fetch() ){
    echo "<hr>{$row["m_id"]}:";
    if(!empty($row["m_mail"])){
      echo  "<a href=\"mailto:" . $row["m_mail"]."\">" . $row["m_name"] . "</a>";
    }else{
      echo $row["m_name"];
    }
    echo "(" . date("Y/m/d H:i", strtotime($row["m_dt"])) . ")";
    echo "<p>" . nl2br($row["m_message"]) . "</p>";

    // 変更、削除、詳細画面表示へのリンク
    echo "<a href=\"5update.php?m_id=". $row["m_id"] . "\">変更</a> ";
    echo "<a href=\"5delete-confirm.php?m_id=" . $row["m_id"] . "\">削除</a> ";
    echo "<a href=\"5detail.php?m_id=" . $row["m_id"] . "\">詳細</a> ";
}
?>
</body>
</html>
