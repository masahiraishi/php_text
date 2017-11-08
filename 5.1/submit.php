<?php
// セッションの開始
session_start();
if(empty($_SESSION)){
	exit;
}

	// 接続設定
	$dbtype ="mysql";
	$sv = "localhost";
	$dbname = "hiraishi";
	$user = "root";
	$pass = "0000";

	// データベースに接続
	$dsn = "$dbtype:dbname=$dbname;host=$sv";
	$conn = new PDO($dsn,$user,$pass);

	// 入力内容の取得sessionから
	function  h($s) {
         return     htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
	}
	$m_name = h($_SESSION["m_name"]);
	$m_mail = h($_SESSION["m_mail"]);
	$m_message =  h($_SESSION["m_message"]);

	// データの追加
	$sql = "INSERT INTO message(m_name,m_mail,m_message,m_dt) VALUES (:m_name,:m_mail,:m_message,NOW())";
	$stmt = $conn->prepare($sql);
	$stmt ->bindParam(":m_name",$m_name);
	$stmt ->bindParam(":m_mail",$m_mail);
	$stmt ->bindParam(":m_message",$m_message);
	$stmt->execute();

	// エラーチェック
	$error = $stmt->errorInfo();
	if ($error[0] != "00000"){
		$message = "データの追加に失敗しました。{$error[2]}";
	}else{
		$message = "データを追加しました。データ番号：". $conn->lastInsertId();
	}

	// セッションデータの破棄
	$_SESSION = array();
	session_destroy();
?>
<!-- 処理結果の表示 -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>ゲストブック</title>
	</head>
	<body>
		<p>追加完了画面</p>
		<p><?php echo $message; ?></p>
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
		</table>
		<p><a href="index.php">トップページへ</a></p>
	</body>
</html>