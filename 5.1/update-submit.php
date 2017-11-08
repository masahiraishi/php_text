<?php
// セッションの開始
session_start();
	if (empty($_SESSION)){
		exit;
	}

	// 接続設定
	$dbtype = "mysql";
	$sv = "localhost";
	$dbname= "hiraishi";
	$user = "root";
	$pass = "0000";

	// データベースに接続
	$dsn = "$dbtype:dbname=$dbname;host=$sv";
	$conn = new PDO($dsn,$user,$pass);

	// 変更内容を取得
	$m_id = $_SESSION["m_id"];
	$m_name = htmlspecialchars($_SESSION["m_name"],ENT_QUOTES,"UTF-8");
	$m_mail = htmlspecialchars($_SESSION["m_mail"],ENT_QUOTES,"UTF-8");
	$m_message = htmlspecialchars($_SESSION["m_message"],ENT_QUOTES,"UTF-8");

	// データを変更
	$sql ="UPDATE message SET
				m_name = :m_name,
				m_mail = :m_mail,
				m_message = :m_message,
				m_dt = NOW()
			WHERE m_id = :m_id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":m_id",$m_id);
	$stmt->bindParam(":m_name",$m_name);
	$stmt->bindParam(":m_mail",$m_mail);
	$stmt->bindParam(":m_message",$m_message);
	$stmt->execute();

	// エラーチェック
	$error = $stmt->errorInfo();
	if ($error[0] != "00000"){
		$message ="データの変更に失敗しました。{$error[2]}";
	}else{
		$message = "データを変更しました。";
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
			<p>変更完了画面</p>
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