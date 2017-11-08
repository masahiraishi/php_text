<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"/>
  </head>
  <body>
    <title>メールフォーム</title>
      <h1>メールフォーム(1.入力画面)</h1>
      <p>必要事項を入力して「確認する」ボタンをクリックしてください</p>
      <!-- form タグ -->
      <form method="POST" action="3-2check.php">
        <table border="1">
          <tr>
            <td>お名前</td>
        <!-- textbox -->
            <td><input type="text" name="uname" size="30" ></td>
          </tr>
          <tr>
            <td>メールアドレス</td>
            <td><input type="text" name= "email" size="30"></td>
          </tr>
          <tr>
            <td>メッセージ</td>
            <td>
          <!-- textarea -->
              <textarea rows="5" cols="30" name="message"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2">
          <!-- 送信ボタン -->
              <input type="submit" name="sub1" value="確認する">
            </td>
          </tr>
        </table>
      </form>
   </body>
</html>