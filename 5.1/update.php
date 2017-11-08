<?php
// セッションの開始
session_start();

// 変更データの主キーを取得

if (!isset($_GET["m_id"])){
	exit;
}else{
	$m_id = $_GET["m_id"];
	$_SESSION["m_id"] = $m_id;    //主キーを$_sessionに格納
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

	// 変更するデータを取得
	$sql = "SELECT * FROM message WHERE (m_id = :m_id);";
	$stmt  = $conn->prepare($sql);
	$stmt->bindParam(":m_id",$m_id);
	$stmt->execute();
	$row = $stmt->fetch();
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>ゲストブック</title>
	</head>
	<body>
		<P>変更画面</P>
		<!-- データ変更フォーム  -->
		<form method = "POST" action = "update-confirm.php">
			<table border="1">
				<tr>
					<td>名前</td>
					<td><input type="text" name="m_name" size="30" value="<?php echo $row["m_name"]; ?>" ></td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td><input type ="text" name="m_mail" size="30" value="<?php echo  $row["m_message"]; ?>"  ></td>
				</tr>
				<tr>
					<td>メッセージ</td>
					<td>
						<textarea rows="5" cols="30" name="m_message"><?php echo $row["m_message"] ?></textarea>
					</td>
				</tr>
				<tr>
					<td colsapn="2">
						<input type="submit" value = "確認する">
					</td>
				</tr>
			</table>
			<a href="index.php">トップへ</a>
		</form>
	</body>
</html>