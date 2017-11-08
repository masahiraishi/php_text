<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>マーケ</title>
	</head>
	<body>
		<h1>マーケ</h1>



<?php
			var_dump($_POST["act"]);


			// error処理
			if ($_POST["act"] == "confirm"){

				$errors = array();
				// hiddenで使いやすいように置き換える
				$c_type = $_POST["c_type"];
				$c_name = $_POST["company_name"];
				$url = $_POST["URL"];
				$div = $_POST["division"];
				$name = $_POST["name"];
				$zip = $_POST["zip"];
				$ad1 = $_POST["address1"];
				$ad2 = $_POST["address2"];
				$mail = $_POST["email"];
				$tel = $_POST["tel"];

				if(empty($c_name)){
					$errors[] = "会社名を入力してください";
				}
				if(empty($url)){
					$errors[] = "メールアドレスを入力してください";
				}
				if(empty($div)){
					$errors[] = "部署名を入力してください";
				}
				if(empty($name)){
					$errors[] = "名前を入力してください";
				}
				if(empty($zip)){
					$errors[] = "郵便番号を入力してください";
				}
				if(empty($ad1)){
					$errors[] = "都道府県CDを入力してください";
				}
				if(empty($ad2)){
					$errors[] = "住所を入力してください";
				}
				if(empty($mail)){
					$errors[] = "メールアドレスを入力してください";
				}
				if(empty($tel)){
					$errors[] = "電話番号を入力してください";
				}
?>
        <p>確認画面</p>
<?php
				if(isset($errors)){

					foreach ($errors as  $value) {
						echo $value."<br />\n";
					}
				}
?>
		<form method="POST" action="insert3.php">
			<table border="1">
				<tr>
					<td>商号種別</td>
					<td><?php echo $c_type; ?></td>
				</tr>
				<tr>
					<td>会社名</td>
					<td><?php echo $c_name; ?></td>
				</tr>
				<tr>
					<td>URL</td>
					<td><?php echo $url; ?></td>
				</tr>
				<tr>
					<td>部署名</td>
					<td><?php echo $div; ?></td>
				</tr>
				<tr>
					<td>名前</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td>郵便番号</td>
					<td><?php echo $zip; ?></td>
				</tr>
				<tr>
					<td>都道府県CD</td>
					<td><?php echo $ad1; ?></td>
				</tr>
				<tr>
					<td>住所</td>
					<td><?php echo $ad2; ?></td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td><?php echo $mail; ?></td>
				</tr>
				<tr>
					<td>電話番号</td>
					<td><?php echo $tel; ?></td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="入力画面へ">
<?php
						//errorsに、なにもなければ$_POST["act"] =finish
					if (empty($errors)){
?>
						<input type = "hidden" name = "c_type" value = "<?php echo $c_type; ?>">
						<input type = "hidden" name = "company_name" value = "<?php echo $company_name; ?>">
						<input type = "hidden" name = "url"  value = "<?php echo $url; ?>">
						<input type = "hidden" name = "division" value = "<?php echo $division; ?>">
						<input type = "hidden" name = "zip" value = "<?php echo $zip; ?>">
						<input type = "hidden" name = "name" value = "<?php echo $name; ?>">
						<input type = "hidden" name = "address1" value="<?php echo $address1; ?>">
						<input type = "hidden" name = "address2" value="<?php echo $address2; ?>">
						<input type = "hidden" name = "email" value = "<?php echo $email; ?>">
						<input type = "hidden" name = "tel" value = "<?php echo $tel;?>">
						<input type="submit" name="sub" value="登録する">
<?php
						if($sub="登録する"){?>
							<input type="hidden" name="act" value="finish"><?php
						}
					}
?>
					</td>
				</tr>
			</table>
		</form>
<?php
			}
?>


<!--入力画面 -->
<?php
		if ($_POST["act"] == "error" or $_POST["act"] == ''){
?>
		<!-- データ入力フォーム -->
		<form method="POST" action="insert3.php">
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
						<input type="submit" value="更新">
					</td>
				</tr>
			</table>
		</form>
<?php
		}
?>






<?php
		// 完了画面
		if ($_POST["act"] == "finish"){

		include 'sql.php';
		$sql ="INSERT INTO dl_user(c_type,company_name,URL,division,name,zip,address1,address2,email,tel) VALUES (".$_POST["c_type"].",".$_POST["company_name"].",".$_POST["URL"].",".$_POST["division"].",".$_POST["name"].",".$_POST["zip"].",".$_POST["address1"].",".$_POST["address2"].",".$_POST["tel"].");";
		$result_usr = mysql_query($sql,$dbconn);
		if(!$result_usr){

		}
		echo $sql;
?>
		<P>追加完了画面</P>

<?php
		}
?>
		<p><a href="marke_search2.php">トップへ</a></p>
	</body>
</html>