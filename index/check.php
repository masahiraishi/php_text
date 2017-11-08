<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>練習用フォーム</title>
  <body>
    <h1>練習用フォーム(2.確認画面)</h1>
    <p>内容を確認してください</p>
      <?php
        // 入力値の確認
        $uname=$_POST["uname"];
        $email=$_POST["email"];
        $message=$_POST["message"];
      ?>
      <form method="POST" action="submit.php">
        <table border="1">
          <tr>
            <td>お名前</td>
        <!--  入力内容の確認画面表示 -->
            <td><?php echo $uname; ?></td>
          </tr>
          <tr>
            <td>メールアドレス</td>
            <td><?php echo $email; ?></td>
          </tr>
          <tr>
            <td>メッセージ</td>
         <!-- messageの改行 -->
            <td><?php echo nl2br($message)?></td>
          </tr>
          <tr>
            <td colsoan="2">
              <input type="submit" name="sub1" value="送信する">
            </td>
          </tr>
        </table>
        <!-- hidden_field -->
        <input type="hidden" name="uname" value="<?php echo $uname; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="message" value="<?php echo $message ?>">
      </form>
  </body>
</head>
</html>