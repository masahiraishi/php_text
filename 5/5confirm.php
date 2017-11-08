<?php
// セッションの開始
session_start();

// 入力値の取得、検証、加工
$m_name = chkString($_POST["m_name"],"名前");
$m_mail = chkString($_POST["m_mail"],"メールアドレス",true);
$m_message = chkString($_POST["m_message"],"メッセージ");

// 入力値をセッション変数に格納
$_SESSION["m_name"] = $m_name;
$_SESSION["m_mail"] = $m_mail;
$_SESSION["m_message"] = $m_message;

// 入力値の検証、加工
function chkString($temp="",$field,$accept_empty = false){
  // 未入力チェック
  if (empty($temp) AND !$accept_empty){
    echo "{$field}には何か入力してください";
    exit;
  }
  // 入力内容を安全な値に
  $temp = htmlspecialchars($temp,ENT_QUOTES,"UTF-8");

  // 戻り値
  return $temp;
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" cpntent="text/html; charset=UTF-8" />
    <title>ゲストブック</title>
  </head>
  <body>
    <p>追加確認画面</p>
    <!-- 入力確認フォーム -->
    <form method="POST" action="5submit.php">
      <table border="1">
        <tr>
          <td>名前</td>
          <td><?php echo $m_name; ?></td>
        </tr>
        <tr>
          <td>メールアドレス</td>
          <td><?php echo $m_mail; ?></td>
        </tr>
        <tr>
          <td>メッセージ</td>
          <td><?php echo nl2br($m_message); ?></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" value="書き込む">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>