<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>マーケ</title>
	</head>
	<body>
		<h1>マーケ</h1>


<?php
			// error処理
			$errors = array();

			function error($form){
					if(!isset($form) ){
						$errors["$form"] = "入力されていない項目があります 。";
					}
			}

		if ($_POST["act"] == confirm){
			if (/* error条件*/){
					$c_name = $_POST["comapny_name"];
					$url = $_POST["URL"];
					$div = $_POST["div"];
					$name = $_POST["name"];
					$zip = $_POST["zip"];
					$ad1 = $_POST["address1"];
					$ad2 =$_POST["address2"];
					$mail = $_POST["email"];
					$tel = $_POST["tel"];
				
					error();
					return ?> <input type="hidden" name="act" value="error"><?php;
				}elsif{?>
				<!-- errorが無ければ -->

						<input type="hidden" name="act" value="finish">
						
<?php			}

		}
?>

<!--入力画面 -->
<?php
		if ($_POST["act"] == error){?>
		<!-- データ入力フォーム -->
		<form method="POST" action="insert.php">
			<table border="1">
				<tr>
					<td>商号種別</td>
					<td><input type="text" name="c_type" size=50></td>
				</tr>
				<tr>
					<td>会社名</td>
					<td><input type="text" name="company_name" size=50></td>
				</tr>
				<tr>
					<td>URL</td>
					<td><input type="text" name="URL" size=50></td>
				</tr>
				<tr>
					<td>部署名</td>
					<td><input type="text" name="division" size=50></td>
				</tr>
				<tr>
					<td>名前</td>
					<td><input type="text" name="name" size=50></td>
				</tr>
				<tr>
					<td>郵便番号</td>
					<td><input type="text" name="zip" size=10></td>
				</tr>
				<tr>
					<td>都道府県CD</td>
					<td><input type="text" name="address1" size=10></td>
				</tr>
				<tr>
					<td>住所</td>
					<td><input type="text" name="address2" size=10></td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td><input type="text" name="email" size=50></td>
				</tr>
				<tr>
					<td>電話番号</td>
					<td><input type="text" name="tel" size=20></td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="act" value="confirm">
						<input type="submit" vlaue="更新">
					</td>
				</tr>
			</table>
		</form>
<?php
		}
?>



<?php
		// 完了画面
		if ($_POST["act"] == finish){

		include 'sql.php';
		$sql ="INSERT INTO dl_user(c_type,company_name,URL,division,name,zip,address1,address2,email,tel) VALUES(c_type,company_name,URL,division,name,zip,address1,address2,email,tell)";
		$result_usr = mysql_query($sql,$dbconn);

		}
?>

		<P>追加完了画面</P>
		<P><?php echo "a"; ?></P>
		<p><a href="marke_search2.php">トップへ</a></p>
	</body>
</html>