<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html";chareset="UTF-8"/>
    <title>アンケートフォーム</title>
  </head>
  <body>
    <h1>アンケートフォーム(1.回答画面)</h1>
    <p>アンケートに回答して「確認する」ボタンをクリックしてください</p>
    <form method="POST" action="3-3check.php">
      <table border="1">
        <tr>
          <td>お名前</td>
          <td><input type="text" name="uname" size="50"></td>
        </tr>
        <tr>
          <td>メールアドレス</td>
          <td><input type="text" nmae="email" size="50"></td>
        </tr>
        <tr>
          <td>性別</td>
          <td>
<!-- 二択のラジオボタン -->
            <input type="radio" name="gender" value="男">男性
            <input type="radio" name="gender" value="女">女性
          </td>
        </tr>
        <tr>
          <td>職業</td>
          <td>
<!--選択メニュー  -->
            <select name="job">
              <option value="">▼選択</option>
              <option>会社員</option>
              <option>公務員</option>
              <option>自営業</option>
              <option>その他</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>書籍の満足度は？</td>
          <td>
            <?php
    // 配列からラジオボタンを作る
            $ar_rate=array(
              "5"=>"満足",
              "4"=>"やや満足",
              "3"=>"普通",
              "2"=>"やや不満",
              "1"=>"不満",
            );

              foreach($ar_rate as $key=>value){
                echo "<input type=\"radio\" name=\"rate2\" value=\"{$key}\">{$value}";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>経験のある技術(複数選択可)</td>
          <td>
      <!--checkbox  -->
            <input type="checkbox" name="tec[]" value="PHP">PHP
            <input type="checkbox" name="tec[]" value="Java">Java
            <input type="checkbox" name="tec[]" value="Ruby">Ruby
            <input type="checkbox" name="tec[]" value="C#">C#
            <input type="checkbox" name="tec[]" value="Perl">Perl
          </td>
        </tr>
  </body>
</html>
