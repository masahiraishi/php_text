<?php
// セッションの開始
session_start();
if (empty($_SESSION)){
	exit;
}

	// 接続設定
	$dbtype = "mysql";
	$sv = "localhost";
	$dbname = "hiraishi";
	$user = "root";
	$pass = "0000";

	// データベースに接続
	$dsn = "$dbtype:dbname=$dbname;host=$sv";
	$conn = new PDO($dsn,$user,$pass);

	// 削除データの主キーを取得
	$m_id = $_SESSION["m_id"];

	// データを削除
	$sql = "DELETE FROM message WHERE (m_id = :m_id);";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":m_id",$m_id);
	$stmt->execute();

	// エラーチェック
	$error = $stmt->errorInfo();
	if ($error[0] != "00000"){
		$message = "データの削除に失敗しました。{$error[2]}";
	}else{
		$message = "データを削除しました。";
	}

	// セッションデータの破棄
	$_SESSON = array();
	session_destroy();
?>
<!-- 処理結果の表示 -->
<html>
	<head>
		<meta http-equiv="Conten-Type" content="text/html; charset=UTF-8" />
		<title>ゲストブック</title>
	</head>
	<body>
		<p>削除完了画面</p>
		<p><?php echo $message; ?></p>
		<p><a href="index.php">トップページへ</a></p>
	</body>
</html>