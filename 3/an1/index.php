<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
	</head>
	<body>
		<h1></h1>
		<p></p>
		<form mehod="POST" action="check.php">
			<table border="1">
				<tr>
					<td></td>
					<td><input type="text" name="uname" size="50"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type = "text" name = "email" size="50"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<!-- 2択のラジオボタン -->
						<input type="radio" name="gender" value="男">男性
						<input type="radio" name= "gender" value="女">女性
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<!-- 選択メニュー -->
						<select name="job">
							<option value="">選択</option>
							<option>学生</option>
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
					// 配列からラジオボタンを製作する
					$arr_rate = array(
						"5" =>"満足",
						"4" => "やや満足",
						"3" => "普通",
						"2" => "やや不満",
						"1" => "不満",
					);
					foreach ($arr_rate as $key=>$value) {
						echo "<input type=\"radio\"name=\"rate1\" value=\"{$key}\">{$value}";
					}
			?>
					</td>
				</tr>
				<tr>
					<td>書籍のボリュームは？</td>
					<td>
			<?php
					// 配列からラジオボタンを作成する
				foreach ($ar_rate as $key=>$value){
					echo " <input type=\"radio\" name=\"rate2\" value=\"{$key}\">{$value}";
				}
			?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<!-- チェックボックス -->
						<input type="checkbox" name="tec[]" value="php">PHP
						<input type="checkbox" name="tec[]" value="Java">Java
						<input type="checkbox" name="tec[]" value="Ruby">Ruby
						<input type="checkbox" name="tec[]" value="C#" >C#
						<input type="checkbox" name="tec[]" value="Perl">Perl
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<!-- ON/OFF形式のチェックボックス -->
						<input type="checkbox" name="dm" checked>送付を希望する
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<!--  -->
						<textarea rows="5" cols="40" name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2">
						<input type="submit" value="確認する" name= "sub1">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
