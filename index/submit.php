<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>練習用フォーム</title>
  </head>
  <body>
    <h1>練習用フォーム(3.完了画面)</h1>
    <?php
      // 入力値を習得する
    $uname=$_POST["uname"];
    $email=$_POST["email"];
    $message=$_POST["message"];

    // mail本文の組み立て
    $to="abiko.nishizawa@nifty.com";
    $title="[メールフォームより]";
    $ext_header="From:{$email}";
    // 本文を組み立てるドキュメント
    $body= <<<EOM
    -----------------------------------------------------------
    [webサイトからのメール]

    お名前:{$uname}
    メールアドレス:{$email}
    メッセージ:{$message}
    -----------------------------------------------------------
EOM;
    ?>
    <!-- 組み立てた内容の表示 -->
    <P>メールを送信しました。</P>
    <table border="1">
      <tr>
        <td>お名前</td>
        <td><?php echo $uname; ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?php echo $email ;?></td>
      </tr>
      <tr>
        <td>メッセージ</td>
        <td><?php echo nl2br($message); ?></td>
      </tr>
    </table>
  </body>
</html>