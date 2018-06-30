<?php

$my_Id = $_POST['my_id'];
$password = $_POST['password'];
$save = $_POST['save'];

// COKKIEを保存

if ($save === 'on'){
	setcookie('my_id',$myId,time() + 60 * 60 * 60 * 24 * 14);
	$message = 'ログイン情報を記録しました';
}else{
	setcookie('my_id','');
	$message = '記録しませんでした';
}

?>

	<P><?php echo $message ?></P>
	<p><a href = "./sample_17.php">戻る</a></p>