<html>
	<head>
		<meta http-equiv="Content-Type" content="text.html; charset=UTF-8" />
		<title></title>
	</head>
	<body>
		<h1></h1>
		<?php
		// 入力ちを取得する
		$uname = $_POST["uname"];
		$email = $_POST["email"];
		$message = $_POST["message"];

		// メール本文の組み立て
		$to ="abiko.nishizawa@nifty.com";
		$title = "[]";
		$ext_header = "From:($email}";

		// 本文を組み立てるヒヤドキュメント
		$body = <<<EOM
		------------------------------------------------
		[webサイトからのメール]

		お名前:{$uname}
		メールアドレス:{$eamil}
		メッセージ:{$message}
		------------------------------------------------
EOM;
		?>

		<!-- 組み立てた内容の表示 -->
		<p>メールを送信しました。</p>
		<table border="1">
			<tr>
				<td>お名前</td>
				<td><?php echo $uname; ?></td>
			</tr>
			<tr>
				<td>メールアドレス</td>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<td>メッセージ</td>
				<td><?php echo nl2br($message); ?></td>
			</tr>
		</table>
	</body>
</html>