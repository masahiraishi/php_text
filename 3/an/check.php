<?php
// フォームデータが空の場合は処理終了
if (empty($_POST)){
	echo "処理終了";
	exit;
}

// 評価用の数値と文字列の関連付け
$ar_rate = array(
	"1"=>"不満",
	"2"=>"やや不満",
	"3"=>"普通",
	"4"=>"やや満足",
	"5"=>"満足",
);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html ; charset=UTF-8" />
		<title><アンケートフォーム</title>
	</head>
	<body>
		<h1>アンケートフォーム（2.回答内容確認）</h1>
		<p>回答を確認してください</p>
<?php
	// 入力値の取得とチェック
	$uname = htmlspecialchars($_POST["uname"],ENT_QUOTES,"UTF-8");
	if(empty($uname)){
		echo "お名前を入力してください";
		exit;
	}

	$email = htmlspecialchars($_POST["email"],ENT_QUOTES,"UTF-8");
	if(empty($email)){
		echo "メールアドレスを入力してください。";
		exit;
	}

	$gender = htmlspecialchars($_POST["gender"],ENT_QUOTES,"UTF-8");
	if (empty($gender)){
		echo "性別を選択してください";
		exit;
	}

	$job = htmlspecialchars($_POST["job"],ENT_QUOTES,"UTF_-8");
	if (empty($job)){
		echo "職業を選択してください";
		exit;
	}

	$rate1 = htmlspecialchars($_POST["rate1"],ENT_QUOTES,"UTF-8");
	if (empty($rate1)){
		echo "書籍の満足度を選択してください";
		exit;
	}

	$rate2 = htmlspecialchars($_POST["rate2"],ENT_QUOTES,"UTF-8");
	if(empty($rate2)){
		echo "書籍のボリュームを評価してください";
		exit;
	}

	if (empty($_POST["tec"])){
		$tec = "なし";
	}else{
		$tec = implode(" ",$_POST["tec"]);
	}

	$tec = htmlspecialchars($tec,ENT_QUOTES,"UTF-8");

	if($_POST["dm"] == "on"){
		$dm = "送付希望";
	}else{
		$dm= "不要";
	}

	$message = htmlspecialchars($_POST["message"],ENT_QUOTES,"UTF-8");
	if (empty($message)){
		echo "書籍の感想を入力してください";
		exit;
	}
?>
<!-- アンケート回答の確認表示 -->
<form method="POST" action="submit.php">
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
			<td>性別</td>
			<td><?php echo $gender; ?></td>
		</tr>
		<tr>
			<td>職業</td>
			<td><?php echo $job; ?></td>
		</tr>
		<tr>
			<td>書籍の満足度</td>
			<td><?php echo $ar_rate[$rate1]; ?></td>
		</tr>
		<tr>
			<td>書籍のボリューム</td>
			<td><?php echo $ar_rate[$rate2]; ?></td>
		</tr>
		<tr>
			<td>経験のある技術（複数回答可）</td>
			<td><?php echo $tec; ?></td>
		</tr>
		<tr>
			<td>新刊情報のお知らせ</td>
			<td><?php echo $dm; ?></td>
		</tr>
		<tr>
			<td>書籍の感想</td>
			<td><?php echo nl2br($message); ?></td>
		</tr>
		<tr>
			<td align="right" colspan="2">
				<input type="submit" value="回答を送信する" name="sub1">
			</td>
		</tr>
	</table>
	<!-- hiddenフォールド -->
		<input type="hidden" name="uname" value="<?php echo $uname; ?>">
		<input type="hidden" name="email" value="<?php echo $email; ?>">
		<input type="hidden" name="gender" value="<?php echo $gender; ?>">
		<input type="hidden" name="job" value="<?php echo $job; ?>">
		<input type="hidden" name="rate1" value="<?php echo $rate1; ?>">
		<input type="hidden" name="rate2" value="<?php echo $rate2; ?>">
		<input type="hidden" name="tec" value="<?php echo $tec; ?>">
		<input type="hidden" name="dm" value="<?php echo $dm; ?>">
		<input type="hidden" name="message" value="<?php echo $message; ?>">
	</form>
	</body>
</html>