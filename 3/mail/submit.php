<?php
// フォームデータがからの場合は処理終了
if(empty($_POST)){
	echo "処理終了";
	exit;
}

// セッションの開始
session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>メールフォーム</title>
	</head>
	<body>
		<h1>メールフォーム（3. 完了画面）</h1>
		<?php
		// メール本文の組み立て
		$uname = htmlspecialchars($_SESSION["uname"],ENT_QUOTES,"UTF-8");
		$email = htmlspecialchars($_SESSION["email"],ENT_QUOTES,"UTF-8");
		$message = htmlspecialchars($_SESSION["message"],ENT_QUOTES,"UTF-8");

		// メール送信の実行
		$to = "mail@nishi2002.com";
		$title = "[]";
		$ext_header = "From:{$email}";
		$body = <<<EOM
		--------------------------------------------------
		【Webサイトからのメール】

		お名前：{$uname}
		メールアドレス：{$email}
		メッセージ：{$message}
		--------------------------------------------------
EOM;

		// メール送信の実行
		$rc=mb_send_mail($to,$title,$body,$ext_header);
		if (!$rc){
			exit;
		}else{
			$_SESSION = NULL;
		}
		?>
		<!--処理結果を表示  -->
		<p>メールを送信しました。</p>
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
				<td width="300"><?php echo nl2br($message); ?></td>
			</tr>
		</table>
	</body>
</html>