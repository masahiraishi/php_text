<?php
// フォームデータが空の場合は処理終了
if(empty($_POST)){
  echo "処理終了";
  exit;
}
//セッションの開始
session_start();
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"/>
    <title>メールフォーム</title>
  </head>
  <body>
    <h1>メールフォーム(2.確認画面)</h1>
    <p>内容を確認してください</p>
    <?php
// 入力値のチェック
      if(empty($_POST{"uname"})){
        echo "お名前を入力してください";
        exit;
      }
      if(empty($_POST{"email"})){
        echo "メールアドレスを入力してください";
        exit;
      }
      if(empty($_POST{"message"})){
        echo "メッセージを入力してください";
        exit;
      }

// 入力値の取得、加工
      $uname=htmlspecialchars($_POST["uname"],ENT_QUOTES,"UTF-8");
      $email=htmlspecialchars($_POST["email"],ENT_QUOTES,"UTF-8");
      $message=htmlspecialchars($_POST["message"],ENT_QUOTES,"UTF-8");

      $_SESSION["uname"]=$uname;
      $_SESSION["email"]=$email;
      $_SESSION["message"]=$message;
    ?>

    <form method="POST" action="3-2submit.php">
      <table border="1">
        <tr>
          <td>お名前</td>
          <td width="300"><?php echo $uname; ?></td>
        </tr>
        <tr>
          <td>メールアドレス</td>
          <td width="300"><?php echo $email; ?></td>
        </tr>
        <tr>
          <td>メッセージ</td>
          <td width="300"><?php echo nl2br($message); ?> </td>
        </tr>
        <tr>
          <td align="right" colspan="2">
            <input type="submit" name="sub1" value="送信する">
          </td>
        </tr>
      </table>
      <!-- hiddenは不要 -->
    </form>
  </body>
</html>