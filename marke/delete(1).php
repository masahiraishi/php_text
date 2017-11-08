<?php
	// データ接続
	include 'sql.php';

	// 置き換え
	$user_id = $_POST["user_id"]

	// 削除確認
	if($_POST["act"] == ""){

        // 削除するデータを取得
        $sql = "SELECT * FROM dl_user WHERE (user_id = $user_id);";
        $result_user = mysql_query($sql,$dbconn);


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>マーケ</title>
	</head>
	<body>
		<h1><?php echo $user_id; ?></h1>
		<!-- 削除するデータの確認 -->
		<form method="POST" action="delete.php">
			<table border="1">
				<tr>
					<td>名前</td>
					<td><?php echo $result_user['name']; ?></td>
				</tr>
				<tr>
					<td>会社名</td>
					<td><?php echo $result_user['company_name']; ?></td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td><?php echo $result_user['email']; ?></td>
				</tr>
				<tr>
          			<td colsapn="2">
          				<input type = "hidden" name = "act" value = "execute">
          				<input type = "hidden" name = "user_id" value = "$_POST['user_id']">
						<input type = "hidden" name = "c_type" value = "$_POST['c_type']">
						<input type = "hidden" name = "company_name" value = "$_POST['company_name']">
						<input type = "hidden" name ="url"  value = "$_POST['url']">
						<input type = "hidden" name = "division" value = "$_POST['division']">
						<input type = "hidden" name = "zip" value = "$_POST['zip']">
						<input type = "hidden" name = "name" value = "$_POST['name']">
						<input type = "hidden" name = "address1" value="$_POST['address1']">
						<input type = "hidden" name = "address2" value="$_POST['address2']">
						<input type = "hidden" name = "email" value = "$_POST['email']">
						<input type = "hidden" name = "tel" value = "$_POST['tel']">
            			<input type = "submit" value="削除する">
          			</td>
				</tr>
			</table>

			<p><a href="marke_search2.php">トップへ</a></p>
<?php
	}

 	// 削除実行
	if($_POST["act"] == "execute"){

	// 置き換え
		$user_id = $_POST["user_id"]

	//データを削除
		$sql = "DELETE FROM dl_user WHERE (user_id = $user_id)";
		$result_user = mysql($sql,$dbconn);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>マーケ</title>
	</head>
	<body>
		<h1>削除完了画面</h1>
		<p><a href="marke_search2.php">トップページへ</a></p>
	</body>
</html>


<?php
	}
?>

